<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Playlist extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAllPlaylist($AID)
	{
		$sql = "select * from Playlist where AID = '".$AID."'";
		// $this->db->select('*');
		// $this->db->from('Playlist');
		// $data = $this->db->where('AID', $AID);
		$data = $this->db->query($sql);
		$data = $data->result_array();
		return $data;
	}

	public function addPlaylist($AID,$playlist_name)
	{
		$data = array(
			'AID' => $AID,
			'playlist_name' => $playlist_name
		);

		$this->db->insert('Playlist', $data);
		$last_row = $this->db->order_by('PID',"desc")
            ->limit(1)
            ->get('Playlist')
            ->row();
        return $last_row->PID;
	}

	public function addInfoPlaylist1($name_pl,$AID)
	{
		$data = array(
			'AID' => $AID,
			'playlist_name' => $name_pl
		);

		return $this->db->insert('Playlist', $data);
	}
	public function addInfoPlaylist2($name_pl,$img_pl,$AID)
	{
		// $img = split('\\', $img_pl);
		// $img_pl = $img[2];
		$data = array(
			'AID' => $AID,
			'image_playlist' => $img_pl,
			'playlist_name' => $name_pl
		);

		return $this->db->insert('Playlist', $data);
	}
	public function addInfoPlaylist3($name_pl,$des_pl,$AID)
	{
		$data = array(
			'AID' => $AID,
			'playlist_name' => $name_pl,
			'mota_playlist' => $des_pl
		);

		return $this->db->insert('Playlist', $data);
	}
	
	public function addInfoPlaylist4($name_pl,$img_pl,$des_pl,$AID)
	{
		$data = array(
			'AID' => $AID,
			'playlist_name' => $name_pl,
			'image_playlist' => $img_pl,
			'mota_playlist' => $des_pl
		);

		return $this->db->insert('Playlist', $data);
	}

	

	public function getPID($playlist_name)
	{
		$sql = "select PID from Playlist where playlist_name ='".$playlist_name."'";

		$query = $this->db->query($sql)->result_array();
		return $query[0]['PID'];
	}

	public function getInfoPlaylistbyID($pid)
	{
		$sql = "select * from Playlist where pid ='".$pid."'";
		return $this->db->query($sql)->result_array();
	}

	public function editPlaylistbyID($edit_name,$edit_img,$edit_mt,$edit_pid)
	{
		if(empty($edit_img))
		{
			$this->db->where('PID', $edit_pid);
			$data = array(
				'playlist_name' => $edit_name,
				'mota_playlist' => $edit_mt,
			);

			return $this->db->update('Playlist', $data);
		}
		else
		{
			$this->db->where('PID', $edit_pid);
			$data = array(
				'playlist_name' => $edit_name,
				'mota_playlist' => $edit_mt,
				'image_playlist' => $edit_img
			);
			return $this->db->update('Playlist', $data);
		}
	}


	public function deletePlaylistbyID($pid)
	{
		$this->db->where('PID', $pid);

		return $this->db->delete('Playlist');
	}

}

/* End of file Playlist.php */
/* Location: ./application/models/Playlist.php */