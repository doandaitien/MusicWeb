<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Playlist</title>
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/FontAwesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/Bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Bootstrap/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/Css/playlist.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/Css/guest_form.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/Css/nav.css">
	
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/playlist.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/search_form.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/nav.js"></script>
</head>
<body>
	
	<?php 
	if(isset($this->session->userdata['user_username'])){
		
	}
	else{
		redirect('http://localhost:81/MusicWeb/TrangChu');
	}
	?>
	<nav class="navbar navbar-expand-lg myNav">
		<div class="container">
			<a href="http://localhost:81/MusicWeb/Zonmp3" class="navbar-brand home">
				<img src="<?= base_url(); ?>vendor/Image/logo_music_web.png" class="logo" alt="" width='100px'>
			</a>
			<div class="navbar-buttons">
				<button type="button" class="btn btn-outline-secondary navbar-toggler" data-toggle="collapse" data-target="#navigation">
					<!-- <span class="sr-only">Toggle navigation</span> -->
					<i class="fa fa-align-justify"></i>
				</button>
				<button type="button" class="btn btn-outline-secondary navbar-toggler myInfo">
					<!-- <span class="sr-only">Toggle search</span> -->
					<i class="fa fa-user" aria-hidden="true"></i>
				</button>
				<a href="http://localhost:81/MusicWeb/TrangChu" class="btn btn-outline-secondary navbar-toggler">
					<i class="fa fa-sign-in" aria-hidden="true"></i>
				</a>
			</div>
			<div id="navigation" class="collapse navbar-collapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a href="http://localhost:81/MusicWeb/Zonmp3" class="nav-link">Home</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url(); ?>Zonmp3/myPlaylist" class="nav-link">Playlist</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">Contact</a>
					</li>
					
					<form class="form-inline" action="">
						<div class="input-group">
							<input type="text" class="form-control input_tk" placeholder="search ...">
							<div class="input-group-btn">
								<button class="btn btn-success search_i" type="submit">
									<i class="fa fa-search"></i>
								</button>
							</div>
						</div> 
					</form>
				</ul>
				<div class="navbar-buttons d-flex justify-content-end">
					<div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block">
						<a href="http://localhost:81/MusicWeb/Zonmp3/myInfo" class="btn btn-primary navbar-btn user"> 
							<?php 
							if(isset($this->session->userdata['user_username'])){
								echo $this->session->userdata['user_username'];
							}?> 
							<i class="fa fa-user" aria-hidden="true"></i>

						</a>
					</div>
					<div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block" >
						<a href="http://localhost:81/MusicWeb/TrangChu" class="btn btn-primary navbar-btn"><i class="fa fa-sign-in" aria-hidden="true"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<div class="container">
		<div class="row row1">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p class="td">PLAYLIST CÁ NHÂN</p>
				<div class="thempl" data-toggle="modal" data-target="#modalThem">
					<div class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i> Thêm playlist</div>
				</div>
			</div>
		</div>
		<!-- modal thêm nhạc -->
		<div class="modal fade" id="modalThem" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content content_thempl">

					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title bhmoi">Bài hát mới</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body body_thempl">
						<div class="themplaylistt">
							<!-- CHÀO MỪNG BẠN ĐẾN VỚI TRANG QUẢN TRỊ !!! -->
							<div class="container">
								<form action="" method="POST" role="form" id="formThem">
									<div class="row form_tenpl">
										<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
											<label for="">Playlist</label>
										</div>
										<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
											<input type="text" class="form-control add_tpl" required name="ten_pl" placeholder="Playlist">
											<div class="error1" hidden="true">Xin vui lòng nhập trường này</div>
										</div>
									</div>
									<div class="row form_ha">
										<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
											<label for="">Hình ảnh</label>
										</div>
										<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
											<input type="file" class="form-control add_image" required name="avt" placeholder="">
										</div>
									</div>
									<div class="row form_mt">
										<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
											<label for="">Mô tả</label>
										</div>
										<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"> 
											<textarea  rows="5" cols="" class="form-control add_mt" required name="mota" placeholder="Mô tả playlist"></textarea>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
										</div>
										<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
											<div class="btn btn-success addPl">Add</div>
										</div>

									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="container playlist_list">
		<div class="row">
			<div class="col-6 col-xs-6 col-sm-6 col-md-4 col-lg-3 _1playlist">
				<div class="pid" hidden="true">2</div>
				<img src="http://localhost:81/MusicWeb/vendor/Image_playlist/album_default.png" alt="" width="100%">
				<div class="icon-play">
					<i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
					<div class="td_pl">pl2</div>
					<div class="chinhsua" data-target="#mycsPlaylist" data-toggle="modal">
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</div>
					<div class="xoa">
						<i class="fa fa-times" aria-hidden="true"></i>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="mycsPlaylist">
			<div class="modal-dialog">
				<div class="modal-content content_cspl">

					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title bhmoi">Chỉnh sửa playlist</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body body_cspl">
						<div class="themplaylistt">
							<!-- CHÀO MỪNG BẠN ĐẾN VỚI TRANG QUẢN TRỊ !!! -->
							<div class="container">
								<form action="" method="POST" role="form" id="formCs">
									<div class="row form_tenpl_edit">
										<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
											<label for="">Playlist</label>
										</div>
										<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
											<input type="hidden" name="" class="pid_edit" value=""> 
											<input type="text" class="form-control edit_name" required name="ten_pl" placeholder="Playlist">
											<div class="error2" hidden="true">Xin vui lòng nhập trường này</div>
										</div>
									</div>
									<div class="row form_ha">
										<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
											<label for="">Hình ảnh</label>
										</div>
										<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
											<img class="img_bd" src="<?= base_url(); ?>vendor/Image_playlist/img-plist-full.jpg"></img>
											<input type="file" class="form-control edit_image" required name="avt" placeholder="">
										</div>
									</div>
									<div class="row form_mt">
										<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
											<label for="">Mô tả</label>
										</div>
										<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"> 
											<textarea  rows="5" cols="" class="form-control edit_mt" required name="mota" placeholder="Mô tả playlist"></textarea>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
										</div>
										<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
											<div class="btn btn-success editPl">Edit</div>
										</div>

									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>

				</div>
			</div>
		</div>

		
		
		<?php include 'Footer.php'; ?>


		<div class="themplthanhcong">
			<i class="fa fa-check-circle-o" aria-hidden="true"></i>
			<p class="ttc">Thêm playlist thành công</p>
		</div>

		<div class="chinhsuaplthanhcong">
			<i class="fa fa-check-circle-o" aria-hidden="true"></i>
			<p class="ttc">Cập nhật playlist thành công</p>
		</div>

		<div class="xoaplthanhcong">
			<i class="fa fa-check-circle-o" aria-hidden="true"></i>
			<p class="ttc">Xóa playlist thành công</p>
		</div>

		<div class="emptyplaylist">
			<i class="fa fa-info" aria-hidden="true"></i>
			<p class="ttc">Playlist trống vui lòng thêm bài hát</p>
		</div>

		

		
		<script type="text/javascript">
			$(document).ready(function() {
				$(document).on('click', 'button.myInfo', function(event) {
					window.location = "http://localhost:81/MusicWeb/Zonmp3/myInfo"
				});
			});
		</script>
		
	</body>
	</html>
