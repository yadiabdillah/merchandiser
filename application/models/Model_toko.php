<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_toko extends CI_Controller {

function get_all(){
    return $this->db->get('toko');
}

function simpan_data($isi){
return $this->db->insert('toko',$isi);
}

function get_one($id){
    return $this->db->query("SELECT * FROM toko WHERE id_toko = '$id'");
}

function ubah_data($id,$isi){
    $this->db->where('id_toko', $id);
		$this->db->update('toko', $isi);

}

function hapus_data($where){
    $this->db->delete('toko',$where);
}
}