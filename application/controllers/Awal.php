<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Awal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url','form');
		$this->load->model('carwash_model');
	}
	public function index()
	{
		$data['transaksi'] = $this->carwash_model->getTransaksi();
		$this->load->view('awal', $data);
	}

	public function detail($id_transaksi)
	{
		$data['transaksi_new'] = $this->carwash_model->getTransaksiById($id_transaksi);
		$this->load->view('detail_transaksi', $data);
	}

}

/* End of file Awal.php */
/* Location: ./application/controllers/Awal.php */