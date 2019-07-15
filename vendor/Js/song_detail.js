$(document).ready(function() {

	$('.comment').on('click', function(){
		$("body,html").animate({scrollTop:$('#comment').offset().top},2000,"easeInOutExpo");
 	 	return false;
	});

	$(document).on('click','.song-name', function(){
		var link = $(this).prev('.songsid')[0].innerText;
		window.location="http://localhost:81/MusicWeb/NgheNhac/ngheNhac/" + link;
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

	$(document).on('click','#button-commit',function(){
		var comment = $('#main-text-comment').val();
		var sid = $('.sid-main')[0].innerText;
		var aid = 7;
		var numbercomment = Number($('.countComment')[0].innerText);

		console.log(comment);

		if(comment != "") {
			$.ajax({
				url: 'http://localhost:81/MusicWeb/NgheNhac/themBinhLuan',
				type: 'POST',
				dataType: 'json',
				data: {content: comment,
						SID: sid,
						AID: aid
				},
				success: function(result)
				{
					console.log(result);
					var template = '';
					
					for(var i = 0; i < result.length; i++){
						template += "<li class='comment-item'>"
						+ "<p class='medium-circle-card comment-avatar'>"
						+ "<img src='http://localhost:81/MusicWeb/vendor/Image_User/" + result[i]['avatar']
						+ "' alt='' class='rounded-circle' style='width: 50px; height: 50px;'>"
						+ "</p>" + "<div class='post-comment'>"
						+ "<p class='username'>"
						+ result[i]['username']
						+ "</p>" + "<p class='content'>" 
						+ result[i]['content'] + "</p>"
						+ "</div>" + "</li>";
					}

					$('.list-comment').html(template);
					document.getElementById('main-text-comment').value = "";
					$('.countComment')[0].innerText = numbercomment + 1;
				}
			})
		}
		
	});

	$('.delete').on('click', function(){
		document.getElementById('main-text-comment').value = "";
		console.log('aaaaa');
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
			var i = 0;
			var flag = false;
			var currenTrack = 0;
			var audio = $(player).find('audio')[0];
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
				if(i == 10) {
					i = 0;
				} else {
					++i;
				}

				console.log('nextauto');
				console.log(i);
				// $(player).find('audio')[i];

				currenTrack = i;
				var _button = $(player).find('#player');
				var button = $(player).find("#play-pause");

				if(i != 0) {
					var getContent = "#song" + i;
					console.log(getContent);
					
					var next = $(player).find(getContent);
					if(flag == false) {	
						
						button.removeClass('pause1').addClass('play1');
						$('#play-pause')[0].innerHTML = "<i class='fa fa-play' id='play1-song' aria-hidden='true'></i>Nghe bài hát";
						flag = true;
					}

					if(audio.played || audio.paused) {

						if(audio.paused) {
							audio.currentTime = 0;
							_button.removeClass('play').addClass('pause');
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
						
						audio = $(player).find('audio')[i];
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
								console.log('nextAutoAudio');
								nextAutoAudio(i);
							}


						},500);
					} 
				} else {
					if(audio.played || audio.paused) {

						if(audio.paused) {
							audio.currentTime = 0;
							_button.removeClass('play').addClass('pause');
						} else {
							audio.pause();
							audio.currentTime = 0;

						}
						clearInterval(setInterval);						
						currenTrack = 0;
						flag = false;
						button.removeClass('play1').addClass('pause1');
						$('#play-pause')[0].innerHTML = "<i class='fa fa-pause' id='pause-song' aria-hidden='true'></i>Tạm dừng";
						audio = $(player).find('audio')[currenTrack];
						length = audio.duration;
						console.log(audio.currentTime);
						var time = "0" + Math.floor(length / 60) + ":" + (length % 60 ? (length % 60).toFixed(0) : '00');
						console.log(time);

						$(player).find('.timer-right').text(time);

						var name = $('#name-song-main')[0].innerText;	
						$('.song-name')[0].innerHTML = "<a>" + name + "</a>";
						var singer = $('#artist-name-main')[0].innerText;
						$('.artist')[0].innerHTML = "<a> -" + singer + "</a>";


						audio.play();

						interval = setInterval(function(){
							if(!audio.paused){
								updateSeekBar();
							}

							if(audio.ended) {
								clearInterval(interval);
								
								console.log('nextAutoAudio');
								seekBarInner.width(0+"%");
								$(player).find('.timer-left').text("00:00");
								nextAutoAudio(i);
							}


						},500);
					}
				}
			} 

			$(player).find('.btn-previous').on('click',function(){
				i = currenTrack;
				if(i > 0){
					i--;
					console.log(i);
				} else {
					i = 10;
				}

				currenTrack = i;
				var _button = $(player).find('#player');
				var button = $(player).find("#play-pause");

				if(i != 0) {
					var getContent = "#song" + i;
					console.log(getContent);

					
					var next = $(player).find(getContent);

					if(button.hasClass('pause1')) {	
						button.removeClass('pause1').addClass('play1');
						$('#play-pause')[0].innerHTML = "<i class='fa fa-play' id='play1-song' aria-hidden='true'></i>Nghe bài hát";
						flag = true;
					}

					if(audio.played || audio.paused) {

						if(audio.paused) {
							audio.currentTime = 0;
							_button.removeClass('play').addClass('pause');
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
						
						audio = $(player).find('audio')[i];
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
								console.log('btn-previous');
								nextAutoAudio(i);
							}


						},500);
					}
				} else {
					if(audio.played || audio.paused) {

						if(audio.paused) {
							audio.currentTime = 0;
							_button.removeClass('play').addClass('pause');
						} else {
							audio.pause();
							audio.currentTime = 0;

						}
						clearInterval(setInterval);						
						currenTrack = 0;
						flag = false;
						button.removeClass('play1').addClass('pause1');
						$('#play-pause')[0].innerHTML = "<i class='fa fa-pause' id='pause-song' aria-hidden='true'></i>Tạm dừng";
						audio = $(player).find('audio')[currenTrack];
						length = audio.duration;
						console.log(audio.currentTime);
						var time = "0" + Math.floor(length / 60) + ":" + (length % 60 ? (length % 60).toFixed(0) : '00');
						console.log(time);

						$(player).find('.timer-right').text(time);

						var name = $('#name-song-main')[0].innerText;	
						$('.song-name')[0].innerHTML = "<a>" + name + "</a>";
						var singer = $('#artist-name-main')[0].innerText;
						$('.artist')[0].innerHTML = "<a> -" + singer + "</a>";

						audio.play();

						interval = setInterval(function(){
							if(!audio.paused){
								updateSeekBar();
							}

							if(audio.ended) {
								clearInterval(interval);
								
								console.log('btn-previous');
								seekBarInner.width(0+"%");
								$(player).find('.timer-left').text("00:00");
								nextAutoAudio(i);
							}


						},500);
					}
				}
			});

			// xử lý khi i = 0???????
			$(player).find('.btn-next').on('click',function(){
				 i = currenTrack;
				if(i==10) {
					i = 0;
				} else {
					i++;
					
				}
				console.log(i)
				currenTrack = i;

				var button = $(player).find("#play-pause");
				var _button = $(player).find('#player');
				

				if(i != 0) {
					var getContent = "#song" + i;
					console.log(getContent);
					
					var next = $(player).find(getContent);
					if(flag == false) {	
						
						button.removeClass('pause1').addClass('play1');
						$('#play-pause')[0].innerHTML = "<i class='fa fa-play' id='play1-song' aria-hidden='true'></i>Nghe bài hát";
						flag = true;
					}

					if(audio.played || audio.paused) {

						if(audio.paused) {
							audio.currentTime = 0;
							_button.removeClass('play').addClass('pause');
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
						
						audio = $(player).find('audio')[i];
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
				} else {
					if(audio.played || audio.paused) {

						if(audio.paused) {
							audio.currentTime = 0;
							_button.removeClass('play').addClass('pause');
						} else {
							audio.pause();
							audio.currentTime = 0;

						}
						clearInterval(setInterval);						
						currenTrack = 0;
						flag = false;
						button.removeClass('play1').addClass('pause1');
						$('#play-pause')[0].innerHTML = "<i class='fa fa-pause' id='pause-song' aria-hidden='true'></i>Tạm dừng";
						audio = $(player).find('audio')[currenTrack];
						length = audio.duration;
						console.log(audio.currentTime);
						var time = "0" + Math.floor(length / 60) + ":" + (length % 60 ? (length % 60).toFixed(0) : '00');
						console.log(time);

						$(player).find('.timer-right').text(time);

						var name = $('#name-song-main')[0].innerText;	
						$('.song-name')[0].innerHTML = "<a>" + name + "</a>";
						var singer = $('#artist-name-main')[0].innerText;
						$('.artist')[0].innerHTML = "<a> -" + singer + "</a>";

						audio.play();

						interval = setInterval(function(){
							if(!audio.paused){
								updateSeekBar();
							}

							if(audio.ended) {
								clearInterval(interval);
								
								console.log('btn-next');
								seekBarInner.width(0+"%");
								$(player).find('.timer-left').text("00:00");
								nextAutoAudio(i);
							}


						},500);
					}
				}
			});

			$(player).find(".one_ketqua").on("click", function(){	

				var title = $(this).attr('value');
				console.log(title);
				i = title;
				var _button = $(player).find('#player');
				var button = $(player).find("#play-pause");

				if(title != currenTrack){
					currenTrack = title;
					if(flag == false) {
						button.removeClass('pause1').addClass('play1');
						$('#play-pause')[0].innerHTML = "<i class='fa fa-play' id='play1-song' aria-hidden='true'></i>Nghe bài hát";
						flag = true;
					}

					if(audio.played || audio.paused) {

						if(audio.paused) {
							audio.currentTime = 0;
							_button.removeClass('play').addClass('pause');
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
						
						audio = $(player).find('audio')[title];
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
				i=0;

				if(currenTrack == 0) {
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
								
								console.log('play-pause');
								seekBarInner.width(0+"%");
								$(player).find('.timer-left').text("00:00");
								nextAutoAudio(i);
							}


						},500);
					} else if(_button.hasClass('pause')) {
						_button.removeClass('pause').addClass('play');
						audio.pause();
					}
				} else {
					if(audio.played || audio.paused) {

						if(audio.paused) {
							audio.currentTime = 0;
							_button.removeClass('play').addClass('pause');
						} else {
							audio.pause();
							audio.currentTime = 0;

						}
						clearInterval(setInterval);						
						currenTrack = 0;
						flag = false;
						button.removeClass('play1').addClass('pause1');
						$('#play-pause')[0].innerHTML = "<i class='fa fa-pause' id='pause-song' aria-hidden='true'></i>Tạm dừng";
						audio = $(player).find('audio')[currenTrack];
						length = audio.duration;
						console.log(audio.currentTime);
						var time = "0" + Math.floor(length / 60) + ":" + (length % 60 ? (length % 60).toFixed(0) : '00');
						console.log(time);

						$(player).find('.timer-right').text(time);

						var name = $('#name-song-main')[0].innerText;	
						$('.song-name')[0].innerHTML = "<a>" + name + "</a>";
						var singer = $('#artist-name-main')[0].innerText;
						$('.artist')[0].innerHTML = "<a> -" + singer + "</a>";

						audio.play();

						interval = setInterval(function(){
							if(!audio.paused){
								updateSeekBar();
							}

							if(audio.ended) {
								clearInterval(interval);
								
								console.log('play-pause');
								seekBarInner.width(0+"%");
								$(player).find('.timer-left').text("00:00");
								nextAutoAudio(i);
							}


						},500);
					}
				}
			});

			$(player).find(".btn-play").on("click", function() {
				var _button = $(this);
				i = currenTrack;
				console.log(i);

				var button = $(player).find('#play-pause');

				if(flag == false) {
					if(button.hasClass('play1')) {
					
						button.removeClass('play1').addClass('pause1');
						$('#play-pause')[0].innerHTML = "<i class='fa fa-pause' id='pause-song' aria-hidden='true'></i>Tạm dừng";
					} else {
						
						button.removeClass('pause1').addClass('play1');
						$('#play-pause')[0].innerHTML = "<i class='fa fa-play' id='play1-song' aria-hidden='true'></i>Nghe bài hát";
						// button.innerHTML = "<i class='fa fa-play' id='play1-song' aria-hidden='true'></i>";
					}
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