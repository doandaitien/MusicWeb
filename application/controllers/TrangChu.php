<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TrangChu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('form_validation','session'));
		
	}

	public function index()
	{
		$this->session->unset_userdata('user_username');
		$this->session->unset_userdata('user_password');
		$this->session->unset_userdata('admin_username');
		$this->session->unset_userdata('admin_password');

		$this->load->model('User/Song');
		$this->load->model('User/News');
		$top10 = $this->Song->loadTop10();
		$latest = $this->Song->loadLatest();
		$news = $this->News->getAllNews();
		$trangchu = array(
			'top10' => $top10,
			'latest' => $latest,
			'news' => $news
		);
		$this->load->view('Guest', $trangchu, FALSE);
	}

	public function checkUser()
	{
		$user = $this->input->post('user');
		$this->load->model('User/Account');
		echo $this->Account->checkUser($user);

	}

	public function checkAcc()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user_info['user_username'] = $this->input->post('username');
		$user_info['user_password'] = $this->input->post('password');

		$admin_info['admin_username'] = $this->input->post('username');
		$admin_info['admin_password'] = $this->input->post('password');

		

		$password = md5($password);
		$this->load->model('User/Account');
		$info =  $this->Account->checkAcc($username,$password);
		
		if($info == 'user')
		{
			$this->session->set_userdata($user_info);
			$this->session->unset_userdata('admin_username');
			$this->session->unset_userdata('admin_password');
			echo 'user';

		}
		else if($info == 'admin')
		{
			$this->session->unset_userdata('user_username');
			$this->session->unset_userdata('user_password');
			$this->session->set_userdata($admin_info);
			echo 'admin';
		}
		else{
			echo 'thatbai';
		}

	}

	public function registerAcc()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password = md5($password);
		$role = $this->input->post('role');
		$avatar = $this->input->post('avatar');
		$sex = $this->input->post('sex');
		$fullname = $this->input->post('fullname');

		$this->load->model('User/Account');
		echo $this->Account->registerAcc($username,$password,$role,$avatar,$sex,$fullname);
	}

}

/* End of file TrangChu.php */
/* Location: ./application/controllers/TrangChu.php */