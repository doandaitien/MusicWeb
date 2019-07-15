<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	 * 
	 */
	class NgheNhac extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library(array('form_validation','session'));
			
		}

		public function ngheNhac($SID)
		{
			$this->load->model('/User/song');
			$baihat = $this->song->getSong($SID);

			$randsong = $this->song->randSong();

			$this->load->model('/User/Comment');
			$comment = $this->Comment->getAllComment($SID);

			$countcomment = count($comment);

			for($i = 0; $i < sizeof($comment); $i++) {
				$dulieuuser = $this->Comment->getInfo($comment[$i]['AID']);
				$comment[$i]['username'] = $dulieuuser[0]['username'];
				$comment[$i]['avatar'] = $dulieuuser[0]['avatar'];
			}

			$dulieu = array(
				'baihat' => $baihat,
				'randsong' => $randsong,
				'comment' => $comment,
				'countcomment'=>$countcomment
			);

			$this->load->view('Song_detail.php', $dulieu, False);
		}

		public function phatTop10()
		{
			$this->load->model('/User/song');
			$top10 = $this->song->loadTop10();

			$randsong = $this->song->randSong();

			$dulieu = array(
				'top10' => $top10,
				'randsong' => $randsong,
				'title'=> 'Top 10 bài hát trong tháng',
				'img' => 'Image_User/bg-chart.jpg'
			);
			$this->load->view('Playlist_Detail.php',$dulieu);
		}

		public function phatMoiNhat()
		{
			$this->load->model('/User/song');
			$top10 = $this->song->loadLatest();

			$randsong = $this->song->randSong();

			$dulieu = array(
				'top10' => $top10,
				'randsong' => $randsong,
				'title'=> '10 bài hát mới nhất trong tháng',
				'img' => 'Image_User/bg-chart.jpg'
			);
			$this->load->view('Playlist_Detail.php',$dulieu, False);
		}

		public function themBinhLuan()
		{

			
			// $dulieu['content'] = $this->input->post('content');
			// $dulieu['SID'] = $this->input->post('SID');
			// $dulieu['AID'] = $this->input->post('AID');
			$dulieu['content'] = $_POST['content'];
			$dulieu['SID'] = $_POST['SID'];
			$dulieu['AID'] = $_POST['AID'];
			$this->load->model('/User/Comment');
			$this->Comment->addComment($dulieu);
			$comment = $this->Comment->getAllComment($dulieu['SID']);

			for($i = 0; $i < sizeof($comment); $i++) {
				$dulieuuser = $this->Comment->getInfo($comment[$i]['AID']);
				$comment[$i]['username'] = $dulieuuser[0]['username'];
				$comment[$i]['avatar'] = $dulieuuser[0]['avatar'];
			}

			echo json_encode($comment);
		}

		public function ngheListMusic($PID)
		{
			$this->load->model('/User/Playlist_detail');

			$playlist = $this->Playlist_detail->getAllSong($PID);
			$playlist_detail = $this->Playlist_detail->getPlaylist($PID);
			
			for($i = 0; $i < sizeof($playlist); $i++) {
				$song = $this->Playlist_detail->getSong($playlist[$i]['SID']);
				$playlist[$i]['song_name'] = $song[0]['song_name'];
				$playlist[$i]['singer'] = $song[0]['singer'];
				$playlist[$i]['URL'] = $song[0]['URL'];
				$playlist[$i]['URL_IMG'] = $song[0]['URL_IMG'];
			}

			$this->load->model('/User/song');

			$randsong = $this->song->randSong();

			$dulieu = array(
				'playlist'=>$playlist,
				'playlist_detail' => $playlist_detail,
				'randsong'=> $randsong
			);

			// echo "<pre>";
	  //       print_r($dulieu);
	  //       echo "</pre>";
			// die();

			$this->load->view('Playlist_Detail1.php',$dulieu,False);
		}
	}
?>