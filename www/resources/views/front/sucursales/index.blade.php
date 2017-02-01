@extends('layout.front')
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
						@if( isset($slider) && count($slider) )
							@foreach($slider as $value)
								<li class="slide" style="background-image: url({{asset($value->imagen)}})">
									<div class="slide-body">
										<div class="shell"> 		 
											 <div class="slide-content">
											 	<?php /*{!! isset( $sucursal ) ? '<h1>' . $sucursal->nombre . '</h1>' : '' !!}
												@if( isset( $sucursales ) && count( $sucursales ) )
													<div class="filter-secondary">
														<label for="selec_sucursales" class="form-label hidden">filter-secondary1</label>
														<select name="selec_sucursales" id="selec_sucursales" class="select branch-filter2">
															<option value="-1">Selecciona ubicaión</option>
															@foreach( $sucursales as $item )
																<option value="{{ $item->slug }}">Sucursal {{ $item->nombre }}</option>
															@endforeach
														</select>
													</div><!-- /.filter-secondary -->
												@endif*/?>
											 </div><!-- /.slide-content -->
											 @include('front.includes.breadcrumbs')
											 @if (isset($sucursal))
											 	<div class="section-actions">
													<a href="http://www.google.com/maps/place/{{ $sucursal->latitud . "," . $sucursal->longitud }}" target="_blank" class="btn btn-red btn-red-small sldr-btn">
														<i class="ico-human"></i>
														Cómo llegar aquí
													</a>
												</div><!-- /.section-actions -->
											 @endif							 
										</div><!-- /.shell -->
									</div><!-- /.slide-body -->
								</li><!-- /.slide -->
							@endforeach
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
				<header class="section-head">
                    <div class="stick--point" id="jackpot"></div>
					<h2>
						<small>Jackpot</small>
						Acumulado
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

						@foreach ($maquinas_acumulado as $maquina)
							<div class="col col-1of2">
								<article class="article-jackpot">
									<div class="article-content">
										<h6>
											{{$maquina->nombre}} 
										</h6>

										<p>
											${{$maquina->acumulado}}
										</p>
									</div><!-- /.article-content -->
								</article><!-- /.article-jackpot -->
							</div><!-- /.col col-1of2 -->
						@endforeach
						
					</div><!-- /.cols -->

					<div class="section-entry">
						<p>
							<span>
								Pagado
							</span>

							<a href="#">
								Conoce más detalle
							</a>
						</p>
					</div><!-- /.section-entry -->

					<div class="cols">
						<div class="col col-1of2">
							<article class="article-jackpot">
								<div class="article-content">
									<h6>
										MÁquina rodillo A 
									</h6>

									<p>
										$293,939.93
									</p>
								</div><!-- /.article-content -->
							</article><!-- /.article-jackpot -->
						</div><!-- /.col col-1of2 -->

						<div class="col col-1of2">
							<article class="article-jackpot">
								<div class="article-content">
									<h6>
										MÁquina bingo A 
									</h6>

									<p>
										$562,241.62 									
									</p>
								</div><!-- /.article-content -->
							</article><!-- /.article-jackpot -->
						</div><!-- /.col col-1of2 -->
					</div><!-- /.cols -->
				</div><!-- /.section-content --> 
			</div><!-- /.shell -->
		</section><!-- /.section-jackpots -->

		<section class="section-games-available">
			<div class="shell">
				<div class="section-head">
                    <div class="stick--point" id="juegos"></div>
					<h2>
						Juegos disponibles
					</h2>
				</div><!-- /.section-head -->
				
				@if(isset($mesas) && count($mesas))
					<div class="section-body">					
						<aside class="section-aside">
							<article class="article-game-available large">
					 			<div class="article-content">
					 				<div class="article-image" style="background-image: url({{current($mesas)->imagen}})">  
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
					 						<small>
					 							{{current($mesas)->disponibles}} mesas
					 						</small>
					 					</h4><!-- /.article-title -->

										<p>
											{{current($mesas)->resumen}}
										</p>

										<ul class="list-links">
											<li>
												<a href="{{url('aprende_a_jugar')}}" class="btn btn-border">
													Aprende a jugar
												</a>
											</li>

											<li>
												<a href="{{url('reglas')}}" class="btn btn-border btn-border-grey">
													Reglas
												</a>
											</li>
										</ul><!-- /.list-links -->
					 				</div><!-- /.article-entry -->
					 			</div><!-- /.article-content -->
					 		</article><!-- /.article-game-available large -->
						</aside><!-- /.section-aside -->
						
						<?php array_shift($mesas); $c = 0; $x = 0; ?>
						<div class="section-content">
							<div class="slider-games-available">
								<div class="slider-clip">
									<ul class="slides">									
										@foreach($mesas as $mesa)										
											@if( ($c % 4) == 0 )											
												<li class="slide">
												 	<div class="slide-content">  
													 	<div class="cols">
											@endif
															<div class="col col-1of2">
																<article class="article-game-available small">
																	<h6>
																		{{$mesa->nombre}}

																		<span class="plus"></span>
																	</h6>
																
																<div class="article-image" style="background-image: url({{$mesa->imagen}})"> </div><!-- /.article-image -->

																<a href="#" class="link-more">
																	Ver más
																</a>
																</article><!-- /.article-game-available small -->
															</div><!-- /.col col-1of2 -->

												<?php $c++; $x = $c - 1; ?>
										@endforeach
										@if( ($x % 4) == 0 )
												 	</div><!-- /.cols -->
												</div><!-- /.slide-content -->
											</li><!-- /.slide -->
										@endif
									</ul><!-- /.slides -->
								</div><!-- /.slider-clip -->
							</div><!-- /.slider-games-available -->
						</div><!-- /.section-content --> 
					</div><!-- /.section-body -->
				@endif				

			</div><!-- /.shell -->
		</section><!-- /.section-games-available -->

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
							<a href="#" class="btn btn-red btn-red-small">
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