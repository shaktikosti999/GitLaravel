@extends('layout.front')
@section('contenido')

	@{



	}


	<div class="wrapper">
    
    <div class="stick-nav"><!-- Stick nav -->
        <ul>
            <li><a href="#promociones"><img src="css/images/icons/icon-1.png"><span>Promociones</span></a></li>
            <li><a href="#maquinas"><img src="css/images/icons/icon-2.png"><span>Máquinas</span></a></li>
            <li><a href="#proveedores"><img src="css/images/icons/icon-3.png"><span>Proveedores</span></a></li>
            <li><a href="#jackpot"><img src="css/images/icons/icon-4.png"><span>Jackpot</span></a></li>
            <li><a href="#sucursales"><img src="css/images/icons/icon-5.png"><span>Ubicación</span></a></li>
            <li><a href="#diversion"><img src="css/images/icons/icon-6.png"><span>Diversión</span></a></li>
        </ul>
    </div>

	<div class="slider-secondary">
		<a href="/alimentos-y-bebidas" class="btn-menu">
			<img src="css/images/btn-menu@2x.png" alt="">
		</a>

		<div class="slider-clip">
			<ul class="slides">
				
				@if( isset( $slider ) && count( $slider ) )

					@foreach( $slider as $item )

						<li class="slide" style="background-image: url({{ $item->imagen }})">
							<div class="slide-body">
								<div class="shell"> 		 
									 <div class="slide-content">
									 	<h1>
									 		mÁquinas de juego
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

									@include('front.includes.breadcrumbs')
								</div><!-- /.shell -->
							</div><!-- /.slide-body -->
						</li><!-- /.slide -->

					@endforeach

				@endif

				
			</ul><!-- /.slides -->
		</div><!-- /.slider-clip -->

		<div class="slider-label red-label large">
			<i class="ico-slot"></i>
		</div><!-- /.slider-label -->
	</div><!-- /.slider-secondary -->

	<div class="main">

		@if( isset( $promociones ) && count( $promociones ) )

			@include('front.includes.promotions',['promociones' => $promociones])
			
		@endif

		@if( isset( $maquinas ) && count( $maquinas ) )

			@include('front.includes.game_machine',['maquinas' => $maquinas])

		@endif 

		@if( isset( $proveedores ) && count( $proveedores ) )

			<section class="section-providers">
				<div class="shell">
					<header class="section-head">
						<div class="stick--point" id="proveedores"></div>
						<h2>
							Proveedores
						</h2>
					</header><!-- /.section-head -->

					<div class="section-body">
						<div class="slider-providers">
							<div class="slider-clip">
								
								<ul class="slides">
								
									@foreach( $proveedores as $item )

										<li class="slide">
											<div class="slide-image">
												<img src="{{ $item->archivo }}" alt="{{ $item->nombre }}">
											</div><!-- /.slide-image -->
										</li><!-- /.slide -->

									@endforeach
							 
								</ul><!-- /.slides -->

							</div><!-- /.slider-clip -->
						</div><!-- /.slider-providers -->
					</div><!-- /.section-body -->
				</div><!-- /.shell -->
			</section><!-- /.section-providers -->

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
								Conoce los pagados
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
									
									<input type="button" value="Enviar" class="subscribe-btn btn btn-red">
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
				var $url   = "/lineas-de-juego/maquinas-de-juego";

				if( $value != -1 ){

					$url = "/lineas-de-juego/maquinas-de-juego/" + $value;

				}

				$( location ).attr("href", $url);

			} );

		} )

	</script>

@stop
