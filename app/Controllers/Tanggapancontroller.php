<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pengaduan;
use App\Models\Tanggapan;

class Tanggapancontroller extends Controller{
    protected $tanggapans,$pengaduans;
    public function __construct()
    {
        $this->pengaduans = new Pengaduan;
        $this->tanggapans = new Tanggapan;
    }
    public function simpan(){

        $data = [
            'tgl_tanggapan'=>date('Y-m-d H:i:s'),
            'id_petugas'=>session()->get('id_petugas'),
            'tanggapan'=>$this->request->getPost('tanggapan'),
            'id_pengaduan'=>$this->request->getPost('id_pengaduan'),

        ];
        $this->tanggapans->insert($data);
        $this->pengaduans->set('status','selesai');
        $this->pengaduans->where('id_pengaduan', $this->request->getPost('id_pengaduan'));
        $this->pengaduans->update();
        return redirect('pengaduan');

    }

    public function gettanggapan(){
        $data=$this->tanggapans->where('id_pengaduan',$this->request->getGet('id_pengaduan'))->findAll();
        return respponse()->setjson($data);
    }

}