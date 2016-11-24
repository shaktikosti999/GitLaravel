@extends('layout.front')
	@section('contenido')
		<div class="wrapper">
	    
	    <div class="stick-nav"><!-- Stick nav -->
	        <ul>
	            <li><a href="#promociones"><img src="css/images/icons/icon-1.png"><span>Promociones</span></a></li>
	            <li><a href="#juegos"><img src="css/images/icons/icon-7.png"><span>Juegos</span></a></li>
	            <li><a href="#jackpot"><img src="css/images/icons/icon-4.png"><span>Jackpot</span></a></li>
	            <li><a href="#torneos"><img src="css/images/icons/icon-8.png"><span>Torneos</span></a></li>
	            <li><a href="#sucursales"><img src="css/images/icons/icon-5.png"><span>Ubicación</span></a></li>
	            <li><a href="#diversion"><img src="css/images/icons/icon-6.png"><span>Diversión</span></a></li>
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
										 		Apuestas de Carreras
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

			<div class="slider-label red-label second">
				<i class="ico-horse"></i>
			</div><!-- /.slider-label -->
		</div><!-- /.slider-secondary -->

		<div class="main"> 
			<section class="section-promotions secondary">
				<div class="shell">
					<header class="section-head modif-section">
	                    <div class="stick--point" id="promociones"></div>
						<h2>
							Calendario de carreras
						</h2>

						<a href="{{url('/como-apostar')}}" class="btn btn-border">
							Cómo apostar
						</a>
					</header><!-- /.section-head -->
					
					@if( isset($carreras) )
						<div class="calendar-content">	
							<div class="list-btn">
								<ul class="section-btn">
									@foreach( $carreras as $item )
									<li class="btn-carreras active">
										<a href="#">
											{!! $item->archivo !== null ? '<img src="' . $item->archivo .'">' : '' !!}
											<span>{{$item->titulo}}</span> 
										</a>
									</li>
									@endforeach
								</ul>
							</div>
						</div>
					@endif
				</div><!-- /.shell -->
			</section><!-- /.section-promotions -->

			<section class="section-games-available">
				<div class="shell">
					<div class="section-head">
	                    <div class="stick--point" id="juegos"></div>
						<h2>
							Juegos disponibles
						</h2>
					</div><!-- /.section-head -->

					<section class="content programas">	

						<div class="left-item"> <!-- calendario -->
							<div class="calendar-module" data-date="12/03/2016">

							</div>
						</div>

						<div class="right-item"> <!-- cuadro derecha -->

							<h3>Programas</h3>
							<ul>	
								<li class="txt-left">
									<h5>Serie 30 Caballos Edición Centenario</h5>
										<a href="#"> 
											<img src="css/images/icons/download.png">
											Descargar programa
										</a>
								</li>
								<li class="txt-left">
									<h5>Serie 30 Caballos Edición Centenario</h5>
										<a href="#"> 
											<img src="css/images/icons/download.png">
											Descargar programa
										</a>
								</li>
								<li class="txt-left">
									<h5>Serie 30 Caballos Edición Centenario</h5>
										<a href="#"> 
											<img src="css/images/icons/download.png">
											Descargar programa
										</a>
								</li>
								<li class="txt-left">
									<h5>Serie 30 Caballos Edición Centenario</h5>
										<a href="#"> 
											<img src="css/images/icons/download.png">
											Descargar programa
										</a>
								</li>
								<li class="txt-left">
									<h5>Serie 30 Caballos Edición Centenario</h5>
										<a href="#"> 
											<img src="css/images/icons/download.png">
											Descargar programa
										</a>
								</li>
								<li class="txt-left">
									<h5>Serie 30 Caballos Edición Centenario</h5>
										<a href="#"> 
											<img src="css/images/icons/download.png">
											Descargar programa
										</a>
								</li>
								<li class="txt-left">
									<h5>Serie 30 Caballos Edición Centenario</h5>
										<a href="#"> 
											<img src="css/images/icons/download.png">
											Descargar programa
										</a>
								</li>
							</ul>
						</div>
					</section>	
				</div><!-- /.shell -->
			</section><!-- /.section-games-available -->

			<section class="section section-secondary">
				<div class="shell">
					<header class="section-head">
	                    <div class="stick--point" id="torneos"></div>
						<h2>
							Próximos eventos
						</h2>
					</header><!-- /.section-head -->

					<div class="event-container">
						<div class="section-events">
							<ul>
								<li>
									<img src="css/images/temp/carreras.jpg">

									<div class="content-serie">
										<h5>Serie mundial no.30</h5>
										<div class="serie-item">
											<ul>
												<li>
													<h4>3:30</h4>
												</li>
												<li>
													<p>Inicio</p>
												</li>
											</ul>
										</div>
									<div class="red-middle">
										<h5>HOY</h5>
									</div>
										<div class="serie-item item-two">
											<ul>
												<li>
													<h4>6:25</h4>
												</li>
												<li>
													<p>Finalizada</p>
												</li>
											</ul>
										</div>
									</div>
								</li>
								<li>
									<img src="css/images/temp/carreras.jpg">

									<div class="content-serie below-content">
										<h5>Serie mundial no.30</h5>
										<div class="serie-item">
											<ul>
												<li>
													<h4>3:30</h4>
												</li>
												<li>
													<p>Inicio</p>
												</li>
											</ul>
										</div>
									<div class="red-middle">
										<h5>HOY</h5>
									</div>
										<div class="serie-item item-two">
											<ul>
												<li>
													<h4>6:25</h4>
												</li>
												<li>
													<p>Finalizada</p>
												</li>
											</ul>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>

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
					<div id="googlemap" data-lng="-97.727616" data-lat="18.884188"></div><!-- /#googlemap --> 
				
					<div class="section-content">
						<div class="shell">
							<div class="section-content-head">
	                            <div class="stick--point" id="sucursales"></div>
								<p>Sucursal</p>
								
								<h2>Tecamachalco</h2>
							</div><!-- /.section-content-head -->
									
							<div class="section-content-body">
								<ul class="list-contacts">
									<li>
										<i class="ico-map"></i>
									
										<p>
											Calle Fuente del molino <br>#49-BCol. San Miguel <br>Tecamachalco Naucalpan, Edo. <br>de México C.P. 53970
										</p>
									</li>
									
									<li>
										<i class="ico-phone"></i>
									
										<p>
											Teléfono: <a href="tel:0155123456789">01 + 55 123456789</a><br>
											Teléfono: <a href="tel:04555123456789">045 + 55 123456789</a><br>
											Teléfono: <a href="tel:77955123456789">779 + 55 123456789</a>
										</p>
									</li>
									
									<li>
										<i class="ico-clock"></i>
									
										<p>Horario : 13:00 pm - 00:00 am <br>Lunes - Domingo</p>
									</li>
									
									<li>
										<i class="ico-car"></i>
									
										<p>Horario : 13:00 pm - 00:00 am <br>Lunes - Domingo</p>
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

			<section class="section-gallery secondary">
				<div class="shell">
					<div class="slider-gallery">
						<div class="slider-clip">
							<ul class="slides">
								<li class="slide">
									<div class="slide-image">
										<img src="css/images/temp/gallery1.jpg" alt="">
									</div><!-- /.slide-image -->
								</li><!-- /.slide -->

								<li class="slide">
									<div class="slide-image">
										<img src="css/images/temp/gallery2.jpg" alt="">
									</div><!-- /.slide-image -->
								</li><!-- /.slide -->

								<li class="slide">
									<div class="slide-image">
										<img src="css/images/temp/gallery3.jpg" alt="">
									</div><!-- /.slide-image -->
								</li><!-- /.slide -->

								<li class="slide">
									<div class="slide-image">
										<img src="css/images/temp/gallery1.jpg" alt="">
									</div><!-- /.slide-image -->
								</li><!-- /.slide -->
							</ul><!-- /.slides -->
						</div><!-- /.slider-clip -->
					</div><!-- /.slider-gallery --> 

				</div><!-- /.shell -->
			</section><!-- /.section-gallery -->

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
							<div class="col col-1of3">
								<article class="article-fun">
									<a href="#" style="background-image: url(css/images/temp/article-fun1.jpg)"> 
										<strong>
											Mesas de juego
											<span>Chupa chups chocolate bar jelly beans tart caramels cupcake powder. Wafer tiramisu tiramisu. </span>	
										</strong>
									</a>
								</article>
							</div><!-- /.col col-1of3 -->

							<div class="col col-1of3">
								<article class="article-fun">
									<a href="#" style="background-image: url(css/images/temp/article-fun2.jpg)">
										<strong>
											Apuesta deportiva 
											<span>
												Chupa chups chocolate bar jelly beans tart caramels cupcake powder. Wafer tiramisu tiramisu.  
											</span>	
										</strong>
									</a>
								</article>
							</div><!-- /.col col-1of3 -->

							<div class="col col-1of3">
								<article class="article-fun">
									<a href="#" style="background-image: url(css/images/temp/article-fun3.jpg)">
										<strong>
											Apuesta de carreras
											<span>
												Chupa chups chocolate bar jelly beans tart caramels cupcake powder. Wafer tiramisu tiramisu.  
											</span>	
										</strong>
									</a>
								</article>
							</div><!-- /.col col-1of3 -->
						</div><!-- /.cols -->
					</div><!-- /.section-content -->
				</div><!-- /.shell -->
			</section><!-- /.section-entry -->
		</div><!-- /.main -->
	@stop