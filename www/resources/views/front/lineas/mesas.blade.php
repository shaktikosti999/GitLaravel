@extends('layout.front')
@section('contenido')

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
										 			
										 			Sucursal {{ $sucursal_info->nombre }}

										 		@endif
										 	</h3>
									 	
									 	

									@if( isset( $sucursales ) && count( $sucursales ) )

										<div class="filter-secondary">
											<label for="field-filter-secondary1" class="form-label hidden">filter-secondary1</label>
											<select name="field-filter-secondary1" id="field-filter-secondary1" class="select branch-filter">
												
												<option value="-1">Selecciona una sucursal</option>

												@foreach( $sucursales as $item )

													<option value="{{ $item->slug }}" <?php ( $sucursal && $sucursal == $item->slug ) ? print "selected" : print "" ?>>{{ $item->nombre }}</option>

												@endforeach
												
											</select>
										</div><!-- /.filter-secondary -->

									@endif


									 </div><!-- /.slide-content -->

									 <div class="slide-inner">
									 	<p class="breadcrumbs">
											<a href="#">Inicio</a>

											<a href="#">Mesas de juego</a>

											<a href="#">Sucursal Tecamachalco</a>
										</p><!-- /.breadcrumbs -->
									 </div><!-- /.slide-inner --> 
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

			<section class="section-promotions">
				<div class="shell">
					<header class="section-head">
						<h2>
							Promociones
						</h2>

						<a href="#" class="btn btn-black">
							consulta calendario completo
						</a>
					</header><!-- /.section-head -->
					
					<div class="section-body">
						<div class="slider-games slider-promotions">
							<div class="slider-clip">
								
								<ul class="slides">
									
									@foreach( $promociones as $item )

										<?php

											$start = new DateTime( $item->fecha_inicio );
											$end   = new DateTime( $item->fecha_fin );

										?>

										<li class="slide">
											<a href="#" class="slide-content" style="background-image: url('{{ $item->imagen }}'); ">
												 <span class="slide-label">
												 	Válido del {{ $start->format('d/m/y') }} al {{ @$end->format('d/m/y') }}
												 </span>

												 <span class="slide-inner">
												 	<span class="slide-inner-entry">
												 		<strong>{{ $item->nombre }}</strong>
												 	</span>

												 	<span class="slide-inner-price">
												 		{{ $item->resumen }}
												 	</span>
												 </span>
											</a><!-- /.slide-content -->
										</li><!-- /.slide -->

									@endforeach

								</ul><!-- /.slides -->

							</div><!-- /.slider-clip -->
						</div><!-- /.slider-games -->
					</div><!-- /.section-body -->	
				</div><!-- /.shell -->
			</section><!-- /.section-promotions -->

		@endif

		<section class="section-games-available">
			<div class="shell">
				<div class="section-head">
					<h2>
						Juegos disponibles
					</h2>
				</div><!-- /.section-head -->

				<div class="section-body">
					<aside class="section-aside">
						<article class="article-game-available large">
				 			<div class="article-content">
				 				<div class="article-image" style="background-image: url(css/images/temp/article-game-available-large-bg.jpg)">  
				 					<div class="article-label">
				 						<span> Apuesta Mínima DESDE </span>

				 						<strong> 40 </strong>
				 					</div><!-- /.article-label -->

				 					<div class="article-max-price">
				 						CONSULTA MONTOS MÁXIMOS DE APUESTA EN EL CASINO
				 					</div><!-- /.article-max-price -->
				 				</div><!-- /.article-image -->

				 				<div class="article-entry">
				 					<h4 class="article-title">
				 						Ruelta
				 						<small>
				 							2 mesas
				 						</small>
				 					</h4><!-- /.article-title -->

									<p>
										Candy jelly beans ice cream candy tootsie roll. Cotton candy pudding dragée sesame snaps chupa chups cupcake chocolate bar powder.  
									</p>

									<ul class="list-links">
										<li>
											<a href="#" class="btn btn-border">
												Aprende a jugar
											</a>
										</li>

										<li>
											<a href="#" class="btn btn-border btn-border-grey">
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
							<ul class="slides">
								<li class="slide">
									 <div class="slide-content">  
										 	<div class="cols">
												<div class="col col-1of2">
													<article class="article-game-available small">
														<h6>
															Blackjack

															<span class="plus"></span>
														</h6>
													
													<div class="article-image" style="background-image: url(css/images/temp/.article-game-available.small1.jpg)"> </div><!-- /.article-image -->

													<a href="#" class="link-more">
														Ver más
													</a>
													</article><!-- /.article-game-available small -->
												</div><!-- /.col col-1of2 -->

												<div class="col col-1of2">
													<article class="article-game-available small">
														<h6>
															Poker Texas holdem 

															<span class="plus"></span>
														</h6>
													
													<div class="article-image" style="background-image: url(css/images/temp/.article-game-available.small2.jpg)"> </div><!-- /.article-image -->

													<a href="#" class="link-more">
														Ver más
													</a>
													</article><!-- /.article-game-available small -->
												</div><!-- /.col col-1of2 -->

												<div class="col col-1of2">
													<article class="article-game-available small">
														<h6>
															Ruleta

															<span class="plus"></span>
														</h6>
													
													<div class="article-image" style="background-image: url(css/images/temp/.article-game-available.small3.jpg)"> </div><!-- /.article-image -->

													<a href="#" class="link-more">
														Ver más
													</a>
													</article><!-- /.article-game-available small -->
												</div><!-- /.col col-1of2 -->

												<div class="col col-1of2">
													<article class="article-game-available small">
														<h6>
															Baccarat

															<span class="plus"></span>
														</h6>
													
													<div class="article-image" style="background-image: url(css/images/temp/.article-game-available.small4.jpg)"> </div><!-- /.article-image -->

													<a href="#" class="link-more">
														Ver más
													</a>
													</article><!-- /.article-game-available small -->
												</div><!-- /.col col-1of2 -->
										 	</div><!-- /.cols -->
										 </div><!-- /.slide-content -->
									</li><!-- /.slide -->

									<li class="slide">
										 <div class="slide-content"> 
										 	<div class="cols">
												<div class="col col-1of2">
													<article class="article-game-available small">
														<h6>
															Blackjack

															<span class="plus"></span>
														</h6>
													
													<div class="article-image" style="background-image: url(css/images/temp/.article-game-available.small1.jpg)"> </div><!-- /.article-image -->

													<a href="#" class="link-more">
														Ver más
													</a>
													</article><!-- /.article-game-available small -->
												</div><!-- /.col col-1of2 -->

												<div class="col col-1of2">
													<article class="article-game-available small">
														<h6>
															Poker Texas holdem 

															<span class="plus"></span>
														</h6>
													
													<div class="article-image" style="background-image: url(css/images/temp/.article-game-available.small2.jpg)"> </div><!-- /.article-image -->

													<a href="#" class="link-more">
														Ver más
													</a>
													</article><!-- /.article-game-available small -->
												</div><!-- /.col col-1of2 -->

												<div class="col col-1of2">
													<article class="article-game-available small">
														<h6>
															Ruleta

															<span class="plus"></span>
														</h6>
													
													<div class="article-image" style="background-image: url(css/images/temp/.article-game-available.small3.jpg)"> </div><!-- /.article-image -->

													<a href="#" class="link-more">
														Ver más
													</a>
													</article><!-- /.article-game-available small -->
												</div><!-- /.col col-1of2 -->

												<div class="col col-1of2">
													<article class="article-game-available small">
														<h6>
															Baccarat

															<span class="plus"></span>
														</h6>
													
													<div class="article-image" style="background-image: url(css/images/temp/.article-game-available.small4.jpg)"> </div><!-- /.article-image -->

													<a href="#" class="link-more">
														Ver más
													</a>
													</article><!-- /.article-game-available small -->
												</div><!-- /.col col-1of2 -->
										 	</div><!-- /.cols -->
										 </div><!-- /.slide-content -->
									</li><!-- /.slide -->
								</ul><!-- /.slides -->
							</div><!-- /.slider-clip -->
						</div><!-- /.slider-games-available -->
					</div><!-- /.section-content --> 
				</div><!-- /.section-body -->
			</div><!-- /.shell -->
		</section><!-- /.section-games-available -->

		<section class="section-jackpots secondary">
			<div class="shell">
				<header class="section-head">
					<h2>
						<small>Bad Beat</small>
						Jackpot
					</h2> 
				</header><!-- /.section-head -->

				<div class="section-content">
					<div class="section-entry">
						<p>
							<span>
								Por pagar
							</span>

							<a href="#">
								Ver más
							</a>
						</p>
					</div><!-- /.section-entry -->

					<div class="cols">
						<div class="col col-1of1">
							<article class="article-jackpot">
								<div class="article-content"> 
									<p>
										$293,939.93
									</p>
								</div><!-- /.article-content -->
							</article><!-- /.article-jackpot -->
						</div><!-- /.col col-1of1 --> 
					</div><!-- /.cols --> 
				</div><!-- /.section-content --> 
			</div><!-- /.shell -->
		</section><!-- /.section-jackpots -->

		<section class="section section-secondary">
			<div class="shell">
				<header class="section-head">
					<h2>
						Torneos
					</h2>
				</header><!-- /.section-head -->

				<div class="section-body">
					<div class="cols">
						<div class="col col-1of2">
							<article class="article-tournament" style="background-image: url(css/images/temp/tournament1.jpg)"> 
								<span class="article-title">
									Próximos torneos
								</span><!-- /.article-title -->	

								<div class="article-content">
									<span class="article-label">
										Final
									</span><!-- /.article-label -->
									
									<h5>
										Poker Texas Holdem
									</h5>

									<p>
										Marzo 26 - Tecamachalco
 									</p>

 									<a href="#" class="btn btn-red">
 										Participar
 									</a>
								</div><!-- /.article-content -->
							</article><!-- /.article-tournament -->
						</div><!-- /.col col-1of2 -->

						<div class="col col-1of2">
							<article class="article-tournament" style="background-image: url(css/images/temp/tournament2.jpg)"> 
								<span class="article-title">
									eXPERIENCIAS PASADAS
								</span><!-- /.article-title -->	

								<div class="article-content">
									<span class="article-label">
										Torneo regional 
									</span><!-- /.article-label -->
									
									<h5>
										Poker Texas Holdem
									</h5>

									<p>
										Enero 17 - Morelia 
 									</p>

 									<a href="#" class="btn btn-red">
 										Ver más
 									</a>
								</div><!-- /.article-content -->
							</article><!-- /.article-tournament -->
						</div><!-- /.col col-1of2 -->
					</div><!-- /.cols -->
				</div><!-- /.section-body -->
			</div><!-- /.shell -->
		</section><!-- /.section section-secondary -->

		<section class="section-gray">
			<div class="shell">
				<div class="subscribe">
					<form action="?" method="post">
						<div class="subscribe-head">
							<h2>Regístrate a nuestro newsletter</h2>
						</div><!-- /.subscribe-head -->

						<div class="subscribe-wrapper">
							<a href="#" class="btn btn-red btn-form">Deseo recibir noticaciones</a>

							<div class="subscribe-body-hidden">
								<div class="subscribe-inner">
									<label for="mail" class="hidden">Email</label>
									
									<input type="email" id="mail" name="mail" value="" placeholder="Email" class="subscribe-field">
									
									<input type="submit" value="Enviar" class="subscribe-btn btn btn-red">
								</div><!-- /.subscribe-inner -->

								<div class="subscribe-actions">
									<ul class="list-checkboxes">
										<li>
											<div class="checkbox">
												<input type="checkbox" name="field-notifications" id="field-notifications">
												
												<label class="form-label" for="field-notifications">Deseo recibir notificaciones</label>
											</div><!-- /.checkbox -->
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
										<a href="{{ '/lineas-de-juego/' . $item->slug }}" style="background-image: url('{{ $item->imagen }}')"> 
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

@stop
