<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Controller {

function get_all(){
    return $this->db->get('md');
}
function get_all_komp(){
    return $this->db->get('barang_kompetitor');
}
function get_all_toko(){
    return $this->db->get('toko');
}

function simpan_data($isi){
return $this->db->insert('md',$isi);
}

function get_one($id){
    return $this->db->query("SELECT * FROM md WHERE id_md = '$id'");
}

function ubah_data($id,$isi){
    $this->db->where('id_md', $id);
		$this->db->update('md', $isi);

}

function hapus_data($where){
    $this->db->delete('md',$where);
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
                                b.nama_barang,
                                c.nama_md,
                                a.stok,
                                d.nama_toko 
                            FROM 
                                table_stok_komp as a 
                            join 
                                barang as b 
                            on
                                 a.id_barang_komp = b.id_barang
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
                                b.nama_barang,
                                c.nama_md,
                                a.harga,
                                d.nama_toko 
                            FROM 
                                table_harga_komp as a 
                            join 
                                barang as b 
                            on
                                 a.id_barang_komp = b.id_barang
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
                                b.nama_barang,
                                c.nama_md,
                                a.tgl_expired,
                                d.nama_toko 
                            FROM 
                                table_exp_komp as a 
                            join 
                                barang as b 
                            on
                                 a.id_barang_komp = b.id_barang
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
}