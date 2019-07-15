<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAllNews()
	{
		$this->db->select('*');
		$dulieu = $this->db->get('News');
		return $dulieu = $dulieu->result_array();
	}

}

/* End of file News.php */
/* Location: ./application/models/News.php */