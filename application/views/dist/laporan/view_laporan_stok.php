<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Lihat Laporan Barang</h1>
          </div>

          <div class="section-body">
          <div class="section-header">
          <form class="form-group" id="formCari" method="POST" action="<?php echo base_url()."C_barang/laporan_stok"; ?>">
       
          <div class="form-group">
                      <label>Tanggal Awal &nbsp;</label>
                      <input type="date" name="tgl_awal" id="tglKunjungan" class="form-control">
                    </div>
          <div class="form-group">
                      <label>Tanggal AKhir &nbsp;</label>
                      <input type="date" name="tgl_akhir" id="tglKunjungan" class="form-control">
                    </div>
  
       
                    <div class="form-group">
                      <label>&nbsp;Nama Toko&nbsp;</label>
                      <select name="id_toko" id="idToko" class="form-control">
                      <option value="all">All toko</option>
                      <?php
                      foreach($toko as $row){ ?>
                        <option value="<?php echo $row['id_toko']; ?>"><?php echo $row['nama_toko']; ?></option>
                      <?php } 
                      ?>
                        
                       
                      </select>
                    </div>
                    <div class="form-group">
                      <label>&nbsp;Nama Md&nbsp;</label>
                      <select name="id_md" id="idMd" class="form-control">
                      <option value="all">All Md</option>
                      <?php
                      foreach($md as $row){ ?>
                        <option value="<?php echo $row['id_md']; ?>"><?php echo $row['nama_md']; ?></option>
                      <?php } 
                      ?>
                        
                       
                      </select>
                    </div>
        
      
                    <div class="form-group"> <label>&nbsp;</label>
                    <input type="submit" name="cari" value="cari" id="klikCari" class="form-control btn btn-primary">
                    </div>
                    </form>
                     </div>
                     <!-- end form header-->
              

              
        </section>
      </div>

<?php $this->load->view('dist/_partials/footer'); ?>
<!--<script type='text/javascript' language='javascript'>
$('#klikCari').click(function(){
  event.preventDefault();
  var idToko = $('#idToko').val();
  var tglKunjungan = $('#tglKunjungan').val();
  console.log(tglKunjungan)

$.ajax({
        url: '<?php echo base_url()."C_barang/ajax_stok";  ?>',
        type:'POST',
        dataType: 'json',
        data : {id_toko:idToko , tgl_kunjungan:tglKunjungan},
        success: function(adata){
          var html = '';
                    var i;
                    for(i=0; i<adata.length; i++){
                        html += '<tr><td>#</td>'+
                                '<td>'+adata[i].nama_barang+'</td>'+
                                '<td>'+adata[i].stok+'</td>'+
                                '<td>'+adata[i].nama_md+'</td>'+
                                '<td>'+adata[i].nama_toko+'</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
            } // End of success function of ajax form
        }); // End of ajax call    */

        $.ajax({
        url: '<?php echo base_url()."C_barang/ajax_stok_komp";  ?>',
        type:'POST',
        dataType: 'json',
        data : {id_toko:idToko , tgl_kunjungan:tglKunjungan},
        success: function(adata){
          var html = '';
                    var i;
                    for(i=0; i<adata.length; i++){
                        html += '<tr><td>#</td>'+
                                '<td>'+adata[i].nama_barang+'</td>'+
                                '<td>'+adata[i].stok+'</td>'+
                                '<td>'+adata[i].nama_md+'</td>'+
                                '<td>'+adata[i].nama_toko+'</td>'+
                                '</tr>';
                    }
                    $('#show_data_komp').html(html);
            } // End of success function of ajax form
        }); //

});
</script>-->

