 $(document).on('ready', function(){

	$('#field-games-filter-select1').on('change', function(){
		slug_sucursal = $('#field-filter-secondary1').val(); 
		id_categoria = $(this).val();
		option_data(id_categoria, slug_sucursal);
	});

	option_data = function(id_categoria, slug_sucursal, ids_maquinas = null){

		ids_maquinas != null ? limit = 2 : limit = 4;

		$.ajax({
			type:'post',
			url:'/filtro-maquinas',
			data:{
				_method:'PATCH',
				id_categoria:id_categoria,
				slug_sucursal:slug_sucursal,
				ids_maquinas:ids_maquinas,
				limit:limit
			},
			success: function(data){
				
				if(data.length > 2){					
					data = JSON.parse(data);
					size = data.length;
					maquinas = '';
					if (ids_maquinas == null)
						$("#games").empty();	

					$.each(data, function(index, val){

						maquinas += '<li class="game posts-data" data-id="'+val.id+'">'
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

					$("#games").append(maquinas);
					$('#mas').show();
				}else{ 
					$('#mas').hide();					
					return false
				}
			},
			error: function () {									
				$('#mas').hide();					
				return false
			  }
		});
	}

	$(".view_more").click(function(e){
		e.preventDefault();
		getposts();
	});

	getposts = function(){

		slug_sucursal = $('#field-filter-secondary1').val(); 
		id_categoria = $('#field-games-filter-select1').val();
		var ids_maquinas = [];

		var num_posts = $('.posts-data').size();
		$(".posts-data").each(function(){
			ids_maquinas.push($(this).data('id'));
		}); 

		option_data(id_categoria, slug_sucursal, ids_maquinas);
	}

});