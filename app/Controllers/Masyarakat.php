<?php 
namespace App\Controllers;


use App\Models\masyarakat;
class Masyarakatcontroller extends BaseController{

    protected $masyarakats;

    function __construct()
    {
       $this->masyarakats = new masyarakat();
    }

    public function index()
    {
        $data['masyarakat'] = $this->masyarakats->findAll();
        return view('masyarakat_view',$data);
    }

    public function simpan()
    {
        $this->masyarakats->insert([
            'nik'=>$this->request->getPost('nik'),
            'nama'=>$this->request->getPost('nama'),
            'username'=>$this->request->getPost('username'),
            'password'=>password_hash($this->request->getPost('password').'',PASSWORD_DEFAULT),
            'telp'=>$this->request->getPost('telp'),
           
              
        ]);
        return redirect('masyarakat');
    }

      public function edit($id)
      {
        $data= array(
            'nik'=>$this->request->getPost('nik'),
            'nama'=>$this->request->getPost('nama'),
            'username'=>$this->request->getPost('username'),
            'telp'=>$this->request->getPost('telp'),
            
        );
        $this->masyarakats->update($id,$data);
        session()->setFlashdata("message", "Data Berhasil Disimpan");
        return redirect('masyarakat');
      }


      public function delete($id)
      {
        $this->masyarakats->delete($id);
        session()->setFlashdata("message", "Data Berhasil Dihapus");
        return redirect('masyarakat');
      }
    }