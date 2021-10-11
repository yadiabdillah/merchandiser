<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Input Data Stok</h1>
          </div>
          

          <div class="section-body">
          <?php //print_r($barang); 
          $act = base_url()."C_barang/post_stok";
          $form = "<form method='post' action='".$act."'>";
          $form .="
          <div class='form-group'>
                      <label>Pilih Toko</label>
                      <select class='form-control' name='id_toko'>";
                      foreach ($toko as $to) {
                          $form.= "<option value='".$to["id_toko"]."'>".$to['nama_toko']."</option>";
                      }
                        
                       
                        $form .=" </select>
                    </div>
                ";
              $form .=  "<div class='form-group'>
                <label><h3>Produk Perusahaan</h3></label>
              </div>";
         foreach ($barang as $row){
            $form .= "<label for='" . $row["nama_barang"] . "'>" . $row["nama_barang"] . "</label> <input type='text' class='form-control' name='" . $row["id_barang"] . "' >";
        }

        $form .=  "</br></br><div class='form-group'>
        <label><h3>Produk Kompetitor</h3></label>
      </div>";

      foreach ($barang_komp as $row_komp){
        $form .= "<label for='" . $row_komp["nama_barang_komp"] . "'>" . $row_komp["nama_barang_komp"] . "</label> <input type='text' class='form-control' name='" . $row_komp["kode_barang_komp"] . "' >";
    }

            $form .= "</br><input type='submit' name='simpan' class='form-control col-lg-2 btn btn-primary    ' value='Submit'></form>";
        
echo $form;
//echo $act;
?>


          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>