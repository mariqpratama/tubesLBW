<?php 

class Rekomendasi extends Controller {
	public function index()
	{
		$data['judul'] = 'Rekomendasi Mata Kuliah Informatika';
		$data['matkul'] = $this->model('Matkul_model')->getAllMatkul();
		$this->view('layout/header', $data);
		$this->view('rekomendasi', $data);
		$this->view('layout/footer');
	}

	public function tambah(){
		if($this->model('Matkul_model')->tambahMatkul($_POST) > 0){
			header('Location: ' . BASEURL. '/matkul');
			exit;
		}
	}
}