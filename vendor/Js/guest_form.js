$(document).ready(function() {
	console.log('AAAAAAAaa');

	$(document).on('click', '.one_song_top', function(){

		var link = $(this).children('.sid')[0].innerText;
		window.location="http://localhost:81/MusicWeb/NgheNhac/ngheNhac/" + link;
	});

	$(document).on('click', '.layout1_bhm', function(){

		var link = $(this).children('.sidlatest')[0].innerText;
		window.location="http://localhost:81/MusicWeb/NgheNhac/ngheNhac/" + link;
	});

	$(document).on('click', '.lo2_bhm_chitiet i', function(event) {
		event.preventDefault();
		console.log($(this).parent('.lo2_bhm_chitiet').parent('.layout2_bhm').prev('.layout1_bhm').children('.sidlatest'));
		var link = $(this).parent('.lo2_bhm_chitiet').parent('.layout2_bhm').prev('.layout1_bhm').children('.sidlatest')[0].innerText;
		window.location="http://localhost:81/MusicWeb/NgheNhac/ngheNhac/" + link;
	});
	$(document).on('click', '.zonchart', function(){
		window.location="http://localhost:81/MusicWeb/NgheNhac/phatTop10";
	});

	$(document).on('click', '.newsong', function(){
		window.location="http://localhost:81/MusicWeb/NgheNhac/phatMoiNhat";
	});

	$(window).resize(function(event) {
    	var window_width = $(this).width();
    	console.log(window_width);
    	if(window_width <= 992){
    		$('.list_right').attr('hidden', 'true');
		}
		else{
			$('.list_right').removeAttr('hidden','true');
		}
    });
});