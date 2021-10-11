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
            <div class="col-12 col-md-12 col-lg12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Barang Kompetitor</h4>
                  </div>
                  </div>
                  <a href="<?php echo base_url()."C_barang_komp/tambah_barang_komp";?>" class="btn btn-primary">Tambah Barang Kompetitor</a>
          
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Kode Barang Kompetitor</th>
                          <th scope="col">Nama Barang Kompetitor</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no = 1;
                      foreach ($barang as $value){ ?>
                          <tr>
                          <th scope="row"><?php echo $no; ?></th>
                          <td><?php echo $value->kode_barang_komp; ?></td>
                          <td><?php echo $value->nama_barang_komp; ?></td>
                          <td><a href="<?php echo base_url()."C_barang_komp/edit_barang_komp/".$value->id_barang_komp; ?>" class="btn btn-success">Edit</a>
                          <a href="<?php echo base_url()."C_barang_komp/hapus_barang_komp/".$value->id_barang_komp; ?>" class="btn btn-danger">Delete</a></td>
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