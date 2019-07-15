$(document).ready(function() {
	var trangthai="trangthai1";
	window.addEventListener("scroll",function(){
        var chieucao = pageYOffset;
        if(chieucao > 0){
            if(trangthai=="trangthai1")
            {
                $('.myNav').addClass('fixed-top');
                $('.logo').attr('width', '50px');
                trangthai="trangthai2";
            }
        }
        else{
            if(trangthai=="trangthai2")
            {
 				$('.myNav').removeClass('fixed-top');
 				$('.logo').attr('width', '100px');
                trangthai="trangthai1";
            }
        }
    })
});