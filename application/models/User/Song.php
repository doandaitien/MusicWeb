<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Song extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function loadTop10()
	{
		$sql = "SELECT * FROM song order by hear_number DESC LIMIT 10";
		$top10 = $this->db->query($sql);
		$top10 = $top10->result_array();
		return $top10;
	}

	public function loadLatest()
	{
		$sql = "SELECT * FROM song order by SID DESC LIMIT 10";
		$latest = $this->db->query($sql);
		$latest = $latest->result_array();
		return $latest;
	}


	public function search($tukhoa)
	{
		$sql = "select * from Song where song_name LIKE N'%".$tukhoa."%' or singer LIKE N'%".$tukhoa."%'";
		$result = $this->db->query($sql);

		$result = $result->result_array();

		
		return $result;
	}

	public function getSong($SID)
	{
		$sql = "SELECT * FROM song WHERE SID = ".$SID;

		$result = $this->db->query($sql);
		$result = $result->result_array();
		return $result;
	}

	public function randSong()
	{
		$sql = "SELECT * FROM song ORDER BY RAND() LIMIT 10";
		$result = $this->db->query($sql);
		$result = $result->result_array();
		return $result;
	}

}

/* End of file Song.php */
/* Location: ./application/models/Song.php */