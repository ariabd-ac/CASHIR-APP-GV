<?php
class Suplier extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_suplier');
	}


	function index(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_suplier->tampil_suplier();
		$this->load->view('admin/v_suplier',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}


	function tambah_suplier(){
	if($this->session->userdata('akses')=='1'){
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$notelp=$this->input->post('notelp');
		$nama_brg=$this->input->post('nama_brg');
		$tgl_pembelian=$this->input->post('tgl_pembelian');
		$utang=$this->input->post('utang');
		$jatuh_tempo=$this->input->post('jatuh_tempo');
		// $data = array(
		// 	'nama' => $nama,
		// 	'alamat' => $alamat,
		// 	'notelp' => $notelp,
		// 	'nama_brg' => $nama_brg,
		// 	'tgl_pembelian' =>$tgl_pembelian,
		// 	'utang' => $utang,
		// 	'jatuh_tempo' => $jatuh_tempo,
		// );
		$this->m_suplier->simpan_suplier($nama,$alamat,$notelp, $nama_brg, $tgl_pembelian, $utang, $jatuh_tempo);
		redirect('admin/suplier');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_suplier(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$notelp=$this->input->post('notelp');
		$nama_brg=$this->input->post('nama_brg');
		$tgl_pembelian=$this->input->post('tgl_pembelian');
		$utang=$this->input->post('utang');
		$jatuh_tempo=$this->input->post('jatuh_tempo');
		$this->m_suplier->update_suplier($kode,$nama,$alamat,$notelp, $nama_brg, $tgl_pembelian, $utang, $jatuh_tempo);
		redirect('admin/suplier');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function hapus_suplier(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$this->m_suplier->hapus_suplier($kode);
		redirect('admin/suplier');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}