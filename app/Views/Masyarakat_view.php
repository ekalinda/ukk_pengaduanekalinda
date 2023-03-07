<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
<b><i class="fas fa-fw-solid fa-user-lock"></i>Masyarakat</b>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-12">
    <div class="card">
  
    <div class= "card-body">
        <table class="table table-bordered" id="masyarakat">
            <thead>
            <tr>
                <th>No</th>
                <th>nik</th>
                <th>nama</th>
                <th>username</th>
                <th>password</th>
                <th>telp</th>
                <th>aksi</th>
                
            </tr>
            </thead>
            <tbody>
            <?php
                $no=0;
                foreach($masyarakat as $row) {
                    $no++;
                    $data =$row['nik'].",".$row['nama'].",".$row['username'].",".$row['telp'].",".base_url('masyarakat/edit/'.$row['id_masyarakat']);
                    ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$row['nik']?></td>
                            <td><?=$row['nama']?></td>
                            <td><?=$row['username']?></td>
                            <td><?=$row['password']?></td>
                            <td><?=$row['telp']?></td>
                           
                            <td>
                             
                                <a href="<?=base_url('masyarakat/delete/'.$row['id_masyarakat'])?>" onclick="return confirm('yakin mau hapus?')" class="btn btn-dark"><i class="fas fa-trash"></i>Hapus</a>
                            </td>
                        </tr>
                    <?php
                }
            ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
</div>

<div class="modal fade" id="modalMasyarakat" tabindex="-1" aria-labelledby="modalMasyarakatLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModelLabel">Input data Masyarakat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frmMasyarakat" action="" method="post">
            <div class="modal-body">
                    <div class="form-group">
                        <label for="nik">nik</label>
                        <input type="text" name="nik" class="form-control" id="nik">
                    </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama </label>
                        <input type="text" name="nama" class="form-control" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="telp">telp</label>
                        <input type="number" name="telp" class="form-control" id="telp">
                    </div>
                    
                
                    <div class="form-group">
                        <label for="no_hp">ubahpassword</label>
                        <input type="checkbox" name="ubahpassword" class="form-control" aria-label="mau ubah password" id="ubahpassword">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
<?=$this->endSection() ?>
<?=$this->Section("script")?>
 <script>
    $(document).ready(function(){
        $("#modalMasyarakat").on('show.bs.modal',function(event){
            var button = $(event.relatedTarget);
                var data = button.data('masyarakat');
               if(data !=""){
                    const barisdata = data.split(",");
                    $('#nik').val(barisdata[0]);
                    $('#nama').val(barisdata[1]);
                    $('#username').val(barisdata[2]);
                    $('#telp').val(barisdata[3]);
                    $('#frmMasyarakat').attr('action',barisdata[4]);
                }else{
                    $('#nik').val('');
                    $('#nama').val('');
                    $('#username').val('');
                    $('#telp').val('').change();
                    $('#frmMasyarakat').attr('action','/smasyarakat');
                }
        });
        $("#masyarakat").dataTable();
    })
  </script>
<?=$this->endSection()?>