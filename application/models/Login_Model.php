<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function login($username,$password)
	{
		$this->db->select('id_user,username,password');
		$this->db->from('user');
		$this->db->where('username', $username);
		$this->db->where('password', MD5($password));
		$query = $this->db->get();
		if($query->num_rows()==1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
		
	}

}

/* End of file Login_Model.php */
/* Location: ./application/models/Login_Model.php */