<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Crud extends CI_Controller {
	public function index()//untuk menampilkan halaman insert mahasiswa
	{
		$nim = $this->model_mahasiswa->kode();
		return $data = $this->load->view('insert_mahasiswa',compact('nim'));
		
	}
	public function mahasiswa(){//untuk menampilkan data mahasiswa
		$data = array(
			"mahasiswa" => $this->model_mahasiswa->GetMahasiswa(),
			);
		return $this->load->view("mahasiswa",$data);
	}
	public function tambah_mahasiswa(){//untuk insert data kedalam database latihan tabel mahasiswa
		$data = array(
					            'nama_mahasiswa'=>$this->input->post('nama_mahasiswa'),
								'jurusan'=>$this->input->post('jurusan'),
								'email'=>$this->input->post('email'),
								'alamat'=>$this->input->post('alamat'),
								'nim'=>$this->input->post('nim'),
					        );
		$res = $this->model_mahasiswa->InsertData('mahasiswa',$data);
				//jika berhasil masukan data ke dalam tabel mahasiswa maka akan dialihkan ke file crud dan function mahasiswa
				if($res >= 1){
					redirect('crud/mahasiswa');
				}else{//jika gagal memasukan data ke tabel mahasiswa maka akan ditampilkan komentar tambah data gagal
					echo"Tambah Data Gagal";
				}
		
	}





	public function edit_mahasiswa($nim){//menampilkan data yang di ingin diubah sesuai dengan nim
		$mahasiswa = $this->model_mahasiswa->GetMahasiswa("where nim = '$nim'");
		$data = array(
			"nim" => $mahasiswa[0]['nim'],
			"nama_mahasiswa" => $mahasiswa[0]['nama_mahasiswa'],
			"jurusan" => $mahasiswa[0]['jurusan'],
			"email" => $mahasiswa[0]['email'],
			"alamat" => $mahasiswa[0]['alamat'],
			"id_mahasiswa" => $mahasiswa[0]['id_mahasiswa'],
			);
		$this->load->view('edit_mahasiswa',$data);
	}
	public function update_mahasiswa(){//untuk update data pada tabel mahasiswa sesuai dengan nim
		$id_mahasiswa = $_POST['id_mahasiswa'];
		$update_mahasiswa = array(
			'nama_mahasiswa'=>$this->input->post('nama_mahasiswa'),
			'jurusan'=>$this->input->post('jurusan'),
			'email'=>$this->input->post('email'),
			'alamat'=>$this->input->post('alamat'),
			'nim'=>$this->input->post('nim'),
			);
		$where = array('id_mahasiswa'=>$id_mahasiswa);
		$res = $this->model_mahasiswa->UpdateData('mahasiswa',$update_mahasiswa,$where);
		if($res >= 1){
			redirect('crud/mahasiswa');
		}else{
			echo"Gagal";
		}
	}
	public function delete_mahasiswa($id_mahasiswa){//untuk menghapus data pada tabel mahasiswa sesuai dengan nim
		$where = array('id_mahasiswa'=>$nim);
		$res = $this->model_mahasiswa->DeleteData('mahasiswa', $where);
		if($res>=1){
			redirect('crud/mahasiswa');
		}
	}
}
