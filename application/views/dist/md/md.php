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
            <div class="col-12 col-md-12 col-lg12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Merchandiser</h4>
                  </div>
                  </div>
                  <a href="<?php echo base_url()."C_md/tambah_md";?>" class="btn btn-primary">Tambah Merchandiser</a>
          
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Kode Merchandiser</th>
                          <th scope="col">Nama Merchandiser</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      foreach ($md as $value){ ?>
                          <tr>
                          <th scope="row">1</th>
                          <td><?php echo $value->kode_md; ?></td>
                          <td><?php echo $value->nama_md; ?></td>
                          <td><a href="<?php echo base_url()."C_md/edit_md/".$value->id_md; ?>" class="btn btn-success">Edit</a>
                          <a href="<?php echo base_url()."C_md/hapus_md/".$value->id_md; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                     <?php  }
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