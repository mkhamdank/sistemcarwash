<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carwash extends CI_Controller {
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
		$data['transaksi'] = $this->carwash_model->getTransaksi();
		$this->load->view('carwash_view', $data);
	}

	public function detail($id_transaksi)
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
		$data['transaksi_new'] = $this->carwash_model->getTransaksiById($id_transaksi);
		$this->load->view('detail_transaksi', $data);
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
		$data['transaksi'] = $this->carwash_model->getTransaksi();
		$data['mobil'] = $this->carwash_model->getMobil();
		$this->form_validation->set_rules('id_transaksi','ID Transaksi','trim|required');
		$this->form_validation->set_rules('nama_pelanggan','Nama Pelanggan','trim|required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tambah_transaksi_view', $data);
		} else {
			$this->carwash_model->createTransaksi();
			$id_transaksi = $this->input->post('id_transaksi');
			$data['transaksi_new'] = $this->carwash_model->getTransaksiById($id_transaksi);
			$this->load->view('tambah_transaksi_sukses', $data);
		}
	}

	public function edit($id_transaksi)
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
		$data['transaksi'] = $this->carwash_model->getTransaksiById($id_transaksi);
		$data['mobil'] = $this->carwash_model->getMobil();
		$this->form_validation->set_rules('id_transaksi','ID Transaksi','trim|required');
		$this->form_validation->set_rules('nama_pelanggan','Nama Pelanggan','trim|required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('edit_transaksi_view', $data);
		} else {
			$this->carwash_model->editTransaksi($id_transaksi);
			$this->load->view('edit_transaksi_sukses', $data);
		}
	}

	public function delete($id_transaksi)
	{
		$this->carwash_model->deleteTransaksi($id_transaksi);
		redirect('carwash','refresh');
	}
}

/* End of file Carwash.php */
/* Location: ./application/controllers/Carwash.php */