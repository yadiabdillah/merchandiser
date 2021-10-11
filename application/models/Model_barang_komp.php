<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_barang_komp extends CI_Controller {

function get_all(){
    return $this->db->get('barang_kompetitor');
}

function simpan_data($isi){
return $this->db->insert('barang_kompetitor',$isi);
}

function get_one($id){
    return $this->db->query("SELECT * FROM barang_kompetitor WHERE id_barang_komp = '$id'");
}

function ubah_data($id,$isi){
    $this->db->where('id_barang_komp', $id);
		$this->db->update('barang_kompetitor', $isi);

}

function hapus_data($where){
    $this->db->delete('barang_kompetitor',$where);
}
}