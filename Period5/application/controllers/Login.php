<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
		$this->load->view('login_screen');
	}


	public function process() {

		$username = $this->input->post('username1');
		$password = $this->input->post('password');

		if ($username === FALSE || $password === FALSE) {
			echo 'You need to login properly!';
			return;
		}

		echo 'Username: ' . $username . ' Password: ' . $password;

		$query = $this->db->query(
			'SELECT * FROM users WHERE username = ? AND password = ?',
			array($username, $password));

		echo 'Rows: ' . $query->num_rows();
		if ($query->num_rows() == 0) {
			echo 'User not found!';
			return;
		}

		$user = $query->row_array();

		echo 'User ID: ' . $user['user_id'];
	}
}
