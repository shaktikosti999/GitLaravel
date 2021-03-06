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

	<!-- BEGIN: LIGHTBOX UBICACION CIUDAD 2 -->
	        <section class="lightbox-etb lightbox--module modal_ciudades" style="display:none;">
	            <section class="modal centerme">
	                <form class="modal-item">
	                		<div class="texto-etb">
	                            <h4>Selecciona tu ciudad</h4>
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
	                            <h4>Selecciona tu casino</h4>
	                            <div class="select select_sucursal_modal2 btn--select">
			                        <select name="sucursal_modal2">
										<option value="">Selecciona tu casino</option>
									</select>
								</div>
	                        </div>

	                        <div class="texto-etb">
	                            <h4>Selecciona tu diversión</h4>
	                            <div class="select select_linea_modal2 btn--select">
			                        <select name="linea_modal2" required>
										<option value="">Selecciona tu diversión</option>
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


	<!-- BEGIN: LIGHTBOX ESTABLECIMIENTOS 1 -->
	        <section class="lightbox-etb lightbox--module modal_establecimiento" style="display:none;">
	            <section class="modal centerme">
	                <form class="modal-item">

	                        <div class="texto-etb">
	                            <h4>Selecciona tu diversión</h4>
	                            <div class="select select_linea_de_juegos btn--select">
	                            	<h5>Selecciona tu diversió</h5>
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
	                            <h4>Selecciona tu ciudad </h4>
	                            <div class="select select_ciudad btn--select">
			                        <select name="linea_ciudad">
			                        	<option value="">Selecciona tu ciudad </option>
									</select>
								</div>
	                        </div>

	                        <div class="texto-etb">
	                            <h4>Selecciona tu casino</h4>
	                            <div class="select select_linea_sucursal btn--select">
			                        <select name="linea_sucursal">
			                        	<option value="">Selecciona tu casino</option>
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
				@if( isset( $slider ) && count( $slider ) > 1 )
					<ul class="slides">
				@endif
					@foreach( $slider as $s )
						@if($s->is_show_img_video)
							<li class="slide fullscreen">
								{{--<iframe width="100%" height="100%" src="https://www.youtube.com/embed/NNqhURzgEOY" frameborder="0" allowfullscreen></iframe>--}}
								<embed  width="100%" height="100%" src="{{$s->video_url}}">
							</li>
						@else
							<li class="slide fullscreen" style="background-image: url({{ $s->imagen }});">
								<div class="slide-body slide-body--filter slide-body--home">
									<div class="slide-content ">
											<h1><?php echo html_entity_decode($s->titulo); ?></h1>
											@if(isset($s->texto_boton))
												<form action="{{$s->link}}" target="{{$s->is_new_tab}}">
													<input  class="btn  btn-red  btn-slider" type="submit" value="{{$s->texto_boton}}">
												</form>
											@endif
									</div><!-- /.slide-content -->
								</div>
							</li><!-- /.slide -->
						@endif
					@endforeach
						@if( isset( $slider ) && count( $slider ) > 1 )
					</ul><!-- /.slides -->
				@endif
			</div><!-- /.slider-clip -->
		</div><!-- /.slider-intro -->

	@endif


	<div class="main anchor">

		@if( isset( $lineas ) && count( $lineas ) )

				<section class="button-section">
					<div class="shell shell-btn">
						<ul class="list-buttons">

							@foreach( $lineas as $linea )

								@if($linea->id_linea < 7)
									<li>
										<a href="{{ '/lineas-de-juego/' . $linea->slug }}" class="btn btn-features"><!-- data-href class=modal_linea"> -->
											<i class="{{ $linea->icono }}"></i>

											<span>{{ $linea->linea }}</span>
										</a>
									</li>
								@endif

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
								<h2>Promociones y Eventos</h2>

								<div class="slider-clip">
									<ul class="slides">

										@foreach( $promociones as $p )

											<li class="slide">
												<a href="{{url('/promociones/detalle/' . $p->slug)}}">
													<div class="slide-content" style="background-image: url({{ $p->thumb !== null && !empty($p->thumb) ? $p->thumb : $p->imagen }}); ">

														@if($p->fecha_inicio !== null || $p->fecha_fin !== null)
															{{--<span class="slide-label" style="background: #ed1c24;color: #fff;min-width: 140px;display: inline-block;font-size: 15px;padding: 7px 10px;line-height: 1;position: absolute;top: 20px;left: 30px;right: 0px;">--}}
																{{--Válido {{'del'.$p->fecha_inicio}}<br>{{' al' . $p->fecha_fin}}--}}
															{{--</span>--}}
														@endif

														@if($p->is_active_btn==1)
															<button>
																<span class="" style="position: absolute;bottom: 1em;left: 0em;text-align: center;width: 100%;" >
																	<center>
																		<form action="{{$p->url}}" target="{{$p->is_new_tab}}">
																			<input type="submit" value="{!!$p->button_text!!}" style="width: 9em;padding: 1em;background-color: red;box-shadow: 1px 1px 1px 1px black;border-radius: 10px;color: white;">
																		</form>
																	</center>
																</span>
															</button>
														@endif
													</div><!-- /.slide-content -->
												</a>
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

		@if( isset( $rand_sucursal ) )<!--{-->

			<section class="section-map">
				<div class="section-head">
					<div class="shell">
						<h2>Selecciona el casino de tu preferencia</h2>
					</div><!-- /.shell -->
				</div><!-- /.section-head -->

				<div class="section-body">
					<div id="googlemap" data-lng="{{$rand_sucursal->longitud}}" data-lat="{{$rand_sucursal->latitud}}"></div><!-- /#googlemap -->

					<div class="section-content">
						<div class="shell">
							<div class="section-content-head">
								<p>Sucursal</p>

								<h2>{{ $rand_sucursal->nombre }}</h2>

								<div class="select btn-ubn select_ciudad_mapa"> <!-- BEGIN boton sucursal -->
			                        <select name="ciudad_mapa">
										<option value="">Seleccione tu ciudad</option>
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
										<i class="ico-game"></i>

										<p>
											{!! $rand_sucursal->oferta !!}
										</p>
									</li>
								</ul><!-- /.list-contacts -->
							</div><!-- /.section-content-body -->
						</div><!-- /.shell -->
						<script>

							function Directions(url, data){
								dataLayer.push ({
									'event': 'llegaraqui',                 //Dato estático
									'casino': data	     //Dato dinámico
								});
								window.open(url);
							//	window.location.href = url;
							}

						</script>
						<div class="section-actions">

							<?php
								$directionUrl = "http://www.google.com/maps/place/".$rand_sucursal->latitud . "," . $rand_sucursal->longitud;
							?>

								<a target="_blank" class="btn btn-red btn-red-small"  href="javascript:void(0);" onclick="Directions('<?php echo $directionUrl; ?>','<?php echo $rand_sucursal->nombre; ?>')">
							{{--<a href="http://www.google.com/maps/place/{{ $rand_sucursal->latitud . "," . $rand_sucursal->longitud }}" target="_blank" class="btn btn-red btn-red-small">--}}
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
