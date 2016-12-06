@extends('layout.front')
@section('contenido')
	<div class="slider-secondary secondary-margin">
		<!--<a href="#" class="btn-menu">
			<img src="css/images/btn-menu@2x.png" alt="">-->
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
											<label for="sucursales" class="form-label hidden">filter-secondary1</label>
											<select name="sucursales" id="sucursales" class="select branch-filter">
												
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
			<i class="ico-deportiva"></i>
		</div><!-- /.slider-label -->
	</div><!-- /.slider-secondary -->

	<div class="gray-sport">
		<div class="shell">
			<div class="btn-sport">
				<!--<a href="http://casinocaliente.abardev.net/como-apostar" class="btn btn-border btn-calendar-sport">
					<img src="css/images/icons/calendar.png">
					<img class="calendar-off" src="css/images/icons/calendar-white.png">
					Calendario deportivo
				</a>-->
				<a href="http://casinocaliente.abardev.net/como-apostar" class="btn btn-border">
					Cómo apostar
				</a>
			</div>
			<div class="sport-calendar">
				<div class="list-calendar">
					<a href="#">
						<img src="css/images/icons/americano.png">
						<span>Fútbol americano</span>
					</a>
				</div>
				<div class="list-calendar">
					<a href="#">
						<img src="css/images/icons/basquetbol.png">
						<span>Básquetbol</span>
					</a>
				</div>
				<div class="list-calendar">
					<a href="#">
						<img src="css/images/icons/baseball.png">
						<span>Baseball</span>
					</a>
				</div>
				<div class="list-calendar active">
					<a href="#">
						<img src="css/images/icons/soccer.png">
						<span>Soccer</span>
					</a>
				</div>
				<div class="list-calendar">
					<a href="#">
						<img src="css/images/icons/box.png">
						<span>Box</span>
					</a>
				</div>
				<div class="list-calendar">
					<a href="#">
						<img src="css/images/icons/hockey.png">
						<span>Hockey</span>
					</a>
				</div>
				<div class="list-calendar">
					<a href="#">
						<img src="css/images/icons/hockey.png">
						<span>Hockey</span>
					</a>
				</div>
			</div>
			<div class="btn-calendar2" id="calendario">
				<a href="#" class="btn btn-black">
					seleccionar liga
				</a>
				<a href="#" class="btn btn-black">
					seleccionar oferta
				</a>
				<div class="input-group date">
					<img src="css/images/icons/calendar-gray.png">
				   	 <input type="text" placeholder="mm/dd/yyyy" class="form-control">
			   </div>
			</div>

			<div class="table-content" >
				<h5>07 Noviembre 2016</h5>
				<div class="table__wrapp">

					<div class="table-item"><!-- * -->
						<div class="line-gray">
						</div>
						<div class="table-list">
							<p>8001</p>
							<p>N.Y. METS</p>
							<p>B. COLON</p>	
							<p>Línea de apertura</p>
							<h2>-220</h2>
						</div>
						<div class="table-list">	
							<p>8003</p>
							<p>PHI. PHILIES</p>
							<p>J. HELLICSON</p>
							<p>Línea de apertura</p>
							<h2>+600</h2>
						</div>
						<div class="gray-item">
							<p>Over / Under</p>
							<h4>9</h4>
							<p>-110</p>
							<p>EVEN</p>
						</div>
						<div class="gray-item2">
							<h6>7:00 PM</h6>
							<p>Tiempo del centro</p>
						</div>
					</div>
					<div class="table-item"><!-- * -->
						<div class="line-gray">
						</div>
						<div class="table-list">
							<p>8001</p>
							<p>N.Y. METS</p>
							<p>B. COLON</p>	
							<p>Línea de apertura</p>
							<h2>-220</h2>
						</div>
						<div class="table-list">	
							<p>8003</p>
							<p>PHI. PHILIES</p>
							<p>J. HELLICSON</p>
							<p>Línea de apertura</p>
							<h2>+600</h2>
						</div>
						<div class="gray-item">
							<p>Over / Under</p>
							<h4>9</h4>
							<p>-110</p>
							<p>EVEN</p>
						</div>
						<div class="gray-item2">
							<h6>7:00 PM</h6>
							<p>Tiempo del centro</p>
						</div>
					</div>
					<div class="table-item"><!-- * -->
						<div class="line-gray">
						</div>
						<div class="table-list">
							<p>8001</p>
							<p>N.Y. METS</p>
							<p>B. COLON</p>	
							<p>Línea de apertura</p>
							<h2>-220</h2>
						</div>
						<div class="table-list">	
							<p>8003</p>
							<p>PHI. PHILIES</p>
							<p>J. HELLICSON</p>
							<p>Línea de apertura</p>
							<h2>+600</h2>
						</div>
						<div class="gray-item">
							<p>Over / Under</p>
							<h4>9</h4>
							<p>-110</p>
							<p>EVEN</p>
						</div>
						<div class="gray-item2">
							<h6>7:00 PM</h6>
							<p>Tiempo del centro</p>
						</div>
					</div>
					<div class="table-item"><!-- * -->
						<div class="line-gray">
						</div>
						<div class="table-list">
							<p>8001</p>
							<p>N.Y. METS</p>
							<p>B. COLON</p>	
							<p>Línea de apertura</p>
							<h2>-220</h2>
						</div>
						<div class="table-list">	
							<p>8003</p>
							<p>PHI. PHILIES</p>
							<p>J. HELLICSON</p>
							<p>Línea de apertura</p>
							<h2>+600</h2>
						</div>
						<div class="gray-item">
							<p>Over / Under</p>
							<h4>9</h4>
							<p>-110</p>
							<p>EVEN</p>
						</div>
						<div class="gray-item2">
							<h6>7:00 PM</h6>
							<p>Tiempo del centro</p>
						</div>
					</div>
					<div class="table-item"><!-- * -->
						<div class="line-gray">
						</div>
						<div class="table-list">
							<p>8001</p>
							<p>N.Y. METS</p>
							<p>B. COLON</p>	
							<p>Línea de apertura</p>
							<h2>-220</h2>
						</div>
						<div class="table-list">	
							<p>8003</p>
							<p>PHI. PHILIES</p>
							<p>J. HELLICSON</p>
							<p>Línea de apertura</p>
							<h2>+600</h2>
						</div>
						<div class="gray-item">
							<p>Over / Under</p>
							<h4>9</h4>
							<p>-110</p>
							<p>EVEN</p>
						</div>
						<div class="gray-item2">
							<h6>7:00 PM</h6>
							<p>Tiempo del centro</p>
						</div>
					</div>
					<div class="table-item"><!-- * -->
						<div class="line-gray">
						</div>
						<div class="table-list">
							<p>8001</p>
							<p>N.Y. METS</p>
							<p>B. COLON</p>	
							<p>Línea de apertura</p>
							<h2>-220</h2>
						</div>
						<div class="table-list">	
							<p>8003</p>
							<p>PHI. PHILIES</p>
							<p>J. HELLICSON</p>
							<p>Línea de apertura</p>
							<h2>+600</h2>
						</div>
						<div class="gray-item">
							<p>Over / Under</p>
							<h4>9</h4>
							<p>-110</p>
							<p>EVEN</p>
						</div>
						<div class="gray-item2">
							<h6>7:00 PM</h6>
							<p>Tiempo del centro</p>
						</div>
					</div>					
				</div>
			</div>

			<div class="table-content">
				<h5>08 Noviembre 2016</h5>
				<div class="table__wrapp">

					<div class="table-item"><!-- * -->
						<div class="line-gray">
						</div>	
						<div class="table-list">
							<p>8001</p>
							<p>N.Y. METS</p>
							<p>B. COLON</p>	
							<p>Línea de apertura</p>
							<h2>-220</h2>
						</div>
						<div class="table-list">	
							<p>8003</p>
							<p>PHI. PHILIES</p>
							<p>J. HELLICSON</p>
							<p>Línea de apertura</p>
							<h2>+600</h2>
						</div>
						<div class="gray-item">
							<p>Over / Under</p>
							<h4>9</h4>
							<p>-110</p>
							<p>EVEN</p>
						</div>
						<div class="gray-item2">
							<h6>7:00 PM</h6>
							<p>Tiempo del centro</p>
						</div>
					</div>
					<div class="table-item"><!-- * -->
						<div class="line-gray">
						</div>
						<div class="table-list">
							<p>8001</p>
							<p>N.Y. METS</p>
							<p>B. COLON</p>	
							<p>Línea de apertura</p>
							<h2>-220</h2>
						</div>
						<div class="table-list">	
							<p>8003</p>
							<p>PHI. PHILIES</p>
							<p>J. HELLICSON</p>
							<p>Línea de apertura</p>
							<h2>+600</h2>
						</div>
						<div class="gray-item">
							<p>Over / Under</p>
							<h4>9</h4>
							<p>-110</p>
							<p>EVEN</p>
						</div>
						<div class="gray-item2">
							<h6>7:00 PM</h6>
							<p>Tiempo del centro</p>
						</div>
					</div>
					<div class="table-item"><!-- * -->
						<div class="line-gray">
						</div>
						<div class="table-list">
							<p>8001</p>
							<p>N.Y. METS</p>
							<p>B. COLON</p>	
							<p>Línea de apertura</p>
							<h2>-220</h2>
						</div>
						<div class="table-list">	
							<p>8003</p>
							<p>PHI. PHILIES</p>
							<p>J. HELLICSON</p>
							<p>Línea de apertura</p>
							<h2>+600</h2>
						</div>
						<div class="gray-item">
							<p>Over / Under</p>
							<h4>9</h4>
							<p>-110</p>
							<p>EVEN</p>
						</div>
						<div class="gray-item2">
							<h6>7:00 PM</h6>
							<p>Tiempo del centro</p>
						</div>
					</div>
					<div class="table-item"><!-- * -->
						<div class="line-gray">
						</div>
						<div class="table-list">
							<p>8001</p>
							<p>N.Y. METS</p>
							<p>B. COLON</p>	
							<p>Línea de apertura</p>
							<h2>-220</h2>
						</div>
						<div class="table-list">	
							<p>8003</p>
							<p>PHI. PHILIES</p>
							<p>J. HELLICSON</p>
							<p>Línea de apertura</p>
							<h2>+600</h2>
						</div>
						<div class="gray-item">
							<p>Over / Under</p>
							<h4>9</h4>
							<p>-110</p>
							<p>EVEN</p>
						</div>
						<div class="gray-item2">
							<h6>7:00 PM</h6>
							<p>Tiempo del centro</p>
						</div>
					</div>
					<div class="table-item"><!-- * -->
						<div class="line-gray">
						</div>
						<div class="table-list">
							<p>8001</p>
							<p>N.Y. METS</p>
							<p>B. COLON</p>	
							<p>Línea de apertura</p>
							<h2>-220</h2>
						</div>
						<div class="table-list">	
							<p>8003</p>
							<p>PHI. PHILIES</p>
							<p>J. HELLICSON</p>
							<p>Línea de apertura</p>
							<h2>+600</h2>
						</div>
						<div class="gray-item">
							<p>Over / Under</p>
							<h4>9</h4>
							<p>-110</p>
							<p>EVEN</p>
						</div>
						<div class="gray-item2">
							<h6>7:00 PM</h6>
							<p>Tiempo del centro</p>
						</div>
					</div>
					<div class="table-item"><!-- * -->
						<div class="line-gray">
						</div>
						<div class="table-list">
							<p>8001</p>
							<p>N.Y. METS</p>
							<p>B. COLON</p>	
							<p>Línea de apertura</p>
							<h2>-220</h2>
						</div>
						<div class="table-list">	
							<p>8003</p>
							<p>PHI. PHILIES</p>
							<p>J. HELLICSON</p>
							<p>Línea de apertura</p>
							<h2>+600</h2>
						</div>
						<div class="gray-item">
							<p>Over / Under</p>
							<h4>9</h4>
							<p>-110</p>
							<p>EVEN</p>
						</div>
						<div class="gray-item2">
							<h6>7:00 PM</h6>
							<p>Tiempo del centro</p>
						</div>
					</div>					
				</div>
			</div>

			<div class="table-sport">
				<div class="shell">
					<h2>Resultados</h2>
					<table>
						<tr>
							<td>5402</td>
							<td>
								<p>Tigres</p>
							</td>
							<td>Even</td>
						</tr>
						<tr class="white-space">
							<td colspan="3"></td>
						</tr>
						<tr>
							<td>5403</td>
							<td>
								<p>America</p>
							</td>
							<td>2/1</td>
						</tr>
						<tr class="white-space">
							<td colspan="3"></td>
						</tr>
						<tr>
							<td>5409</td>
							<td>
								<p>Leon</p>
							</td>
							<td>3/1</td>
						</tr>
						<tr class="white-space">
							<td colspan="3"></td>
						</tr>
						<tr>
							<td>5418</td>
							<td>
								<p>Necaxa</p>
							</td>
							<td>3/1</td>
						</tr>
					</table>
				</div>
			</div>

		</div>
	</div>

	

	<div class="main"> 
		@if( isset( $promociones ) && count( $promociones ) && 1==2 )

			@include('front.includes.promotions',['promociones' => $promociones])
			
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
@stop