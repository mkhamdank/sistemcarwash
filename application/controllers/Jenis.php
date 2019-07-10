<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {
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
		$data['jenis'] = $this->carwash_model->getJenis();
		$this->load->view('jenis_view', $data);
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
		$data['jenis'] = $this->carwash_model->getJenis();
		$this->form_validation->set_rules('id_jenis','ID Jenis','trim|required');
		$this->form_validation->set_rules('jenis_mobil','Jenis Mobil','trim|required|is_unique[jenis.jenis_mobil]');
		$this->form_validation->set_rules('harga','Harga','trim|required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tambah_jenis_view', $data);
		} else {
			$this->carwash_model->createJenis();
			$this->load->view('tambah_jenis_sukses', $data);
		}
	}

	public function edit($id_jenis)
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
		$data['jenis'] = $this->carwash_model->getJenisById($id_jenis);
		$this->form_validation->set_rules('id_jenis','ID Jenis','trim|required');
		$this->form_validation->set_rules('jenis_mobil','Jenis Mobil','trim|required');
		$this->form_validation->set_rules('harga','Harga','trim|required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('edit_jenis_view', $data);
		} else {
			$this->carwash_model->editJenis($id_jenis);
			$this->load->view('edit_jenis_sukses', $data);
		}
	}

	public function delete($id_jenis)
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
		$jenis = $this->carwash_model->getMobilByJenis($id_jenis);
		$data['jenis'] = $jenis;
		if (COUNT($jenis) > 0) {
			$this->load->view('error_jenis', $data);
		}
		else{
			$this->carwash_model->deleteJenis($id_jenis);
			redirect('jenis','refresh');
		}
	}

}

/* End of file Jenis.php */
/* Location: ./application/controllers/Jenis.php */