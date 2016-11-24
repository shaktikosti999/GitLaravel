 $(document).on('ready', function(){

	$('#field-games-filter-select1').on('change', function(){
		slug_sucursal = $('#field-filter-secondary1').val(); 
		id_categoria = $(this).val();
		option_data(id_categoria, slug_sucursal);
	});

	option_data = function(id_categoria, slug_sucursal){
		$.ajax({
			type:'post',
			url:'/filtro-maquinas',
			data:{
				_method:'PATCH',
				id_categoria:id_categoria,
				slug_sucursal:slug_sucursal
			},
			success: function(data){
				if(data != ""){
					$("#games").empty();
					data = JSON.parse(data);
					maquinas = '';
					$.each(data, function(index, val){

						maquinas += '<li class="game">'
										+'<a href="/maquinas-de-juego/detalle/'+val.slug+'" style="background-image: url('+val.imagen+')">' 
											+'<span class="jackpot">'
												+'<small>JACKPOT</small>'
												+'<strong>'
													+"$"+val.acumulado
												+'</strong>'
											+'</span>'
											+'<span class="game-title">'
												+'<strong>'
													+val.nombre
												+'</strong>'
												+'<span>'
													+val.resumen
												+'</span>'
											+'</span>'
										+'</a>'
									+'</li>';
					});
				}
				$("#games").append(maquinas);
			}
		});
	}

});