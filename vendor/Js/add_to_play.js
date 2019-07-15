$(document).ready(function() {
	var username = $('.user')[0].innerText;
	$(document).on('click', '.add_a', function(event) {
		event.preventDefault();
		$(this).attr('hidden', 'true');
		$(this).next('.form_add_playlist').removeAttr('hidden');
	});
	$(document).on('click', '.add_pl', function(event) {
		event.preventDefault();
		// var AID = Number($('#AID')[0].innerText);
		var username = $('.user')[0].innerText;
		var name_pl = $(this).prev('.input_add_pl').val();
		var parent = $(this).parent('.form_add_playlist');
		var prev = $(this).parent('.form_add_playlist').prev('.add_a');

		$.ajax({
			url: 'http://localhost:81/MusicWeb/Zonmp3/addPlaylist',
			type: 'post',
			data: {
				username : username,
				name_pl : name_pl
			},
			success: function (data) {
				var template1 = '';
				setTimeout(thanhcong,200);
				template1 +="<li>"
				+"<div class='dropdown-item'>"
				+"<i class='fa fa-music' aria-hidden='true' style='float: left;'>"
				+"</i>"
				+"<div class='title'>"
				+"<span>"
				+ name_pl
				+"</span>"
				+"</div>"
				+"<div class='PID' hidden='true'>"
				+ data
				+"</div>"
				+"</div>"
				+"</li>";

				$('.modal_body_ul').prepend(template1);

				$('.input_add_pl').val('');
				$(parent).attr('hidden', 'true');
				$(prev).removeAttr('hidden');

			}
		});

	});

	

	$.ajax({
		url: 'http://localhost:81/MusicWeb/Zonmp3/loadPlaylist',
		type: 'post',
		dataType : 'json',
		data: {
			username : username
		},
		success: function (data) {
			var length = data.length;
			
			var template = '';
			for (var i = 0; i < length; i++) {
				template +="<li>"
				+"<div class='dropdown-item'>"
				+"<i class='fa fa-music' aria-hidden='true' style='float: left;'>"
				+"</i>"
				+"<div class='title'>"
				+"<span>"
				+ data[i]['playlist_name']
				+"</span>"
				+"</div>"
				+"<div class='PID' hidden='true'>"
				+ data[i]['PID']
				+"</div>"
				+"</div>"
				+"</li>";		
			}

			$('.modal_body_ul').html(template);
		}
	});


	var thanhcong = function(){
		$('.themplthanhcong').addClass('thanhcong');

		setTimeout(function(){
			$('.themplthanhcong').removeClass('thanhcong');
		}, 1500);
	};


	var thanhcong1 = function(){
		$('.baihattrung').addClass('thanhcong');

		setTimeout(function(){
			$('.baihattrung').removeClass('thanhcong');
		}, 1500);
	};

	var thanhcong2 = function(){
		$('.themvaoplthanhcong').addClass('thanhcong');

		setTimeout(function(){
			$('.themvaoplthanhcong').removeClass('thanhcong');
		}, 1500);
	};

	
	

	$(document).on('click', '.modal_body_ul li', function(event) {
		event.preventDefault();
		var sid = $(this).parent('.modal_body_ul').parent('.modal-body').prev('.modal-header').find('.sid_pl')[0].innerText;
		var name_song = $(this).parent('.modal_body_ul').parent('.modal-body').prev('.modal-header').find('.name_song_pl')[0].innerText;
		var playlist_name = $(this).children('.dropdown-item').children('.title').children('span')[0].innerText;
		var pid = $(this).children('.dropdown-item').children('.PID')[0].innerText;
		$('.tvpltc b')[0].innerText = "\""+name_song+"\"";
		$.ajax({
			url: 'http://localhost:81/MusicWeb/Zonmp3/addSongToPlaylist',
			type: 'post',
			data: {
				sid : sid,
				playlist_name : playlist_name,
				pid : pid
			},
			success: function (data) {
				dongModalPlaylist();
				if(data == 'trung')
				{
					console.log('trùng rồi');
					setTimeout(thanhcong1,200);
				}
				else if(data == 'thanhcong')
				{
					console.log('thành công r');
					setTimeout(thanhcong2,200);
				}
				else
				{
					console.log('Thất bại hoàn toàn');
				}
			}
		});
	});

	$(document).on('click', '.add_to_pl', function(event) {
		event.preventDefault();

		var SID = $(this).prev('.SID')[0].innerText;
		var name_song = $(this).parent('.lo2_bhm_add').parent('.layout2_bhm').prev('.layout1_bhm').find('.bhm_name_song')[0].innerText;
		var singer = $(this).parent('.lo2_bhm_add').parent('.layout2_bhm').prev('.layout1_bhm').find('.bhm_singer')[0].innerText;
		var avt = $(this).parent('.lo2_bhm_add').parent('.layout2_bhm').prev('.layout1_bhm').find('.bhm_img img')[0]['src'];

		$('.img_pl').attr('src', avt);
		$('.name_song_pl')[0].innerText = name_song;
		$('.singer_pl')[0].innerText = singer;
		$('.sid_pl')[0].innerText = SID;


	});

	$(document).on('click', '.add_to_pl1', function(event) {
		event.preventDefault();

		var SID = $(this).parent('.layout2_ketqua').prev('.layout1_ketqua').find('.sid')[0].innerText;
		var name_song = $(this).parent('.layout2_ketqua').prev('.layout1_ketqua').find('.kq_name_song')[0].innerText;

		var singer = $(this).parent('.layout2_ketqua').prev('.layout1_ketqua').find('.kq_singer')[0].innerText;
		var avt = $(this).parent('.layout2_ketqua').prev('.layout1_ketqua').find('.img-responsive')[0]['src'];

		$('.img_pl').attr('src', avt);
		$('.name_song_pl')[0].innerText = name_song;
		$('.singer_pl')[0].innerText = singer;
		$('.sid_pl')[0].innerText = SID;


	});

	


	$(document).on('click', '.addList', function(event) {
		event.preventDefault();
		var SID = $('.sid-main')[0].innerText;
		var name_song = $('#name-song-main')[0].innerText;
		var singer = $('#artist-name-main a')[0].innerText;
		var avt = $('.medium-card-11 img')[0]['src'];

		$('.img_pl').attr('src', avt);
		$('.name_song_pl')[0].innerText = name_song;
		$('.singer_pl')[0].innerText = singer;
		$('.sid_pl')[0].innerText = SID;
	});



	function dongModalPlaylist() {
		$('#myModal').modal('hide');
	}
	

});