<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Controller {

function cek_login($username,$pass,$roles){
    return $this->db->query("select * from md where username='$username' and password = '$pass' and roles='$roles'");
}

function get_all_barang(){
    return $this->db->get('barang');
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
}