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

	$('.promocion_btn').on('click', function(){
		var context = $(this);
		var id = parseInt($(this).attr('data-id'));
		$.ajax({
			url:'/administrador/promocion.html',
			type:'post',
			data:{
				_method:'post',
				promocion:id,
			},
			success:function(data){
				data = JSON.parse(data);
				$('#add_promocion').val(context.attr('data-id'));
				$('#nombre_sucursal').text(context.attr('data-promoname'));
				if(data.length > 0){
					$('#promo_list').html('');
					$.each(data, function(index,val){
						$('#add_sucursal>option[value="' + val.id_sucursal + '"]').attr('disabled',true);
						$('#promo_list').append('\
							<li class="list-group-item">' + val.nombre + '\
								<span class="btn btn-default badge" onClick="game_delete(' + val.id_sucursal + ',' + id + ')">\
									<i class="fa fa-trash" aria-hidden="true"></i>\
								</span>\
								<span class="btn btn-default badge" onClick="game_edit(' + val.id_sucursal + ',' + id + ')">\
									<i class="fa fa-pencil" aria-hidden="true"></i>\
								</span>\
							</li>');
					});
					// $('#promo_list').append()
				}
				$('#myModal').modal('show');
			}
		});
	});
	
	game_edit = function(sucursal,promocion){
		$.ajax({
			url:'/administrador/promocion.html',
			type:'post',
			data:{
				_method:'patch',
				promocion:promocion,
				sucursal:sucursal

			},
			success:function(data){
				if(data != ""){
					data = JSON.parse(data);
					data = data[0];
					$('#add_desc').text(data.descripcion);
					$('#add_link').val(data.link);
					$('#add_sucursal>option').attr('disabled',false);
					$('#add_sucursal>option').hide();
					$('#add_sucursal').val(sucursal);

					$('#add_imagen').attr('src',data.archivo);
					$('#add_sucursal').attr('readonly',true);
					$('#modal_form').attr('action','/administrador/modificar/promocion.html');
					$('#promo_list').hide();
					$('#add_imagen').parent().parent().show();
					$('[type="submit"]').val('Modificar');
				}
			}
		});
	}

	game_delete = function(sucursal,promocion){
		$('#myModal').modal('hide');
		if( confirm('¿Eliminar elemento?') ){
			$.ajax({
				url:'/administrador/promocion.html',
				type:'post',
				data:{
					_method:'delete',
					id_sucursal:sucursal,
					id_promocion:promocion
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
		$('#add_sucursal>option').attr('disabled',false);
		$('#add_sucursal>option').show();
		$('#add_sucursal').val($('#add_sucursal').children().val());

		$('#add_imagen').attr('src','');
		$('#add_sucursal').attr('readonly',false);
		$('#modal_form').attr('action','/administrador/agregar/promocion.html');
		$('#promo_list').show();
		$('#add_imagen').parent().parent().hide();
		$('[type="submit"]').val('Agregar');
	});
});