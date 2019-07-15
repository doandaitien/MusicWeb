<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Playlist_detail extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function checkSong($SID,$PID)
	{
		$sql = "select * from playlist_details where SID ='".$SID."' and PID ='".$PID."'";
		if($this->db->query($sql)->num_rows() > 0){
			return 'trung';
		}
		else 
		{
		 	return 'kotrung';	
	 	} 
	}

	public function addSongtoPlaylist($SID,$PID)
	{
		$data = array(
			'SID' => $SID,
			'PID' => $PID
		);

		return $this->db->insert('playlist_details', $data);
	}

	public function getAllSong($PID)
	{
		$sql = "select * from playlist_details where PID = ".$PID;
		$result = $this->db->query($sql);
		$result = $result->result_array();
		return $result;
	}
	
	public function getPlaylist($PID)
	{
		$sql = "select * from playlist where PID = ".$PID;
		$result = $this->db->query($sql);
		$result = $result->result_array();
		return $result;
	}

	public function getSong($SID)
	{
		$sql = "select * from song where SID = ".$SID;
		$result = $this->db->query($sql);
		$result = $result->result_array();
		return $result;
	}

	public function checkEmptyPlaylist($PID)
	{
		$sql = "select * from playlist_details where PID = '".$PID."'";
		return $this->db->query($sql)->num_rows();
	}

}

/* End of file Playlist_detail.php */
/* Location: ./application/models/Playlist_detail.php */