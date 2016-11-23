 $(document).on('ready', function(){

	// $('.select_linea_de_juegos').dropdown();

	$('.modal_linea').on('click', function(){
		$('.select_linea_de_juegos').val($(this).attr('data-href')).trigger('change');
		$('#establecimiento_go').attr('href',$(this).attr('data-href'));
		$('[name="linea_ciudad"]').html('<option value=""> Seleccione una opción </option>');
		$('[name="linea_sucursal"]').html('<option value=""> Seleccione una opción </option>');
		$('[name="linea_ciudad"]').parent().dropdown('update');
		$('[name="linea_sucursal"]').parent().dropdown('update');
		$('.modal_establecimiento').fadeIn();
	});

	$('.select_linea_de_juegos').on('change', function(){
		var url_str = $('[name="lineas_de_juego"]>option:contains("' + $(this).parent().children()[1].innerText + '")').val();
		var id_get = $('[name="lineas_de_juego"]>option:contains("' + $(this).parent().children()[1].innerText + '")').attr('data-id');
		option_data(id_get,'/ciudades_sucursal',$('[name="linea_ciudad"]'));
		$('#establecimiento_go').attr('href',url_str);
	});

	$('.select_ciudad').on('change', function(){
		var id_get = $('[name="linea_ciudad"]>option:contains("' + $(this).parent().children()[1].innerText + '")').val();
		option_data(id_get,'/sucursales',$('[name="linea_sucursal"]'));
	});

	$('.select_linea_sucursal').on('change', function(){
		var url_str = $('[name="linea_sucursal"]>option:contains("' + $(this).parent().children()[1].innerText + '")').val();
		console.log($(this).parent().children()[1].innerText);
		$('#establecimiento_go').attr('data-sucursal',url_str);
	});

	$('#establecimiento_go').on('click', function(){
		$(this).attr('href',$(this).attr('href') + "/" + $(this).attr('data-sucursal'));
	});

	$('.modal_establecimiento_btn_cancelar').on('click', function(){
		$('.modal_establecimiento').fadeOut();
	});

	option_data = function(id,url,element){
		$.ajax({
			type:'post',
			url:url,
			data:{
				_method:'PATCH',
				id:id
			},
			success: function(data){
				element.html('<option value="">Seleccione una opción...</option>');
				if(data != ""){
					data = JSON.parse(data);
					$.each(data, function(index, val){
						element.append('<option value="' + val.id + '">' + val.nombre + '</option>')
					});
				}
				element.parent().dropdown("update")
			}
		});
	}
});