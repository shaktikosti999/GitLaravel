	@extends('layout.front')
	@section('css')
		<style type="text/css">
			.active{
				color: red;
			}
			.alert {
			    padding: 20px;
			    background-color: rgba(255 ,0 ,0 ,0.35);
			    color: white;
			    border-radius: 12px
			}

			.closebtn {
			    margin-left: 15px;
			    color: white;
			    font-weight: bold;
			    float: right;
			    font-size: 22px;
			    line-height: 20px;
			    cursor: pointer;
			}
		</style>

		<script>
			function countBelling(url,data){
				dataLayer.push ({
					'event': 'apuesta' ,                  //Dato estático
					'txtApuesta': data //Dato dinámico
				});
				window.location.href = url;
			}
		</script>
	@stop

	@section('js')

		<!--Muestra las fechas activas de los programas en el calendario-->
		<script>

			var dates = [];

		    <?php if( isset($programas) && count($programas) ){ ?>

			    var arrayJS=<?php echo json_encode($programas); ?>;

			    for(var i=0; i<arrayJS.length; i++){

			    	var valores = new Array();
		      		var fech = arrayJS[i]['fecha'];
		          	var separada = fech.split("-");
		          	valores[0] = separada[1]+'/'+separada[2]+'/'+separada[0];
		          	dates.push(valores);
			    }

		   	<?php } ?>

		   	$(function(){
		   		$('#vermes').on('click', function(){
		   			$('[data-fecha]').show();
		   		});
		   	});

			function activeDays(date) {
			    for (var i = 0; i < dates.length; i++) {
			        if (new Date(dates[i]).toString() == date.toString()) {
			            return {
			                classes: 'active'
			            };
			        }
			    }
			    return [false,''];
			 }
		</script>

		<script>
			$(".branch-filter").change( function(){

				var $value = $( this ).val();
				var $url   = "/lineas-de-juego/apuesta-de-carreras";

				if( $value != -1 ){

					$url = "/lineas-de-juego/apuesta-de-carreras/" + $value;

				}

				$( location ).attr("href", $url);

			} );

			$(function(){
				$('[data-fecha]').hide();
				$('[data-fecha="{{date('Y-m-d')}}"]').show();
			});

		</script>
	@stop

	@section('contenido')
		<div class="wrapper">

	    <div class="stick-nav"><!-- Stick nav -->
	        <ul>
	            <li><a href="#promociones"><img src="/assets/images/icon/todas-las-promociones.svg"><span>Promociones</span></a></li>
	            <li><a href="#juegos"><img src="/assets/images/icon/apuesta-de-carreras.svg"><span>Calendario</span></a></li>
	            <!--<li><a href="#jackpot"><img src="css/images/icons/icon-4.png"><span>Jackpot</span></a></li>-->
	            <li><a href="#torneos"><img src="/assets/images/icon/torneos.svg"><span>Eventos</span></a></li>
	            <!--<li><a href="#sucursales"><img src="css/images/icons/icon-5.png"><span>Ubicación</span></a></li>-->
	            <li><a href="#diversion"><img src="/assets/images/icon/diversion.svg"><span>Diversión</span></a></li>
	        </ul>
	    </div>
		<div class="slider-secondary">
			<div class="slider-clip">
				@if( isset( $slider ) && count( $slider ) > 1 )
					<ul class="slides">
						@endif
					@if( count( $slider ) )

						@foreach( $slider as $item )
						@if($item->is_show_img_video)
							<li class="slide fullscreen">
								<embed  class="video-item" src="<?php echo $item->video_url; ?>">
							</li>
						@else
							<li class="slide" style="background-image: url({{ $item->imagen }})">
								<div class="slide-body">
									<div class="shell">
										 <div class="slide-content">
											 <h1><?php
												if(isset($item->titulo)){
													echo html_entity_decode($item->titulo);
												}
												?>

											</h1>
											 @if(isset($item->texto_boton))
												 <form action="{{$item->link}}" target="{{$item->is_new_tab}}">
													 <input  class="btn  btn-red  btn-slider" type="submit" value="{{$item->texto_boton}}">
												 </form>
											 @endif

											 	<!--<h3>
											 		@if( isset( $sucursal_info->nombre ) )

											 			{{ $sucursal_info->nombre }}

											 		@endif
											 	</h3>-->

										@if( isset( $sucursales ) && count( $sucursales ) )

											<div class="filter-secondary">
												<label for="field-filter-secondary1" class="form-label hidden">filter-secondary1</label>
												<select name="field-filter-secondary1" id="field-filter-secondary1" class="select branch-filter">

													<option value="-1">Selecciona tu casino</option>

													@foreach( $sucursales as $item )

														<option value="{{ $item->slug }}" <?php ( $sucursal && $sucursal == $item->slug ) ? print "selected" : print "" ?>>{{ $item->nombre }}</option>

													@endforeach

												</select>
											</div><!-- /.filter-secondary -->

										@endif


										 </div><!-- /.slide-content -->

										 @include('front.includes.breadcrumbs')
									</div><!-- /.shell -->
								</div><!-- /.slide-body -->
							</li><!-- /.slide -->
								@endif
						@endforeach

					@endif

						@if( isset( $slider ) && count( $slider ) > 1 )
							</ul>
				@endif
			</div><!-- /.slider-clip -->

			<div class="slider-label red-label second">
				<i class="ico-horse"></i>
			</div><!-- /.slider-label -->
		</div><!-- /.slider-secondary -->

		<div class="main">
			@if( isset($carreras) )
				<section class="section-promotions secondary">
					<div class="shell">
						<header class="section-head modif-section">
		                    <div class="stick--point" id="promociones"></div>
							<h2>
								Selecciona tus carreras
							</h2>

							<a href="{{url('/como-apostar')}}" class="btn btn-border">
								Cómo apostar
							</a>
						</header><!-- /.section-head -->

						<div class="calendar-content">
							<div class="list-btn">
								<ul class="section-btn">
									<li class="{{isset($game) && $game == current($carreras)->slug ? 'btn-carreras active' : ''}}">
										<?php $urlBell = url(\Request::path() . '?game=' . current($carreras)->slug); ?>
										<a  href="javascript:void(0);" onclick="countBelling('<?php echo $urlBell ?>','<?php echo current($carreras)->titulo ?>')"  class="btn-carreras">
											<img src="/assets/images/icon/caballos.png">
											<span>{{current($carreras)->titulo}}</span>
										</a>
									</li>
										<?php next($carreras); ?>
									<li class="{{isset($game) && $game == current($carreras)->slug ? 'btn-carreras active' : ''}}">
										<?php $urlBell = url(\Request::path() . '?game=' . current($carreras)->slug); ?>
											<a  href="javascript:void(0);" onclick="countBelling('<?php echo $urlBell ?>','<?php echo current($carreras)->titulo ?>')"  class="btn-carreras">
											<img src="/assets/images/icon/galgos.png">
											<span>{{current($carreras)->titulo}}</span>
										</a>
									</li>
										<?php next($carreras); ?>
									<li class="{{isset($game) && $game == current($carreras)->slug ? 'btn-carreras active' : ''}}">
										<?php $urlBell = url(\Request::path() . '?game=' . current($carreras)->slug); ?>
											<a  href="javascript:void(0);" onclick="countBelling('<?php echo $urlBell ?>','<?php echo current($carreras)->titulo ?>')"  class="btn-carreras">
											<img src="/assets/images/icon/canodromo.png">
											<span>{{current($carreras)->titulo}}</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div><!-- /.shell -->
				</section><!-- /.section-promotions -->
			@endif

			<section class="section-games-available">
				<div class="shell">
					<div class="section-head">
	                    <div class="stick--point" id="juegos"></div>
						<h2>
							Calendario y programas
						</h2>
					</div><!-- /.section-head -->

					<section class="content programas">

						<div class="left-item"> <!-- calendario -->
							<div id="datepicker" class="calendar-module" data-date="{{date('m/d/Y')}}">

							</div>
							<div class="indications">
								<ul>
									<li class="day">
										<div class="red"></div>
										<p>Día Actual</p>
									</li>
									<!--<li class="program">
										<div class="black-c"></div>
										<p>Programa</p>
									</li>-->
								</ul>
							</div>
						</div>

						<div class="right-item"> <!-- cuadro derecha -->

							@if( isset($programas) && count($programas) )
								<!--<a class="btn btn-red btn-small" id="vermes">Descarga programa del mes</a>-->
								<h3>Programas</h3>
									<div class="alert" role="alert" style="display:none">
										<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
										No hemos encontrado eventos para esta fecha, pero te podrían interesar los siguientes
									</div>
								<ul>
								@foreach($programas as $item)
									<li class="txt-left" data-fecha="{{$item->fecha}}">
										<h5>{{$item->titulo}}</h5>
											@if( trim($item->archivo) !== "" )
												<a href="{{$item->archivo}}" target="_blank">
													<img src="css/images/icons/download.png">
													Descargar programa
												</a>
											@endif
									</li>

								@endforeach
								</ul>
							@endif
						</div>
					</section>
				</div><!-- /.shell -->
			</section><!-- /.section-games-available -->

			@if(isset($promociones)){
				@include('front.includes.promotions',['promociones' => $promociones,'sucursal'=>$sucursal_info])
			@endif

			@if( isset( $torneos ) && count($torneos) )

				<section class="section section-secondary">
					<div class="shell">
						<header class="section-head">
							<div class="stick--point" id="torneos"></div>
							<h2>
								Próximos Eventos
							</h2>
						</header><!-- /.section-head -->

						<div class="section-body">
							<div class="cols promo-slider">

								@foreach( $torneos as $item )

									<div class="col col-1of2">
										<article class="article-tournament" style="background-image: url('{{ $item->archivo }}')">
											<span class="article-title">
												{{ ( strtotime( $item->fecha_inicio ) > time() ) ? 'Próximos Eventos' : 'Experiencias pasadas' }}
											</span><!-- /.article-title -->

											<div class="article-content">
												<span class="article-label">
													{{ $item->tipo }}
												</span><!-- /.article-label -->

												<h5>
													{{ $item->titulo }}
												</h5>

												<p>
													{{ date("M", strtotime( $item->fecha_inicio ) ) }} {{ date("d", strtotime( $item->fecha_inicio ) ) }} {{ date("Y", strtotime( $item->fecha_inicio ) ) }}
			 									</p>

			 									<a href="{{ ( $item->link ) ? $item->link : '/torneos/' . $item->slug }}" class="btn btn-red">
			 										Ver más
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

			<?php /*
			<section class="section section-secondary">
				<div class="shell">
					<header class="section-head">
	                    <div class="stick--point" id="torneos"></div>
						<h2>
							Próximos eventos
						</h2>
					</header><!-- /.section-head -->

					@if( isset($torneos) && count($torneos) )
						<div class="event-container">
							<div class="section-events">
								<ul>
									@foreach( $torneos as $item )
									<li>
										<img src="{{$item->archivo}}">

										<div class="content-serie">
											<h5>{{ $item->titulo }}</h5>
											<div class="serie-item">
												<ul>
													<li>
														<h4>{{date('H:i',strtotime($item->fecha_inicio))}}</h4>
													</li>
													<li>
														<p>{{date('d/m/Y',strtotime($item->fecha_inicio))}}</p>
													</li>
												</ul>
											</div>
										<div class="red-middle">
											<h5>AL</h5>
										</div>
											<div class="serie-item item-two">
												<ul>
													<li>
														<h4>{{date('H:i',strtotime($item->fecha_fin))}}</h4>
													</li>
													<li>
														<p>{{date('d/m/Y',strtotime($item->fecha_fin))}}</p>
													</li>
												</ul>
											</div>
										</div>
									</li>
									@endforeach

								</ul>
							</div>
						</div>
					@endif

				</div><!-- /.shell -->
			</section><!-- /.section section-secondary -->
			*/?>

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
						<div class="section-head">
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
											<a href="{{ url('/lineas-de-juego/'.$item->slug) }}" style="background-image: url('{{ $item->imagen }}')">
												<strong>
													<label style="color: black;"> {{$item->slug}}</label>
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

		<script type="text/javascript">
			$('#sandbox-container input').datepicker({
				    keyboardNavigation: false,
				    forceParse: false,
				    language: "es",
				    todayHighlight: true
				});
		</script>
	@stop
