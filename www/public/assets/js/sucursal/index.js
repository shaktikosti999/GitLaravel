$(document).ready(function(){
	$('.activo').on('change', function(){
		id=parseInt($(this).attr('data'));
		$.ajax({
			url:'/administrador/estatus/sucursal.html',
			type:'POST',
			data:{
				id:id
			},
			success:function(data){
				console.log(data);
			}
		});
	});

	$('.game_btn').on('click', function(){
		var context = $(this);
		var id = parseInt($(this).attr('data-id'));
		$.ajax({
			url:'/administrador/juego.html',
			type:'post',
			data:{
				_method:'post',
				sucursal:id,
			},
			success:function(data){
				data = JSON.parse(data);
				$('#add_sucursal').val(context.attr('data-id'));
				$('#nombre_sucursal').text(context.attr('data-sucname'));
				if(data.length > 0){
					// $('#game_list').append()
				}
				$('#myModal').modal('show');
			}
		});
	});

});