<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Playlist</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/FontAwesome/css/font-awesome.css">
	<!-- <script src="http://gsgd.co.uk/sandbox/jquery/easing/jquery.easing.1.3.js"></script> -->
	
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/Bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Bootstrap/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/Css/Playlist_Detail.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/Css/song_detail.css">
    <link rel="stylesheet" href="<?= base_url(); ?>vendor/Css/login.css">

	<script type="text/javascript" src="<?= base_url(); ?>vendor/js/Playlist_Detail.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>vendor/js/nav.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>vendor/js/search_form.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>vendor/Js/sign_up_ajax.js"></script>
</head>
<body>
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

    <div class="info-banner-box">
        <div class="container">
            <div class="blur-container" style="background: url(<?=base_url(); ?>vendor/<?=$playlist_detail[0]['image_playlist']?>) center center / cover no-repeat rgb(112, 89, 75); width: 84%; height: 220px;"></div>
            <div class="row">
                <div <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sub-container">
                    <a class="medium-card-11">
                        <img src="<?=base_url(); ?>vendor/<?=$playlist_detail[0]['image_playlist']?>" alt="" style="width: 160px; height: 160px;">
                    </a>
                    <div class="info-banner-body clearfix">
                        <div class="left-info">
                            <h3 id="title"><?=$playlist_detail[0]['playlist_name']?></h3>
                            <p class="content"><?=$playlist_detail[0]['mota_playlist']?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- phần chức năng -->

    <section class="user-interaction-box">
        <div class="container">
            <div class="sub-container">
                <div class="play-song">
                    <a class="btn btn-default play1" id="play-pause">
                        <i class="fa fa-play" id="play1-song" aria-hidden="true"></i>
                        <i class="fa fa-pause" id="pause-song" aria-hidden="true"></i>Nghe bài hát
                    </a>
                </div>
            </div>
        </div>
    </section> 
    <div class="info-player">
        <div class="container info">
            <!-- <div class="sub-conatiner-info"> -->
            <div class="row info_row">
                <!-- danh sách bài hát -->
                <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                    <p class="td">Danh sách bài hát</p>
                    
                    <!-- bài hat -->
                    <?php foreach($playlist as $key => $value): ?>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 one_ketqua" value="<?=$key + 1?>" id="song<?=$key + 1?>">
                    	<div class="sid" hidden="true"><?= $value['SID']?></div>
                        <div class="layout1_ketqua row">
                            <div class="col-1 col-sm-1 col-md-1 col-lg-1 lo1_ketqua_add">
                                <i class="fa fa-volume-up currentsong<?=$key+1?>" aria-hidden="true"></i>
                            </div>
                            <div class="col-1 col-sm-1 col-md-1 col-lg-1 ketqua_img">
                                <img src="<?= base_url(); ?>vendor/Image/<?=$value['URL_IMG']?>" class='img-responsive'>
                            </div>
                            <div class="col-7 col-sm-7 col-md-7 col-lg-7 ketqua_info">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 kq_name_song">
                                        <?= $value['song_name']?>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 kq_singer">
                                        <?= $value['singer']?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1 col-sm-1 col-md-1 col-lg-1 lo1_ketqua_add">
                            </div>
                            <div class="col-1 col-sm-1 col-md-1 col-lg-1 lo1_ketqua_down">
                            </div>
                            <div class="col-1 col-sm-1 col-md-1 col-lg-1 lo1_ketqua_down">
                            </div>
                            

                        </div>
                        <div class="layout2_ketqua row">
                            <div class="col-1 col-sm-1 col-md-1 col-lg-1 lo1_ketqua_add">
                            </div>
                            <div class="col-1 col-sm-1 col-md-1 col-lg-1 lo2_play">
                                <i class="fa fa-play-circle"></i>
                            </div>
                            <div class="col-7 col-sm-7 col-md-7 col-lg-7 lo2_ketqua_info">

                            </div>
                            
                            <a class="col-1 col-sm-1 col-md-1 col-lg-1 lo2_ketqua_down" target="_blank" href="<?= base_url(); ?>vendor/Music/<?= $value['URL'] ?>" download>
                                <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                            </a>
                            <div class="col-1 col-sm-1 col-md-1 col-lg-1 lo2_ketqua_down">
                                <i class="fa fa-download" aria-hidden="true"></i>
                            </div>
                            <div class="col-1 col-sm-1 col-md-1 col-lg-1 lo2_ketqua_info_">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                	<?php endforeach ?>
                    <!-- end bài hát -->   
                    
                </div>
                <!-- end danh sách bài hát -->

                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <p class="tdmore text-left">Có thể bạn quan tâm</p>
                    <?php foreach($randsong as $key1 => $value1): ?>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 one_ketqua quantam">
                    	<div class="sid" hidden="true"><?= $value1['SID']?></div>
                        <div class="layout1_ketqua row">
                            <div class="col-1 col-sm-1 col-md-1 col-lg-1 ketqua_img">
                                <img src="<?= base_url(); ?>vendor/Image/<?=$value1['URL_IMG']?>" class='img-responsive'>
                            </div>
                            <div class="col-8 col-sm-8 col-md-8 col-lg-8 ketqua_info">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 kq_name_song">
                                        <?= $value1['song_name']?>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 kq_singer">
                                        <?= $value1['singer']?>
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
                            <div class="col-1 col-sm-1 col-md-1 col-lg-1 lo2_ketqua_add">
                            </div>
                            <div class="col-1 col-sm-1 col-md-1 col-lg-1 lo2_ketqua_down">
                            </div>
                            <div class="col-1 col-sm-1 col-md-1 col-lg-1 lo2_ketqua_chitiet">
                            </div>

                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </div> 
    <!-- end phần list nhạc -->

    <div class="miniplayer">
        <div class="miniplayer-container">
            <div class="miniplayer-inner">
                <div class="control-container audioPlayer">
                    <div class="miniplayer-control">
                        <a class="btn-previous" title="previous">
                            <i class="fa fa-step-backward" aria-hidden="true"></i>
                        </a>
                        <a class="btn-play play" id="player">
                            <i class="fa fa-play-circle" aria-hidden="true"></i>
                            <i class="fa fa-pause-circle-o" aria-hidden="true"></i>
                        </a>
                        <a class="btn-next" title="next">
                            <i class="fa fa-step-forward" aria-hidden="true"></i>
                        </a>
                        <a class="btn-repeat" title="repeat">
                            <i class="fa fa-retweet" aria-hidden="true"></i>
                        </a>
                         <a class="btn-random" title="random">
                            <i class="fa fa-random" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="info-detail">
                        <div class="song-info">
                        	<span class="songsid" hidden="true"><?=$playlist[0]['SID']?></span>
                            <span class="song-name">
                                <a><?=$playlist[0]['song_name']?></a>
                            </span>
                            <span class="artist">
                                <a>-<?=$playlist[0]['singer']?></a>
                            </span>
                            <div class="player-timer">
                                <span class="timer-left">00:00</span>
                                <div class="slider">
                                    <div class="loaded">
                                        <div class="pace"></div>
                                        <a href="#" class="slider-handle" style="left: 0%;"></a>
                                    </div>
                                </div>
                                <span class="timer-right">00:00</span>
                            </div>
                        </div>
                    </div>
                    <div class="features-wrapper">
                        <ul class="miniplayer-action">
                            <li class="volume-container">
                                <a class="btn-volume up">
                                    <i class="fa fa-volume-up" aria-hidden="true"></i>
                                    <i class="fa fa-volume-off" aria-hidden="true"></i>
                                </a>
                                <div class="outer">
                                    <div class="inner">
                                        <div class="inner-bar">
                                            <div class="inner-bar-fill">
                                                <div class="inner-handle"></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li class="download">
                                <a class="btn-downnload">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="playlist">
                                <a class="btn-playlist">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- <div class="list-audio"> -->
                    <?php foreach($playlist as $key2 => $value2): ?>
	                    <audio class="audio">
	                        <source src="<?= base_url(); ?>vendor/music/<?= $value2['URL']?>" type="audio/mpeg">
	                    </audio>
                	<?php endforeach ?>
                    <!-- </div> -->
                </div>
            </div>
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

<div class="dangkythanhcong btn btn-success">
    <i class="fa fa-check" aria-hidden="true"></i>
    <p class="thongbaoloi">Đăng ký thành công</p>
</div>
</body>
</html>