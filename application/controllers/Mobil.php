<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url','form');
		$this->load->model('carwash_model');
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$username = $session_data['username'];
		}
		else{
			redirect('login','refresh');
		}
	}
	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$username = $session_data['username'];
		}
		else{
			redirect('login','refresh');
		}
		$session_data = $this->session->userdata('logged_in');
		$username = $session_data['username'];
		$data['username'] = $username;
		$data['mobil'] = $this->carwash_model->getMobil();
		$this->load->view('mobil_view', $data);
	}

	public function create()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$username = $session_data['username'];
		}
		else{
			redirect('login','refresh');
		}
		$session_data = $this->session->userdata('logged_in');
		$username = $session_data['username'];
		$data['username'] = $username;
		$data['mobil'] = $this->carwash_model->getMobil();
		$data['jenis'] = $this->carwash_model->getJenis();
		$this->form_validation->set_rules('id_mobil','ID Mobil','trim|required');
		$this->form_validation->set_rules('nama_mobil','Nama Mobil','trim|required|is_unique[mobil.nama_mobil]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tambah_mobil_view', $data);
		} else {
			$this->carwash_model->createMobil();
			$this->load->view('tambah_mobil_sukses', $data);
		}
	}

	public function edit($id_mobil)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$username = $session_data['username'];
		}
		else{
			redirect('login','refresh');
		}
		$session_data = $this->session->userdata('logged_in');
		$username = $session_data['username'];
		$data['username'] = $username;
		$data['mobil'] = $this->carwash_model->getMobilById($id_mobil);
		$data['jenis'] = $this->carwash_model->getJenis();
		$this->form_validation->set_rules('id_mobil','ID Jenis','trim|required');
		$this->form_validation->set_rules('nama_mobil','Jenis Mobil','trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('edit_mobil_view', $data);
		} else {
			$this->carwash_model->editMobil($id_mobil);
			$this->load->view('edit_mobil_sukses', $data);
		}
	}

	public function delete($id_mobil)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$username = $session_data['username'];
		}
		else{
			redirect('login','refresh');
		}
		$session_data = $this->session->userdata('logged_in');
		$username = $session_data['username'];
		$data['username'] = $username;
		$mobil = $this->carwash_model->getTransaksiByMobil($id_mobil);
		$data['transaksi'] = $mobil;
		if (COUNT($mobil) > 0) {
			$this->load->view('error_mobil', $data);
		}
		else{
			$this->carwash_model->deleteMobil($id_mobil);
			redirect('mobil','refresh');
		}
	}
}

/* End of file Mobil.php */
/* Location: ./application/controllers/Mobil.php */