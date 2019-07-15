<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function checkUser($user)
	{
		$sql = "select * from account where username = '".$user."'";
		echo $this->db->query($sql)->num_rows();
	}
	

	public function registerAcc($username,$password,$role,$avatar,$sex,$fullname)
	{
		$data = array(
			'username' => $username,
			'password' => $password,
			'role' => $role,
			'avatar' => $avatar,
			'sex' => $sex,
			'fullname' => $fullname,
		);

		$this->db->insert('Account', $data);
		if($this->db->affected_rows() > 0){
			echo 'thanhcong';
		}
		else{
			echo 'thatbai';
		}
	}


	public function checkAcc($username,$password)
	{
		$sql = "select role from Account where username ='". $username ."' and password ='". $password ."'";
		if($this->db->query($sql)->num_rows() > 0)
		{
			$query = $this->db->query($sql)->result_array();
			return $query[0]['role'];
			// if($query[0]['role'] == 'user')
			// {
			// 	return 'user';
			// }
			// else if($query[0]['role'] == 'admin')
			// {
			// 	echo 'admin';
			// }
		}
		else
		{
			return false;
		}

	}

	public function getAID($username)
	{

		$sql = "select AID from Account where username ='".$username."'";
		// $this->db->select('AID');
		// $this->db->get('Account');
		// $AID = $this->db->where('username', $username);
		$AID = $this->db->query($sql);
		$AID = $AID->result_array();
		// echo '<pre>';
		// var_dump($AID);
		// echo '</pre>';
		// die();
		return $AID[0]['AID'];
	}

	public function getInfobyUser($username)
	{
		$this->db->select('*');
		$this->db->where('username', $username);
		$info = $this->db->get('Account');

		return $info->result_array();
	}

	public function updateInfobyID($AID,$fullname,$avatar,$sex,$password_new)
	{
		// echo '<pre>';
		// var_dump($fullname);
		// echo '</pre>';
		// die();
		
		if(empty($avatar) && empty($password_new))
		{
			$this->db->where('AID', $AID);
			$data = array(
				'fullname' => $fullname,
				'sex' => $sex
			);
			// echo '<pre>';
			// var_dump(1);
			// echo '</pre>';
			// die();
			return $this->db->update('Account', $data);
			// echo '<pre>';
			// var_dump($this->db->last_query());
			// echo '</pre>';
			// die();
		}
		else if(!empty($avatar) && empty($password_new))
		{
			$this->db->where('AID', $AID);
			$data = array(
				'fullname' => $fullname,
				'sex' => $sex,
				'avatar' => $avatar
			);
			// echo '<pre>';
			// var_dump(2);
			// echo '</pre>';
			// die();
			return $this->db->update('Account', $data);
		}
		else if(empty($avatar) && !empty($password_new))
		{
			$password_new = md5($password_new);
			$this->db->where('AID', $AID);
			$data = array(
				'fullname' => $fullname,
				'sex' => $sex,
				'password' => $password_new
			);
			// echo '<pre>';
			// var_dump(3);
			// echo '</pre>';
			// die();
			return $this->db->update('Account', $data);
		}
		else
		{
			$password_new = md5($password_new);
			$this->db->where('AID', $AID);
			$data = array(
				'fullname' => $fullname,
				'sex' => $sex,
				'password' => $password_new,
				'avatar' => $avatar
			);
			// echo '<pre>';
			// var_dump(4);
			// echo '</pre>';
			// die();
			return $this->db->update('Account', $data);
		}
	}


	public function checkPass($AID,$password)
	{
		if(empty($password))
		{
			return 'trungmk';
		}
		else
		{
			$password = md5($password);
			$sql = "select * from Account where AID ='".$AID."' and password='".$password."'";
			if($this->db->query($sql)->num_rows() > 0)
			{
				return 'trungmk';
			}
			else
			{
				return 'kotrungmk';
			}
		}
		
	}

}

/* End of file Account.php */
/* Location: ./application/models/Account.php */