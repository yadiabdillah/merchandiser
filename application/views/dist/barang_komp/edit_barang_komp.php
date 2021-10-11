<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>DATA BARANG KOMPETITOR</h1>
          </div>
          <div class="section-body">
            <div class="row">
            <div class="col-12 col-md-6 col-lg6">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Barang Kompetitor</h4>
                  </div>
                  </div>
                 
                  <div class="card-body">
                    </div>
                    <form method="post" action="<?php echo base_url()."C_barang_komp/edit_barang_komp"; ?>">
                    <input type="hidden" name="id_barang" value="<?php echo $barang['id_barang_komp']; ?>"> 
                    <div class="form-group">
                      <label>Kode Barang</label>
                      <input type="text" name="kode_barang" value="<?php echo $barang['kode_barang_komp']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Nama Barang</label>
                      <input type="text" name="nama_barang" value="<?php echo $barang['nama_barang_komp']; ?>" class="form-control">
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