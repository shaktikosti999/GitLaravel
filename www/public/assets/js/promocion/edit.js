$(document).ready(function(){
	$('.img_promocion').on('click', function(){
		$('#imagen').click();
	});
	$('#imagen').on('change',function(evt){
 		$('.img_promocion').attr('src', URL.createObjectURL(evt.target.files[0]));
 	});
});