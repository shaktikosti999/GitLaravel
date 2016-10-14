@extends('layout.front')
@section('contenido')

	@if( isset( $slider ) && count( $slider ) )

		<div class="slider-intro anchor">
			<a href="#" class="btn-scroll">
				<i class="ico-mouse"></i>
			</a>

			<div class="slider-clip">
				<ul class="slides">
					
					@foreach( $slider as $s )

						<li class="slide fullscreen" style="background-image: url({{ $s->imagen }});">
							<div class="slide-content">
								<div class="shell">
									<h1>{{ $s->titulo }}</h1>
									
									<a href="{{ $s->link }}" class="btn btn-white">{{ $s->texto_boton }} <i class="ico-arrow-right"></i></a>

								</div><!-- /.shell -->
							</div><!-- /.slide-content -->
						</li><!-- /.slide -->

					@endforeach

					
				</ul><!-- /.slides -->
			</div><!-- /.slider-clip -->
		</div><!-- /.slider-intro -->

	@endif

	
	<div class="main anchor">
		
		@if( isset( $lineas ) && count( $lineas ) )

				<section class="button-section">
					<div class="shell">
						<ul class="list-buttons">

							@foreach( $lineas as $linea )

								<li>
									<a href="{{ '/lineas-de-juego/' . $linea->slug }}" class="btn btn-features">
										<i class="{{ $linea->icono }}"></i>
										
										<span>{{ $linea->linea }}</span> 
									</a>
								</li>

							@endforeach

						</ul><!-- /.list-buttons -->
					</div><!-- /.shell -->	
				</section><!-- /.button-section -->

		@endif

		<section class="section-slider">
			<div class="shell">
				
				@if( isset( $promociones ) && count( $promociones ) )

					<div class="section-body">
						<div class="slider-games">
							<div class="slider-clip">
								<ul class="slides">
									
									@foreach( $promociones as $p )

										<li class="slide"> 									
											<div class="slide-content" style="background-image: url({{ $p->imagen }}); ">
												<div class="slide-caption">
													<p>{{ $p->nombre }}</p>
													
													<!--span>Club&reg;</span-->
												</div><!-- /.slide-caption -->
											</div><!-- /.slide-content -->
										</li><!-- /.slide -->

									@endforeach

									
								</ul><!-- /.slides -->
							</div><!-- /.slider-clip -->
						</div><!-- /.slider-games -->
					</div><!-- /.section-body -->

				@endif

				<div class="section-actions">
					<a href="/promociones" class="btn btn-border">
						<i class="ico-square"></i>

						todas las promociones
					</a>
				</div><!-- /.section-actions -->
			</div><!-- /.shell -->
		</section><!-- /.section-slider -->

		@if( isset( $lineas ) && count( $lineas ) )

			<section class="section-features">
				<div class="shell">
					<div class="section-head">
						<h2>Selecciona tu línea de juego</h2>
					</div><!-- /.section-head -->
					
					<div class="section-body">
						<ul class="features">
							
							@foreach( $lineas as $linea )

								<li class="feature">
									<a href="{{ '/lineas-de-juego/' . $linea->slug }}"> 		
										<span class="feature-image" style="background-image: url({{ $linea->imagen }});"></span><!-- /.feature-image -->
										
										<span class="feature-content">
											<span class="icon-wrapper">
												<i class="{{ $linea->icono }}-small"></i>
											</span><!-- /.icon-wrapper -->
											
											<small>{{ $linea->linea }}</small>
											
											<strong>{{ $linea->slogan }}</strong>
										</span><!-- /.feature-content --> 
									</a>
								</li><!-- /.feature -->

							@endforeach
							
							
						</ul><!-- /.features -->
					</div><!-- /.section-body -->
				</div><!-- /.shell -->
			</section><!-- /.section-features -->

		@endif

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

		@if( isset( $rand_sucursal ) ){

			<section class="section-map">
				<div class="section-head">
					<div class="shell">
						<h2>Selecciona el casino de tu preferencia</h2>
					</div><!-- /.shell -->
				</div><!-- /.section-head -->
				
				<div class="section-body">
					<div id="googlemap" data-lng="-97.727616" data-lat="18.884188"></div><!-- /#googlemap --> 
				
					<div class="section-content">
						<div class="shell">
							<div class="section-content-head">
								<p>Sucursal</p>
								
								<h2>{{ $rand_sucursal->nombre }}</h2>
							</div><!-- /.section-content-head -->
									
							<div class="section-content-body">
								<ul class="list-contacts">
									<li>
										<i class="ico-map"></i>
									
										<p>
											{!! $rand_sucursal->direccion !!}
										</p>
									</li>
									
									<li>
										<i class="ico-phone"></i>
									
										<p>
											{!! $rand_sucursal->telefono !!}
										</p>
									</li>
									
									<li>
										<i class="ico-clock"></i>
									
										{!! $rand_sucursal->horario !!}
									</li>
									
									<li>
										<i class="ico-car"></i>
									
										{!! $rand_sucursal->instrucciones !!}
									</li>
								</ul><!-- /.list-contacts -->
							</div><!-- /.section-content-body -->
						</div><!-- /.shell -->
						
						<div class="section-actions">
							<a href="http://www.google.com/maps/place/{{ $rand_sucursal->latitud . "," . $rand_sucursal->longitud }}" target="_blank" class="btn btn-red btn-red-small">
								<i class="ico-human"></i>

								Cómo llegar aquí
							</a>
						</div><!-- /.section-actions -->
					</div><!-- /.section-content -->

				</div><!-- /.section-body -->
			</section><!-- /.section-map -->

		@endif

		<section class="section-gallery">
			<div class="shell">
				
				@if( isset( $rand_sucursal->galeria ) && is_array( $rand_sucursal->galeria ) && count( $rand_sucursal->galeria ) )

					<div class="slider-gallery">
						<div class="slider-clip">
							
							<ul class="slides">
								
								@foreach( $rand_sucursal->galeria as $g )

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

				<div class="section-head">
					<h2>Caliente</h2>
				</div><!-- /.section-head -->

				<div class="section-entry">
					<p>Sweet roll bonbon icing. Macaroon chocolate cake sweet jelly beans. Sugar plum caramels macaroon. Chocolate bar danish dessert danish sweet roll marzipan.</p>
					
					<p>Cake croissant cheesecake jelly lollipop cotton candy gingerbread biscuit ice cream. Macaroon candy oat cake lemon drops danish. Pastry marzipan danish jujubes chupa chups donut topping. Apple pie liquorice dragée liquorice marzipan gummi bears.</p>
					
					<p>Pastry tootsie roll topping macaroon macaroon dragée gummies. Marzipan ice cream cheesecake fruitcake. Caramels topping candy lemon drops soufflé biscuit. Jelly-o apple pie chocolate tart oat cake gummies. Soufflé pudding icing bear claw.</p>
				</div><!-- /.section-entry -->
			</div><!-- /.shell -->
		</section><!-- /.section-gallery -->
	</div><!-- /.main -->

@stop
