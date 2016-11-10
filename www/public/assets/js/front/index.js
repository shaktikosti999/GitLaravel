 $(document).on('ready', function(){

	$('.select_linea_de_juegos').dropdown();

	$('.modal_linea').on('click', function(){
		$('.select_linea_de_juegos').val($(this).attr('data-href')).trigger('change');
		$('#establecimiento_go').attr('href',$(this).attr('data-href'));
		$('.modal_establecimiento').fadeIn();
	});

	$('.select_linea_de_juegos').on('change', function(){
		var url_str = $('[name="lineas_de_juego"]>option:contains("' + $(this).parent().children()[1].innerText + '")').val();
		$('#establecimiento_go').attr('href',url_str);
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

});