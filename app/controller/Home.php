<?php 

class Home extends Controller {
	public function index()
	{
		$data['judul'] = 'Rekomendasi Mata Kuliah Informatika';
		$this->view('layout/header', $data);
		$this->view('index', $data);
		$this->view('layout/footer');
	}

	
}