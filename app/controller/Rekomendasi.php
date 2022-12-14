<?php 

class Rekomendasi extends Controller {
	public function index()
	{
		$data['judul'] = 'Rekomendasi Mata Kuliah Informatika';
		$this->view('layout/header', $data);
		$this->view('rekomendasi', $data);
		$this->view('layout/footer');
	}

	
}