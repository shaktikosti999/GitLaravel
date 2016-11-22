@extends('layout.front')
@section('contenido')
	<div class="slider-secondary">
		<a href="#" class="btn-menu">
			<img src="css/images/btn-menu@2x.png" alt="">
		</a>

		<div class="slider-clip">
			<ul class="slides">
				<li class="slide" style="background-image: url(css/images/temp/slider-secondary1.jpg)">
					<div class="slide-body">
						<div class="shell"> 		 
							 <div class="slide-content">
							 	<h1>
							 		Sucursal Tecamachalco
							 	</h1>
							 <div class="filter-secondary">
								<label for="field-filter-secondary1" class="form-label hidden">filter-secondary1</label>
								<select name="field-filter-secondary1" id="field-filter-secondary1" class="select">
									@foreach($sucursales as $item)
										<option value="{{$item->id_sucursal}}">Cambiar a Sucursal {{$item->nombre}}</option>
									@endforeach
								</select>
							</div><!-- /.filter-secondary -->
							 </div><!-- /.slide-content -->

							 @include('front.includes.breadcrumbs')
							 
							 <div class="section-actions">
								<a href="#" class="btn btn-red btn-red-small sldr-btn">
									<i class="ico-human"></i>
									Cómo llegar aquí
								</a>
							</div><!-- /.section-actions -->
						</div><!-- /.shell -->

					</div><!-- /.slide-body -->
				</li><!-- /.slide -->


				<li class="slide" style="background-image: url(css/images/temp/slider-secondary1.jpg)">
					<div class="slide-body">
						<div class="shell"> 	 
							 <div class="slide-content">
							 	<h1>
							 		mÁquinas de juego
							 	</h1>

							 	<h3>
							 		Sucursal Tecamachalco
							 	</h3>

							 <div class="filter-secondary">
								<label for="field-filter-secondary1" class="form-label hidden">filter-secondary1</label>
								<select name="field-filter-secondary1" id="field-filter-secondary1" class="select">
									<option value="">Cambiar sucursal</option>
									<option value="">Cambiar sucursal 1</option>
									<option value="">Cambiar sucursal 2 </option>
								</select>
							</div><!-- /.filter-secondary -->
							 </div><!-- /.slide-content -->

							 @include('front.includes.breadcrumbs')
						</div><!-- /.shell -->
					</div><!-- /.slide-body -->
				</li><!-- /.slide -->

				<li class="slide" style="background-image: url(css/images/temp/slider-secondary1.jpg)">
					<div class="slide-body">
						<div class="shell"> 	 
							 <div class="slide-content">
							 	<h1>
							 		mÁquinas de juego
							 	</h1>

							 	<h3>
							 		Sucursal Tecamachalco
							 	</h3>

							 <div class="filter-secondary">
								<label for="field-filter-secondary1" class="form-label hidden">filter-secondary1</label>
								<select name="field-filter-secondary1" id="field-filter-secondary1" class="select">
									<option value="">Cambiar sucursal</option>
									<option value="">Cambiar sucursal 1</option>
									<option value="">Cambiar sucursal 2 </option>
								</select>
							</div><!-- /.filter-secondary -->
							 </div><!-- /.slide-content -->

							 @include('front.includes.breadcrumbs')
						</div><!-- /.shell -->
					</div><!-- /.slide-body -->
				</li><!-- /.slide -->
			</ul><!-- /.slides -->
		</div><!-- /.slider-clip -->

		<!--<div class="slider-label red-label large">
			<i class="ico-slot"></i>
		</div> /.slider-label -->
	</div><!-- /.slider-secondary -->

	<div class="main"> 
		@if( isset($promociones) && count($promociones) )
			@include('front.includes.promotions',['promociones'=>$promociones])
		@endif

		@if( isset($juegos) && count($juegos) )
			@include('front.includes.game_machine',['maquinas'=>$juegos])
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
											{{strtotime($item->fecha) > time() ? "Próximos torneos" : "Experiencias Pasadas"}}
										</span><!-- /.article-title -->	

										<div class="article-content">
											<span class="article-label">
												{{$item->tipo}}
											</span><!-- /.article-label -->
											
											<h5>
												{{$item->titulo}}
											</h5>

											<p>
												{{ $item->fecha }} - {{$item->sucursal}}
		 									</p>

		 									<a href="{{url('/torneos/' . $item->slug)}}" class="btn btn-red">
		 										{{strtotime($item->fecha) > time() ? 'Participar' : 'Detalles'}}
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
		<?php print_r($sn); ?>
@stop