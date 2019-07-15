$(document).ready(function() {

	loadInfo();

	function loadInfo() {
		var username = $('.get_username')[0].innerText;
		console.log(username);
		$.ajax({
			url: 'http://localhost:81/MusicWeb/Zonmp3/getInfo',
			type: 'post',
			dataType : 'json',
			data: {
				username : username
			},
			success: function (data) {
				$('.input_AID').val(data[0]['AID']);
				console.log($('#username'));
				$('#username')[0].innerText = data[0]['username'];
				$('#fullname')[0].innerText = data[0]['fullname'];
				if(data[0]['sex'] == 'male')
				{
					$('#sex')[0].innerText = 'Nam';
				}
				else
				{
					$('#sex')[0].innerText = 'Nữ';
				}

				$('center h3')[0].innerText = data[0]['fullname'];
				$('.img-circle').attr('src', 'http://localhost:81/MusicWeb/vendor/Image_User/'+data[0]['avatar']);

				$('.input_username').val(data[0]['username']);
				$('.input_fullname').val(data[0]['fullname']);

				$('.image_info').attr('src', 'http://localhost:81/MusicWeb/vendor/Image_User/'+data[0]['avatar']);
			}
		});
	}
	$(document).on('click', '.csprofile', function(event) {
		event.preventDefault();
		$(this).parent('b.float-right').parent('.card-header').parent('.card-block').parent('.card_if').attr('hidden', 'true');
		$(this).parent('b.float-right').parent('.card-header').parent('.card-block').parent('.card_if').next('.card_cs').removeAttr('hidden');

	});

	$(document).on('click', '.thaydoiinfo', function(event) {
		event.preventDefault();
		var AID = $('.input_AID').val();
		var fullname = $('.input_fullname').val();
		var	avatar = $('.input_avatar').val();
		console.log(avatar);
		var sex = $("input[type='radio']:checked").val();
		if(avatar === '')
		{

		}
		else 
		{
			avatar = avatar.split("\\")[2];
		}

		var password_old = $('.pass_old').val();
		var password_new = $('.pass_new').val();

		if(fullname === '')
		{
			$('.error4')[0].innerText = 'Vui lòng điền trường này';
			$('.error4').removeAttr('hidden');
			$('.input_fullname').focus();
		}
		else
		{

			if(password_old === '' && password_new !== '')
			{
				$('.error1')[0].innerText = 'Vui lòng điền trường này';
				$('.error1').removeAttr('hidden');
				$('.error2').attr('hidden', 'true');
				$('.pass_old').focus();
			}
			else if(password_old !== '' && password_new === '')
			{
				$('.error2')[0].innerText = 'Vui lòng điền trường này';
				$('.error2').removeAttr('hidden');
				$('.error1').attr('hidden', 'true');
				$('.pass_new').focus();
			}
			else if(password_old !== '' && password_new !== '') // rỗng
			{
				$.ajax({
					url: 'http://localhost:81/MusicWeb/Zonmp3/updateInfo',
					type: 'post',
					data: {
						AID : AID,
						fullname : fullname,
						avatar : avatar,
						sex : sex,
						password_new : password_new,
						password_old : password_old
					},
					success: function (data) {
						if(data == 'thanhcong')
						{
							setTimeout(thanhcong,0);
							// window.location = 'http://localhost:81/MusicWeb/Zonmp3/myInfo';
							$('.card_cs').attr('hidden', 'true');
							$('.card_if').removeAttr('hidden');
							loadInfo();
						}
						else if(data == 'kotrungmk')
						{
							$('.error1')[0].innerText = 'Mật khẩu sai';
							$('.error1').removeAttr('hidden');
							$('.error2').attr('hidden', 'true');
							$('.pass_old').focus();
						}
					}
				});
			}
			else if(password_old === '' && password_new === '') // đều có
			{
				if(password_old == password_new)
				{
					$.ajax({
					url: 'http://localhost:81/MusicWeb/Zonmp3/updateInfo',
					type: 'post',
					data: {
						AID : AID,
						fullname : fullname,
						avatar : avatar,
						sex : sex,
						password_new : password_new,
						password_old : password_old
					},
					success: function (data) {
						if(data == 'thanhcong')
						{
							setTimeout(thanhcong,0);
							// window.location = 'http://localhost:81/MusicWeb/Zonmp3/myInfo';
							$('.card_cs').attr('hidden', 'true');
							$('.card_if').removeAttr('hidden');
							loadInfo();
						}
						else if(data == 'kotrungmk')
						{
							$('.error1')[0].innerText = 'Mật khẩu sai';
							$('.error1').removeAttr('hidden');
							$('.error2').attr('hidden', 'true');
							$('.pass_old').focus();
						}

					}
				});
				}
				else
				{
					$('.error2')[0].innerText = 'Mật khẩu không trùng khớp';
					$('.error2').removeAttr('hidden');
					$('.error1').attr('hidden', 'true');
					$('.pass_new').focus();
				}
			}

		}
	});

	var thanhcong = function(){
		$('.chinhsuathongtinthanhcong').addClass('thanhcong');

		setTimeout(function(){
			$('.chinhsuathongtinthanhcong').removeClass('thanhcong');
		}, 1500);
	};

	$(document).on('change', '.input_avatar', function(event) {
		event.preventDefault();
		var image = $(this).val().split("\\")[2];
		var img = "http://localhost:81/MusicWeb/vendor/Image_User/"+image;

		$(this).next('.thongtin').children('.image_info').attr('src', img);

	});

	$(document).on('click', '.quaylai', function(event) {
		event.preventDefault();
		$(this).parent('.card-block').parent('.card_cs').attr('hidden', 'true');
		$(this).parent('.card-block').parent('.card_cs').prev('.card_if').removeAttr('hidden');
		loadInfo();
	});
});