$(document).ready(function() {
	var username = $('.user')[0].innerText;
	$(document).on('click','._1playlist',function(){
		var PID = $(this).children('.pid')[0].innerText;

		$.ajax({
				url: 'http://localhost:81/MusicWeb/Zonmp3/checkPlaylist',
				type: 'post',
				data: {
					PID : PID
				},
				success: function (data) {
					if(Number(data) > 0)
					{
						window.location = "http://localhost:81/MusicWeb/NgheNhac/ngheListMusic/" + PID;
					}
					else
					{
						setTimeout(thanhcong3,0);
					}
				}
			});
		
	});
	$(document).on('click', '.addPl', function(event) {
		event.preventDefault();
		var name_pl = $('.add_tpl').val();
		var img_pl = $('.add_image').val();
		var des_pl = $('.add_mt').val();


		if($('.add_tpl').val() === '')
		{
			$('.error1')[0].innerText = 'Vui lòng điền trường này';
			$('.error1').removeAttr('hidden');
			$('.add_tpl').focus();
		}
		else
		{
			if($('.add_image').val() === ''){

			}
			else
			{
				img_pl = img_pl.split("\\")[2];
			}
			$.ajax({
				url: 'http://localhost:81/MusicWeb/Zonmp3/addInfoPlaylist',
				type: 'post',
				data: {
					name_pl : name_pl,
					img_pl : img_pl,
					des_pl : des_pl,
					username : username
				},
				success: function (data) {
					if(data == 'thanhcong')
					{
						dongThemPl();
						setTimeout(thanhcong,200);
						loadPlaylist();
						$('#formThem').reset();
					}
				}
			});
		}

		
	});

	loadPlaylist();

	function loadPlaylist() {
		$.ajax({
			url: 'http://localhost:81/MusicWeb/Zonmp3/loadPlaylistbyAID',
			type: 'post',
			dataType : 'json',
			data: {
				username : username
			},
			success: function (data) {
				console.log(data);
				console.log(data.length);
				var templale = '';
				for (var i = 0; i < data.length; i++) {
					if(data[i]['image_playlist'] == null)
					{
						console.log('null');
						templale +="<div class='col-6 col-xs-6 col-sm-6 col-md-4 col-lg-3 _1playlist'>"
								+"<div class='pid' hidden='true'>"
								+ data[i]['PID']
								+"</div>"
								+"<img src='http://localhost:81/MusicWeb/vendor/Image_playlist/album_default.png"
								+"' alt='' width='100%'>"
								+"<div class='icon-play'>"
								+"<i class='fa fa-play-circle-o' aria-hidden='true'></i>"
								+"</div>"
								+"<div class='td_pl'>"
								+ data[i]['playlist_name']
								+"</div>"
								+"<div class='chinhsua' data-target='#mycsPlaylist' data-toggle='modal'>"
								+"<i class='fa fa-pencil' aria-hidden='true'></i>"
								+"</div>"
								+"<div class='xoa'>"
								+"<i class='fa fa-times' aria-hidden='true'></i>"
								+"</div>"
								+"</div>";
					}
					else
					{
						console.log('ko null');
						templale +="<div class='col-6 col-xs-6 col-sm-6 col-md-4 col-lg-3 _1playlist'>"
								+"<div class='pid' hidden='true'>"
								+ data[i]['PID']
								+"</div>"
								+"<img src='http://localhost:81/MusicWeb/vendor/Image_playlist/"
								+ data[i]['image_playlist']
								+"' alt='' width='100%'>"
								+"<div class='icon-play'>"
								+"<i class='fa fa-play-circle-o' aria-hidden='true'></i>"
								+"</div>"
								+"<div class='td_pl'>"
								+ data[i]['playlist_name']
								+"</div>"
								+"<div class='chinhsua' data-target='#mycsPlaylist' data-toggle='modal'>"
								+"<i class='fa fa-pencil' aria-hidden='true'></i>"
								+"</div>"
								+"<div class='xoa'>"
								+"<i class='fa fa-times' aria-hidden='true'></i>"
								+"</div>"
								+"</div>";
					}
				}

				$('.playlist_list .row').html(templale);
			}
		});
	}


	var thanhcong = function(){
		$('.themplthanhcong').addClass('thanhcong');

		setTimeout(function(){
			$('.themplthanhcong').removeClass('thanhcong');
		}, 1500);
	};
	var thanhcong1 = function(){
		$('.chinhsuaplthanhcong').addClass('thanhcong');

		setTimeout(function(){
			$('.chinhsuaplthanhcong').removeClass('thanhcong');
		}, 1500);
	};

	var thanhcong2 = function(){
		$('.xoaplthanhcong').addClass('thanhcong');

		setTimeout(function(){
			$('.xoaplthanhcong').removeClass('thanhcong');
		}, 1500);
	};

	var thanhcong3 = function(){
		$('.emptyplaylist').addClass('thanhcong');

		setTimeout(function(){
			$('.emptyplaylist').removeClass('thanhcong');
		}, 1500);
	};

	

	
	



	$(document).on('click', '.bhmoi', function(event) {
		event.preventDefault();
		$('#modalThem').modal('hide');
	});

	function dongThemPl(argument) {
		$('#modalThem').modal('hide');
	}	

	function dongChinhSuaPl(argument) {
		$('#mycsPlaylist').modal('hide');
	}	

	



	$(document).on('click', '.chinhsua', function(event) {
		event.preventDefault();
		var pid = Number($(this).parent('._1playlist').find('.pid')[0].innerText);
		$('.pid_edit').val(pid);

		$.ajax({
				url: 'http://localhost:81/MusicWeb/Zonmp3/getInfoPlaylist',
				type: 'post',
				dataType : 'json',
				data: {
					pid : pid
				},
				success: function (data) {
					console.log(data);
					console.log(data.length);
					var playlist_name = data[0]['playlist_name'];
					var image_playlist = data[0]['image_playlist'];
					var mota_playlist = data[0]['mota_playlist'];
					$('.edit_name').val(playlist_name);
					if(image_playlist == null)
					{
						$('.image_playlist').val();
						$('.img_bd').attr('src', 'http://localhost:81/MusicWeb/vendor/Image_playlist/album_default.png');
					}
					else
					{
						$('.img_bd').attr('src', "http://localhost:81/MusicWeb/vendor/Image_playlist/"+image_playlist);
					}

					$('.edit_mt').val(mota_playlist);
				}
			});
	});


	$(document).on('change', '.edit_image', function(event) {
		event.preventDefault();

		var img = $(this).val();
		img = img.split('\\')[2];
		$('.img_bd').attr('src', "http://localhost:81/MusicWeb/vendor/Image_playlist/"+img);


	});

	$(document).on('click', '.editPl', function(event) {
		event.preventDefault();
		var edit_name = $('.edit_name').val();
		var edit_img = $('.edit_image').val();
		var edit_mt = $('.edit_mt').val();
		var edit_pid = $('.pid_edit').val();

		if(edit_name === '')
		{
			$('.error2')[0].innerText = 'Vui lòng điền trường này';
			$('.error2').removeAttr('hidden');
			$('.edit_name').focus();
		}
		else
		{
			if(edit_img === '')
			{

			}
			else
			{
				edit_img = edit_img.split("\\")[2];
			}

			$.ajax({
					url: 'http://localhost:81/MusicWeb/Zonmp3/editPlaylist',
					type: 'post',
					data: {
						edit_name : edit_name,
						edit_img : edit_img,
						edit_mt : edit_mt,
						edit_pid : edit_pid
					},
					success: function (data) {
						if(data == 'thanhcong')
						{
							dongChinhSuaPl();
							setTimeout(thanhcong1,200);
							loadPlaylist();
							$('#formCs')[0].reset();
						}
					}
				});
		}

	});


	$(document).on('click', '.xoa i', function(event) {
		event.stopPropagation();
		var pid = Number($(this).parent('.xoa').parent('._1playlist').find('.pid')[0].innerText);

		$.ajax({
				url: 'http://localhost:81/MusicWeb/Zonmp3/deletePlaylist',
				type: 'post',
				data: {
					pid : pid
				},
				success: function (data) {
					if(data == 'thanhcong')
					{
						setTimeout(thanhcong2,0);
						loadPlaylist();

					}
				}
			});
	});

});