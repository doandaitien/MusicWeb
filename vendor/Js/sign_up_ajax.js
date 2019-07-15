$(document).ready(function() {
	$(document).on('keyup', '#form4', function(event) {
		event.preventDefault();
		$(this).val(xoa_dau($(this).val()));
		var user = $(this).val();
		$.ajax({
			url: 'http://localhost:81/MusicWeb/TrangChu/checkUser',
			type: 'POST',
			dataType: 'json',
			data: {user: user},
			success : function(res) {
				if(res == 1){
					// console.log($('.error3')[0].innerText);
					$('.error4')[0].innerText = 'Trùng username';
					$('.error4').removeAttr('hidden');
				}
				else{
					$('.error4').attr('hidden', 'true');
				}
			}
		})
		
	});

	$(document).on('keyup', '#form6', function(event) {
		event.preventDefault();
		$(this).val(xoa_dau($(this).val()));
	});

	$(document).on('keyup', '#form7', function(event) {
		event.preventDefault();
		$(this).val(xoa_dau($(this).val()));
	});

	$(document).on('keyup', '#form2', function(event) {
		event.preventDefault();
		$(this).val(xoa_dau($(this).val()));
	});

	$(document).on('keyup', '#form3', function(event) {
		event.preventDefault();
		$(this).val(xoa_dau($(this).val()));
	});

	$(document).on('click', '.sign_in', function(event) {
		event.preventDefault();

		if($('#form3').val() === '')
		{
			$('.error1')[0].innerText = 'Vui lòng điền trường này';
			$('.error1').removeAttr('hidden');
			$('#form3').focus();
		}
		else
		{
			if($('#form2').val() === '')
			{
				$('.error2')[0].innerText = 'Vui lòng điền trường này';
				$('.error2').removeAttr('hidden');
				$('#form2').focus();
			}
			else
			{
				var username = $('#form3').val();
				var password = $('#form2').val();
				$.ajax({
						url: 'http://localhost:81/MusicWeb/TrangChu/checkAcc',
						type: 'post',
						data: {
							username : username,
							password : password
						},
						success: function (res) {
							if(res == 'thatbai')
							{
								$('.error3')[0].innerText = 'Sai tài khoản hoặc mật khẩu';
								$('.error3').removeAttr('hidden');
							}
							else if(res == 'user')
							{
								var a = location.href;
								if(a === 'http://localhost:81/MusicWeb/TrangChu')
								{
									window.location = 'http://localhost:81/MusicWeb/Zonmp3';
								}
								else
								{
									console.log('User');
									window.location=a;
								}
								
							}
							else if(res == 'admin')
							{
								console.log('admin');
								window.location="http://localhost:81/MusicWeb/Admin";
							}
						}
					});
			}
		}

	});

	
	




	$(document).on('click', '.sign_up', function(event) {
		event.preventDefault();
		if($('#form4').val() === '')
		{
			$('.error4')[0].innerText = 'Vui lòng điền trường này';
			$('.error4').removeAttr('hidden');
			$('#form4').focus();
		}
		else{
			if($('#form5').val() === '')
			{
				$('.error5')[0].innerText = 'Vui lòng điền trường này';
				$('.error5').removeAttr('hidden');
				$('#form5').focus();
			}
			else
			{
				// console.log($('#form6').val() === '');
				if($('#form6').val() === '')
				{
					$('.error6')[0].innerText = 'Vui lòng điền trường này';
					$('.error6').removeAttr('hidden');
					$('#form6').focus();
				}
				else
				{
					if($('#form7').val() === '')
					{
						$('.error7')[0].innerText = 'Vui lòng điền trường này';
						$('.error7').removeAttr('hidden');
						$('#form7').focus();
					}
					else
					{
						if($('#form6').val() === $('#form7').val())
						{
							if($('.error4')[0]['hidden'] == false)
							{
								$('.error4')[0].innerText = 'Trùng username, vui lòng nhập lại';
								$('.error4').removeAttr('hidden');
								$('#form4').focus();
							}
							else
							{
								var username = $('#form4').val();
								var fullname = $('#form5').val();
								var sex;
								if($(':radio')[0]['checked'] == true){
									sex = 'male';
								}
								else{
									sex = 'female';
								}
								var image = 'person.png';
								var password = $('#form6').val();
								var role = 'user';
								$.ajax({
									url: 'http://localhost:81/MusicWeb/TrangChu/registerAcc',
									type: 'post',
									data: {
										username : username,
										password : password,
										role : role,
										avatar : image,
										sex : sex,
										fullname : fullname
									},
									success: function (res) {
										if(res == 'thanhcong'){
											console.log('thanhcong');
											$('#form_sign_up')[0].reset();
											dongSignUp();
											setTimeout(thanhcong,200);
											moSignIn();
										}

									}
								});
							}
							
						}
						else{
							$('.error7')[0].innerText = 'Mật khẩu không trùng khớp';
							$('.error7').removeAttr('hidden');
							$('#form7').focus();
						}
					}
				}
			}
		}
	});

	


	function xoa_dau(str) {
		str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
		str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
		str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
		str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
		str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
		str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
		str = str.replace(/đ/g, "d");
		str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
		str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
		str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
		str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
		str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
		str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
		str = str.replace(/Đ/g, "D");
		// Gộp nhiều dấu space thành 1 space
		str = str.replace(/\s/g, '');
		return str;
	}

	function dongSignUp() {
		$('#modalSignUp').modal('hide');
	}
	function moSignIn() {
		$('#modalSignIn').modal('show');
	}

	function dongSignIn() {
		$('#modalSignIn').modal('hide');
	}

	

	var thanhcong = function(){
		$('.dangkythanhcong').addClass('thanhcong');

		setTimeout(function(){
			$('.dangkythanhcong').removeClass('thanhcong');
		}, 3000);
	};

	$(document).on('click', '.modal-header', function(event) {
		console.log('aaa');
			dongSignIn();
	});
});