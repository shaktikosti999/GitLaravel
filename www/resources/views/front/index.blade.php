@extends('layout.front')

@section('js')
	<script src="js/front/index.js"></script>
@stop

@section('contenido')

	<!-- BEGIN: LIGHTBOX SUCURSAL
	        <section class="lightbox-etb lightbox--module">
	            <section class="modal centerme">
	                <form class="modal-item">

	                        <div class="texto-etb">
	                            <h4>Selecciona tu sucursal</h4>
	                            <div class="select btn--select">
			                        <select name="lineas de juego">
										<option>Tecamachalco</option>
										<option>Tecamachalco</option>
										<option>Tecamachalco</option>
									</select>
								</div>
	                        </div>



	                        <div class="texto-etb">
	                            <h4>Selecciona tu línea de juego</h4>
	                            <div class="select btn--select">
			                        <select name="ciudad">
										<option>Máquinas de juego</option>
										<option>Mesas de juego</option>
										<option>Apuesta deportiva</option>
										<option>Apuesta de carreras</option>
									</select>
								</div>
	                        </div>

	                        <div class="texto">
	                           <button type="button" class="btn  btn-red medium"><span>Continuar</span></button>
	                        </div>

	                        <div class="texto">
	                        <a href="#" class="btn secundary etb">Cancelar</a> 
	                        </div>

	                </form>

	                <button type="button" class="close  js-close-lightbox">
	                    <i class="fa fa-times" aria-hidden="true"></i>
	                </button> 
	            </section>
	        </section>
	<!--END: LIGHTBOX UBICACION CIUDAD -->

	<!-- BEGIN: LIGHTBOX UBICACION CIUDAD -->
	        <section class="lightbox-etb lightbox--module modal_ciudades" style="display:none;">
	            <section class="modal centerme">
	                <form class="modal-item">
	                		<div class="texto-etb">
	                            <h4>Ciudad seleccionada</h4>
	                            <div class="select select_ciudad_modal2 btn--select">
			                        <select name="ciudad_modal2">
										@if( isset($ciudades) && count($ciudades) )
			                        		@foreach($ciudades as $ciudad)
												<option value="{{$ciudad->ciudad}}" data-id="{{$ciudad->id_ciudad}}">{{$ciudad->ciudad}}</option>
											@endforeach 
										@endif
									</select>
								</div>

	                        </div>

	                        <div class="texto-etb">
	                            <h4>Selecciona tu sucursal</h4>
	                            <div class="select select_sucursal_modal2 btn--select">
			                        <select name="sucursal_modal2">
										<option value="">Seleccione sucursal</option>
									</select>
								</div>
	                        </div>

	                        <div class="texto-etb">
	                            <h4>Selecciona tu línea de juego</h4>
	                            <div class="select select_linea_modal2 btn--select">
			                        <select name="linea_modal2" required>
										<option value="">Seleccione línea</option>
									</select>
								</div>
	                        </div>
							
							<div id="message"></div>
							
	                        <div class="texto">
	                           <a role="button" class="btn  btn-red medium" id="establecimiento_go2" data-sucursal=""><span>Continuar</span></a>
	                        </div>

	                        <div class="texto">
	                        <a class="btn secundary etb modal_ciudad_btn_cancelar">Cancelar</a> 
	                        </div>

	                </form>

	                <button type="button" class="close  js-close-lightbox">
	                    <i class="fa fa-times" aria-hidden="true"></i>
	                </button> 
	            </section>
	        </section>
	<!--END: LIGHTBOX UBICACION CIUDAD -->


	<!-- BEGIN: LIGHTBOX ESTABLECIMIENTOS -->
	        <section class="lightbox-etb lightbox--module modal_establecimiento" style="display:none;">
	            <section class="modal centerme">
	                <form class="modal-item">

	                        <div class="texto-etb">
	                            <h4>Línea de juego seleccionada</h4>
	                            <div class="select select_linea_de_juegos btn--select">
			                        <select name="lineas_de_juego">
			                        	@if( isset($lineas) && count($lineas) )
			                        		@foreach($lineas as $linea)
												<option value="/lineas-de-juego/{{$linea->slug}}" data-id="{{$linea->id_linea}}">{{$linea->linea}}</option>
											@endforeach
										@endif
									</select>
								</div>
	                        </div>

	                        <div class="texto-etb">
	                            <h4>Selecciona tu ciudad</h4>
	                            <div class="select select_ciudad btn--select">
			                        <select name="linea_ciudad">
			                        	<option value="">Seleccione Ciudad</option>
									</select>
								</div>
	                        </div>

	                        <div class="texto-etb">
	                            <h4>Selecciona tu sucursal</h4>
	                            <div class="select select_linea_sucursal btn--select">
			                        <select name="linea_sucursal">
			                        	<option value="">Seleccione sucursal</option>
									</select>
								</div>
	                        </div>
	                      
	                        <div class="texto">
	                           <a role="button" class="btn  btn-red medium" id="establecimiento_go" data-sucursal=""><span>Continuar</span></a>
	                        </div>

	                        <div class="texto">
	                        <a class="btn secundary etb modal_establecimiento_btn_cancelar">Cancelar</a> 
	                        </div>

	                </form>

	                <button type="button" class="close  js-close-lightbox">
	                    <i class="fa fa-times" aria-hidden="true"></i>
	                </button> 
	            </section>
	        </section>
	<!-- END: LIGHTBOX ESTABLECIMIENTOS -->

	<!-- BEGIN: ¡¡¡¡¡LIGHTBOX ATENCIÓN ALTERNATIVA!!!!
	        <section class="lightbox lightbox--module">
	            <section class="modal centerme">
	                <form class="modal-item">
	                		<div class="icon-texto">
	                			<i class="fa fa-map-marker" aria-hidden="true"></i>
	                		</div>
	                        <div class="texto">
	                            <h2>Atención</h2>
	                            <p>Calientecasino.com.mx requiere de tu concentimiento para activar el GPS para rastrear tu ubicación.</p>
	                        </div>

	                        <div class="texto">
	                        	<a href="#" class="btn secundary">No activar</a> 
	                        </div>

	                        <div class="texto">
	                           <button type="button" class="btn  btn-red primary"><span>Activar</span></button>
	                        </div>
	                </form>

	                <button type="button" class="close  js-close-lightbox">
	                    <i class="fa fa-times" aria-hidden="true"></i>
	                </button> 
	            </section>
	        </section>
	END: LIGHTBOX ATENCIÓN -->

	@if( isset( $slider ) && count( $slider ) )

		<div class="slider-intro anchor">
			<!-- <a href="#" class="btn-scroll">
				<i class="ico-mouse"></i>
			</a> -->

			<div class="slider-clip">
				<ul class="slides">
					
					@foreach( $slider as $s )
					
						
						
						<li class="slide fullscreen" style="background-image: url({{ $s->imagen }});">
							<div class="slide-content ">
								<!--<div class="shell"-->
									<h1>{{ $s->titulo }}</h1>
									<!--h1>
										Navidad Excepcional
									</h1-->
									
									<!-- <a href="{{ $s->link }}" class="btn btn-white">{{ $s->texto_boton }} <i class="ico-arrow-right"></i></a> -->

								<!--</div> /.shell -->
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
					<div class="shell shell-btn">
						<ul class="list-buttons">

							@foreach( $lineas as $linea )

								<li>
									<a data-href="{{ '/lineas-de-juego/' . $linea->slug }}" class="btn btn-features modal_linea">
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
						<div class="slider-games sldr-top">
							<div class="section-head">
								<h2>Promociones</h2>
							
								<div class="slider-clip">
									<ul class="slides">
										
										@foreach( $promociones as $p )

											<li class="slide"> 									
												<div class="slide-content" style="background-image: url({{ $p->imagen }}); ">
													<div class="slide-caption">
														<a href="{{url('/promociones/detalle/' . $p->slug)}}">
															<p>{{ $p->nombre }}</p>
														</a>
														
														<!--span>Club&reg;</span-->
													</div><!-- /.slide-caption -->
												</div><!-- /.slide-content -->
											</li><!-- /.slide -->

										@endforeach

										
									</ul><!-- /.slides -->
								</div><!-- /.slider-clip -->
							</div>
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

		@if( isset( $lineas ) && count( $lineas ) && 1==2 )

			<section class="section-features">
				<div class="shell">
					<div class="section-head">
						<h2>Selecciona tu línea de juego</h2>
					</div><!-- /.section-head -->
					
					<div class="section-body">
						<ul class="features">
							
							@foreach( $lineas as $linea )

								<li class="feature">
									<a class="modal_linea" data-href="{{ '/lineas-de-juego/' . $linea->slug }}"> 		
										<span class="feature-image" style="background-image: url({{ $linea->imagen }});"></span><!-- /.feature-image -->
										
										<span class="feature-content">
											<span class="icon-wrapper">
												<i class="{{ $linea->icono }}"></i>
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

		@if( isset( $rand_sucursal ) )<!--{-->

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

								<div class="select btn-ubn select_ciudad_mapa"> <!-- BEGIN boton sucursal -->
			                        <select name="ciudad_mapa">
										<option value="">Seleccione la ciudad</option>
										@if( isset($ciudades) && count($ciudades) )
			                        		@foreach($ciudades as $ciudad)
												<option data-id="{{$ciudad->id_ciudad}}" data-ciudad="{{$ciudad->ciudad}}">{{$ciudad->ciudad}}</option>
											@endforeach 
										@endif
									</select> <!-- END boton sucursal -->
								</div>

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

										<p>
											{!! $rand_sucursal->horario !!}
										</p>
									</li>
									
									<li>
										<i class="ico-car"></i>

										<p>
											{!! $rand_sucursal->instrucciones !!}
										</p>
									</li>

									<li>
										<i class="ico-car"></i>

										<p>
											{!! $rand_sucursal->oferta !!}
										</p>
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
					<h2>{{$footer_text->titulo}}</h2>
				</div><!-- /.section-head -->

				<div class="section-entry">{!!$footer_text->texto!!}</div><!-- /.section-entry -->
			</div><!-- /.shell -->
		</section><!-- /.section-gallery -->
	</div><!-- /.main -->

@stop