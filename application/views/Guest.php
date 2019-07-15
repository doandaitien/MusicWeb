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
	<link rel="stylesheet" href="<?= base_url(); ?>vendor/Css/guest_form.css">
	<link rel="stylesheet" href="<?= base_url(); ?>vendor/Css/nav.css">
	<link rel="stylesheet" href="<?= base_url(); ?>vendor/Css/login.css">
	<link rel="stylesheet" href="<?= base_url(); ?>vendor/Css/search_input.css">
	
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/guest_form.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/nav.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/sign_up_ajax.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/search_form.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg myNav">
		<div class="container">
			<a href="<?= base_url(); ?>TrangChu" class="navbar-brand home">
				<img src="<?= base_url(); ?>vendor/Image/logo_music_web.png" class="logo" alt="" width='100px'>
			</a>
			<div class="navbar-buttons">
				<button type="button" class="btn btn-outline-secondary navbar-toggler" data-toggle="collapse" data-target="#navigation">
					<span class="sr-only">Toggle navigation</span>
					<i class="fa fa-align-justify"></i>
				</button>
				<button type="button" class="btn btn-outline-secondary navbar-toggler" data-toggle="modal" data-target="#modalSignIn">
					<span class="sr-only">Toggle search</span>
					<i class="fa fa-user" aria-hidden="true"></i>
				</button>
				<a href="" class="btn btn-outline-secondary navbar-toggler"  data-toggle="modal" data-target="#modalSignUp">
					<i class="fa fa-sign-in" aria-hidden="true"></i>
				</a>
			</div>
			<div id="navigation" class="collapse navbar-collapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a href="#" class="nav-link">Home</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link" data-toggle="modal" data-target="#modalSignIn">Playlist</a>
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
						<a href="" class="btn btn-primary navbar-btn" data-toggle="modal" data-target="#modalSignIn"> Login <i class="fa fa-user" aria-hidden="true"></i>
						</a>
					</div>
					<div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block" >
						<a href="" class="btn btn-primary navbar-btn" data-toggle="modal" data-target="#modalSignUp"> Register <i class="fa fa-sign-in" aria-hidden="true"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<div class="container car">
		<div id="demo" class="carousel slide" data-ride="carousel">
			<ul class="carousel-indicators">
				<li data-target="#demo" data-slide-to="0" class="active"></li>
				<li data-target="#demo" data-slide-to="1"></li>
				<li data-target="#demo" data-slide-to="2"></li>
			</ul>
			<div class="carousel-inner">
				<?php foreach ($news as $key => $value):?>
				<div class="carousel-item">
					<div class="nid" hidden="true"><?= $value['NID'] ?></div>
					<img src="http://localhost:81/MusicWeb/vendor/Image_News/<?= $value['image'] ?>" alt="Los Angeles" width="100%">
					<div class="carousel-caption">
						<h3><?= $value['title'] ?></h3>
						<p><?= $value['description'] ?></p>
					</div>   
				</div>
				<?php endforeach ?>
			</div>
			<a class="carousel-control-prev" href="#demo" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			</a>
			<a class="carousel-control-next" href="#demo" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			</a>
		</div>
	</div>
	<div class="container text-left tdchart">
		#ZONCHART
	</div>
	<div class="container text-right">
		<div class="full_listen">
			<div class="btn btn-outline-info zonchart"><i class="fa fa-play"></i> Nghe tất cả</div>
		</div>
	</div>
	<div class="container container_chart">
		<div class="row chart">
			<div class="container">

				<div class="row row_full_height">
					<div class="col-12 col-sm-12 col-md-12 col-lg-6 realtime-list-song">
						<ul class="list-info">
							<?php foreach ($top10 as $key => $value):?>
								<?php if($key < 5) {?>
									<li class="one_song_top">
										<div class="sid" hidden="true"><?php echo $value['SID'] ?></div>
										<div class="layout1 row">
											<div class="col-2 col-sm-2 col-md-2 col-lg-2 top_number">
												<?= $key + 1?>
											</div>
											<div class="col-3 col-sm-3 col-md-3 col-lg-3 top_img">
												<img src="<?= base_url(); ?>vendor/Image/<?= $value['URL_IMG'] ?>" class='img-responsive'>
											</div>
											<div class="col-7 col-sm-7 col-md-7 col-lg-7 top_info">
												<div class="row">
													<div class="col-12 col-sm-12 col-md-12 col-lg-12 top_name_song">
														<?= $value['song_name'] ?>
													</div>
													<div class="col-12 col-sm-12 col-md-12 col-lg-12 top_singer">
														<?= $value['singer'] ?>
													</div>
												</div>
											</div>
										</div>
										<div class="layout2 row">
											<div class="col-2 col-sm-2 col-md-2 col-lg-2 layout2_1">

											</div>
											<div class="col-3 col-sm-3 col-md-3 col-lg-3 top_play">
												<i class="fa fa-play-circle" aria-hidden="true"></i>
											</div>
											<div class="col-7 col-sm-7 col-md-7 col-lg-7 layout2_2">

											</div>
										</div>
									</li>
								<?php } ?>
							<?php endforeach ?>
							
						</ul>
					</div>
					<div class="col-0 col-sm-0 col-md-0 col-lg-6 realtime-list-song list_right">
						<ul class="list-info">
							<?php foreach ($top10 as $key => $value):?>
								<?php if($key >= 5) {?>
									<li class="one_song_top">
										<div class="sid" hidden="true"><?php echo $value['SID'] ?></div>
										<div class="layout1 row">
											<div class="col-2 col-sm-2 col-md-2 col-lg-2 top_number">
												<?= $key + 1?>
											</div>
											<div class="col-3 col-sm-3 col-md-3 col-lg-3 top_img">
												<img src="<?= base_url(); ?>vendor/Image/<?= $value['URL_IMG'] ?>" class='img-responsive'>
											</div>
											<div class="col-7 col-sm-7 col-md-7 col-lg-7 top_info">
												<div class="row">
													<div class="col-12 col-sm-12 col-md-12 col-lg-12 top_name_song">
														<?= $value['song_name'] ?>
													</div>
													<div class="col-12 col-sm-12 col-md-12 col-lg-12 top_singer">
														<?= $value['singer'] ?>
													</div>
												</div>
											</div>
										</div>
										<div class="layout2 row">
											<div class="col-2 col-sm-2 col-md-2 col-lg-2 layout2_1">

											</div>
											<div class="col-3 col-sm-3 col-md-3 col-lg-3 top_play">
												<i class="fa fa-play-circle" aria-hidden="true"></i>
											</div>
											<div class="col-7 col-sm-7 col-md-7 col-lg-7 layout2_2">

											</div>
										</div>
									</li>
								<?php } ?>
							<?php endforeach ?>

						</ul>
					</div>
				</div>
			</div>

		</div>
	</div>


	<div class="container text-left tdbhm">
		BÀI HÁT MỚI
	</div>
	<div class="container text-right">
		<div class="full_listen">
			<div class="btn btn-outline-info newsong"><i class="fa fa-play"></i> Nghe tất cả</div>
		</div>
	</div>

	<div class="container container-bhm">
		<div class="row bhm">
			<?php foreach ($latest as $key => $value):?>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 one_bhm">
					<div class="layout1_bhm row">
						<div class="sidlatest" hidden="true"><?= $value['SID'] ?></div>
						<div class="col-1 col-sm-1 col-md-1 col-lg-1 bhm_img">
							<img src="<?= base_url(); ?>vendor/Image/<?= $value['URL_IMG'] ?>" class='img-responsive'>
						</div>
						<div class="col-8 col-sm-8 col-md-8 col-lg-8 bhm_info">
							<div class="col-12 col-sm-12 col-md-12 col-lg-12 bhm_name_song">
								<?= $value['song_name'] ?>
							</div>
							<div class="col-12 col-sm-12 col-md-12 col-lg-12 bhm_singer">
								<?= $value['singer'] ?>
							</div>
						</div>
						<div class="col-1 col-sm-1 col-md-1 col-lg-1 lo1_bhm_add">
						</div>
						<div class="col-1 col-sm-1 col-md-1 col-lg-1 lo1_bhm_down">
						</div>
						<div class="col-1 col-sm-1 col-md-1 col-lg-1 lo1_bhm_chitiet">
						</div>

					</div>
					<div class="layout2_bhm row">
						<div class="col-1 col-sm-1 col-md-1 col-lg-1 lo2_play">
							<i class="fa fa-play-circle" aria-hidden="true"></i>
						</div>
						<div class="col-8 col-sm-8 col-md-7 col-lg-8 lo2_bhm_info">
						</div>
						<div class="col-1 col-sm-1 col-md-1 col-lg-1 lo2_bhm_add">
							<i class="fa fa-plus" data-toggle="modal" data-target="#modalSignIn"></i>
						</div>
						<a class="col-1 col-sm-1 col-md-1 col-lg-1 lo2_bhm_down" target="_blank" href="<?= base_url(); ?>vendor/Music/<?= $value['URL'] ?>" download>
							<i class="fa fa-download" aria-hidden="true"></i>
						</a>
						<div class="col-1 col-sm-1 col-md-1 col-lg-1 lo2_bhm_chitiet">
							<i class="fa fa-info" aria-hidden="true"></i>
						</div>

					</div>
				</div>
			<?php endforeach ?>

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
	<div class="modal fade" id="modalSignIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Sign In</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body mx-3">
				<div class="md-form mb-5">
					<i class="fa fa-user prefix grey-text"></i>
					<input type="text" id="form3" class="form-control validate">
					<label data-error="wrong" data-success="right" for="form3" class="label_user">Your name</label>
					<br>
					<label class="error1" hidden="true">This is require</label>
				</div>

				<div class="md-form mb-4">
					<i class="fa fa-key prefix grey-text"></i>
					<input type="password" id="form2" class="form-control validate">
					<label data-error="wrong" data-success="right" for="form2" class="label_pass">Your password</label>
					<br>
					<label class="error2" hidden="true">This is require</label>
				</div>
				<div class="error3" hidden="true">Error user or password</div>

			</div>
			<div class="modal-footer d-flex justify-content-center">
				<button class="btn btn-info sign_in">Login <i class="fa fa-paper-plane-o ml-1"></i></button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalSignUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header text-center">
			<h4 class="modal-title w-100 font-weight-bold">Sign Up</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body mx-3">
			<form method="POST" id="form_sign_up">
				<div class="md-form mb-5">
					<i class="fa fa-user prefix grey-text"></i>
					<input type="text" id="form4" class="form-control validate" placeholder="username">
					<label data-error="wrong" data-success="right" class="label_user_sign">Your name</label>
					<br>
					<label class="error4" hidden="true">This is require</label>
				</div>
				<div class="md-form mb-5">
					<i class="fa fa-id-card-o prefix grey-text"></i>
					<input type="text" id="form5" class="form-control validate" placeholder="fullname">
					<label data-error="wrong" data-success="right" class="label_fullname_sign">Full name</label>
					<br>
					<label class="error5" hidden="true">This is require</label>
				</div>
				<div class="md-form mb-5 md_sex">
					<i class="fa fa-venus-mars prefix grey-text"></i>
					<label data-error="wrong" data-success="right" class="label_sex_sign">Sex</label>
					<br>
					<div class="btn btn-outline-success btn_sex">
						<label class="form-check-label">
							<input type="radio" name="sex" checked>Male
						</label>
					</div>
					<div class="btn btn-outline-success btn_sex">
						<label class="form-check-label">
							<input type="radio" name="sex"> Female
						</label>
					</div>



					<br>
					<label class="error8" hidden="true">This is require</label>
				</div>

				<div class="md-form mb-5">
					<i class="fa fa-key prefix grey-text"></i>
					<input type="password" id="form6" class="form-control validate" placeholder="password">
					<label data-error="wrong" data-success="right" for="form6" class="label_pass">Your password</label>
					<br>
					<label class="error6" hidden="true">This is require</label>
				</div>
				<div class="md-form mb-5">
					<i class="fa fa-check-square-o prefix grey-text"></i>
					<input type="password" id="form7" class="form-control validate" placeholder="confirm">
					<label data-error="wrong" data-success="right" for="form7" class="label_pass">Confirm password</label>
					<br>
					<label class="error7" hidden="true">This is require</label>
				</div>

				
			</form>
		</div>
		<div class="modal-footer d-flex justify-content-center">
			<button class="btn btn-info sign_up">Sign Up <i class="fa fa-paper-plane-o ml-1"></i></button>
		</div>
	</div>
</div>
</div>

<div class="dangkythanhcong btn btn-success">
	<i class="fa fa-check" aria-hidden="true"></i>
	<p class="thongbaoloi">Đăng ký thành công</p>
</div>


<script type="text/javascript">
	$(document).ready(function() {

		$(window).scroll(function(){
			var scrollTop = $(window).scrollTop();
			console.log(scrollTop);

			if(scrollTop > 50) {
				$('.navbar-brand').css('line-height','20px');
				$('.navbar-left').css('margin-top','8px');
				$('.navbar-inverse').css('font-size','15px');
				$('.navbar-nav').children('li').children('a').css('line-height','20px');
				$('.navbar-inverse').css('background-color','#F7F7F7');
			} else {
				$('.navbar-brand').css('line-height','40px');
				$('.navbar-left').css('margin-top','18px');
				$('.navbar-inverse').css('font-size','19px');
				$('.navbar-nav').children('li').children('a').css('line-height','40px');
				$('.navbar-inverse').css('background-color','#FCFCFC');
			}
		});


		$('.carousel-item:first').addClass('active');
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$(document).on('focus', '.input_tk', function(event) {
			event.preventDefault();
			console.log($(this).next('.input-group-btn').children('button.btn.btn-success.search_i').css('background-color', '#65509E!important'));
		});
	});
</script>
</body>
</html>