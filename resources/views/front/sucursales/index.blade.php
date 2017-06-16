@extends('layout.front')

@section('js')
	<script src="js/front/mesas.js"></script>
	<script>
		option_data = function(id_categoria, slug_sucursal, ids_maquinas = null, linea = null){

		ids_maquinas != null ? limit = 2 : limit = 4;

		$.ajax({
			type:'post',
			url:'/filtro-maquinas',
			data:{
				_method:'PATCH',
				id_categoria:id_categoria,
				slug_sucursal:slug_sucursal,
				ids_maquinas:ids_maquinas,
				limit:limit,
				linea:linea
			},
			success: function(data){
				
				if(data.length > 2){					
					data = JSON.parse(data);
					size = data.length;
					maquinas = '';
					if (ids_maquinas == null)
						$("#games").empty();	

					var imagen = "";
					$.each(data, function(index, val){
						imagen = val.thumb != null ? val.thumb : val.imagen;

						maquinas += '<li class="game posts-data" data-id="'+val.id+'">'
										+'<a href="/maquinas-de-juego/detalle/'+val.slug+'" style="background-image: url('+imagen+')">' 
											// +'<span class="jackpot">'
											// 	+'<small>JACKPOT</small>'
											// 	+'<strong>'
											// 		+"$"+val.acumulado
											// 	+'</strong>'
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
					if (ids_maquinas == null)
						$("#games").empty();
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

		slug_sucursal = "{{isset($sucursal) ? $sucursal->slug : ''}}"; 
		id_categoria = $('#categorias').val();
		linea = $('#linea').val(); 
		var ids_maquinas = [];

		var num_posts = $('.posts-data').size();
		$(".posts-data").each(function(){
			ids_maquinas.push($(this).data('id'));
		}); 

		option_data(id_categoria, slug_sucursal, ids_maquinas, linea);
	}
	
	$(".ver-mesa").click(function(e){
		e.preventDefault();
		id_mesa = $(this).attr('data-id');
		id_sucursal = $(this).attr('data-sucursal');

		$.ajax({
			type:'post',
			url:'/get-mesa-juego',
			data:{
				_method:'PATCH',
				id_mesa:id_mesa,
				id_sucursal:id_sucursal
			},
			success: function(data){
				
				if(data.length > 2){					
					data = JSON.parse(data);
					size = data.length;
					mesa = '';
					apuesta = '';
					descripcion = '';
					$(".article-content").remove();

					$.each(data, function(index, val){

						if (val.archivo != null && val.archivo.trim() != "" )
							imagen = val.archivo;
						else
							imagen = val.imagen;

						if (val.apuesta_minima != null) {
							apuesta += '<div class="article-label">'
						 						+'<span> Apuesta Mínima DESDE </span>'
						 						+'<strong> '+val.apuesta_minima+' </strong>'
						 				+'</div>';
						}

						if ($.trim(val.descripcion) != "")
							descripcion = val.descripcion;
						else
							descripcion = val.resumen;

						mesa = '<div class="article-content">'
					 				+'<div class="article-image" style="background-image: url('+imagen+')">'  
					 					+apuesta
					 					+'<div class="article-max-price">'
					 						+'CONSULTA MONTOS MÁXIMOS DE APUESTA EN EL CASINO'
					 					+'</div>'
					 				+'</div>'

					 				+'<div class="article-entry">'
					 					+'<h4 class="article-title">'
					 						+val.nombre
					 						+'<small>'
					 							+val.disponibles+' mesas'
					 						+'</small>'
					 					+'</h4>'

										+'<p>'
											+descripcion
										+'</p>'

										+'<ul class="list-links">'
											+'<li>'
												+'<a href="/aprende_a_jugar/'+val.slug+'" class="btn btn-border">'
													+'Aprende a jugar'
												+'</a>'
											+'</li>'

											+'<li>'
												+'<a href="/reglas/'+val.slug+'" class="btn btn-border btn-border-grey">'
													+'Reglas'
												+'</a>'
											+'</li>'
										+'</ul>'
					 				+'</div>'
						 		+'</div>';
					});
					$("#article-mesa").append(mesa);
				}else{ 
					$(".article-content").remove();
				}
			},
			error: function () {						
				return false
			  }
		});

	});
	</script>
@stop

@section('contenido')
	<div class="slider-secondary secondary-margin">
		<!--<a href="#" class="btn-menu">
			<img src="css/images/btn-menu@2x.png" alt="">
		</a>-->

		<div class="slider-secondary">
				<!-- <a href="{{url('alimentos-y-bebidas')}}" class="btn-menu">
					<img src="css/images/btn-menu@2x.png" alt="">
				</a> -->

				<div class="slider-clip">
					<ul class="slides">
						@if( isset( $slider ) && count( $slider ) )
							<div class="slider-intro anchor">
								<div class="slider-clip">
									<ul class="slides">
										@foreach( $slider as $s )
											<li class="slide fullscreen" style="background-image: url({{ $s->imagen }});">
												<div class="slide-content ">
													<!--<div class="shell"-->
													<?php /*
													<h1>{{ $s->titulo }}</h1>
													<!-- <a href="{{ $s->link }}" class="btn btn-white">{{ $s->texto_boton }} <i class="ico-arrow-right"></i></a> -->
													*/?>
													<!--</div> /.shell -->
												</div><!-- /.slide-content -->
											</li><!-- /.slide -->
										@endforeach
									</ul><!-- /.slides -->
								</div><!-- /.slider-clip -->
							</div><!-- /.slider-intro -->
						@endif
					</ul><!-- /.slides -->
				</div><!-- /.slider-clip -->

				<!--<div class="slider-label red-label large">
					<i class="ico-slot"></i>
				</div> /.slider-label -->
			</div><!-- /.slider-secondary -->

		<!--<div class="slider-label red-label large">
			<i class="ico-deportiva"></i>
		</div><!-- /.slider-label -->
	</div><!-- /.slider-secondary -->

	<div class="main">
		@if( isset($promociones) && count($promociones) )
			@include('front.includes.promotions',['promociones'=>$promociones])
		@endif

		<input type="hidden" name="linea" id="linea" value="1">
		@if( isset($maquinas) && count($maquinas) )
			@include('front.includes.game_machine',['maquinas'=>$maquinas])
		@endif

		<section class="section-jackpots">
			<div class="shell">
				<!-- <header class="section-head">
                    <div class="stick--point" id="jackpot"></div>
					<h2>
						<small>Jackpot</small>
						Acumulado
					</h2>
				</header> --><!-- /.section-head -->

				<div class="section-content">
					<!-- <div class="section-entry">
						<p>
							<span>
								Por pagar
							</span>

							<a href="#">
								Ver más
							</a>
						</p>
					</div> --><!-- /.section-entry -->
					@if( isset($acumulado) && count($acumulado) )
					<div class="cols">
						<div class="shell">
							
							<header class="section-head" >
								{!!isset($sucursal) ? '<h2 class="jackpot_line"> <small>' . $sucursal->nombre . '</h2></small>' : ''!!}
								<div class="stick--point" id="jackpot"></div>
								<h2>
									Jackpots
								</h2>
							</header><!-- /.section-head -->
							<div class="section-entry">
								<p>
									<span>
										Por pagar
									</span>
								</p>
							</div>
						</div>
						@foreach ($acumulado as $item)
						<div class="col col-1of2">
							<article class="article-jackpot">
								<div class="article-content">
									<h6>
										{{$item->titulo}} 
									</h6>

									<div class="fake-div">
										<div id="counter">
											<div class="counter-value" ><p>${{number_format($item->cantidad)}} <em>MN</em></p></div>
											<!--<div class="counter-value" data-count="400">$100</div>
											<div class="counter-value" data-count="1500">$500</div>-->
										</div>
										<div class="fake-div">
									<!--<p>
										${{$item->cantidad}}
									</p>-->
										</div>
									</div>
								</div><!-- /.article-content -->
							</article><!-- /.article-jackpot -->
						</div><!-- /.col col-1of2 -->
							
						@endforeach
						

					</div>
					@endif<!-- /.cols -->

					<!-- <div class="section-entry">
						<p>
							<span>
								Pagado
							</span>

							<a href="#">
								Conoce más detalle
							</a>
						</p>
					</div> --><!-- /.section-entry -->

					<!-- <div class="cols">
						<div class="col col-1of2">
							<article class="article-jackpot">
								<div class="article-content">
									<h6>
										MÁquina rodillo A
									</h6>

									<p>
										$293,939.93
									</p>
								</div>
							</article>
						</div>

						<div class="col col-1of2">
							<article class="article-jackpot">
								<div class="article-content">
									<h6>
										MÁquina bingo A
									</h6>

									<p>
										$562,241.62
									</p>
								</div>
							</article>
						</div>
					</div> -->
				</div><!-- /.section-content -->
			</div><!-- /.shell -->
		</section><!-- /.section-jackpots -->

		@if(isset($mesas) && count($mesas))
			<section class="section-games-available">
					<div class="shell">
						<div class="section-head">
							<div class="stick--point" id="juegos"></div>
							<h2>
								Juegos disponibles
							</h2>
						</div><!-- /.section-head -->

						<div class="section-body">
							<aside class="section-aside">
								<article class="article-game-available large" id="article-mesa">
						 			<div class="article-content">
						 				<div class="article-image" style="background-image: url({{isset(current($mesas)->archivo) && !empty(current($mesas)->archivo) ? current($mesas)->archivo : current($mesas)->imagen}})">
						 					@if(isset(current($mesas)->apuesta_minima) && !empty(current($mesas)->apuesta_minima))
						 					<div class="article-label">
						 						<span> Apuesta Mínima DESDE </span>

						 						<strong> {{current($mesas)->apuesta_minima}} </strong>
						 					</div><!-- /.article-label -->
						 					@endif
						 					<div class="article-max-price">
						 						CONSULTA MONTOS MÁXIMOS DE APUESTA EN EL CASINO
						 					</div><!-- /.article-max-price -->
						 				</div><!-- /.article-image -->

						 				<div class="article-entry">
						 					<h4 class="article-title">
						 						{{current($mesas)->nombre}}
						 						@if( isset(current($mesas)->disponibles) && !empty(current($mesas)->disponibles))
						 						<small>
						 							{{current($mesas)->disponibles}} mesas
						 						</small>
						 						@endif
						 					</h4><!-- /.article-title -->

											<p>
												{{isset( current($mesas)->descripcion ) && trim(current($mesas)->descripcion) != "" ? current($mesas)->descripcion : current($mesas)->resumen}}
											</p>

											<ul class="list-links">
												<li>
													<a href="{{url('aprende_a_jugar/' . current($mesas)->slug)}}" class="btn btn-border">
														Aprende a jugar
													</a>
												</li>

												<li>
													<a href="{{url('reglas/' . current($mesas)->slug)}}" class="btn btn-border btn-border-grey">
														Reglas
													</a>
												</li>
											</ul><!-- /.list-links -->
						 				</div><!-- /.article-entry -->
						 			</div><!-- /.article-content -->
						 		</article><!-- /.article-game-available large -->
							</aside><!-- /.section-aside -->

							<div class="section-content">
								<div class="slider-games-available">
									<div class="slider-clip">
										<!-- vik0x -->
										<ul class="slides">
											<?php next($mesas);$c = 0;?>
											@foreach($mesas as $mesa)
												@if( ($c % 4) == 0 && $c > 0 )
															</div><!-- /.cols -->
														</div><!-- /.slide-content -->
													</li><!-- /.slide -->
												@endif
												@if( ($c % 4) == 0 )
													<li class="slide">
													 	<div class="slide-content">
														 	<div class="cols">
												@endif
																<a class="link-more ver-mesa" data-id="{{$mesa->id}}" data-sucursal="{{isset($mesa->id_sucursal) && !empty($mesa->id_sucursal) ? $mesa->id_sucursal : "0"}}" onclick="dataLayer.push ({ 'event': 'juegosMesa', 'juegoM': '{{$mesa->nombre}}' });">
																	<div class="col col-1of2">
																		<article class="article-game-available small">
																			<h6>
																				{{$mesa->nombre}}
																				<span class="plus"></span>
																			</h6>
																			<div class="article-image" style="background-image: url({{ isset($mesa->archivo) && trim($mesa->archivo) != "" ? $mesa->archivo : $mesa->imagen}})"> </div><!-- /.article-image -->
																		</article><!-- /.article-game-available small -->
																	</div><!-- /.col col-1of2 -->
																</a>

													<?php $c++; ?>
											@endforeach
											@if( ($c % 4) != 1 )
													 		</div><!-- /.cols -->
														</div><!-- /.slide-content -->
													</li><!-- /.slide -->
											@endif
										</ul><!-- /.slides -->
										<!-- vik0x -->
									</div><!-- /.slider-clip -->
								</div><!-- /.slider-games-available -->
							</div><!-- /.section-content -->
						</div><!-- /.section-body -->
					</div><!-- /.shell -->
				</section><!-- /.section-games-available -->
		@endif

		@if( isset($torneos) && count($torneos) )
			<section class="section section-secondary">
				<div class="shell">
					<header class="section-head">
	                    <div class="stick--point" id="torneos"></div>
						<h2>
							Torneos
						</h2>
					</header><!-- /.section-head -->

					<div class="section-body">
						<div class="cols">
							@foreach( $torneos as $item )
								<div class="col col-1of2">
									<article class="article-tournament" style="background-image: url({{$item->archivo}})">
										<span class="article-title">
											{{strtotime($item->fecha_inicio) > time() ? "Próximos torneos" : "Experiencias Pasadas"}}
										</span><!-- /.article-title -->

										<div class="article-content">
											<span class="article-label">
												{{$item->tipo}}
											</span><!-- /.article-label -->

											<h5>
												{{$item->titulo}}
											</h5>

											<p>
												{{ $item->fecha_inicio }} - {{$item->sucursal}}
		 									</p>

		 									<a href="{{url('/torneos/' . $item->slug)}}" class="btn btn-red">
		 										{{strtotime($item->fecha_inicio) > time() ? 'Participar' : 'Detalles'}}
		 									</a>
										</div><!-- /.article-content -->
									</article><!-- /.article-tournament -->
								</div><!-- /.col col-1of2 -->
							@endforeach
						</div><!-- /.cols -->
					</div><!-- /.section-body -->
				</div><!-- /.shell -->
			</section><!-- /.section section-secondary -->
		@endif

		<section class="section-gray">
			<div class="shell">
				<div class="subscribe">
					<form action="?" method="post">
						<div class="subscribe-head">
							<h2>Regístrate a nuestro newsletter</h2>
						</div><!-- /.subscribe-head -->

						<div class="subscribe-wrapper">
							<!--<a href="#" class="btn btn-red btn-form">Deseo recibir noticaciones</a>-->

							<div class="subscribe-body-hidden">
								<div class="subscribe-inner">
									<label for="mail" class="hidden">Email</label>

									<input type="email" id="mail" name="mail" value="" placeholder="Email" class="subscribe-field">

									<input type="submit" value="Enviar" class="subscribe-btn btn btn-red">
								</div><!-- /.subscribe-inner -->

								<div class="subscribe-actions">
									<ul class="list-checkboxes">
										<li>
											<!--<div class="checkbox">
												<input type="checkbox" name="field-notifications" id="field-notifications">

												<label class="form-label" for="field-notifications">Deseo recibir notificaciones</label>
											</div> /.checkbox -->
										</li>
									</ul><!-- /.list-checkboxes -->
								</div><!-- /.subscribe-actions -->
							</div><!-- /.subscribe-body-hidden -->
						</div><!-- /.subscribe-wrapper -->
					</form>
				</div><!-- /.subscribe -->
			</div><!-- /.shell -->
		</section><!-- /.section-gray -->

		@if( isset($sucursal) )
			<section class="section-map no-top-padding">
				<div class="section-body">
					<div id="googlemap" data-lng="{{$sucursal->longitud}}" data-lat="{{$sucursal->latitud}}"></div><!-- /#googlemap -->

					<div class="section-content">
						<div class="shell">
							<div class="section-content-head">
	                            <div class="stick--point" id="sucursales"></div>
								<p>Sucursal</p>

								<h2>{{$sucursal->nombre}}</h2>
							</div><!-- /.section-content-head -->

							<div class="section-content-body">
								<ul class="list-contacts">
									<li>
										<i class="ico-map"></i>

										<p>
											{!!$sucursal->direccion!!}
										</p>
									</li>

									<li>
										<i class="ico-phone"></i>

										<p>
											{!!$sucursal->telefono!!}
										</p>
									</li>

									<li>
										<i class="ico-clock"></i>

										<p>{!!$sucursal->horario!!}</p>
									</li>

									<li>
										<i class="ico-car"></i>

										<p>{!!$sucursal->instrucciones!!}</p>
									</li>
									<li>
										<i class="ico-game"></i>

										<p>{!!$sucursal->oferta!!}</p>
									</li>
								</ul><!-- /.list-contacts -->
							</div><!-- /.section-content-body -->
						</div><!-- /.shell -->

						<div class="section-actions">
							<a href="http://www.google.com/maps/place/{{$sucursal->latitud}},{{$sucursal->longitud}}" class="btn btn-red btn-red-small" target="_blank" onclick="dataLayer.push ({ 'event': 'llegaraqui', 'casino': '{{$sucursal->nombre}}' });">
								<i class="ico-human"></i>

								Cómo llegar aquí
							</a>
						</div><!-- /.section-actions -->
					</div><!-- /.section-content -->
				</div><!-- /.section-body -->
			</section><!-- /.section-map -->
		@endif

		@if( isset($galeria) && count($galeria) )
			<section class="section-gallery secondary gll-btm">
				<div class="shell">
					<div class="slider-gallery">
						<div class="slider-clip">
							<ul class="slides">
								@foreach( $galeria as $item )
									<li class="slide">
										<div class="slide-image">
											<img src="{{$item->imagen}}" alt="">
										</div><!-- /.slide-image -->
									</li><!-- /.slide -->
								@endforeach
							</ul><!-- /.slides -->
						</div><!-- /.slider-clip -->
					</div><!-- /.slider-gallery -->

				</div><!-- /.shell -->
			</section><!-- /.section-gallery -->
		@endif
@stop