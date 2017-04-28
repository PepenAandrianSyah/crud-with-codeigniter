<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_mahasiswa extends CI_Model {
	//class untuk insert data bisa digunakan untuk banyak tabel
	public function InsertData($TabelName,$data){ 
		$res = $this->db->insert($TabelName,$data);
		return $res;
	}
	//class untuk update data bisa digunakan untuk banyak tabel
	public function UpdateData($TabelName,$data,$where){
		$res = $this->db->update($TabelName,$data,$where);
		return $res;
	}
	//class untuk edit data bisa digunakan untuk banyak tabel
	public function edit_data($where,$table){		
	return $this->db->get_where($table,$where);
	}
	//class untuk delete/hapus data bisa digunakan untuk banyak tabel
	public function DeleteData($TabelName,$where){
		$res = $this->db->delete($TabelName,$where);
		return $res;
	}
	//class untuk menampilkan semua yang ada di tabel mahasiswa
	public function GetMahasiswa($where=""){
		$data = $this->db->query('select * from mahasiswa '.$where);
		return $data->result_array();
	}
	public function kode(){
		
		$this->db->select('RIGHT(mahasiswa.id_mahasiswa,4) as kode', FALSE);
		$this->db->order_by('id_mahasiswa','DESC');
		$this->db->limit(1);
		$query = $this->db->get('mahasiswa');
		
		if($query->num_rows() <> 0){
		
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		}else{
		
			$kode = 1;
		}
		$kodemax = 'MHS-'.str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = $kodemax;
		return $kodejadi;
	}
}