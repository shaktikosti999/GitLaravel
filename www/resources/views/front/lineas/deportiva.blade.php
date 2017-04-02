@extends('layout.front')

	@section('js')
		<script>
			$('#date_select').on('change', function(){
				$('[data-date]').show();
				$('[data-date]').addClass('dateHide');
				$('[data-date="' + $(this).val() + '"]').removeClass('dateHide');
				$('.dateHide').hide();
				$('[data-date]').removeClass('dateHide');
			});
			ofertas = {!!json_encode($ofertas)!!};
			$('#liga_select').on('change', function(){
				$('#lista_oferta').html('<option>Seleccione oferta</option>');
				$.each(ofertas[$(this).val()]['data'], function(index,item){
					$('#lista_oferta').html('<option value="' + item.id + '">' + item.nombre + '</option>');
				});
			});

			$('#liga_select').on('change', function(){
				$('#lista_oferta').show();
				$('#lista_oferta').html('<option>Seleccione oferta</option>');
				$.each(ofertas[$(this).val()]['data'], function(index,item){
					$('#lista_oferta').append('<option value="' + item.id + '">' + item.nombre + '</option>');
				});
			});

			$('#lista_oferta').on('change', function(){
				var id = $(this).val();
				$.ajax({
					url:'/ver-lineas',
					type:'post',
					data:{
						_method:"PATCH",
						deporte:{{$dep}},
						liga:$('#liga_select > option:selected').attr('data-liga'),
						oferta:id
					},
					success:function(data){
						if( data == "[]" )
							return false;
						var str = '';
						data = JSON.parse(data);
						$('#tbl_content').html('');
						$.each(data, function(index,data2){
								str += '<div class="table-content" data-date="' + data2.fecha_data +'">\
									<h5>' + data2.fecha + '</h5>\
									<div class="table__wrapp">';
							$.each(data2.data, function(index2,item){
								console.log(item);
								$('#simple_info').hide();
								$('#simple_info').html('');
								if( item !== null ){
									if((item.length > 1 && item.length < 4) && {{$dep}} != 7 ){
											str += '<div class="table-item">\
												<div class="line-gray">\
												</div>\
												<div class="table-list">\
													<p>' + item[0].id_apuesta + '</p>\
													<p>' + item[0].nombre + '</p>\
													<p>Línea de apertura</p>\
													<h2>' + item[0].puntos + '</h2>\
												</div>';
										if( item[2] !== undefined ){
												str += '<div class="table-list">\
													<p>' + item[2].id_apuesta + '</p>\
													<p>' + item[2].nombre + '</p>\
													<p>Línea de apertura</p>\
													<h2>' + item[2].puntos + '</h2>\
												</div>\
												<div class="gray-item">\
													<p>' + item[1].id_apuesta + '</p>\
													<p>' + item[1].nombre + '</p>\
													<h4 style="color:rgb(255,255,255)">' + item[1].puntos + '</h4>\
												</div>';
										}
										else{
											if( data2.overunder !== undefined ){
											console.log(data2);
												str += '<div class="table-list">\
													<p>' + item[1].id_apuesta + '</p>\
													<p>' + item[1].nombre + '</p>\
													<p>Línea de apertura</p>\
													<h2>' + item[1].puntos + '</h2>\
												</div>\
												<div class="gray-item">\
													<p>Over / Under</p>\
													<h4>' + data2.overunder[index2].puntos + '</h4>\
													<p>' + data2.overunder[index2].linea + '</p>\
												</div>';
											}
											else{
												str += '<div class="table-list">\
													<p>' + item[1].id_apuesta + '</p>\
													<p>' + item[1].nombre + '</p>\
													<p>Línea de apertura</p>\
													<h2>' + item[1].puntos + '</h2>\
												</div>';
											}
										}
												str += '<div class="gray-item2">\
													<h6>' + data2.hora[index2] + '</h6>\
													<!-- <p>Tiempo del centro</p> -->\
												</div>\
											</div>';
									}
									else{
										$.each(item, function(key,val){
											$('#simple_info').append('\
												<tr>\
													<td>' + val.id_apuesta +'</td>\
													<td>\
														<p>' + val.nombre +'</p>\
													</td>\
													<td>' + val.puntos +'</td>\
												</tr>\
												<tr class="white-space">\
													<td colspan="3"></td>\
												</tr>\
											');
										});
										$('#simple_info').show(300);
									}
								}
							});
									str += '</div>\
								</div>';
						});
						$('#tbl_content').html(str);
					}
				});
			});

		</script>
	@stop

	@section('contenido')
		<div class="slider-secondary secondary-margin">
			<!--<a href="#" class="btn-menu">
				<img src="css/images/btn-menu@2x.png" alt="">-->
			</a>

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
												<h1>{{ $s->titulo }}</h1>
												<!-- <a href="{{ $s->link }}" class="btn btn-white">{{ $s->texto_boton }} <i class="ico-arrow-right"></i></a> -->
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

			<div class="slider-label red-label large">
				<i class="ico-deportiva"></i>
			</div><!-- /.slider-label -->
		</div><!-- /.slider-secondary -->

		<div class="gray-sport">
			<div class="shell">
				<div class="btn-sport">
					<a href="http://casinocaliente.abardev.net/calendario-deportivo" class="btn btn-border btn-calendar-sport">
						<img src="css/images/icons/calendar.png">
						<img class="calendar-off" src="css/images/icons/calendar-white.png">
						Calendario deportivo
					</a>
					<a href="http://casinocaliente.abardev.net/como-apostar" class="btn btn-border btn-calendar-sport2">
						Cómo apostar
					</a>
				</div>
				<div class="sport-calendar">

					@if( isset($deportes) && count($deportes) )
					    @foreach($deportes as $item)
				            <div class="list-calendar {{$item->numDeporte == $dep ? 'active' : ''}}">
				                <a href="/lineas-de-juego/apuesta-deportiva?dep={{$item->numDeporte}}" tabindex="0">
				                	<?php
				                	$imagen = $item->nombre;
				                	$imagen = str_replace(" ", "_", $imagen);
				                	$imagen = strtolower($imagen);
				                	?>
				                    <img src="css/images/icons/{{$imagen}}{{$imagen}}{{$item->numDeporte == $dep ? '_white' : ''}}.png">
				                    <span>{{$item->nombre}}</span>
				                </a>
				            </div>
					    @endforeach
					@endif
				</div>
				<div class="btn-calendar2" id="calendario">
					@if( isset($ofertas) && count($ofertas) )
					<select class="btn btn-black" id ="liga_select">
						<option>Seleccionar Liga</option>
						@foreach($ofertas as $key => $item)
						<option value="{{$key}}" data-liga="{{$item['id']}}">{{$item['nombre']}}</option>
						@endforeach
					</select>
					@else
						<h3>No encontramos ofertas</h3>
					@endif
					<select class="btn btn-black" id="lista_oferta" style="display:none"></select>
					<!-- <div class="input-group date">
						<img src="css/images/icons/calendar-gray.png">
					   	 <input type="text" placeholder="mm/dd/yyyy" class="form-control" id="date_select">
				   </div> -->
				</div>

				<div class="col-sm-12" id="tbl_content"></div>

				<?php /*<!-- de aquí -->
				<div class="table-content" >
					<h5>07 Noviembre 2016</h5>
					<div class="table__wrapp">

						<div class="table-item"><!-- * -->
							<div class="line-gray">
							</div>
							<div class="table-list">
								<p>8001</p>
								<p>N.Y. METS</p>
								<p>B. COLON</p>
								<p>Línea de apertura</p>
								<h2>-220</h2>
							</div>
							<div class="table-list">
								<p>8003</p>
								<p>PHI. PHILIES</p>
								<p>J. HELLICSON</p>
								<p>Línea de apertura</p>
								<h2>+600</h2>
							</div>
							<div class="gray-item">
								<p>Over / Under</p>
								<h4>9</h4>
								<p>-110</p>
								<p>EVEN</p>
							</div>
							<div class="gray-item2">
								<h6>7:00 PM</h6>
								<p>Tiempo del centro</p>
							</div>
						</div>
						<div class="table-item"><!-- * -->
							<div class="line-gray">
							</div>
							<div class="table-list">
								<p>8001</p>
								<p>N.Y. METS</p>
								<p>B. COLON</p>
								<p>Línea de apertura</p>
								<h2>-220</h2>
							</div>
							<div class="table-list">
								<p>8003</p>
								<p>PHI. PHILIES</p>
								<p>J. HELLICSON</p>
								<p>Línea de apertura</p>
								<h2>+600</h2>
							</div>
							<div class="gray-item">
								<p>Over / Under</p>
								<h4>9</h4>
								<p>-110</p>
								<p>EVEN</p>
							</div>
							<div class="gray-item2">
								<h6>7:00 PM</h6>
								<p>Tiempo del centro</p>
							</div>
						</div>
						<div class="table-item"><!-- * -->
							<div class="line-gray">
							</div>
							<div class="table-list">
								<p>8001</p>
								<p>N.Y. METS</p>
								<p>B. COLON</p>
								<p>Línea de apertura</p>
								<h2>-220</h2>
							</div>
							<div class="table-list">
								<p>8003</p>
								<p>PHI. PHILIES</p>
								<p>J. HELLICSON</p>
								<p>Línea de apertura</p>
								<h2>+600</h2>
							</div>
							<div class="gray-item">
								<p>Over / Under</p>
								<h4>9</h4>
								<p>-110</p>
								<p>EVEN</p>
							</div>
							<div class="gray-item2">
								<h6>7:00 PM</h6>
								<p>Tiempo del centro</p>
							</div>
						</div>
						<div class="table-item"><!-- * -->
							<div class="line-gray">
							</div>
							<div class="table-list">
								<p>8001</p>
								<p>N.Y. METS</p>
								<p>B. COLON</p>
								<p>Línea de apertura</p>
								<h2>-220</h2>
							</div>
							<div class="table-list">
								<p>8003</p>
								<p>PHI. PHILIES</p>
								<p>J. HELLICSON</p>
								<p>Línea de apertura</p>
								<h2>+600</h2>
							</div>
							<div class="gray-item">
								<p>Over / Under</p>
								<h4>9</h4>
								<p>-110</p>
								<p>EVEN</p>
							</div>
							<div class="gray-item2">
								<h6>7:00 PM</h6>
								<p>Tiempo del centro</p>
							</div>
						</div>
						<div class="table-item"><!-- * -->
							<div class="line-gray">
							</div>
							<div class="table-list">
								<p>8001</p>
								<p>N.Y. METS</p>
								<p>B. COLON</p>
								<p>Línea de apertura</p>
								<h2>-220</h2>
							</div>
							<div class="table-list">
								<p>8003</p>
								<p>PHI. PHILIES</p>
								<p>J. HELLICSON</p>
								<p>Línea de apertura</p>
								<h2>+600</h2>
							</div>
							<div class="gray-item">
								<p>Over / Under</p>
								<h4>9</h4>
								<p>-110</p>
								<p>EVEN</p>
							</div>
							<div class="gray-item2">
								<h6>7:00 PM</h6>
								<p>Tiempo del centro</p>
							</div>
						</div>
						<div class="table-item"><!-- * -->
							<div class="line-gray">
							</div>
							<div class="table-list">
								<p>8001</p>
								<p>N.Y. METS</p>
								<p>B. COLON</p>
								<p>Línea de apertura</p>
								<h2>-220</h2>
							</div>
							<div class="table-list">
								<p>8003</p>
								<p>PHI. PHILIES</p>
								<p>J. HELLICSON</p>
								<p>Línea de apertura</p>
								<h2>+600</h2>
							</div>
							<div class="gray-item">
								<p>Over / Under</p>
								<h4>9</h4>
								<p>-110</p>
								<p>EVEN</p>
							</div>
							<div class="gray-item2">
								<h6>7:00 PM</h6>
								<p>Tiempo del centro</p>
							</div>
						</div>
					</div>
				</div>

				<div class="table-content">
					<h5>08 Noviembre 2016</h5>
					<div class="table__wrapp">

						<div class="table-item"><!-- * -->
							<div class="line-gray">
							</div>
							<div class="table-list">
								<p>8001</p>
								<p>N.Y. METS</p>
								<p>B. COLON</p>
								<p>Línea de apertura</p>
								<h2>-220</h2>
							</div>
							<div class="table-list">
								<p>8003</p>
								<p>PHI. PHILIES</p>
								<p>J. HELLICSON</p>
								<p>Línea de apertura</p>
								<h2>+600</h2>
							</div>
							<div class="gray-item">
								<p>Over / Under</p>
								<h4>9</h4>
								<p>-110</p>
								<p>EVEN</p>
							</div>
							<div class="gray-item2">
								<h6>7:00 PM</h6>
								<p>Tiempo del centro</p>
							</div>
						</div>
						<div class="table-item"><!-- * -->
							<div class="line-gray">
							</div>
							<div class="table-list">
								<p>8001</p>
								<p>N.Y. METS</p>
								<p>B. COLON</p>
								<p>Línea de apertura</p>
								<h2>-220</h2>
							</div>
							<div class="table-list">
								<p>8003</p>
								<p>PHI. PHILIES</p>
								<p>J. HELLICSON</p>
								<p>Línea de apertura</p>
								<h2>+600</h2>
							</div>
							<div class="gray-item">
								<p>Over / Under</p>
								<h4>9</h4>
								<p>-110</p>
								<p>EVEN</p>
							</div>
							<div class="gray-item2">
								<h6>7:00 PM</h6>
								<p>Tiempo del centro</p>
							</div>
						</div>
						<div class="table-item"><!-- * -->
							<div class="line-gray">
							</div>
							<div class="table-list">
								<p>8001</p>
								<p>N.Y. METS</p>
								<p>B. COLON</p>
								<p>Línea de apertura</p>
								<h2>-220</h2>
							</div>
							<div class="table-list">
								<p>8003</p>
								<p>PHI. PHILIES</p>
								<p>J. HELLICSON</p>
								<p>Línea de apertura</p>
								<h2>+600</h2>
							</div>
							<div class="gray-item">
								<p>Over / Under</p>
								<h4>9</h4>
								<p>-110</p>
								<p>EVEN</p>
							</div>
							<div class="gray-item2">
								<h6>7:00 PM</h6>
								<p>Tiempo del centro</p>
							</div>
						</div>
						<div class="table-item"><!-- * -->
							<div class="line-gray">
							</div>
							<div class="table-list">
								<p>8001</p>
								<p>N.Y. METS</p>
								<p>B. COLON</p>
								<p>Línea de apertura</p>
								<h2>-220</h2>
							</div>
							<div class="table-list">
								<p>8003</p>
								<p>PHI. PHILIES</p>
								<p>J. HELLICSON</p>
								<p>Línea de apertura</p>
								<h2>+600</h2>
							</div>
							<div class="gray-item">
								<p>Over / Under</p>
								<h4>9</h4>
								<p>-110</p>
								<p>EVEN</p>
							</div>
							<div class="gray-item2">
								<h6>7:00 PM</h6>
								<p>Tiempo del centro</p>
							</div>
						</div>
						<div class="table-item"><!-- * -->
							<div class="line-gray">
							</div>
							<div class="table-list">
								<p>8001</p>
								<p>N.Y. METS</p>
								<p>B. COLON</p>
								<p>Línea de apertura</p>
								<h2>-220</h2>
							</div>
							<div class="table-list">
								<p>8003</p>
								<p>PHI. PHILIES</p>
								<p>J. HELLICSON</p>
								<p>Línea de apertura</p>
								<h2>+600</h2>
							</div>
							<div class="gray-item">
								<p>Over / Under</p>
								<h4>9</h4>
								<p>-110</p>
								<p>EVEN</p>
							</div>
							<div class="gray-item2">
								<h6>7:00 PM</h6>
								<p>Tiempo del centro</p>
							</div>
						</div>
						<div class="table-item"><!-- * -->
							<div class="line-gray">
							</div>
							<div class="table-list">
								<p>8001</p>
								<p>N.Y. METS</p>
								<p>B. COLON</p>
								<p>Línea de apertura</p>
								<h2>-220</h2>
							</div>
							<div class="table-list">
								<p>8003</p>
								<p>PHI. PHILIES</p>
								<p>J. HELLICSON</p>
								<p>Línea de apertura</p>
								<h2>+600</h2>
							</div>
							<div class="gray-item">
								<p>Over / Under</p>
								<h4>9</h4>
								<p>-110</p>
								<p>EVEN</p>
							</div>
							<div class="gray-item2">
								<h6>7:00 PM</h6>
								<p>Tiempo del centro</p>
							</div>
						</div>
					</div>
				</div>
				<!-- aquí -->*/?>
				<div class="table-sport" style="height:auto">
					<div class="shell">
						<h2></h2>
						<table id="simple_info" style="display:none;"></table>
					</div>
				</div>

			</div>
		</div>


		<div class="main"> 

			<section class="section-promotions">
				<div class="shell">
					@if( isset( $promociones ) && count( $promociones ) )
					
						@include('front.includes.promotions',['promociones' => $promociones,'sucursal'=>$sucursal_info])
		
					@endif
					@if( isset($quinielas) && count($quinielas) )
						@foreach($quinielas as $item)
							<div class="slider-bet"> <!-- Slider Quiniela -->
								<div class="slider-bet-item back-module">
									<div class="txt-bet">
										<h2>{{$item->titulo}}</h2>
										{!! isset($item->subtitulo) && !empty($item->subtitulo) ? '<h6>' . $item->subtitulo . '</h6>' : '' !!}
										<p>{{$item->texto}}</p>
										<a href="{{$item->link}}" class="btn btn-red btn-red-small btn-red-medium">
											{{$item->texto_boton}}
										</a>
									</div>
									<img src="css/images/temp/slider-apuesta.jpg" class="image-back">
								</div>
							</div>
						@endforeach
					@endif
				</div><!-- /.shell -->
			</section><!-- /.section-promotions -->

			<!-- Promociones -->


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

			@if( isset( $sucursal_info ) && $sucursal_info )

				<section class="section-map no-top-padding">
					<div class="section-body">
						<div id="googlemap" data-lng="-97.727616" data-lat="18.884188"></div><!-- /#googlemap -->

						<div class="section-content">
							<div class="shell">
								<div class="section-content-head">
									<div class="stick--point" id="sucursales"></div>
									<p>Sucursal</p>

									<h2>{{ $sucursal_info->nombre }}</h2>
								</div><!-- /.section-content-head -->

								<div class="section-content-body">
									<ul class="list-contacts">
										<li>
											<i class="ico-map"></i>

											<p>
												{!! $sucursal_info->direccion !!}
											</p>
										</li>

										<li>
											<i class="ico-phone"></i>

											<p>
												{!! $sucursal_info->telefono !!}
											</p>
										</li>

										<li>
											<i class="ico-clock"></i>

											{!! $sucursal_info->horario !!}
										</li>

										<li>
											<i class="ico-car"></i>

											{!! $sucursal_info->instrucciones !!}
										</li>
									</ul><!-- /.list-contacts -->
								</div><!-- /.section-content-body -->
							</div><!-- /.shell -->



							<div class="section-actions">
								<a target="_blank" href="http://www.google.com/maps/place/{{ $sucursal_info->latitud . "," . $sucursal_info->longitud }}" class="btn btn-red btn-red-small">
									<i class="ico-human"></i>

									Cómo llegar aquí
								</a>
							</div><!-- /.section-actions -->
						</div><!-- /.section-content -->
					</div><!-- /.section-body -->
				</section><!-- /.section-map -->

				<section class="section-gallery secondary">
					<div class="shell">

						@if( isset( $sucursal_info->galeria ) && is_array( $sucursal_info->galeria ) && count( $sucursal_info->galeria ) )

							<div class="slider-gallery">
								<div class="slider-clip">

									<ul class="slides">

										@foreach( $sucursal_info->galeria as $g )

											<li class="slide">
												<div class="slide-image">
													<img src="{{ $g->imagen }}" alt="">
												</div><!-- /.slide-image -->
											</li><!-- /.slide -->

										@endforeach

									</ul><!-- /.slides -->

								</div><!-- /.slider-clip -->
							</div><!-- /.slider-gallery -->

						@endif

					</div><!-- /.shell -->
				</section><!-- /.section-gallery -->

			@endif
			@if( isset( $otras ) && count( $otras ) )

				<section class="section section-simple">
					<div class="shell">
						<div class="section-head top-promotions">
							<div class="stick--point" id="diversion"></div>
							<h2>
								<small>Otras opciones de</small>
								Diversión
							</h2>
						</div><!-- /.section-head -->

						<div class="section-content">
							<div class="cols">

								@foreach( $otras as $item )

									<div class="col col-1of3">
										<article class="article-fun">
											<a href="{{ url('/lineas-de-juego/' . $item->slug) }}" style="background-image: url('{{ $item->imagen }}')">
												<strong>
													{{ $item->linea }}
													<span>{{ $item->slogan }}</span>
												</strong>
											</a>
										</article>
									</div><!-- /.col col-1of3 -->

								@endforeach

							</div><!-- /.cols -->
						</div><!-- /.section-content -->
					</div><!-- /.shell -->
				</section><!-- /.section-entry -->

			@endif
		</div><!-- /.main -->
	@stop
