 $(document).on('ready', function(){

	$('#field-games-filter-select1').on('change', function(){
		sucursal = $('#field-filter-secondary1').val(); 
		id_categoria = $(this).val();
		option_data(id_categoria, sucursal);
	});

	option_data = function(id_categoria, sucursal){
		$.ajax({
			type:'post',
			url:url,
			data:{
				_method:'PATCH',
				id_categoria:id_categoria,
				sucursal:sucursal
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