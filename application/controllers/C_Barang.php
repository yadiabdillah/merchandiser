<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Barang extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('Model_barang');
		$this->load->model('Model_toko');
		
		if(!isset($_SESSION)) {
			session_start();
	   }
		if(!isset($_SESSION['nama'])){
			redirect(base_url("C_login"));
		}
		
		
    }

	public function index() {
		$data = array(
			'title' => "Ecommerce Dashboard"
		);
		$this->load->view('dist/index', $data);
    }
    
    public function barang() {
		if(!isset($_SESSION['nama'])){
			redirect(base_url("C_login"));
		}
		else{
		$data = array(
			'title' => "DATA BARANG"
        );

        $data['barang'] = $this->Model_barang->get_all()->result();
        
		$this->load->view('dist/barang/barang', $data);
	}
	}


	public function tambah_barang(){
		if (isset($_POST['simpan'])){
				$kode = $_POST['kode_barang'];
				$nama = $_POST['nama_barang'];

				$isi = array(
					'kode_barang' => $kode,
					'nama_barang' => $nama
				);
				$simpan = $this->Model_barang->simpan_data($isi);
				if($simpan)
				{
					echo "<script>alert('Data Berhasil disimpan');history.go(-1);</script>";
					header("Location: barang");

				}
		}
		$data = array(
			'title' => "TAMBAH BARANG"
        );
		$this->load->view('dist/barang/tambah_barang',$data);
	}
	public function edit_barang(){
		$id = $this->uri->segment(3);
		
		if (isset($_POST['ubah'])){
			$id_barang = $_POST['id_barang'];
			$kode = $_POST['kode_barang'];
			$nama = $_POST['nama_barang'];
			$isi = array(
				'kode_barang' => $kode,
				'nama_barang' => $nama
			);
			$ubah = $this->Model_barang->ubah_data($id_barang,$isi);
			header("Location: barang");
			if($ubah){
				echo "<script>alert('Data Berhasil disimpan');</script>";
					header("Location: barang");
			}
		}
		$data = array(
			'title' => "EDIT BARANG"
		);
		$data['barang'] = $this->Model_barang->get_one($id)->row_array();
		$this->load->view('dist/barang/edit_barang',$data);
	}

	public function hapus_barang(){
		$id = $this->uri->segment(3);
		$where = array('id_barang'=>$id);
		$hapus = $this->Model_barang->hapus_data($where);
		redirect('C_barang/barang');
	}

	public function stok_barang(){
		
		$data = array(
			'title' => "DATA BARANG"
        );

		$data['barang'] = $this->Model_barang->get_all()->result_array();
		$data['barang_komp'] = $this->Model_barang->get_all_komp()->result_array();
        $data['toko'] = $this->Model_barang->get_all_toko()->result_array();
		$this->load->view('dist/barang/stok_barang', $data);
	}
	public function post_stok(){
		$all = $this->Model_barang->get_all()->result_array();
		$all_komp = $this->Model_barang->get_all_komp()->result_array();
		$id_toko = $_POST['id_toko'];
		$arr_all = array();
		$arr_id = array();
		$arr_isi = array();
		$arr_id_komp = array();
		$arr_isi_komp = array();
		$hari  =  date("Y-m-d");
		$b = 0;
		$e = 0;
		$id_us = $_SESSION['id'];
		foreach($all as $a ){
			$arr_all[$b] = $a['nama_barang'];
			$arr_id[$b] = $a['id_barang'];
			$arr_isi[$b] = $_POST[$a['id_barang']];
			$b++;
		}
		foreach($all_komp as $d ){
			$arr_id_komp[$e] = $d['id_barang_komp'];
			$arr_isi_komp[$e] = $_POST[$d['kode_barang_komp']];
			$e++;
		}
		for($c=0; $c<count($all);){
			$this->Model_barang->input_stok($arr_id[$c],$arr_isi[$c],$id_toko,$id_us,$hari);
			$c++;
		}		
		for($c=0; $c<count($all_komp);){
			$this->Model_barang->input_stok_komp($arr_id_komp[$c],$arr_isi_komp[$c],$id_toko,$id_us,$hari);
			$c++;
		}	
				echo "<script>alert('Data Berhasil disimpan');history.go(-1);</script>";
					header("Location: stok_barang");	
	}

	public function lihat_stok_barang(){
		
		$data = array(
			'title' => "DATA BARANG"
        );

		$data['barang'] = $this->Model_barang->get_all()->result_array();
		$data['barang_komp'] = $this->Model_barang->get_all_komp()->result_array();
        $data['toko'] = $this->Model_barang->get_all_toko()->result_array();
		$this->load->view('dist/barang/view_stok_barang', $data);
	}

	public function ajax_stok(){
		$adata = $this->Model_barang->get_ajax_stok()->result_array();
		echo json_encode($adata);
		
	}
	public function view_laporan_stok(){
		$data = array(
			'title' => "DATA BARANG"
        );

		$data['barang'] = $this->Model_barang->get_all()->result_array();
		$data['barang_komp'] = $this->Model_barang->get_all_komp()->result_array();
		$data['toko'] = $this->Model_barang->get_all_toko()->result_array();
		$data['md'] = $this->Model_barang->get_all_md()->result_array();
		$this->load->view('dist/laporan/view_laporan_stok', $data);
	}
	public function view_laporan_exp(){
		$data = array(
			'title' => "DATA BARANG"
        );

		$data['barang'] = $this->Model_barang->get_all()->result_array();
		$data['barang_komp'] = $this->Model_barang->get_all_komp()->result_array();
        $data['toko'] = $this->Model_barang->get_all_toko()->result_array();
        $data['md'] = $this->Model_barang->get_all_md()->result_array();
		$this->load->view('dist/laporan/view_laporan_exp', $data);
	}
	public function view_laporan_harga(){
		$data = array(
			'title' => "DATA BARANG"
        );

		$data['barang'] = $this->Model_barang->get_all()->result_array();
		$data['barang_komp'] = $this->Model_barang->get_all_komp()->result_array();
		$data['toko'] = $this->Model_barang->get_all_toko()->result_array();
		$data['md'] = $this->Model_barang->get_all_md()->result_array();
		$this->load->view('dist/laporan/view_laporan_harga', $data);
	}
	public function laporan_stok(){
		$data = array(
			'title' => "DATA BARANG"
        );
		$awal = $this->input->post('tgl_awal');
		$akhir = $this->input->post('tgl_akhir');
		$toko = $this->input->post('id_toko');
		$md = $this->input->post('id_md');
		if($toko == 'all' && $md =='all'){
			$data['stok'] = $this->Model_barang->get_laporan_stok_all($awal,$akhir)->result_array();
			$data['stok_komp'] = $this->Model_barang->get_laporan_stok_komp_all($awal,$akhir)->result_array();
			//print_r($data);exit();
		} else if ($md =='all' && $toko != 'all'){
			$data['stok'] = $this->Model_barang->get_laporan_stok_single_toko($awal,$akhir,$toko)->result_array();
			$data['stok_komp'] = $this->Model_barang->get_laporan_stok_komp_single_toko($awal,$akhir,$toko)->result_array();
		} else if ($md !='all' && $toko == 'all'){
			$data['stok'] = $this->Model_barang->get_laporan_stok_single_md($awal,$akhir,$md)->result_array();
			$data['stok_komp'] = $this->Model_barang->get_laporan_stok_komp_single_md($awal,$akhir,$md)->result_array();
		}
		
		else {
			$data['stok'] = $this->Model_barang->get_laporan_stok($awal,$akhir,$toko,$md)->result_array();
			$data['stok_komp'] = $this->Model_barang->get_laporan_stok_komp($awal,$akhir,$toko,$md)->result_array();
			//print_r($data);exit();
		}
		$data['awal'] = $awal;
		$data['akhir'] = $akhir;
		if($toko != 'all'){
			$data['toko'] = $this->Model_barang->get_name_toko($toko)->row_array();
		}else{
			$data['toko'] = array('nama_toko'=>$toko);
		}
		if($md != 'all'){
			$data['md'] = $this->Model_barang->get_name_md($md)->row_array();
		}else{
			$data['md'] = array('nama_md'=>$md);
		}
		
		
		//print_r($data); exit();
		$this->load->library('Pdf');
		
		$this->load->view('dist/laporan/laporan_stok', $data);
	}
	public function laporan_exp(){
		$data = array(
			'title' => "DATA BARANG"
        );
		$awal = $this->input->post('tgl_awal');
		$akhir = $this->input->post('tgl_akhir');
		$toko = $this->input->post('id_toko');
		$md = $this->input->post('id_md');
		if($toko == 'all' && $md =='all'){
			$data['exp'] = $this->Model_barang->get_laporan_exp_all($awal,$akhir)->result_array();
			$data['exp_komp'] = $this->Model_barang->get_laporan_exp_komp_all($awal,$akhir)->result_array();
			//print_r($data);exit();
		} else if ($md =='all' && $toko != 'all'){
			$data['exp'] = $this->Model_barang->get_laporan_exp_single_toko($awal,$akhir,$toko)->result_array();
			$data['exp_komp'] = $this->Model_barang->get_laporan_exp_komp_single_toko($awal,$akhir,$toko)->result_array();
		} else if ($md !='all' && $toko == 'all'){
			$data['exp'] = $this->Model_barang->get_laporan_exp_single_md($awal,$akhir,$md)->result_array();
			$data['exp_komp'] = $this->Model_barang->get_laporan_exp_komp_single_md($awal,$akhir,$md)->result_array();
		
		}
		else {
			$data['exp'] = $this->Model_barang->get_laporan_exp($awal,$akhir,$toko,$md)->result_array();
			$data['exp_komp'] = $this->Model_barang->get_laporan_exp_komp($awal,$akhir,$toko,$md)->result_array();
			//print_r($data);exit();
		}
		$data['awal'] = $awal;
		$data['akhir'] = $akhir;
		if($toko != 'all' ){
			$data['toko'] = $this->Model_barang->get_name_toko($toko)->row_array();
		}else{
			$data['toko'] = array('nama_toko'=>$toko);
		}
		if($md != 'all'){
			$data['md'] = $this->Model_barang->get_name_md($md)->row_array();
		}else{
			$data['md'] = array('nama_md'=>$md);
		}
		//print_r($data); exit();
		$this->load->library('Pdf');
		
		$this->load->view('dist/laporan/laporan_exp', $data);
	}
	public function laporan_harga(){
		$data = array(
			'title' => "DATA BARANG"
        );
		$awal = $this->input->post('tgl_awal');
		$akhir = $this->input->post('tgl_akhir');
		$toko = $this->input->post('id_toko');
		$md = $this->input->post('id_md');
		if($toko == 'all' && $md =='all'){
			$data['harga'] = $this->Model_barang->get_laporan_harga_all($awal,$akhir)->result_array();
			$data['harga_komp'] = $this->Model_barang->get_laporan_harga_komp_all($awal,$akhir)->result_array();
			//print_r($data);exit();
		}
		else if ($md =='all' && $toko != 'all'){
			$data['harga'] = $this->Model_barang->get_laporan_harga_single_toko($awal,$akhir,$toko)->result_array();
			$data['harga_komp'] = $this->Model_barang->get_laporan_harga_komp_single_toko($awal,$akhir,$toko)->result_array();
		} else if ($md !='all' && $toko == 'all'){
			$data['harga'] = $this->Model_barang->get_laporan_harga_single_md($awal,$akhir,$md)->result_array();
			$data['harga_komp'] = $this->Model_barang->get_laporan_harga_komp_single_md($awal,$akhir,$md)->result_array();
		}
		else {
			$data['harga'] = $this->Model_barang->get_laporan_harga($awal,$akhir,$toko,$md)->result_array();
			$data['harga_komp'] = $this->Model_barang->get_laporan_harga_komp($awal,$akhir,$toko,$md)->result_array();
			//print_r($data);exit();
		}
		$data['awal'] = $awal;
		$data['akhir'] = $akhir;
		if($toko != 'all'){
			$data['toko'] = $this->Model_barang->get_name_toko($toko)->row_array();
		}else{
			$data['toko'] = array('nama_toko'=>$toko);
		}
		if($md != 'all'){
			$data['md'] = $this->Model_barang->get_name_md($md)->row_array();
		}else{
			$data['md'] = array('nama_md'=>$md);
		}
		
		//print_r($data); exit();
		$this->load->library('Pdf');
		
		$this->load->view('dist/laporan/laporan_harga', $data);
	}
	public function ajax_stok_komp(){
		$adata = $this->Model_barang->get_ajax_stok_komp()->result_array();
		echo json_encode($adata);
		
	}

	public function harga_barang(){
		
		$data = array(
			'title' => "DATA BARANG"
        );

		$data['barang'] = $this->Model_barang->get_all()->result_array();
		$data['barang_komp'] = $this->Model_barang->get_all_komp()->result_array();
        $data['toko'] = $this->Model_barang->get_all_toko()->result_array();
		$this->load->view('dist/barang/harga_barang', $data);
	}

	public function post_harga(){
		$all = $this->Model_barang->get_all()->result_array();
		$all_komp = $this->Model_barang->get_all_komp()->result_array();
		$id_toko = $_POST['id_toko'];
		$arr_all = array();
		$arr_id = array();
		$arr_isi = array();
		$arr_id_komp = array();
		$arr_isi_komp = array();
		$hari  =  date("Y-m-d");
		$b = 0;
		$e = 0;
		$id_us = $_SESSION['id'];
		foreach($all as $a ){
			$arr_all[$b] = $a['nama_barang'];
			$arr_id[$b] = $a['id_barang'];
			$arr_isi[$b] = $_POST[$a['id_barang']];
			$b++;
		}
		foreach($all_komp as $d ){
			$arr_id_komp[$e] = $d['id_barang_komp'];
			$arr_isi_komp[$e] = $_POST[$d['kode_barang_komp']];
			$e++;
		}
		for($c=0; $c<count($all);){
			$this->Model_barang->input_harga($arr_id[$c],$arr_isi[$c],$id_toko,$id_us,$hari);
			$c++;
		}		
		for($c=0; $c<count($all_komp);){
			$this->Model_barang->input_harga_komp($arr_id_komp[$c],$arr_isi_komp[$c],$id_toko,$id_us,$hari);
			$c++;
		}	
		echo "<script>alert('Data Berhasil disimpan');history.go(-1);</script>";
					header("Location: harga_barang");	
	}

	public function lihat_harga_barang(){
		
		$data = array(
			'title' => "DATA BARANG"
        );

		$data['barang'] = $this->Model_barang->get_all()->result_array();
		$data['barang_komp'] = $this->Model_barang->get_all_komp()->result_array();
        $data['toko'] = $this->Model_barang->get_all_toko()->result_array();
		$this->load->view('dist/barang/view_harga_barang', $data);
	}

	public function ajax_harga(){
		$adata = $this->Model_barang->get_ajax_harga()->result_array();
		echo json_encode($adata);
		
	}
	public function ajax_harga_komp(){
		$adata = $this->Model_barang->get_ajax_harga_komp()->result_array();
		echo json_encode($adata);
		
	}

	public function exp_barang(){
		
		$data = array(
			'title' => "DATA BARANG"
        );

		$data['barang'] = $this->Model_barang->get_all()->result_array();
		$data['barang_komp'] = $this->Model_barang->get_all_komp()->result_array();
        $data['toko'] = $this->Model_barang->get_all_toko()->result_array();
		$this->load->view('dist/barang/exp_barang', $data);
	}

	public function post_exp(){
		$all = $this->Model_barang->get_all()->result_array();
		$all_komp = $this->Model_barang->get_all_komp()->result_array();
		$id_toko = $_POST['id_toko'];
		$arr_all = array();
		$arr_id = array();
		$arr_isi = array();
		$arr_id_komp = array();
		$arr_isi_komp = array();
		$hari  =  date("Y-m-d");
		$b = 0;
		$e = 0;
		$id_us =  $_SESSION['id'];
		foreach($all as $a ){
			$arr_all[$b] = $a['nama_barang'];
			$arr_id[$b] = $a['id_barang'];
			$arr_isi[$b] = $_POST[$a['id_barang']];
			$b++;
		}
		
		foreach($all_komp as $d ){
			$arr_id_komp[$e] = $d['id_barang_komp'];
			$arr_isi_komp[$e] = $_POST[$d['kode_barang_komp']];
			$e++;
		}
		for($c=0; $c<count($all);){
			$this->Model_barang->input_exp($arr_id[$c],$arr_isi[$c],$id_toko,$id_us,$hari);
			$c++;
		}		
		for($c=0; $c<count($all_komp);){
			$this->Model_barang->input_exp_komp($arr_id_komp[$c],$arr_isi_komp[$c],$id_toko,$id_us,$hari);
			$c++;
		}	
		
		echo "<script>alert('Data Berhasil disimpan');history.go(-1);</script>";
					header("Location: exp_barang");
	}

	public function lihat_exp_barang(){
		
		$data = array(
			'title' => "DATA BARANG"
        );

		$data['barang'] = $this->Model_barang->get_all()->result_array();
		$data['barang_komp'] = $this->Model_barang->get_all_komp()->result_array();
        $data['toko'] = $this->Model_barang->get_all_toko()->result_array();
		$this->load->view('dist/barang/view_exp_barang', $data);
	}

	public function ajax_exp(){
		$adata = $this->Model_barang->get_ajax_exp()->result_array();
		echo json_encode($adata);
		
	}
	public function ajax_exp_komp(){
		$adata = $this->Model_barang->get_ajax_exp_komp()->result_array();
		echo json_encode($adata);
		
	}

	public function index_0() {
		$data = array(
			'title' => "General Dashboard"
		);
		$this->load->view('dist/index-0', $data);
	}

	public function layout_default() {
		$data = array(
			'title' => "Layout &rsaquo; Default"
		);
		$this->load->view('dist/layout-default', $data);
	}

	public function layout_transparent() {
		$data = array(
			'title' => "Layout &rsaquo; Transparent Sidebar"
		);
		$this->load->view('dist/layout-transparent', $data);
	}

	public function layout_top_navigation() {
		$data = array(
			'title' => "Layout &rsaquo; Top Navigation"
		);
		$this->load->view('dist/layout-top-navigation', $data);
	}

	public function blank() {
		$data = array(
			'title' => "Blank Page"
		);
		$this->load->view('dist/blank', $data);
	}

	
	public function bootstrap_alert() {
		$data = array(
			'title' => "Bootstrap Components &rsaquo; Alert"
		);
		$this->load->view('dist/bootstrap-alert', $data);
	}

	public function bootstrap_badge() {
		$data = array(
			'title' => "Bootstrap Components &rsaquo; Badge"
		);
		$this->load->view('dist/bootstrap-badge', $data);
	}

	public function bootstrap_breadcrumb() {
		$data = array(
			'title' => "Bootstrap Components &rsaquo; Breadcrumb"
		);
		$this->load->view('dist/bootstrap-breadcrumb', $data);
	}

	public function bootstrap_buttons() {
		$data = array(
			'title' => "Bootstrap Components &rsaquo; Buttons"
		);
		$this->load->view('dist/bootstrap-buttons', $data);
	}

	public function bootstrap_card() {
		$data = array(
			'title' => "Bootstrap Components &rsaquo; Card"
		);
		$this->load->view('dist/bootstrap-card', $data);
	}

	public function bootstrap_carousel() {
		$data = array(
			'title' => "Bootstrap Components &rsaquo; Carousel"
		);
		$this->load->view('dist/bootstrap-carousel', $data);
	}

	public function bootstrap_collapse() {
		$data = array(
			'title' => "Bootstrap Components &rsaquo; Collapse"
		);
		$this->load->view('dist/bootstrap-collapse', $data);
	}

	public function bootstrap_dropdown() {
		$data = array(
			'title' => "Bootstrap Components &rsaquo; Dropdown"
		);
		$this->load->view('dist/bootstrap-dropdown', $data);
	}

	public function bootstrap_form() {
		$data = array(
			'title' => "Bootstrap Components &rsaquo; Form"
		);
		$this->load->view('dist/bootstrap-form', $data);
	}

	public function bootstrap_list_group() {
		$data = array(
			'title' => "Bootstrap Components &rsaquo; List Group"
		);
		$this->load->view('dist/bootstrap-list-group', $data);
	}

	public function bootstrap_media_object() {
		$data = array(
			'title' => "Bootstrap Components &rsaquo; Media Object"
		);
		$this->load->view('dist/bootstrap-media-object', $data);
	}

	public function bootstrap_modal() {
		$data = array(
			'title' => "Bootstrap Components &rsaquo; Modal"
		);
		$this->load->view('dist/bootstrap-modal', $data);
	}

	public function bootstrap_nav() {
		$data = array(
			'title' => "Bootstrap Components &rsaquo; Nav"
		);
		$this->load->view('dist/bootstrap-nav', $data);
	}

	public function bootstrap_navbar() {
		$data = array(
			'title' => "Bootstrap Components &rsaquo; Navbar"
		);
		$this->load->view('dist/bootstrap-navbar', $data);
	}

	public function bootstrap_pagination() {
		$data = array(
			'title' => "Bootstrap Components &rsaquo; Pagination"
		);
		$this->load->view('dist/bootstrap-pagination', $data);
	}

	public function bootstrap_popover() {
		$data = array(
			'title' => "Bootstrap Components &rsaquo; Popover"
		);
		$this->load->view('dist/bootstrap-popover', $data);
	}

	public function bootstrap_progress() {
		$data = array(
			'title' => "Bootstrap Components &rsaquo; Progress"
		);
		$this->load->view('dist/bootstrap-progress', $data);
	}

	public function bootstrap_table() {
		$data = array(
			'title' => "Bootstrap Components &rsaquo; Table"
		);
		$this->load->view('dist/bootstrap-table', $data);
	}

	public function bootstrap_tooltip() {
		$data = array(
			'title' => "Bootstrap Components &rsaquo; Tooltip"
		);
		$this->load->view('dist/bootstrap-tooltip', $data);
	}

	public function bootstrap_typography() {
		$data = array(
			'title' => "Bootstrap Components &rsaquo; Typography"
		);
		$this->load->view('dist/bootstrap-typography', $data);
	}

	public function components_article() {
		$data = array(
			'title' => "Components &rsaquo; Article"
		);
		$this->load->view('dist/components-article', $data);
	}

	public function components_avatar() {
		$data = array(
			'title' => "Components &rsaquo; Avatar"
		);
		$this->load->view('dist/components-avatar', $data);
	}

	public function components_chat_box() {
		$data = array(
			'title' => "Components &rsaquo; Chat Box"
		);
		$this->load->view('dist/components-chat-box', $data);
	}

	public function components_empty_state() {
		$data = array(
			'title' => "Components &rsaquo; Empty State"
		);
		$this->load->view('dist/components-empty-state', $data);
	}

	public function components_gallery() {
		$data = array(
			'title' => "Components &rsaquo; Gallery"
		);
		$this->load->view('dist/components-gallery', $data);
	}

	public function components_hero() {
		$data = array(
			'title' => "Components &rsaquo; Hero"
		);
		$this->load->view('dist/components-hero', $data);
	}

	public function components_multiple_upload() {
		$data = array(
			'title' => "Components &rsaquo; Multiple Upload"
		);
		$this->load->view('dist/components-multiple-upload', $data);
	}

	public function components_pricing() {
		$data = array(
			'title' => "Components &rsaquo; Pricing"
		);
		$this->load->view('dist/components-pricing', $data);
	}

	public function components_statistic() {
		$data = array(
			'title' => "Components &rsaquo; Statistic"
		);
		$this->load->view('dist/components-statistic', $data);
	}

	public function components_tab() {
		$data = array(
			'title' => "Components &rsaquo; Tab"
		);
		$this->load->view('dist/components-tab', $data);
	}

	public function components_table() {
		$data = array(
			'title' => "Components &rsaquo; Table"
		);
		$this->load->view('dist/components-table', $data);
	}

	public function components_user() {
		$data = array(
			'title' => "Components &rsaquo; User"
		);
		$this->load->view('dist/components-user', $data);
	}

	public function components_wizard() {
		$data = array(
			'title' => "Components &rsaquo; Wizard"
		);
		$this->load->view('dist/components-wizard', $data);
	}

	public function forms_advanced_form() {
		$data = array(
			'title' => "Forms &rsaquo; Advanced Forms"
		);
		$this->load->view('dist/forms-advanced-form', $data);
	}

	public function forms_editor() {
		$data = array(
			'title' => "Forms &rsaquo; Editor"
		);
		$this->load->view('dist/forms-editor', $data);
	}

	public function forms_validation() {
		$data = array(
			'title' => "Forms &rsaquo; Validation"
		);
		$this->load->view('dist/forms-validation', $data);
	}

	public function gmaps_advanced_route() {
		$data = array(
			'title' => "Google Maps &rsaquo; Advanced Route"
		);
		$this->load->view('dist/gmaps-advanced-route', $data);
	}

	public function gmaps_draggable_marker() {
		$data = array(
			'title' => "Google Maps &rsaquo; Draggable Marker"
		);
		$this->load->view('dist/gmaps-draggable-marker', $data);
	}

	public function gmaps_geocoding() {
		$data = array(
			'title' => "Google Maps &rsaquo; Geocoding"
		);
		$this->load->view('dist/gmaps-geocoding', $data);
	}

	public function gmaps_geolocation() {
		$data = array(
			'title' => "Google Maps &rsaquo; Geolocation"
		);
		$this->load->view('dist/gmaps-geolocation', $data);
	}

	public function gmaps_marker() {
		$data = array(
			'title' => "Google Maps &rsaquo; Marker"
		);
		$this->load->view('dist/gmaps-marker', $data);
	}

	public function gmaps_multiple_marker() {
		$data = array(
			'title' => "Google Maps &rsaquo; Multiple Marker"
		);
		$this->load->view('dist/gmaps-multiple-marker', $data);
	}

	public function gmaps_route() {
		$data = array(
			'title' => "Google Maps &rsaquo; Route"
		);
		$this->load->view('dist/gmaps-route', $data);
	}

	public function gmaps_simple() {
		$data = array(
			'title' => "Google Maps &rsaquo; Simple"
		);
		$this->load->view('dist/gmaps-simple', $data);
	}

	public function modules_calendar() {
		$data = array(
			'title' => "Modules &rsaquo; Calendar"
		);
		$this->load->view('dist/modules-calendar', $data);
	}

	public function modules_chartjs() {
		$data = array(
			'title' => "Modules &rsaquo; ChartJS"
		);
		$this->load->view('dist/modules-chartjs', $data);
	}

	public function modules_datatables() {
		$data = array(
			'title' => "Modules &rsaquo; Datatables"
		);
		$this->load->view('dist/modules-datatables', $data);
	}

	public function modules_flag() {
		$data = array(
			'title' => "Modules &rsaquo; Flag"
		);
		$this->load->view('dist/modules-flag', $data);
	}

	public function modules_font_awesome() {
		$data = array(
			'title' => "Modules &rsaquo; Font Awesome"
		);
		$this->load->view('dist/modules-font-awesome', $data);
	}

	public function modules_ion_icons() {
		$data = array(
			'title' => "Modules &rsaquo; Ion Icons"
		);
		$this->load->view('dist/modules-ion-icons', $data);
	}

	public function modules_owl_carousel() {
		$data = array(
			'title' => "Modules &rsaquo; Owl Carousel"
		);
		$this->load->view('dist/modules-owl-carousel', $data);
	}

	public function modules_sparkline() {
		$data = array(
			'title' => "Modules &rsaquo; Sparkline"
		);
		$this->load->view('dist/modules-sparkline', $data);
	}

	public function modules_sweet_alert() {
		$data = array(
			'title' => "Modules &rsaquo; Sweet Alert"
		);
		$this->load->view('dist/modules-sweet-alert', $data);
	}

	public function modules_toastr() {
		$data = array(
			'title' => "Modules &rsaquo; Toastr"
		);
		$this->load->view('dist/modules-toastr', $data);
	}

	public function modules_vector_map() {
		$data = array(
			'title' => "Modules &rsaquo; Vector Map"
		);
		$this->load->view('dist/modules-vector-map', $data);
	}

	public function modules_weather_icon() {
		$data = array(
			'title' => "Modules &rsaquo; Weather Icon"
		);
		$this->load->view('dist/modules-weather-icon', $data);
	}

	public function auth_forgot_password() {
		$data = array(
			'title' => "Forgot Password"
		);
		$this->load->view('dist/auth-forgot-password', $data);
	}

	public function auth_login() {
		$data = array(
			'title' => "Login"
		);
		$this->load->view('dist/auth-login', $data);
	}

	public function auth_register() {
		$data = array(
			'title' => "Register"
		);
		$this->load->view('dist/auth-register', $data);
	}

	public function auth_reset_password() {
		$data = array(
			'title' => "Reset Password"
		);
		$this->load->view('dist/auth-reset-password', $data);
	}

	public function errors_503() {
		$data = array(
			'title' => "503"
		);
		$this->load->view('dist/errors-503', $data);
	}

	public function errors_403() {
		$data = array(
			'title' => "403"
		);
		$this->load->view('dist/errors-403', $data);
	}

	public function errors_404() {
		$data = array(
			'title' => "404"
		);
		$this->load->view('dist/errors-404', $data);
	}

	public function errors_500() {
		$data = array(
			'title' => "500"
		);
		$this->load->view('dist/errors-500', $data);
	}

	public function features_activities() {
		$data = array(
			'title' => "Activities"
		);
		$this->load->view('dist/features-activities', $data);
	}

	public function features_post_create() {
		$data = array(
			'title' => "Post Create"
		);
		$this->load->view('dist/features-post-create', $data);
	}

	public function features_posts() {
		$data = array(
			'title' => "Posts"
		);
		$this->load->view('dist/features-posts', $data);
	}

	public function features_profile() {
		$data = array(
			'title' => "Profile"
		);
		$this->load->view('dist/features-profile', $data);
	}

	public function features_settings() {
		$data = array(
			'title' => "Settings"
		);
		$this->load->view('dist/features-settings', $data);
	}

	public function features_setting_detail() {
		$data = array(
			'title' => "Setting Detail"
		);
		$this->load->view('dist/features-setting-detail', $data);
	}

	public function features_tickets() {
		$data = array(
			'title' => "Tickets"
		);
		$this->load->view('dist/features-tickets', $data);
	}

	public function utilities_contact() {
		$data = array(
			'title' => "Contact"
		);
		$this->load->view('dist/utilities-contact', $data);
	}

	public function utilities_invoice() {
		$data = array(
			'title' => "Invoice"
		);
		$this->load->view('dist/utilities-invoice', $data);
	}

	public function utilities_subscribe() {
		$data = array(
			'title' => "Subscribe"
		);
		$this->load->view('dist/utilities-subscribe', $data);
	}

	public function credits() {
		$data = array(
			'title' => "Credits"
		);
		$this->load->view('dist/credits', $data);
	}
}
