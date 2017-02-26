@extends('layout.front')
	@section('js')
		<script>

			$( function(){

				$(".branch-filter").change( function(){

					var $value = $( this ).val();
					var $url   = "/lineas-de-juego/mesas-de-juego";

					if( $value != -1 ){

						$url = "/lineas-de-juego/mesas-de-juego/" + $value;

					}

					$( location ).attr("href", $url);

				} );

			} )

		</script>
		<script src="js/front/mesas.js"></script>
	@stop

	@section('contenido')
		
		<div class="wrapper">
	    
	    <div class="stick-nav"><!-- Stick nav -->
	        <ul>
	            {!!isset( $promociones ) && count( $promociones ) ? '<li><a href="#promociones"><img src="/assets/images/icon/todas-las-promociones.svg"><span>Promociones</span></a></li>' : ''!!}
	            {!!isset($mesas) && count($mesas) ? '<li><a href="#juegos"><img src="/assets/images/icon/juegos-de-mesa.svg"><span>Juegos</span></a></li>' : ''!!}
	            <li><a href="#jackpot"><img src="/assets/images/icon/jackpot.svg"><span>Jackpot</span></a></li>
	            {!!isset( $torneos ) && count($torneos) ? '<li><a href="#torneos"><img src="/assets/images/icon/torneos.svg"><span>Torneos</span></a></li>' : '' !!}
	            <!--<li><a href="#sucursales"><img src="css/images/icons/icon-5.png"><span>Ubicación</span></a></li>-->
	            {!!isset( $otras ) && count( $otras ) ? '<li><a href="#diversion"><img src="/assets/images/icon/diversion.svg"><span>Diversión</span></a></li>' : '' !!}
	        </ul>
	    </div>

		<div class="slider-secondary">
			<div class="slider-clip">
				<ul class="slides">
					@if( count( $slider ) )

						@foreach( $slider as $item )

							<li class="slide" style="background-image: url({{ $item->imagen }})">
								<div class="slide-body">
									<div class="shell"> 		 
										 <div class="slide-content">
										 	<h1>
										 		Mesas de juego
										 	</h1>
											 	
											 	<h3>
											 		@if( isset( $sucursal_info->nombre ) )
											 			
											 			{{ $sucursal_info->nombre }}

											 		@endif
											 	</h3>
										 	
										 	

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

						@endforeach

					@endif

				</ul><!-- /.slides -->
			</div><!-- /.slider-clip -->

			<div class="slider-label red-label second">
				<i class="ico-die"></i>
			</div><!-- /.slider-label -->
		</div><!-- /.slider-secondary -->

		<div class="main"> 
			@if( isset( $promociones ) && count( $promociones ) )

				@include('front.includes.promotions',['promociones' => $promociones,'sucursal'=>$sucursal_info])

			@endif

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
																<a href="#" class="link-more ver-mesa" data-id="{{$mesa->id}}" data-sucursal="{{isset($mesa->id_sucursal) && !empty($mesa->id_sucursal) ? $mesa->id_sucursal : "0"}}">
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

			@if( isset($porpagar) && count($porpagar) )
				@foreach($porpagar as $item)
					<section class="section-jackpots secondary">
						<div class="shell">
							<header class="section-head">
								<div class="stick--point" id="jackpot"></div>
								<h2>
									<small>{{$item->titulo}}</small>
									Jackpot
								</h2> 
							</header><!-- /.section-head -->

							<div class="section-content">
								<div class="section-entry">
									<p>
										<span>
											Por pagar
										</span>

										{{-- <a href="#">
											Ver más
										</a> --}}
									</p>
								</div><!-- /.section-entry -->

								<div class="cols">
									<div class="col col-1of1">
										<article class="article-jackpot">
											<div class="article-content"> 

												<div class="fake-div">
													<div id="counter">
													    <div class="counter-value">${{number_format($item->cantidad)}} <em>MN</em></div>
													</div>
												</div>
											</div><!-- /.article-content -->
										</article><!-- /.article-jackpot -->
									</div><!-- /.col col-1of1 --> 
								</div><!-- /.cols --> 
							</div><!-- /.section-content --> 
						</div><!-- /.shell -->
					</section><!-- /.section-jackpots -->
				@endforeach
			@endif

			@if( isset( $torneos ) && count($torneos) )

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
										<article class="article-tournament" style="background-image: url('{{ $item->archivo }}')"> 
											<span class="article-title">
												{{ ( strtotime( $item->fecha_inicio ) > time() ) ? 'Próximos torneos' : 'Experiencias pasadas' }}
											</span><!-- /.article-title -->	

											<div class="article-content">
												<span class="article-label">
													{{ $item->tipo }}
												</span><!-- /.article-label -->
												
												<h5>
													{{ $item->titulo }}
												</h5>

												<p>
													{{ date("M", strtotime( $item->fecha_inicio ) ) }} {{ date("d", strtotime( $item->fecha_inicio ) ) }} {{ date("Y", strtotime( $item->fecha_inicio ) ) }} al {{ date("M", strtotime( $item->fecha_fin ) ) }} {{ date("d", strtotime( $item->fecha_fin ) ) }} {{ date("Y", strtotime( $item->fecha_fin ) ) }}
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
											<p>
												{!! $sucursal_info->horario !!}
											</p>
										</li>
										
										<li>
											<i class="ico-car"></i>
											<p>
												{!! $sucursal_info->instrucciones !!}
											</p>
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

		<script type="text/javascript">
	// jQuery Counter
			// var a = 0;
			// 	$(window).scroll(function() {

			// 	  var oTop = $('#counter').offset().top - window.innerHeight;
			// 	  if (a == 0 && $(window).scrollTop() > oTop) {
			// 	    $('.counter-value').each(function() {
			// 	      var $this = $(this),
			// 	        countTo = $this.attr('data-count');
			// 	      $({
			// 	        countNum: $this.text()
			// 	      }).animate({
			// 	          countNum: countTo
			// 	        },

			// 	        {

			// 	          duration: 2000,
			// 	          easing: 'swing',
			// 	          step: function() {
			// 	            $this.text(Math.floor(this.countNum));
			// 	          },
			// 	          complete: function() {
			// 	            $this.text(this.countNum);
			// 	            //alert('finished');
			// 	          }

			// 	        });
			// 	    });
			// 	    a = 1;
			// 	  }

			// 	});
	</script>

	@stop
