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
                    <h4>Edit User</h4>
                  </div>
                  </div>
                 
                  <div class="card-body">
                    </div>
                    <form method="post" action="<?php echo base_url()."C_user/edit_user"; ?>">
                    <input type="hidden" name="id_user" value="<?php echo $user['id_md']; ?>"> 
                    <div class="form-group">
                      <label>Kode User</label>
                      <input type="text" name="kode_user" value="<?php echo $user['kode_md']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Nama User</label>
                      <input type="text" name="nama_user" value="<?php echo $user['nama_md']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Roles</label>
                      <select name="roles" class="form-control">
                      <option value="md" <?php if($user['roles'] == 'md') {echo "selected";} ?>>Merchandiser</option>
                      <option value="admin" <?php if($user['roles'] == 'admin') {echo "selected";} ?>>Admin</option>
                      <option value="manager" <?php if($user['roles'] == 'manager') {echo "selected";} ?>>Manager</option>
                      </select>
                     </div>
                     <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="username" value="<?php echo $user['username']; ?>" class="form-control">
                    </div>
                     <div class="form-group">
                      <label>Password</label>
                      <input type="text" name="password" value="<?php echo $user['password']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="submit" name="ubah"  value="ubah" class="form-control col-2 btn btn-primary">
                    </div>
                    </form>
                </div>
            </div>
          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>