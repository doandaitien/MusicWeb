<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản lý thông tin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/FontAwesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/Bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/user_info_form_ajax.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/angular-route.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	
	
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js_Ng/angular-1.5.min.js"></script>  
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js_Ng/angular-animate.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js_Ng/angular-aria.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js_Ng/angular-messages.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js_Ng/angular-material.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/Css/user_info_form.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/Css/guest_form.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/Css/nav.css">
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/user_info_form.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/search_form.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/nav.js"></script>
	
</head>
<body ng-app="myApp">
	
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
				<!-- vào info -->
				<button type="button" class="btn btn-outline-secondary navbar-toggler myInfo"> 
					<!-- <span class="sr-only">Toggle search</span> -->
					<i class="fa fa-user" aria-hidden="true"></i>
				</button>
				<!-- đăng xuất -->
				<a href="<?= base_url(); ?>/TrangChu" class="btn btn-outline-secondary navbar-toggler">
					<i class="fa fa-sign-in" aria-hidden="true"></i>
				</a>
			</div>
			<div id="navigation" class="collapse navbar-collapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a href="http://localhost:81/MusicWeb/Zonmp3" class="nav-link">Home</a>
					</li>
					<li class="nav-item">
						<a href="http://localhost:81/MusicWeb/Zonmp3/myPlaylist" class="nav-link">Playlist</a>
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
						<a href="<?= base_url(); ?>Zonmp3/myInfo" class="btn btn-primary navbar-btn user"> 
							<?php 
							if(isset($this->session->userdata['user_username'])){
								echo $this->session->userdata['user_username'];
							}?> 
							<i class="fa fa-user" aria-hidden="true"></i>

						</a>

						<div class="get_username" hidden="true"><?php if(isset($this->session->userdata['user_username'])){echo $this->session->userdata['user_username'];}?></div>
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
		<div class="span3 well">
			<center>
				<a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src="" name="aboutme" width="140" height="140" class="img-circle"></a>
				<h3></h3>
			</center>
		</div>
	</div>
	<div class="col-xs- col-sm- col-md- col-lg-">
		
	</div>
	<div class="container info" ng-controller ="MyController">
		<div class="row">
			<div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
				<div class="card card_if">
					<div class="card-block">
						<div class="card-header">
							Thông tin cá nhân
							<b class="float-right"><i class="fa fa-pencil csprofile"></i></b>
						</div>
						<div class="card-body">
							<div class="card-text">
								<b>Tên đăng nhập : &nbsp;</b><div id="username"></div>
							</div>
							<div class="card-text">
								<b>Họ và tên : &nbsp;</b><div id="fullname"></div>
							</div>
							<div class="card-text">
								<b>Giới tính : &nbsp;</b><div id="sex"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="card card_cs" hidden="true">
					<div class="card-block">
						<div class="card-header">
							Chỉnh sửa thông tin

						</div>
						<div class="card-body">
							<div class="card-text">
								<b>Tên đăng nhập</b>
								<input type="hidden" name="" class="input_AID">
								<input type="text" class="form-control input_username" disabled name="" value="">
							</div>
							<div class="card-text">
								<b>Họ và tên</b>
								<input type="text" class="form-control input_fullname" name="" value="">
								<div class="error4" hidden="true"></div>
							</div>
							<div class="card-text test">
								<b>Ảnh đại diện</b><br>
								<input type="file" name="file" class="input_avatar">
								<div class="thongtin">
									<img src="" class="image_info" width="224px">
									<div class="phiaduoi">
										<i class="fa fa-camera" aria-hidden="true"></i> Cập nhật ảnh
									</div>
								</div>
							</div>
							<div class="card-text">
								<b>Giới tính</b></br>
								<input type="radio" name="gender" value="male" checked > Male&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								<input type="radio" name="gender" value="female"> Female <br>
							</div>
							<div class="card-text">
								<b>Mật khẩu cũ</b>
								<div class="input-group">
									<input type="{{inputType1}}" name="password" class="form-control input-lg pass_old" ng-model="password_field1" placeholder="Enter Password" />
									<span class="input-group-addon">
										<span class="{{showHideClass1}}" ng-click="showPassword1()" style="cursor:pointer"></span>
									</span>
								</div>
								<div class="error1" hidden="true"></div>
							</div>
							<div class="card-text">
								<b>Mật khẩu mới</b>
								<div class="input-group">
									<input type="{{inputType2}}" name="password" class="form-control input-lg pass_new" ng-model="password_field2" placeholder="Enter Password" />
									<span class="input-group-addon">
										<span class="{{showHideClass2}}" ng-click="showPassword2()" style="cursor:pointer"></span>
									</span>
								</div>
								<div class="error2" hidden="true"></div>
							</div>

						</div>
						<div class="btn btn-outline-success btn-block thaydoiinfo">Thay đổi</div>
						<div class="btn btn-outline-info btn-block quaylai">Quay lại</div>

					</div>
				</div>
			</div>
		</div>
		
		
	</div>

	<footer class="container-fluid text-center" style="background-color: #8080800f;color: black;">
		<p style="margin-bottom: 0;">
			<br>Một sản phẩm của OCS TEAM <br>
			Địa chỉ: Số 1 Đại Cồ Việt, Hai Bà Trưng, Hà Nội <br>
			Điện thoại: 0355111616 <br>
			Email: ocsteambk@gmail.com <br><br>
			<a href="https://www.facebook.com/" class='contact' target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
			<a href="https://twitter.com/" class='contact' target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
			<a href="https://www.instagram.com/" class='contact' target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
		</p>
	</footer>

	<div class="chinhsuathongtinthanhcong">
		<i class="fa fa-check-circle-o" aria-hidden="true"></i>
		<p class="ttc">Cập nhật thông tin thành công</p>
	</div>

	<script type="text/javascript">
		
		$(document).ready(function() {
			$(document).ready(function() {
				$(document).on('click', 'button.myInfo', function(event) {
					window.location = "http://localhost:81/MusicWeb/Zonmp3/myInfo"
				});
			});
		});
	</script>

</body>
</html>