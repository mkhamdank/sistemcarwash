<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url','form');
		$this->load->library('encryption');
		$this->load->model('carwash_model');
		$this->load->model('login_model');
	}
	public function index()
	{
		$this->form_validation->set_rules('username','Username','trim|required|alpha_numeric');
		$this->form_validation->set_rules('password','Password','trim|required|callback_cekDb');
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('login_view');
		}
		else
		{
			redirect('carwash','refresh');
		}
	}

	public function cekDb($password)
	{
		$username = $this->input->post('username');
		$result = $this->login_model->login($username,$password);
		if ($result)
		{
			foreach ($result as $row)
			{
				$sess_array = array(
					'id_user' => $row->id_user,
					'username' => $row->username,
					'password' => $row->password);
				$this->session->set_userdata('logged_in',$sess_array);
			}
			return true;
		}
		else
		{
			$this->form_validation->set_message('cekDb',"Login Gagal, Username dan Password Tidak Valid");
			return false;
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('awal','refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */