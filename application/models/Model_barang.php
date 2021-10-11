<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_barang extends CI_Controller {

function get_all(){
    return $this->db->get('barang');
}
function get_all_komp(){
    return $this->db->get('barang_kompetitor');
}
function get_all_toko(){
    return $this->db->get('toko');
}
function get_all_md(){
   
    return $this->db->query("SELECT * FROM md where roles = 'md'");
}

function get_name_toko($toko){
return $this->db->query("SELECT nama_toko from toko where id_toko='$toko'");
}


function get_name_md($md){
    return $this->db->query("SELECT nama_md from md where id_md='$md'");
    }

function simpan_data($isi){
return $this->db->insert('barang',$isi);
}

function get_one($id){
    return $this->db->query("SELECT * FROM BARANG WHERE id_barang = '$id'");
}

function ubah_data($id,$isi){
    $this->db->where('id_barang', $id);
		$this->db->update('barang', $isi);

}

function hapus_data($where){
    $this->db->delete('barang',$where);
}
function input_stok($id_barang,$isi,$id_toko,$id_user,$hari){
  return $this->db->query("INSERT INTO table_stok (id_barang,id_toko,id_user,stok,tgl_input) 
  VALUES ('$id_barang','$id_toko','$id_user','$isi','$hari')");
}
function input_stok_komp($id_barang,$isi,$id_toko,$id_user,$hari){
  return $this->db->query("INSERT INTO table_stok_komp (id_barang_komp,id_toko,id_user,stok,tgl_input) 
  VALUES ('$id_barang','$id_toko','$id_user','$isi','$hari')");
}
function input_harga($id_barang,$isi,$id_toko,$id_user,$hari){
  return $this->db->query("INSERT INTO table_harga (id_barang,id_toko,id_user,harga,tgl_input) 
  VALUES ('$id_barang','$id_toko','$id_user','$isi','$hari')");
}
function input_harga_komp($id_barang,$isi,$id_toko,$id_user,$hari){
  return $this->db->query("INSERT INTO table_harga_komp (id_barang_komp,id_toko,id_user,harga,tgl_input) 
  VALUES ('$id_barang','$id_toko','$id_user','$isi','$hari')");
}
function input_exp($id_barang,$isi,$id_toko,$id_user,$hari){
  return $this->db->query("INSERT INTO table_exp (id_barang,id_toko,id_user,tgl_expired,tgl_input) 
  VALUES ('$id_barang','$id_toko','$id_user','$isi','$hari')");
}
function input_exp_komp($id_barang,$isi,$id_toko,$id_user,$hari){
  return $this->db->query("INSERT INTO table_exp_komp (id_barang_komp,id_toko,id_user,tgl_expired,tgl_input) 
  VALUES ('$id_barang','$id_toko','$id_user','$isi','$hari')");
}

function get_ajax_stok(){
    $id_toko = $_POST['id_toko'];
    $tgl_kunjungan = $_POST['tgl_kunjungan'];
    return $this->db->query("SELECT 
                                b.nama_barang,
                                c.nama_md,
                                a.stok,
                                d.nama_toko 
                            FROM 
                                table_stok as a 
                            join 
                                barang as b 
                            on
                                 a.id_barang = b.id_barang
                            join 
                                md as c 
                            on 
                                c.id_md = a.id_user 
                            join 
                                toko as d 
                            on 
                                d.id_toko = a.id_toko 
                            where 
                            d.id_toko = '$id_toko' and a.tgl_input ='$tgl_kunjungan'");
}
function get_ajax_stok_komp(){
    $id_toko = $_POST['id_toko'];
    $tgl_kunjungan = $_POST['tgl_kunjungan'];
    return $this->db->query("SELECT 
                                b.nama_barang_komp as nama_barang,
                                c.nama_md,
                                a.stok,
                                d.nama_toko 
                            FROM 
                                table_stok_komp as a 
                            join 
                                barang_kompetitor as b 
                            on
                                 a.id_barang_komp = b.id_barang_komp
                            join 
                                md as c 
                            on 
                                c.id_md = a.id_user 
                            join 
                                toko as d 
                            on 
                                d.id_toko = a.id_toko 
                            where 
                            d.id_toko = '$id_toko' and a.tgl_input ='$tgl_kunjungan'");
}
function get_ajax_harga(){
    $id_toko = $_POST['id_toko'];
    $tgl_kunjungan = $_POST['tgl_kunjungan'];
    return $this->db->query("SELECT 
                                b.nama_barang,
                                c.nama_md,
                                a.harga,
                                d.nama_toko 
                            FROM 
                                table_harga as a 
                            join 
                                barang as b 
                            on
                                 a.id_barang = b.id_barang
                            join 
                                md as c 
                            on 
                                c.id_md = a.id_user 
                            join 
                                toko as d 
                            on 
                                d.id_toko = a.id_toko 
                            where 
                            d.id_toko = '$id_toko' and a.tgl_input ='$tgl_kunjungan'");
}
function get_ajax_harga_komp(){
    $id_toko = $_POST['id_toko'];
    $tgl_kunjungan = $_POST['tgl_kunjungan'];
    return $this->db->query("SELECT 
                                b.nama_barang_komp as nama_barang,
                                c.nama_md,
                                a.harga,
                                d.nama_toko 
                            FROM 
                                table_harga_komp as a 
                            join 
                                barang_kompetitor as b 
                            on
                                 a.id_barang_komp = b.id_barang_komp
                            join 
                                md as c 
                            on 
                                c.id_md = a.id_user 
                            join 
                                toko as d 
                            on 
                                d.id_toko = a.id_toko 
                            where 
                            d.id_toko = '$id_toko' and a.tgl_input ='$tgl_kunjungan'");
}
function get_ajax_exp(){
    $id_toko = $_POST['id_toko'];
    $tgl_kunjungan = $_POST['tgl_kunjungan'];
    return $this->db->query("SELECT 
                                b.nama_barang,
                                c.nama_md,
                                a.tgl_expired,
                                d.nama_toko 
                            FROM 
                                table_exp as a 
                            join 
                                barang as b 
                            on
                                 a.id_barang = b.id_barang
                            join 
                                md as c 
                            on 
                                c.id_md = a.id_user 
                            join 
                                toko as d 
                            on 
                                d.id_toko = a.id_toko 
                            where 
                            d.id_toko = '$id_toko' and a.tgl_input ='$tgl_kunjungan'");
}
function get_ajax_exp_komp(){
    $id_toko = $_POST['id_toko'];
    $tgl_kunjungan = $_POST['tgl_kunjungan'];
    return $this->db->query("SELECT 
                                b.nama_barang_komp as nama_barang,
                                c.nama_md,
                                a.tgl_expired,
                                d.nama_toko 
                            FROM 
                                table_exp_komp as a 
                            join 
                                barang_kompetitor as b 
                            on
                                 a.id_barang_komp = b.id_barang_komp
                            join 
                                md as c 
                            on 
                                c.id_md = a.id_user 
                            join 
                                toko as d 
                            on 
                                d.id_toko = a.id_toko 
                            where 
                            d.id_toko = '$id_toko' and a.tgl_input ='$tgl_kunjungan'");
}
function get_laporan_stok_all($awal,$akhir){
return $this->db->query("SELECT * FROM table_stok as a join md as b on a.id_user = b.id_md join toko as c on a.id_toko 
= c.id_toko join barang as d on a.id_barang = d.id_barang where tgl_input between '$awal' AND '$akhir'  order by c.nama_toko   DESC ");
}
function get_laporan_stok($awal,$akhir,$toko,$md){
return $this->db->query("SELECT * FROM table_stok as a join md as b on a.id_user = b.id_md join toko as c on a.id_toko 
= c.id_toko join barang as d on a.id_barang = d.id_barang where tgl_input between '$awal' AND '$akhir' AND a.id_toko = '$toko' AND id_user = '$md' ");
}

function get_laporan_stok_single_toko($awal,$akhir,$toko){
return $this->db->query("SELECT * FROM table_stok as a join md as b on a.id_user = b.id_md join toko as c on a.id_toko 
= c.id_toko join barang as d on a.id_barang = d.id_barang where tgl_input between '$awal' AND '$akhir' AND a.id_toko = '$toko' ");
}
function get_laporan_stok_single_md($awal,$akhir,$md){
return $this->db->query("SELECT * FROM table_stok as a join md as b on a.id_user = b.id_md join toko as c on a.id_toko 
= c.id_toko join barang as d on a.id_barang = d.id_barang where tgl_input between '$awal' AND '$akhir' AND a.id_user = '$md' ");
}

function get_laporan_stok_komp_all($awal,$akhir){
return $this->db->query("SELECT d.nama_barang_komp as nama_barang, a.tgl_input, a.stok,b.nama_md,c.nama_toko FROM table_stok_komp as a join md as b on a.id_user = b.id_md join toko as c on a.id_toko 
= c.id_toko join barang_kompetitor as d on a.id_barang_komp = d.id_barang_komp where tgl_input between '$awal' AND '$akhir' order by c.nama_toko DESC ");
}

function get_laporan_stok_komp($awal,$akhir,$toko,$md){
return $this->db->query("SELECT d.nama_barang_komp as nama_barang, a.tgl_input, a.stok,b.nama_md,c.nama_toko FROM table_stok_komp as a join md as b on a.id_user = b.id_md join toko as c on a.id_toko 
= c.id_toko join barang_kompetitor as d on a.id_barang_komp = d.id_barang_komp where tgl_input between '$awal' AND '$akhir' AND a.id_toko = '$toko' AND id_user = '$md' ");
}
function get_laporan_stok_komp_single_toko($awal,$akhir,$toko){
return $this->db->query("SELECT d.nama_barang_komp as nama_barang, a.tgl_input, a.stok,b.nama_md,c.nama_toko FROM table_stok_komp as a join md as b on a.id_user = b.id_md join toko as c on a.id_toko 
= c.id_toko join barang_kompetitor as d on a.id_barang_komp = d.id_barang_komp where tgl_input between '$awal' AND '$akhir' AND a.id_toko = '$toko' ");
}
function get_laporan_stok_komp_single_md($awal,$akhir,$md){
return $this->db->query("SELECT d.nama_barang_komp as nama_barang, a.tgl_input, a.stok,b.nama_md,c.nama_toko FROM table_stok_komp as a join md as b on a.id_user = b.id_md join toko as c on a.id_toko 
= c.id_toko join barang_kompetitor as d on a.id_barang_komp = d.id_barang_komp where tgl_input between '$awal' AND '$akhir' AND a.id_user = '$md' ");
}

//laporan expired

function get_laporan_exp_all($awal,$akhir){
    return $this->db->query("SELECT * FROM table_exp as a join md as b on a.id_user = b.id_md join toko as c on a.id_toko 
    = c.id_toko join barang as d on a.id_barang = d.id_barang where tgl_input between '$awal' AND '$akhir' order by c.nama_toko DESC ");
    }
    function get_laporan_exp($awal,$akhir,$toko,$md){
    return $this->db->query("SELECT * FROM table_exp as a join md as b on a.id_user = b.id_md join toko as c on a.id_toko 
    = c.id_toko join barang as d on a.id_barang = d.id_barang where tgl_input between '$awal' AND '$akhir' AND a.id_toko = '$toko' AND id_user = '$md' ");
    }
    function get_laporan_exp_komp_all($awal,$akhir){
    return $this->db->query("SELECT d.nama_barang_komp as nama_barang, a.tgl_input, a.tgl_expired,b.nama_md,c.nama_toko FROM table_exp_komp as a join md as b on a.id_user = b.id_md join toko as c on a.id_toko 
    = c.id_toko join barang_kompetitor as d on a.id_barang_komp = d.id_barang_komp where tgl_input between '$awal' AND '$akhir' order by c.nama_toko DESC ");
    }
    function get_laporan_exp_komp($awal,$akhir,$toko,$md){
    return $this->db->query("SELECT d.nama_barang_komp as nama_barang, a.tgl_input, a.tgl_expired,b.nama_md,c.nama_toko FROM table_exp_komp as a join md as b on a.id_user = b.id_md join toko as c on a.id_toko 
    = c.id_toko join barang_kompetitor as d on a.id_barang_komp = d.id_barang_komp where tgl_input between '$awal' AND '$akhir' AND a.id_toko = '$toko' AND id_user = '$md' ");
    }
        function get_laporan_exp_single_toko($awal,$akhir,$toko){
        return $this->db->query("SELECT * FROM table_exp as a join md as b on a.id_user = b.id_md join toko as c on a.id_toko 
        = c.id_toko join barang as d on a.id_barang = d.id_barang where tgl_input between '$awal' AND '$akhir' AND a.id_toko = '$toko' ");
        }
        function get_laporan_exp_single_md($awal,$akhir,$md){
        return $this->db->query("SELECT * FROM table_exp as a join md as b on a.id_user = b.id_md join toko as c on a.id_toko 
        = c.id_toko join barang as d on a.id_barang = d.id_barang where tgl_input between '$awal' AND '$akhir' AND a.id_user = '$md' ");
        }

        function get_laporan_exp_komp_single_toko($awal,$akhir,$toko){
            return $this->db->query("SELECT d.nama_barang_komp as nama_barang, a.tgl_input, a.tgl_expired,b.nama_md,c.nama_toko FROM table_exp_komp as a join md as b on a.id_user = b.id_md join toko as c on a.id_toko 
            = c.id_toko join barang_kompetitor as d on a.id_barang_komp = d.id_barang_komp where tgl_input between '$awal' AND '$akhir' AND a.id_toko = '$toko' ");
            }
            function get_laporan_exp_komp_single_md($awal,$akhir,$md){
            return $this->db->query("SELECT d.nama_barang_komp as nama_barang, a.tgl_input, a.tgl_expired,b.nama_md,c.nama_toko FROM table_exp_komp as a join md as b on a.id_user = b.id_md join toko as c on a.id_toko 
            = c.id_toko join barang_kompetitor as d on a.id_barang_komp = d.id_barang_komp where tgl_input between '$awal' AND '$akhir' AND a.id_user = '$md' ");
            }


    // laporan harga
function get_laporan_harga_all($awal,$akhir){
    return $this->db->query("SELECT * FROM table_harga as a join md as b on a.id_user = b.id_md join toko as c on a.id_toko 
    = c.id_toko join barang as d on a.id_barang = d.id_barang where tgl_input between '$awal' AND '$akhir' order by c.nama_toko DESC ");
    }
    function get_laporan_harga($awal,$akhir,$toko,$md){
    return $this->db->query("SELECT * FROM table_harga as a join md as b on a.id_user = b.id_md join toko as c on a.id_toko 
    = c.id_toko join barang as d on a.id_barang = d.id_barang where tgl_input between '$awal' AND '$akhir' AND a.id_toko = '$toko' AND id_user = '$md' ");
    }
    function get_laporan_harga_komp_all($awal,$akhir){
    return $this->db->query("SELECT d.nama_barang_komp as nama_barang, a.tgl_input, a.harga,b.nama_md,c.nama_toko FROM table_harga_komp as a join md as b on a.id_user = b.id_md join toko as c on a.id_toko 
    = c.id_toko join barang_kompetitor as d on a.id_barang_komp = d.id_barang_komp where tgl_input between '$awal' AND '$akhir' order by c.nama_toko DESC ");
    }
    function get_laporan_harga_komp($awal,$akhir,$toko,$md){
    return $this->db->query("SELECT d.nama_barang_komp as nama_barang, a.tgl_input, a.harga,b.nama_md,c.nama_toko FROM table_harga_komp as a join md as b on a.id_user = b.id_md join toko as c on a.id_toko 
    = c.id_toko join barang_kompetitor as d on a.id_barang_komp = d.id_barang_komp where tgl_input between '$awal' AND '$akhir' AND a.id_toko = '$toko' AND id_user = '$md' ");
    }

    function get_laporan_harga_single_toko($awal,$akhir,$toko){
        return $this->db->query("SELECT * FROM table_harga as a join md as b on a.id_user = b.id_md join toko as c on a.id_toko 
        = c.id_toko join barang as d on a.id_barang = d.id_barang where tgl_input between '$awal' AND '$akhir' AND a.id_toko = '$toko' ");
        }
        function get_laporan_harga_single_md($awal,$akhir,$md){
        return $this->db->query("SELECT * FROM table_harga as a join md as b on a.id_user = b.id_md join toko as c on a.id_toko 
        = c.id_toko join barang as d on a.id_barang = d.id_barang where tgl_input between '$awal' AND '$akhir' AND a.id_user = '$md' ");
        }

        function get_laporan_harga_komp_single_toko($awal,$akhir,$toko){
            return $this->db->query("SELECT d.nama_barang_komp as nama_barang, a.tgl_input, a.harga,b.nama_md,c.nama_toko FROM table_harga_komp as a join md as b on a.id_user = b.id_md join toko as c on a.id_toko 
            = c.id_toko join barang_kompetitor as d on a.id_barang_komp = d.id_barang_komp where tgl_input between '$awal' AND '$akhir' AND a.id_toko = '$toko' ");
            }
            function get_laporan_harga_komp_single_md($awal,$akhir,$md){
            return $this->db->query("SELECT d.nama_barang_komp as nama_barang, a.tgl_input, a.harga,b.nama_md,c.nama_toko FROM table_harga_komp as a join md as b on a.id_user = b.id_md join toko as c on a.id_toko 
            = c.id_toko join barang_kompetitor as d on a.id_barang_komp = d.id_barang_komp where tgl_input between '$awal' AND '$akhir' AND a.id_user = '$md' ");
            }


}