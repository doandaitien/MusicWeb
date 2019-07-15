<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	/**
	 * 
	 */
	class Comment extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function getAllComment($SID)
		{
			$sql = "select * from comment where SID = ".$SID. " order by CID DESC";

			$result = $this->db->query($sql);
			$result = $result->result_array();
			return $result;
		}

		public function getInfo($AID)
		{
			$sql = "select * from account where AID = ".$AID;
			$result = $this->db->query($sql);
			$result = $result->result_array();
			return $result;
		}

		public function addComment($dulieu)
		{
			return $this->db->insert('comment',$dulieu);
		}

	}
?>