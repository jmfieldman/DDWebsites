<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
		if ($this->session->userdata('user_id') !== FALSE) {
			echo "You're already logged in! " . $this->session->userdata('user_id');
			return;
		}

		$this->load->view('login_screen');
	}

	public function process() {

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$query = $this->db->query('SELECT * FROM users WHERE username = ? AND password = ?',
			array($username, $password));

		if ($query->num_rows() == 0) {
			echo 'No user';
			return;
		}

		$user = $query->row_array();
		//echo 'UserID: ' . $user['user_id'];

		$this->session->set_userdata('user_id', $user['user_id']);

		echo 'UserID: ' . $user['user_id'];
	}
	
}
