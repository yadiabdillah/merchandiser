<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_md extends CI_Controller {

function get_all(){
    return $this->db->get('md');
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