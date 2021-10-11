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
            <div class="col-12 col-md-6 col-lg6">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah User</h4>
                  </div>
                  </div>
                 
                  <div class="card-body">
                    </div>
                    <form method="post" action="<?php echo base_url()."C_user/tambah_user"; ?>">
                    <div class="form-group">
                      <label>Kode User</label>
                      <input type="text" name="kode_user" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Nama User</label>
                      <input type="text" name="nama_user" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Roles</label>
                      <select name="roles" class="form-control">
                      <option value="md">Merchandiser</option>
                      <option value="admin">Admin</option>
                      <option value="manager">Manager</option>
                      </select>
                     </div>
                     <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="username" class="form-control">
                    </div>
                     <div class="form-group">
                      <label>Password</label>
                      <input type="text" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="submit" name="simpan" onclick="swFunctionTambah()"  value="simpan" class="form-control col-2 btn btn-primary">
                    </div>
                    </form>
                </div>
            </div>
          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>
<script src="<?php echo base_url(); ?>assets/js/sweetalert2.js"></script>
<script>
function swFunctionTambah(){
  
  swal({
  title: "Sukses Input Data",
  text: "Berhasil Menginput Data",
  icon: "success",
  timer:2000
}
);
}
</script>