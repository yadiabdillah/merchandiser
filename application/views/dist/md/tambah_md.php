<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>DATA MERCHANDISER</h1>
          </div>
          <div class="section-body">
            <div class="row">
            <div class="col-12 col-md-6 col-lg6">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah Merchandiser</h4>
                  </div>
                  </div>
                 
                  <div class="card-body">
                    </div>
                    <form method="post" action="<?php echo base_url()."C_md/tambah_md"; ?>">
                    <div class="form-group">
                      <label>Kode Merchandiser</label>
                      <input type="text" name="kode_md" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Nama Merchandiser</label>
                      <input type="text" name="nama_md" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="submit" name="simpan"  value="simpan" class="form-control col-2 btn btn-primary">
                    </div>
                    </form>
                </div>
            </div>
          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>