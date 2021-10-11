<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>DATA TOKO</h1>
          </div>
          <div class="section-body">
            <div class="row">
            <div class="col-12 col-md-6 col-lg6">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Toko</h4>
                  </div>
                  </div>
                 
                  <div class="card-body">
                    </div>
                    <form method="post" action="<?php echo base_url()."C_toko/edit_toko"; ?>">
                    <input type="hidden" name="id_toko" value="<?php echo $toko['id_toko']; ?>"> 
                    <div class="form-group">
                      <label>Kode Barang</label>
                      <input type="text" name="kode_toko" value="<?php echo $toko['kode_toko']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Nama Toko</label>
                      <input type="text" name="nama_toko" value="<?php echo $toko['nama_toko']; ?>" class="form-control">
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