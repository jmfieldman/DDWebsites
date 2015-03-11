<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->load->view('welcome_message');
		//echo 'Hello World!';


		$query = $this->db->query('SELECT * FROM users');

		foreach ($query->result_array() as $row) {
			echo print_r($row) . '<br/>';
		}


	}

	public function my_second_url($arg1 = 1) {

		$query = $this->db->query('SELECT * FROM users WHERE user_id = ?', array($arg1));

		foreach ($query->result_array() as $row) {
			echo print_r($row) . '<br/>';
		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */