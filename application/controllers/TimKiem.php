<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TimKiem extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('SearchForm');
	}


	public function Search($tukhoa)
	{

		$this->load->model('User/Song');
		$result1 = $this->Song->search($tukhoa);
		
		$result = array(
			'data' => $result1
		);
		$this->load->view('SearchForm', $result, FALSE);
	}

}

/* End of file TimKiem.php */
/* Location: ./application/controllers/TimKiem.php */