$(document).ready(function() {

	$('.comment').on('click', function(){
		$("body,html").animate({scrollTop:$('#comment').offset().top},2000,"easeInOutExpo");
 	 	return false;
	});

	$(document).on('click','.song-name', function(){
		var link = $(this).prev('.songsid')[0].innerText;
		window.location="http://localhost:81/MusicWeb/NgheNhac/ngheNhac/" + link;
	});

	$(document).on('click','.quantam', function(){
		var link = $(this).children('.sid')[0].innerText;
		window.location="http://localhost:81/MusicWeb/NgheNhac/ngheNhac/" + link;
	});

	$(document).on('click','.lo2_ketqua_info_ i', function(){
		event.stopPropagation();
		var link = $(this).parent('.lo2_ketqua_info_').parent('.layout2_ketqua').prev('.layout1_ketqua').prev('.sid')[0].innerText;
		window.location="http://localhost:81/MusicWeb/NgheNhac/ngheNhac/" + link;
	});

	$(document).on('click','.lo2_ketqua_down', function(){
		event.stopPropagation();
	});

	

	

	$('#myBtn').on('click',function(){
		var dots = document.getElementById("dots");
		var moreText = document.getElementById("more");
		var btnText = document.getElementById("myBtn");

		if (dots.style.display === "none") {
		    dots.style.display = "inline";
		    btnText.innerHTML = "Xem thêm"; 
		    moreText.style.display = "none";
		} else {
		    dots.style.display = "none";
		    btnText.innerHTML = "Rút gọn"; 
		    moreText.style.display = "inline";
		}
	});

	$(document).on('click', '.btn-repeat', function(){
		$(this).toggleClass('once');
	});

	$('#button-commit').on('click', function(){


		var comment = $(this).parent('.btn-actions-wrapper').prev('.comment-input-wrapper').children('.text-input-wrapper').children('#main-text-comment').val();
		var URL_IMG = $(this).parent('.btn-actions-wrapper').prev('.comment-input-wrapper').children('.comment-avatar').children('.rounded-circle').attr('src');
		console.log(URL_IMG);


	});

	$('.delete').on('click', function(){
		document.getElementById('main-text-comment').value = "";
	});
	
	$(window).scroll(function(){
		var scrollTop = $(window).scrollTop();

		if(scrollTop > 50) {
			$('.navbar-nav').css('line-height','0.1');
			$('.navbar-nav').css('font-size','12px');
			$('.navbar').css('background-color','#F7F7F7');
		} else {
			// $('.menutren').css('height','70px');
			$('.navbar-nav').css('line-height','1.5');
			$('.navbar-nav').css('font-size','1rem');
			$('.navbar').css('background-color','#FCFCFC');
		}
	});

	$('.volume-container').hover(function() {
		/* Stuff to do when the mouse enters the element */
		$(this).children('.outer').toggleClass('active');
	});

	
	
	$("body")
		.toArray()
		.forEach( function(player) {
			// statements
			var i = 1;
			var currenTrack = 1;
			var audio = $(player).find('audio')[i - 1];
			var seekBarInner = $(player).find(".slider .pace");
			var seekBarOuter = $(player).find(".slider .loaded");
			var handle = $(player).find('.slider .slider-handle');
			var volumeControl = $(player).find('.outer');
			console.log(volumeControl);

			var length;
			var interval;
			var seekBarPercentage;
			var volumePercentage;

			var autoplay = function(){
				audio.autoplay = true;
				audio.load();
				$('#play-pause').removeClass('play1').addClass('pause1');
				$(player).find('#player').removeClass('play').addClass('pause');
				$('#play-pause')[0].innerHTML = "<i class='fa fa-pause' id='pause-song' aria-hidden='true'></i>Tạm dừng";
				$('.currentsong1').css('visibility','visible');
				var _button = $(player).find('#player');
				interval = setInterval(function(){
					if(!audio.paused){
						updateSeekBar();
					}

					if(audio.ended) {
						clearInterval(interval);
						// _button.removeClass('pause').addClass('play');
						
						seekBarInner.width(0+"%");
						$(player).find('.timer-left').text("00:00");
						console.log('autoplay');
						nextAutoAudio(i);
					}
				},500);
			};
			autoplay();
	
			audio.onloadedmetadata = function() {
				length = audio.duration;
				var time = "0" + Math.floor(length / 60) + ":" + (parseInt(length%60) < 10 ? '0' + parseInt(length%60) : parseInt(length%60));
				console.log(time);

				$(player).find('.timer-right').text(time);

			};

			var nextAutoAudio = function(i) {
				i = currenTrack;
				if($(player).find('.btn-repeat').hasClass('once')) {
					i--;
				}
				if(i==10) {
					i = 1;
					$('.currentsong10').css('visibility','hidden');
				} else {
					var prevSong = ".currentsong" + i;
					$(prevSong).css('visibility','hidden');	
					i++;	
				}

				console.log('nextauto');
				console.log(i);
				// $(player).find('audio')[i];

				console.log(i)
				currenTrack = i;

				var button = $(player).find("#play-pause");
				var _button = $(player).find('#player');

				var currentSong = ".currentsong" + i;
				$(currentSong).css('visibility','visible');

				var getContent = "#song" + i;
				console.log(getContent);
				
				var next = $(player).find(getContent);

				if(audio.played || audio.paused) {

					if(audio.paused) {
						audio.currentTime = 0;
						_button.removeClass('play').addClass('pause');
						button.removeClass('play1').addClass('pause1');
						$('#play-pause')[0].innerHTML = "<i class='fa fa-pause' id='pause-song' aria-hidden='true'></i>Tạm dừng";
					} else {
						
						audio.currentTime = 0;
						audio.pause();
						clearInterval(setInterval);
					}

					var song_name = next.children('.layout1_ketqua').children('.ketqua_info').children('.row').children('.kq_name_song')[0].innerText;
					var singer = next.children('.layout1_ketqua').children('.ketqua_info').children('.row').children('.kq_singer')[0].innerText;

					$('.song-name')[0].innerHTML = "<a>" + song_name + "</a>";
					$('.artist')[0].innerHTML = "<a> -" + singer + "</a>";
					var sid = next.children('.sid')[0].innerText;
					$('.songsid')[0].innerText = sid;
					
					audio = $(player).find('audio')[i - 1];
					length = audio.duration;

					var time = "0" + Math.floor(audio.duration / 60) + ":" + (parseInt(audio.duration%60) < 10 ? '0' + parseInt(audio.duration%60) : parseInt(audio.duration%60));

					$(player).find('.timer-right').text(time);

					
					audio.play();

					interval = setInterval(function(){
						if(!audio.paused){
							updateSeekBar();
						}

						if(audio.ended) {
							clearInterval(interval);
							
							seekBarInner.width(0+"%");
							$(player).find('.timer-left').text("00:00");
							console.log('btn-next');
							nextAutoAudio(i);
						}


					},500);
				}
			}; 

			$(player).find('.btn-previous').on('click',function(){
				i = currenTrack;
				if(i > 1){
					var nextSong = ".currentsong" + i;
					$(nextSong).css('visibility','hidden');
					i--;
					
				} else {
					i = 10;
					$(".currentsong1").css('visibility','hidden');
				}

				console.log(i)
				currenTrack = i;

				var button = $(player).find("#play-pause");
				var _button = $(player).find('#player');

				var getContent = "#song" + i;
				console.log(getContent);

				var currentSong = ".currentsong" + i;	
				$(currentSong).css('visibility','visible');
				
				var next = $(player).find(getContent);

				if(audio.played || audio.paused) {

					if(audio.paused) {
						audio.currentTime = 0;
						_button.removeClass('play').addClass('pause');
						button.removeClass('play1').addClass('pause1');
						$('#play-pause')[0].innerHTML = "<i class='fa fa-pause' id='pause-song' aria-hidden='true'></i>Tạm dừng";
					} else {
						
						audio.currentTime = 0;
						audio.pause();
						clearInterval(setInterval);
					}

					var song_name = next.children('.layout1_ketqua').children('.ketqua_info').children('.row').children('.kq_name_song')[0].innerText;
					var singer = next.children('.layout1_ketqua').children('.ketqua_info').children('.row').children('.kq_singer')[0].innerText;

					$('.song-name')[0].innerHTML = "<a>" + song_name + "</a>";
					$('.artist')[0].innerHTML = "<a> -" + singer + "</a>";
					var sid = next.children('.sid')[0].innerText;
					$('.songsid')[0].innerText = sid;
					
					audio = $(player).find('audio')[i - 1];
					length = audio.duration;

					var time = "0" + Math.floor(audio.duration / 60) + ":" + (parseInt(audio.duration%60) < 10 ? '0' + parseInt(audio.duration%60) : parseInt(audio.duration%60));

					$(player).find('.timer-right').text(time);

					
					audio.play();

					interval = setInterval(function(){
						if(!audio.paused){
							updateSeekBar();
						}

						if(audio.ended) {
							clearInterval(interval);
							
							seekBarInner.width(0+"%");
							$(player).find('.timer-left').text("00:00");
							console.log('btn-next');
							nextAutoAudio(i);
						}


					},500);
				}
			});

			// xử lý khi i = 0???????
			$(player).find('.btn-next').on('click',function(){
				i = currenTrack;
				if(i==10) {
					i = 1;
					$('.currentsong10').css('visibility','hidden');
				} else {
					var prevSong = ".currentsong" + i;
					$(prevSong).css('visibility','hidden');
					i++;	
				}
				console.log(i)
				currenTrack = i;

				var button = $(player).find("#play-pause");
				var _button = $(player).find('#player');
				var currentSong = ".currentsong" + i;
				$(currentSong).css('visibility','visible');

				var getContent = "#song" + i;
				console.log(getContent);
				
				var next = $(player).find(getContent);

				if(audio.played || audio.paused) {

					if(audio.paused) {
						audio.currentTime = 0;
						_button.removeClass('play').addClass('pause');
						button.removeClass('play1').addClass('pause1');
						$('#play-pause')[0].innerHTML = "<i class='fa fa-pause' id='pause-song' aria-hidden='true'></i>Tạm dừng";
					} else {
						
						audio.currentTime = 0;
						audio.pause();
						clearInterval(setInterval);
					}

					var song_name = next.children('.layout1_ketqua').children('.ketqua_info').children('.row').children('.kq_name_song')[0].innerText;
					var singer = next.children('.layout1_ketqua').children('.ketqua_info').children('.row').children('.kq_singer')[0].innerText;

					$('.song-name')[0].innerHTML = "<a>" + song_name + "</a>";
					$('.artist')[0].innerHTML = "<a> -" + singer + "</a>";
					var sid = next.children('.sid')[0].innerText;
					$('.songsid')[0].innerText = sid;
					
					audio = $(player).find('audio')[i - 1];
					length = audio.duration;

					var time = "0" + Math.floor(audio.duration / 60) + ":" + (parseInt(audio.duration%60) < 10 ? '0' + parseInt(audio.duration%60) : parseInt(audio.duration%60));

					$(player).find('.timer-right').text(time);

					
					audio.play();

					interval = setInterval(function(){
						if(!audio.paused){
							updateSeekBar();
						}

						if(audio.ended) {
							clearInterval(interval);
							
							seekBarInner.width(0+"%");
							$(player).find('.timer-left').text("00:00");
							console.log('btn-next');
							nextAutoAudio(i);
						}


					},500);
				}
			});

			$(player).find(".one_ketqua").on("click", function(){	

				var title = $(this).attr('value');
				i = title;
				console.log(title);
				console.log(currenTrack);
				var _button = $(player).find('#player');
				var button = $(player).find("#play-pause");

				if(title != currenTrack){
					var prevSong = ".currentsong" + currenTrack;
					console.log(prevSong);
					$(prevSong).css('visibility','hidden');
					currenTrack = title;
					var currentSong = ".currentsong" + currenTrack;
					$(currentSong).css('visibility','visible');

					if(audio.played || audio.paused) {

						if(audio.paused) {
							audio.currentTime = 0;
							_button.removeClass('play').addClass('pause');
							button.removeClass('play1').addClass('pause1');
							$('#play-pause')[0].innerHTML = "<i class='fa fa-pause' id='pause-song' aria-hidden='true'></i>Tạm dừng";
						} else {		
							audio.currentTime = 0;
							audio.pause();
							clearInterval(setInterval);
						}

						var song_name = $(this).children('.layout1_ketqua').children('.ketqua_info').children('.row').children('.kq_name_song')[0].innerText;
						var singer = $(this).children('.layout1_ketqua').children('.ketqua_info').children('.row').children('.kq_singer')[0].innerText;

						$('.song-name')[0].innerHTML = "<a>" + song_name + "</a>";
						$('.artist')[0].innerHTML = "<a> -" + singer + "</a>";
						var sid = $(this).children('.sid')[0].innerText;
						$('.songsid')[0].innerText = sid;
						
						audio = $(player).find('audio')[title - 1];
						length = audio.duration;

						var time = "0" + Math.floor(audio.duration / 60) + ":" + (parseInt(audio.duration%60) < 10 ? '0' + parseInt(audio.duration%60) : parseInt(audio.duration%60));

						$(player).find('.timer-right').text(time);

						
						audio.play();

						interval = setInterval(function(){
							if(!audio.paused){
								updateSeekBar();
							}

							if(audio.ended) {
								clearInterval(interval);
								
								seekBarInner.width(0+"%");
								$(player).find('.timer-left').text("00:00");
								console.log('one_ketqua');
								nextAutoAudio(i);
							}


						},500);
					}
				} else {

					if(button.hasClass('play1')) {
				
						button.removeClass('play1').addClass('pause1');
						$('#play-pause')[0].innerHTML = "<i class='fa fa-pause' id='pause-song' aria-hidden='true'></i>Tạm dừng";
					} else {
						
						button.removeClass('pause1').addClass('play1');
						$('#play-pause')[0].innerHTML = "<i class='fa fa-play' id='play1-song' aria-hidden='true'></i>Nghe bài hát";
						// button.innerHTML = "<i class='fa fa-play' id='play1-song' aria-hidden='true'></i>";
					}
					if(_button.hasClass('play')) {
						_button.removeClass('play').addClass('pause');
						audio.play();

						interval = setInterval(function(){
							if(!audio.paused){
								updateSeekBar();
							}

							if(audio.ended) {
								clearInterval(interval);	
								seekBarInner.width(0+"%");
								$(player).find('.timer-left').text("00:00");
								console.log('one_ketqua');
								nextAutoAudio(i);
							}


						},500);
					} else if(_button.hasClass('pause')) {
						_button.removeClass('pause').addClass('play');
						audio.pause();
						clearInterval(interval);
					}
				}	
			});

			$(player).find("#play-pause").on("click", function() {
				// audio.end();
				var button = $(this);
				var _button = $(player).find('#player');

				i = currenTrack;

				if(button.hasClass('play1')) {
				
					button.removeClass('play1').addClass('pause1');
					$('#play-pause')[0].innerHTML = "<i class='fa fa-pause' id='pause-song' aria-hidden='true'></i>Tạm dừng";
				} else {
					
					button.removeClass('pause1').addClass('play1');
					$('#play-pause')[0].innerHTML = "<i class='fa fa-play' id='play1-song' aria-hidden='true'></i>Nghe bài hát";
					// button.innerHTML = "<i class='fa fa-play' id='play1-song' aria-hidden='true'></i>";
				}
				
				if(_button.hasClass('play')) {
					_button.removeClass('play').addClass('pause');
					audio.play();

					interval = setInterval(function(){
						if(!audio.paused){
							updateSeekBar();
						}

						if(audio.ended) {
							clearInterval(interval);
							
							seekBarInner.width(0+"%");
							$(player).find('.timer-left').text("00:00");
							console.log('click');
							nextAutoAudio(i);
						}


					},500);
				} else if(_button.hasClass('pause')) {
					_button.removeClass('pause').addClass('play');
					audio.pause();
					clearInterval(interval);
				}
			});

			$(player).find(".btn-play").on("click", function() {
				var _button = $(this);
				i = currenTrack;
				console.log(i);

				var button = $(player).find('#play-pause');

				if(button.hasClass('play1')) {
				
					button.removeClass('play1').addClass('pause1');
					$('#play-pause')[0].innerHTML = "<i class='fa fa-pause' id='pause-song' aria-hidden='true'></i>Tạm dừng";
				} else {
					
					button.removeClass('pause1').addClass('play1');
					$('#play-pause')[0].innerHTML = "<i class='fa fa-play' id='play1-song' aria-hidden='true'></i>Nghe bài hát";
					// button.innerHTML = "<i class='fa fa-play' id='play1-song' aria-hidden='true'></i>";
				}
				
				if(_button.hasClass('play')) {
					_button.removeClass('play').addClass('pause');
					audio.play();

					interval = setInterval(function(){
						if(!audio.paused){
							updateSeekBar();
						}

						if(audio.ended) {
							clearInterval(interval);
							
							seekBarInner.width(0+"%");
							$(player).find('.timer-left').text("00:00");
							console.log('click');
							nextAutoAudio(i);
						}


					},500);
				} else if(_button.hasClass('pause')) {
					_button.removeClass('pause').addClass('play');
					audio.pause();
					clearInterval(interval);
				}
			});

			seekBarOuter.on('click', function(e) {
				/* Act on the event */
				if(!audio.ended && length !== undefined) {
					var seePosition = e.pageX - $(seekBarOuter).offset().left;
					if(seePosition >=0 && seePosition < $(seekBarOuter).offset().left) {
						audio.currentTime = (seePosition*audio.duration)/$(seekBarOuter).width();
						updateSeekBar();
					}
				}
			});

			$(player).find('.btn-volume').on('click', function(){
				var stateVolume = $(this);
				if(stateVolume.hasClass('up')){
					stateVolume.removeClass('up').addClass('off');
					audio.muted = true;
				} else {
					stateVolume.removeClass('off').addClass('up');
					audio.muted = false;
				}
			});

			volumeControl.on('click',function(e){
				console.log($(this).offset().top);
				console.log(e.pageY);
				console.log($(this).height());
				var volumePosition =e.pageY - $(this).offset().top ;
				var audioVolume = volumePosition / $(this).height();
				console.log(audioVolume);

				if(audioVolume >= 0 && audioVolume <=0.98){
					audio.muted = false;
					audio.volume = 1- audioVolume;

					$(this).find('.inner-bar-fill').css('height', audioVolume * 100 + "%");
					console.log('aaaaa');
				} else {
					audio.muted=true;
				}

				var stateVolume = $(player).find('.btn-volume');
				if(stateVolume.hasClass('off')){
					stateVolume.removeClass('off').addClass('up');
					audio.muted = false;
				}
			});

			var i = 0;
			var clicking = false;

			volumeControl.on('mousedown',function(event) {
				/* Act on the event */
				clicking = true;
			});

			volumeControl.on('mouseup',function(event) {
				/* Act on the event */
				clicking = false;
			});

			volumeControl.on('mousemove',function(e) {
				/* Act on the event */
				if(clicking === false) return;
				var volumePosition =e.pageY - $(this).offset().top ;
				var audioVolume = volumePosition / $(this).height();

				if(audioVolume >= 0 && audioVolume <=0.98){
					audio.muted = false;
					audio.volume = 1- audioVolume;

					$(this).find('.inner-bar-fill').css('height', audioVolume * 100 + "%");
					console.log('aaaaa');
				} else {
					audio.muted=true;
				}
			});

			var updateSeekBar = function(){
				seekBarPercentage = getPercentage(audio.currentTime.toFixed(0), length.toFixed(0));

				$(seekBarInner).css('width',seekBarPercentage + "%");
				$(handle).css('left',seekBarPercentage + "%");
				//var timeNow;
				var currentSec = "0" + Math.floor(audio.currentTime / 60) + ":" + (parseInt(audio.currentTime%60) < 10 ? '0' + parseInt(audio.currentTime%60) : parseInt(audio.currentTime%60));
				// if((audio.currentTime % 60) >= 10){
				// 	timeNow ="0" +  Math.floor(audio.currentTime / 60) + ":" + (audio.currentTime % 60 ? (audio.currentTime % 60).toFixed(0) : '00');
				// } else if(audio.currentTime == 0) {
				// 	timeNow ="0" +  Math.floor(audio.currentTime / 60) + ":" + (audio.currentTime % 60 ? (audio.currentTime % 60).toFixed(0) : '00');
				// } else {
				// 	timeNow ="0" +  Math.floor(audio.currentTime / 60) + ":" + "0" + (audio.currentTime % 60 ? (audio.currentTime % 60).toFixed(0) : '00');
				// }

				$(player).find('.timer-left').text(currentSec);
			};

			var play = function() {
				audio.play();
			}

			var pause = function() {
				audio.pause();
			}

		});
	var getPercentage = function(presentTime,totalLength){
		var clacPercentage = (presentTime / totalLength) * 100;
		return parseFloat(clacPercentage.toString());
	}
});