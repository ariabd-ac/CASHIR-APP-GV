<?php
class M_suplier extends CI_Model{

	function hapus_suplier($kode){
		$hsl=$this->db->query("DELETE FROM tbl_suplier where suplier_id='$kode'");
		return $hsl;
	}

	function update_suplier($kode,$nama,$alamat,$notelp,$nama_brg,$tgl_pembelian,$utang,$jatuh_tempo){
		$hsl=$this->db->query("UPDATE tbl_suplier 
																							set 
																							suplier_nama='$nama',
																							suplier_alamat='$alamat',
																							suplier_notelp='$notelp',
																							suplier_namabarang='$nama_brg',
																							suplier_tanggal_pembelian='$tgl_pembelian',
																							suplier_utang='$utang',
																							suplier_jatuh_tempo='$jatuh_tempo' 
																							where suplier_id='$kode'");
		return $hsl;
	}

	function tampil_suplier(){
		$hsl=$this->db->query("select * from tbl_suplier order by suplier_id desc");
		return $hsl;
	}

	function simpan_suplier($nama,$alamat,$notelp, $nama_brg, $tgl_pembelian, $utang, $jatuh_tempo){
		$hsl=$this->db->query("INSERT INTO tbl_suplier(suplier_nama,suplier_alamat,suplier_notelp, suplier_namabarang, suplier_tanggal_pembelian,suplier_utang,suplier_jatuh_tempo) VALUES ('$nama','$alamat','$notelp','$nama_brg','$tgl_pembelian','$utang','$jatuh_tempo')");
		return $hsl;
	}

}