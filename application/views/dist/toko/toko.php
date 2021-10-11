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
            <div class="col-12 col-md-12 col-lg12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Toko</h4>
                  </div>
                  </div>
                  <a href="<?php echo base_url()."C_toko/tambah_toko";?>" class="btn btn-primary">Tambah Toko</a>
          
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Kode Toko</th>
                          <th scope="col">Nama Toko</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php  $no = 1;
                      foreach ($barang as $value){ ?>
                          <tr>
                          <th scope="row"><?php echo $no; ?></th>
                          <td><?php echo $value->kode_toko; ?></td>
                          <td><?php echo $value->nama_toko; ?></td>
                          <td><a href="<?php echo base_url()."C_toko/edit_toko/".$value->id_toko; ?>" class="btn btn-success">Edit</a>
                          <a href="<?php echo base_url()."C_toko/hapus_toko/".$value->id_toko; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                     <?php $no++; }
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