<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Kết quả tìm kiếm</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/FontAwesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/Bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Bootstrap/js/bootstrap.min.js"></script>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->

	<link rel="stylesheet" href="<?= base_url(); ?>vendor/Css/search_form.css">
	<link rel="stylesheet" href="<?= base_url(); ?>vendor/Css/nav.css">
	<link rel="stylesheet" href="<?= base_url(); ?>vendor/Css/guest_form.css">
	<link rel="stylesheet" href="<?= base_url(); ?>vendor/Css/login.css">
	<link rel="stylesheet" href="<?= base_url(); ?>vendor/Css/add_to_playlist.css">
	<link rel="stylesheet" href="<?= base_url(); ?>vendor/Css/search_input.css">
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/search_form.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/sign_up_ajax.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/nav.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/add_to_play.js"></script>
</head>
<body>
	<?php 
	$uri = $_SERVER['REQUEST_URI'];
	$uri = explode('/',$uri);
	$tukhoa = end($uri);
	?>
	<nav class="navbar navbar-expand-lg myNav">
		<div class="container">
			<a href="http://localhost:81/MusicWeb/Zonmp3" class="navbar-brand home">
				<img src="<?= base_url(); ?>vendor/Image/logo_music_web.png" class="logo" alt="" width='100px'>
			</a>
			<div class="navbar-buttons">
				<button type="button" class="btn btn-outline-secondary navbar-toggler" data-toggle="collapse" data-target="#navigation">
					<i class="fa fa-align-justify"></i>
				</button>

				<?php if(isset($this->session->userdata['user_username'])){ ?>
					<button type="button" class="btn btn-outline-secondary navbar-toggler myInfo">
						<i class="fa fa-user" aria-hidden="true"></i>
					</button>
				<?php }else{ ?>
					<button type="button" class="btn btn-outline-secondary navbar-toggler" data-toggle="modal" data-target="#modalSignIn">
						<span class="sr-only">Toggle search</span>
						<i class="fa fa-user" aria-hidden="true"></i>
					</button>
				<?php } ?>
				
				<?php if(isset($this->session->userdata['user_username'])){ ?>
					<a href="" class="btn btn-outline-secondary navbar-toggler">
						<i class="fa fa-sign-in" aria-hidden="true"></i>
					</a>
				<?php }else{ ?>
					<a href="" class="btn btn-outline-secondary navbar-toggler"  data-toggle="modal" data-target="#modalSignUp">
						<i class="fa fa-sign-in" aria-hidden="true"></i>
					</a>
				<?php } ?>
				
			</div>
			<div id="navigation" class="collapse navbar-collapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<?php if(isset($this->session->userdata['user_username'])){ ?>
							<a href="http://localhost:81/MusicWeb/Zonmp3" class="nav-link">Home</a>
						<?php }else{ ?>
							<a href="http://localhost:81/MusicWeb/TrangChu" class="nav-link">Home</a>
						<?php } ?>
						
					</li>
					<li class="nav-item">
						<?php if(isset($this->session->userdata['user_username'])){ ?>
							<a href="http://localhost:81/MusicWeb/Zonmp3/myPlaylist" class="nav-link">Playlist</a>
						<?php }else{ ?>
							<a href="#" class="nav-link" data-toggle="modal" data-target="#modalSignIn">Playlist</a>
						<?php } ?>
						
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

						<?php if(isset($this->session->userdata['user_username'])){ ?>
							<a href="http://localhost:81/MusicWeb/Zonmp3/myInfo" class="btn btn-primary navbar-btn user"> 
								<?php 
								if(isset($this->session->userdata['user_username'])){
									echo $this->session->userdata['user_username'];
								}else{?>
									Login	
								<?php }?> 
								<i class="fa fa-user" aria-hidden="true"></i>
							</a>
						<?php }else{ ?>
							<a href="" class="btn btn-primary navbar-btn user" data-toggle="modal" data-target="#modalSignIn"> 
								<?php 
								if(isset($this->session->userdata['user_username'])){
									echo $this->session->userdata['user_username'];
								}else{?>
									Login	
								<?php }?> 
								<i class="fa fa-user" aria-hidden="true"></i>
							</a>
						<?php } ?>
						


					</div>
					<div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block" >
						<?php if(isset($this->session->userdata['user_username'])){ ?>
							<a href="http://localhost:81/MusicWeb/TrangChu" class="btn btn-primary navbar-btn"><i class="fa fa-sign-in" aria-hidden="true"></i>
						<?php }else{ ?>
							<a href="" class="btn btn-primary navbar-btn" data-toggle="modal" data-target="#modalSignUp"> Register<i class="fa fa-sign-in" aria-hidden="true"></i>
						<?php } ?>
						
						</a>
					</div>
				</div>
			</div>
		</div>
	</nav>
	<div class="container kqtk">
		<div class="row tdtk">
			KẾT QUẢ TÌM KIẾM
		</div>
	</div>
	<div class="container sokq">
		<div class="row">
			Có <?= count($data); ?> kết quả được tìm thấy với từ khóa “<?= $tukhoa; ?>”
		</div>
	</div>
	<div class="container result_tk">
		<div class="row ketqua">
			<?php foreach ($data as $key => $value):?>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 one_ketqua">
					<div class="layout1_ketqua row">
						<div class="col-1 col-sm-1 col-md-1 col-lg-1 ketqua_img">
							<div class="sid" hidden="true"> <?= $value['SID'] ?></div>
							<img src="<?= base_url(); ?>vendor/Image/<?= $value['URL_IMG'] ?>" class='img-responsive'>
						</div>
						<div class="col-8 col-sm-8 col-md-8 col-lg-8 ketqua_info">
							<div class="row">
								<div class="col-12 col-sm-12 col-md-12 col-lg-12 kq_name_song">
									<?= $value['song_name'] ?>
								</div>
								<div class="col-12 col-sm-12 col-md-12 col-lg-12 kq_singer">
									<?= $value['singer'] ?>
								</div>
							</div>
						</div>
						<div class="col-1 col-sm-1 col-md-1 col-lg-1 lo1_ketqua_add">
						</div>
						<div class="col-1 col-sm-1 col-md-1 col-lg-1 lo1_ketqua_down">
						</div>
						<div class="col-1 col-sm-1 col-md-1 col-lg-1 lo1_ketqua_chitiet">
						</div>

					</div>
					<div class="layout2_ketqua row">
						<div class="col-1 col-sm-1 col-md-1 col-lg-1 lo2_play">
							<i class="fa fa-play-circle"></i>
						</div>
						<div class="col-8 col-sm-8 col-md-7 col-lg-8 lo2_ketqua_info">

						</div>
						
						<?php if(isset($this->session->userdata['user_username'])){ ?>
                            <div class="col-1 col-sm-1 col-md-1 col-lg-1 lo2_ketqua_add add_to_pl1" data-toggle="modal" data-target="#myModal">
								<i class="fa fa-plus"></i>
							</div>
                        <?php }else{ ?>
                            <div class="col-1 col-sm-1 col-md-1 col-lg-1 lo2_ketqua_add" data-toggle="modal" data-target="#modalSignIn">
								<i class="fa fa-plus"></i>
							</div>
                        <?php } ?>
						<div class="col-1 col-sm-1 col-md-1 col-lg-1 lo2_ketqua_down">
							<i class="fa fa-download"></i>
						</div>
						<div class="col-1 col-sm-1 col-md-1 col-lg-1 lo2_ketqua_chitiet">
							<i class="fa fa-info"></i>
						</div>

					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
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

<div class="modal" id="myModal" role="dialog">
        <div class="modal-dialog modal-dialog-add">

            <!-- Modal content-->
            <div class="modal-content modal-content-add">
                <div class="modal-header">
                    <div class="z-card card-40">
                        <a class="thumb-40"><img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/2/a/1/2/2a120acd38b69523235fd90b1be4366f.jpg" alt="" class="img_pl">
                        </a>
                        <div class="card-info">
                            <div class="title name_song_pl">Đời Cho Ta</div>
                            <div class="artist singer_pl">Sâu, Jombie</div>
                            <div class="sid_pl" hidden="true"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <ul style="max-height: 230px;overflow-y: auto;" class="modal_body_ul">
                        <li>
                            <div class="dropdown-item">
                                <i class="fa fa-music" aria-hidden="true" style="float: left;"></i>
                                <div class="title">
                                    <span>pl1</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="modal-footer float-left">
                    <a href="" class="add_a">
                        <span class="fa fa-plus"></span> Thêm playlist mới
                    </a>
                    <div class="form_add_playlist" hidden="true">
                        <input type="text" class="form-control input_add_pl" name="" placeholder="Nhập tên playlist">
                        <div class="btn btn-danger float-right add_pl">Tạo playlist</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="themplthanhcong">
        <i class="fa fa-check-circle-o" aria-hidden="true"></i>
        <p class="ttc">Thêm playlist thành công</p>
    </div>

    <div class="themvaoplthanhcong">
        <i class="fa fa-check-circle-o" aria-hidden="true"></i>
        <p class="tvpltc">
            Đã thêm Bài hát <b>"Đời Cho Ta"</b> vào playlist thành công
        </p>
    </div>

    <div class="baihattrung">
        <i class="fa fa-info" aria-hidden="true"></i>
        <p class="ttc">
            Bài hát này đã tồn tại trong playlist của bạn
        </p>
    </div>

<?php include 'Footer.php'; ?>
<script type="text/javascript">

	$(document).ready(function() {
		var length =location.href.split("/").length;
		var x = location.href.split("/")[length-1];
		console.log(x);

		$('.input_tk').val(x);
	});	

	$(document).on('click', 'button.myInfo', function(event) {
		window.location = "http://localhost:81/MusicWeb/Zonmp3/myInfo"
	});
</script>
</body>
</html>