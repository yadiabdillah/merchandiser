<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>DATA USER</h1>
          </div>
          <div class="section-body">
            <div class="row">
            <div class="col-12 col-md-12 col-lg12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data User</h4>
                  </div>
                  </div>
                  <a href="<?php echo base_url()."C_user/tambah_user";?>" class="btn btn-primary">Tambah User</a>
          
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Kode User</th>
                          <th scope="col">Nama User</th>
                          <th scope="col">Roles</th>
                          <th scope="col">username</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no = 1;
                      foreach ($barang as $value){ ?>
                          <tr>
                          <th scope="row"><?php echo $no; ?></th>
                          <td><?php echo $value->kode_md; ?></td>
                          <td><?php echo $value->nama_md; ?></td>
                          <td><?php if($value->roles == 'md'){echo "Merchadiser";}else{echo $value->roles;}  ?></td>
                          <td><?php echo $value->username; ?></td>
                          <td><a href="<?php echo base_url()."C_user/edit_user/".$value->id_md; ?>" class="btn btn-success">Edit</a>
                          <a href="<?php echo base_url()."C_user/hapus_user/".$value->id_md; ?>" onclick="swFunction()" class="btn btn-danger">Delete</a></td>
                        </tr>
                     <?php $no++;  }
                       ?>
                        
                      
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>
<?php $this->load->view('dist/_partials/footer'); ?>
<script src="<?php echo base_url(); ?>assets/js/sweetalert2.js"></script>
<script>
function swFunction(event){
  event.preventDefault();

  console.log('jhgfhjklkhgfd');
  swal({
  title: "Sukses Hapus Data",
  text: "Berhasil Hapus Data",
  icon: "success",
}
);
}
</script>