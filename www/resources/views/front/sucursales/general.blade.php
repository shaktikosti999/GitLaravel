@extends('layout.front')
	@section('js')
		<script>
			$( function(){
				$(".btn-ciudades").change( function(){
					var $value = $('.fs-dropdown-item_selected').attr('data-value');
					if( $value != "" ){
						var $url   = "/sucursal?city=" + $value;
					}
					else{
						var $url   = "/sucursal";
					}

						$( location ).attr("href", $url);
				} );
			} )
		</script>
	@stop
	@section('contenido')
	<div class="slider-secondary secondary-margin">


		<div class="slider-intro  slider-intro-secondary slider-intro-promo">
			<!--<a href="#promociones" class="btn-scroll promo">
                <i class="ico-mouse"></i>
            </a>-->
			<div class="slider-clip">
				<ul class="slides">
					@if( isset($slider) && count($slider) )
						@foreach( $slider as $item)
							<li class="slide fullscreen" style="background-image: url({{($item->imagen)}});">
								<div class="slide-content slide-promo">
									<div class="shell">

										<h1><?php if(isset($item->titulo)){ echo html_entity_decode($item->titulo); } ?></h1>

										<h3>
											@if( isset( $sucursal_info->nombre ) )

												{{ $sucursal_info->nombre }}

											@endif
										</h3>
									</div><!-- /.shell -->
								</div><!-- /.slide-content -->
							</li><!-- /.slide -->
						@endforeach
					@endif
				</ul><!-- /.slides -->
			</div><!-- /.slider-clip -->
		</div><!-- /.slider-intro -->
	</div>


		<!--<div class="intro-gray" style="background-color:rgba(0,0,0,0.5)"></div><!-- /.intro-gray -->
		@if(isset($ciudades) && count($ciudades))
			<div class="main">

				@if( isset( $promociones ) && count( $promociones ) )

					@include('front.includes.promotions',['promociones' => $promociones])

				@endif


				<section class="section-articles head-padding">
					<div class="shell">
						<article class="article">
							<div class="article-head head-padding">
								<h2>Ubicaciones</h2>
								<div class="fs-dropdown btn-ciudades" tabindex="-1"><!-- BEGIN boton sucursal -->
									<div class="select btn-ubn fs-dropdown-element" tabindex="-1">
										<select name="ciudad">
											<option value="">Seleccione una ciudad</option>
											@foreach( $ciudades as $item )
												<option value="{{$item->id_ciudad}}" {{isset($id_ciudad) && $item->id_ciudad == $id_ciudad ? "selected" : ""}}>{{$item->ciudad}}</option>
											@endforeach
										</select> <!-- END boton sucursal -->
									</div>
								<!-- <button type="button" class="fs-dropdown-selected fs-touch-element">Ciudad de México</button><div class="fs-dropdown-options">
								<button type="button" class="fs-dropdown-item fs-dropdown-item_selected" data-value="Ciudad de México">Ciudad de México</button>
								<button type="button" class="fs-dropdown-item" data-value="Ciudad de México">Ciudad de México</button>
								<button type="button" class="fs-dropdown-item" data-value="Ciudad de México">Ciudad de México</button> -->
								</div>
							</div><!-- END boton sucursal -->
						</article>
					</div><!-- /.article-head -->
				</section>
			</div>
		@endif




		@if( isset($sucursales) && count($sucursales) )
			<?php $c=0; ?>
			@foreach( $sucursales as $item )
				@if( ($c%2) == 0 && $c > 0)

				@endif
				@if( ($c%2) == 0 )
			<div class="shell">
				<div class="sucursales">
					<ul>
				@endif
						<li>
							<h3><a href="{{url('sucursal/' . $item->slug)}}">{{$item->nombre}}</a></h3>
							<div class="section-actions btn-action">
								<a href="http://www.google.com/maps/place/{{ $item->latitud . "," . $item->longitud }}" target="_blank" class="btn btn-red btn-red-small">
									<i class="ico-human"></i>

									Cómo llegar aquí
								</a>
							</div>
							<div class="content-ico-lft">
								<article class="ico-ubc1">
									<div class="content-map">
										<i class="ico-map-gray"></i>
										<h6>Dirección</h6>
										<p>{!!$item->direccion!!}</p>
									</div>
									<div class="content-phone">
										<i class="ico-phone-gray"></i>
										<h6>Teléfono</h6>
										<p>{!!$item->telefono!!}</p>
									</div>
								</article>
								<article class="ico-ubc2">
									<div class="content-clock">
										<i class="ico-clock-gray"></i>
										<h6>Horario</h6>
										<p>{!!$item->horario!!}</p>
									</div>
									<div class="content-car">
										<i class="ico-car-gray"></i>
										<h6>Aparcamiento</h6>
										<p>{!!$item->instrucciones!!}</p>
									</div>
								</article>
								<article class="ico-ubc2">
									<div class="content-car">
										<i class="ico-game-gray"></i>
										<h6>Oferta de Juego</h6>
										<p>{!!$item->oferta!!}</p>
									</div>
								</article>
								<!-- <article class="ico-ubc3">
									<div class="content-game">
										<div class="content-game">
											<i class="ico-game-gray"></i>
											<h6>Oferta de juego</h6>
											<p>Lorem Ipsum</p> 
										</div>
									</div>
								</article> -->
							</div>
						</li>

						<!--<li>
							<i class="ico-map-gray"></i>
							<h6>Dirección</h6>	
							<p>{!!$item->direccion!!}</p>

							<i class="ico-phone-gray"></i>
							<h6>Teléfono</h6>
							<p>Teléfono: 01 + 55 123456789</p>
							<p>Teléfono: 01 + 55 123456789</p>
							<p>Teléfono: 01 + 55 123456789</p>
						</li>
						<li>
							<i class="ico-phone-gray"></i>
							<h6>Teléfono</h6>
							<p>Teléfono: 01 + 55 123456789</p>
							<p>Teléfono: 01 + 55 123456789</p>
							<p>Teléfono: 01 + 55 123456789</p>
						</li>
						<li>
							<i class="ico-clock-gray"></i>
							<h6>Horario</h6>
							<p>Horario : 13:00 pm - 00:00 am </p>
							<p>Lunes - Domingo</p>
						</li>
						<li>
							<i class="ico-car-gray"></i>
							<h6>Estacionamiento</h6>
							<p>Horario : 13:00 pm - 00:00 am </p>
							<p>Lunes - Domingo</p>
						</li>
						<li>
							<i class="ico-game-gray"></i>
							<h6>Oferta de Juego</h6>
							<p>Horario : 13:00 pm - 00:00 am </p>
							<p>Lunes - Domingo</p>
						</li> -->

				<?php $c++; ?>
			@endforeach
					</ul>
				</div>
			</div>
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
		</div><!-- /.main -->
	@stop
