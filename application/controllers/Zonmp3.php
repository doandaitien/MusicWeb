<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Zonmp3 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
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
		$this->load->view('User', $trangchu, FALSE);
	}

	public function loadPlaylist()
	{
		$username = $this->input->post('username');
		$this->load->model('User/Playlist');
		$this->load->model('User/Account');
		$AID = $this->Account->getAID($username);
		$playlist = $this->Playlist->getAllPlaylist($AID);
		echo json_encode($playlist);
		
	}

	public function loadPlaylistbyAID()
	{
		$username = $this->input->post('username');
		$this->load->model('User/Playlist');
		$this->load->model('User/Account');
		$AID = $this->Account->getAID($username);
		$playlist = $this->Playlist->getAllPlaylist($AID);
		echo json_encode($playlist);
		
	}

	

	public function addPlaylist()
	{
		$username = $this->input->post('username');
		$name_pl = $this->input->post('name_pl');
		$this->load->model('User/Account');
		$AID = $this->Account->getAID($username);
		$this->load->model('User/Playlist');
		echo $this->Playlist->addPlaylist($AID,$name_pl);
	}

	public function addSongToPlaylist()
	{
		$SID = $this->input->post('sid');
		$PID = $this->input->post('pid');
		$playlist_name = $this->input->post('playlist_name');

		// $this->load->model('User/Playlist');
		// $PID = $this->Playlist->getPID($playlist_name);
		$this->load->model('User/Playlist_detail');
		$check = $this->Playlist_detail->checkSong($SID,$PID);
		if($check == 'trung'){
			echo 'trung';
		}
		else{
			if($this->Playlist_detail->addSongtoPlaylist($SID,$PID))
			{
				echo 'thanhcong';
			}
			else
			{
				echo 'thatbai';
			}
		}
	}


	public function addInfoPlaylist()
	{
		$name_pl = $this->input->post('name_pl');
		$img_pl = $this->input->post('img_pl');
		$des_pl = $this->input->post('des_pl');
		$username = $this->input->post('username');
		$this->load->model('User/Playlist');
		$this->load->model('User/Account');
		$AID = $this->Account->getAID($username);
		if(empty($img_pl) && empty($des_pl))
		{
			if($this->Playlist->addInfoPlaylist1($name_pl,$AID))
			{
				echo 'thanhcong';
			}
			else
			{
				echo 'thatbai';
			}
		}
		else if(!empty($img_pl) && empty($des_pl))
		{
			if($this->Playlist->addInfoPlaylist2($name_pl,$img_pl,$AID))
			{
				echo 'thanhcong';
			}
			else
			{
				echo 'thatbai';
			}
		}
		else if(empty($img_pl) && !empty($des_pl))
		{
			if($this->Playlist->addInfoPlaylist3($name_pl,$des_pl,$AID))
			{
				echo 'thanhcong';
			}
			else
			{
				echo 'thatbai';
			}
		}
		else if(!empty($img_pl) && !empty($des_pl))
		{
			if($this->Playlist->addInfoPlaylist4($name_pl,$img_pl,$des_pl,$AID))
			{
				echo 'thanhcong';
			}
			else
			{
				echo 'thatbai';
			}
		}


	}

	public function getInfoPlaylist()
	{
		$pid = $this->input->post('pid');
		$this->load->model('User/Playlist');
		$this->load->model('User/Account');

		echo json_encode($this->Playlist->getInfoPlaylistbyID($pid));
	}

	public function editPlaylist()
	{
		$edit_name = $this->input->post('edit_name');
		$edit_img = $this->input->post('edit_img');
		$edit_mt = $this->input->post('edit_mt');
		$edit_pid = $this->input->post('edit_pid');

		$this->load->model('User/Playlist');

		if($this->Playlist->editPlaylistbyID($edit_name,$edit_img,$edit_mt,$edit_pid))
		{
			echo 'thanhcong';
		}
		else
		{
			echo 'thatbai';
		}
	}

	public function deletePlaylist()
	{
		$pid = $this->input->post('pid');

		$this->load->model('User/Playlist');

		if ($this->Playlist->deletePlaylistbyID($pid)) {
			echo 'thanhcong';
		}
		else 
		{
			echo 'thatbai';
		}
	}

	public function myPlaylist()
	{
		$this->load->view('Playlist');
	}

	public function myInfo()
	{
		$this->load->view('UserInfoForm');
	}

	public function getInfo()
	{
		$username = $this->input->post('username');
		$this->load->model('User/Account');
		echo json_encode($this->Account->getInfobyUser($username));
	}

	public function updateInfo()
	{
		$AID = $this->input->post('AID');
		$fullname = $this->input->post('fullname');
		$avatar = $this->input->post('avatar');
		$sex = $this->input->post('sex');
		$password_new = $this->input->post('password_new');
		$password_old = $this->input->post('password_old');
		$this->load->model('User/Account');

		$check = $this->Account->checkPass($AID,$password_old);
		if($check == 'trungmk')
		{
			if($this->Account->updateInfobyID($AID,$fullname,$avatar,$sex,$password_new))
			{
				echo 'thanhcong';
			}
			else
			{
				echo 'thatbai';
			}
		}
		else
		{
			echo 'kotrungmk';
		}
		

	}

	public function checkPlaylist()
	{
		$PID = $this->input->post('PID');
		$this->load->model('User/Playlist_detail');
		echo $this->Playlist_detail->checkEmptyPlaylist($PID);
	}

	




}

/* End of file Zonmp3.php */
/* Location: ./application/controllers/Zonmp3.php */