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
				console.log(data);
				data = JSON.parse(data);
				$('#add_sucursal').val(context.attr('data-id'));
				$('#nombre_sucursal').text(context.attr('data-sucname'));
				if(data.length > 0){
					$('#game_list').html('');
					$.each(data, function(index,val){
						$('#game_list').append('\
							<li class="list-group-item">' + val.juego + '\
								<span class="btn btn-default badge" onClick="game_delete(' + val.id_juego + ',' + id + ')">\
									<i class="fa fa-trash" aria-hidden="true"></i>\
								</span>\
								<span class="btn btn-default badge" onClick="game_edit(' + val.id_juego + ',' + id + ')">\
									<i class="fa fa-pencil" aria-hidden="true"></i>\
								</span>\
							</li>');
					});
					// $('#game_list').append()
				}
				$('#myModal').modal('show');
			}
		});
	});
	
	game_edit = function(id,sucursal){
		$.ajax({
			url:'/administrador/juego.html',
			type:'post',
			data:{
				_method:'patch',
				sucursal:sucursal,
				id:id

			},
			success:function(data){
				if(data != ""){
					data = JSON.parse(data);
					$('#add_desc').text(data.descripcion);
					$('#add_link').val(data.link);
					$('#add_juego').val(id);
					$('#add_disp').val(data.disponibles);
					$('#add_apuesta').val(data.apuesta_minima);
					$('#add_acumulado').val(data.acumulado);
					$('#add_pagado').val(data.pagado);

					$('#add_imagen').attr('src',data.archivo);
					$('#add_juego').attr('readonly',true);
					$('#modal_form').attr('action','/administrador/modificar/juego.html');
					$('#game_list').hide();
					$('#add_imagen').parent().parent().show();
					$('[type="submit"]').val('Modificar');
				}
			}
		});
	}

	game_delete = function(id,sucursal){
		$('#myModal').modal('hide');
		if( confirm('¿Eliminar elemento?') ){
			$.ajax({
				url:'/administrador/juego.html',
				type:'post',
				data:{
					_method:'delete',
					id_sucursal:sucursal,
					id_juego:id
				},
				success:function(){
					location.reload();
				}
			});
		}
	}

	$('#myModal').on('hidden.bs.modal', function(){
		$('#add_desc').text('');
		$('#add_link').val('');
		$('#add_juego').val($('#add_juego').children().val());
		$('#add_disp').val('');
		$('#add_apuesta').val('');
		$('#add_acumulado').val('');
		$('#add_pagado').val('');

		$('#add_imagen').attr('src','');
		$('#add_juego').attr('readonly',false);
		$('#modal_form').attr('action','/administrador/agregar/juego.html');
		$('#game_list').show();
		$('#add_imagen').parent().parent().hide();
		$('[type="submit"]').val('Agregar');
	});
});