<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang chủ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/FontAwesome/css/font-awesome.css">
	
	
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/Bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?= base_url(); ?>vendor/Css/nav.css">

	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/guest_form.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/nav.js"></script>
</head>
<body>
	
	<nav class="navbar navbar-expand-lg myNav">
		<div class="container">
			<a href="index.html" class="navbar-brand home">
				<img src="<?= base_url(); ?>vendor/Image/logo_music_web.png" class="logo" alt="" width='100px'>
			</a>
			<div class="navbar-buttons">
				<button type="button" class="btn btn-outline-secondary navbar-toggler" data-toggle="collapse" data-target="#navigation">
					<span class="sr-only">Toggle navigation</span>
					<i class="fa fa-align-justify"></i>
				</button>
				<?php if(isset($this->session->userdata['user_username'])){ ?>
						
				<?php }?> 
				
				<a href="" class="btn btn-outline-secondary navbar-toggler">
					<i class="fa fa-sign-in" aria-hidden="true"></i>
				</a>
			</div>
			<div id="navigation" class="collapse navbar-collapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a href="#" class="nav-link">Home</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url(); ?>Playlist" class="nav-link">Playlist</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">Contact</a>
					</li>
					
					<form class="form-inline" action="/action_page.php">
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
						<a href="" class="btn btn-primary navbar-btn user"> 
							<?php 
							if(isset($this->session->userdata['user_username'])){
								echo $this->session->userdata['user_username'];
							}?> 
							<i class="fa fa-user" aria-hidden="true"></i>

						</a>
				</div>
				<div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block" >
					<a href="http://localhost:81/MusicWeb_Quan/TrangChu" class="btn btn-primary navbar-btn"><i class="fa fa-sign-in" aria-hidden="true"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</nav>
</body>