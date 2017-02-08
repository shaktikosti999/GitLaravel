<!DOCTYPE html>
<html lang="en">
	<head>
		<base href="{{asset('/assets/')}}/">
		<meta charset="utf-8" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>@yield('titulo','Casino Caliente')</title>

		<link rel="shortcut icon" type="image/x-icon" href="css/images/favicon.ico" />

		<!-- Vendor Styles -->
		<link rel="stylesheet" type="text/css" href="vendor/slick-1.6.0/slick/slick.css"/>
		<link rel="stylesheet" href="vendor/font-awesome-4.6.3/css/font-awesome.min.css" type="text/css" media="all" />
		<link rel="stylesheet" href="vendor/formstone/dropdown.css" />

		<!-- App Styles -->
		<link rel="stylesheet" href="css/styles.css" />
		@yield('css')

		<!-- Vendor JS -->
		<script src="vendor/jquery-1.12.4.min.js"></script>
		<script type="text/javascript" src="vendor/slick-1.6.0/slick/slick.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;language=en"></script>
		<script src="vendor/formstone/core.js"></script>
		<script src="vendor/formstone/touch.js"></script>
		<script src="vendor/formstone/dropdown.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>

		<!-- App JS -->
		<script src="js/functions.js"></script>
	</head>

	<body>

		{{ csrf_field() }}

		<div class="wrapper">
			<header class="header">
				<div class="shell">
					<div class="nav-trigger-wrapper">
						<a href="#" class="nav-trigger">
							<span></span>
							<span></span>
							<span></span>
						</a>
					</div><!-- /.nav-trigger-wrapper -->

					<nav class="nav-access">
						<ul>
							<li>
								<a href="/quienes_somos">Quiénes Somos</a>
							</li>
							
							<li>
								<a href="/contacto">Contacto</a>
							</li>
						</ul>
					</nav><!-- /.nav-access -->

					<div class="header-content">
						<a href="/" class="logo">casino caliente</a>
						
						<nav class="nav">
							<ul>
								<?php $uri = explode('/',Request::path());$uri = $uri[0]; ?>
								<li class="has-dropdown">
									<a {{$uri == "lineas-de-juego" ? 'class=active' : ''}} href="{{url('lineas-de-juego')}}">opciones De Diversión</a>

									<ul class="dropdown">
										<li>
											<a href="{{url('lineas-de-juego/maquinas-de-juego')}}">Máquinas de Juego</a>
										</li>
										
										<li>
											<a href="{{url('lineas-de-juego/mesas-de-juego')}}">Juegos de Mesa</a>
										</li>
										<li>
											<a href="{{url('lineas-de-juego/apuesta-deportiva')}}">Apuesta Deportes</a>
										</li>	

										<li>
											<a href="{{url('lineas-de-juego/apuesta-de-carreras?game=caballos')}}">Apuesta Carreras</a>
										</li>

											
									</ul><!-- /.dropdown --> 
								</li>
								
								<li>
									<a {{$uri == "promociones" ? 'class=active' : ''}} href="/promociones">promociones Y Eventos</a>
								</li>
								
								<li>
									<a {{$uri == "sucursal" ? 'class=active' : ''}} href="/sucursal">ubicaciones</a>
								</li>
								
								<li {{isset($submenu) && count($submenu) ? 'class=has-dropdown' : ''}}>
									<a {{$uri == "caliente_club" ? 'class=active' : ''}} href="/caliente_club">caliente Club</a>
									@if( isset($submenu) && count($submenu) )
										<ul class="dropdown">
											@foreach($submenu as $item)
												<li>
													<a href="{{url($item->slug)}}">{{$item->titulo}}</a>
												</li>
											@endforeach
										</ul><!-- /.dropdown --> 
									@endif
								</li>

								<li class="desktop-hidden">
									<a {{$uri == "quienes_somos" ? 'class=active' : ''}} href="/quienes_somos">Quíenes somos</a>
								</li>
								
								<li class="desktop-hidden">
									<a {{$uri == "contacto" ? 'class=active' : ''}} href="/contacto">Contacto</a>
								</li>

								<!--<li class="desktop-hidden tablet-hidden">
									<a href="#">
										<i class="fa fa-facebook" aria-hidden="true"></i>
									</a>
								</li>
							</ul>

							<li class="desktop-hidden tablet-hidden">
									<a href="#">
										<i class="fa fa-twitter" aria-hidden="true"></i>
									</a>
								</li>
								
								<li class="desktop-hidden tablet-hidden">
									<a href="#">
										<i class="fa fa-youtube-play" aria-hidden="true"></i>
									</a>
								</li>-->

								<div class="socials-footer hdr-btn">
								<!--<h4>Síguenos</h4>-->


								<ul>
									@if( isset($sn[1]) && count($sn[1]) )
									<li>
										<a href="#">
											<i class="fa fa-facebook" aria-hidden="true"></i>
										</a>

										<ul class="socials-dropdown">
											
											@foreach( $sn[1] as $val )
											<li>
												<a href="{{($val->link)}}" target="_blank">{{$val->nombre}}</a>
											</li>
											@endforeach
											
											
											
										</ul><!-- /.socials-dropdown -->
									</li>
									@endif
									@if( isset($sn[2]) && count($sn[2]) )
									<li>
										<a href="#">
											<i class="fa fa-twitter" aria-hidden="true"></i>
										</a>

										<ul class="socials-dropdown">
											@foreach( $sn[2] as $val )
											<li>
												<a href="{{($val->link)}}" target="_blank">{{$val->nombre}}</a>
											</li>
											@endforeach
											
											
										</ul><!-- /.socials-dropdown -->
									</li>
									@endif
									@if( isset($sn[3]) && count($sn[3]) )
									<li>
										<a href="#">
											<i class="fa fa-youtube-play" aria-hidden="true"></i>
										</a>

										<ul class="socials-dropdown">
											@foreach( $sn[3] as $val )
											<li>
												<a href="{{($val->link)}}" target="_blank">{{$val->nombre}}</a>
											</li>
											@endforeach
											
											
										</ul><!-- /.socials-dropdown -->
									</li>
									@endif
								</ul>
							</div><!-- /.socials-footer -->

						</nav><!-- /.nav -->

						<div class="col col-size4 hdr-redes">
							<div class="socials-footer hdr-btn">
								<!--<h4>Síguenos</h4>-->


								<ul>
									@if( isset($sn[1]) && count($sn[1]) )
									<li>
										<a href="#">
											<i class="fa fa-facebook" aria-hidden="true"></i>
										</a>

										<ul class="socials-dropdown">
											
											@foreach( $sn[1] as $val )
											<li>
												<a href="{{($val->link)}}" target="_blank">{{$val->nombre}}</a>
											</li>
											@endforeach
											
											
											
										</ul><!-- /.socials-dropdown -->
									</li>
									@endif
									@if( isset($sn[2]) && count($sn[2]) )
									<li>
										<a href="#">
											<i class="fa fa-twitter" aria-hidden="true"></i>
										</a>

										<ul class="socials-dropdown">
											@foreach( $sn[2] as $val )
											<li>
												<a href="{{($val->link)}}" target="_blank">{{$val->nombre}}</a>
											</li>
											@endforeach
											
											
										</ul><!-- /.socials-dropdown -->
									</li>
									@endif
									@if( isset($sn[3]) && count($sn[3]) )
									<li>
										<a href="#">
											<i class="fa fa-youtube-play" aria-hidden="true"></i>
										</a>

										<ul class="socials-dropdown">
											@foreach( $sn[3] as $val )
											<li>
												<a href="{{($val->link)}}" target="_blank">{{$val->nombre}}</a>
											</li>
											@endforeach
											
											
										</ul><!-- /.socials-dropdown -->
									</li>
									@endif
								</ul>
							</div><!-- /.socials-footer -->
						</div><!-- /.col col-size4 -->
					</div><!-- /.cols -->


						<!--<div class="socials">
							<ul>
								<li>
									<a href="#">
										<i class="fa fa-facebook" aria-hidden="true"></i>
									</a>
								</li>
								
								<li>
									<a href="#">
										<i class="fa fa-twitter" aria-hidden="true"></i>
									</a>
								</li>
								
								<li>
									<a href="#">
										<i class="fa fa-youtube-play" aria-hidden="true"></i>
									</a>
								</li>
							</ul>
						</div> /.socials 
					</div> /.header-content --> 

					<a href="#" class="btn-search"> 
						<i class="ico-search"></i>	

						<span></span>
					</a>

					<div class="search">
						<form action="{{url('/resultados')}}" method="get"> 
							<div class="search-actions">
								<label for="q" class="hidden">Search</label> 

								<input type="search" name="q" id="q" value="" placeholder="Search" class="search-field">

								<button class="search-btn">
									<i class="ico-search"></i>	
								</button> 
							</div><!-- /.search-actions -->
							
						</form>
					</div><!-- /.search -->
				</div><!-- /.shell -->
			</header><!-- /.header -->


			@yield('contenido')			
			

			<footer class="footer">
				<div class="shell">
					<a href="#" class="btn-top"></a>

					<div class="cols">
						<div class="col col-size1">
							<a href="{{url('/')}}" class="logo"></a>

							<ul class="list-partners">
								<li>
									<a href="http://www.caliente.mx" target="_blank">www.caliente.mx</a>
								</li>
								
								<li>
									<a href="http://www.xolos.com.mx" target="_blank">www.xolos.com.mx</a>
								</li>
								
								<li>
									<a href="http://www.grupocaliente.com.mx" target="_blank">www.grupocaliente.com.mx</a>
								</li>
							</ul><!-- /.list-partners -->
						</div><!-- /.col col-size1 -->
						
						<div class="col col-size2">
							<nav class="nav-footer">
								<ul>
									<!--<li>
										<a href="#">Líneas De Juego</a>
									</li>-->
									
									<li>
										<a href="{{url('sucursal')}}">Ubicaciones</a>
									</li>
									
									<li>
										<a href="{{url('promociones')}}">Promociones Y Eventos</a>
									</li>
									
									<!--<li>
										<a href="#">Opciones De Diversión</a>
									</li>-->
									
									<li>
										<a href="{{url('juego_responsable')}}">Juego Responsable</a>
									</li>
								</ul>
							</nav><!-- /.nav-footer -->
						</div><!-- /.col col-size2 -->
						
						<div class="col col-size3">
							<nav class="nav-footer">
								<ul>
									<li>
										<a href="{{url('quienes_somos')}}">Quiénes Somos</a>
									</li>
									
									<li>
										<a href="{{url('contacto')}}">Contacto</a>
									</li>
									
									<li>
										<a href="{{url('aviso_de_privacidad')}}">Aviso De Privacidad</a>
									</li>
									
									<!--<li>
										<a href="#">Ubicaciones</a>
									</li>-->
								</ul>
							</nav><!-- /.nav-footer -->
						</div><!-- /.col col-size3 -->
						
						<div class="col col-size4">
							<div class="socials-footer">
								<h4>Síguenos</h4>

								<ul>
									@if( isset($sn[1]) && count($sn[1]) )
									<li>
										<a href="#">
											<i class="fa fa-facebook" aria-hidden="true"></i>
										</a>

										<ul class="socials-dropdown">
											
											@foreach( $sn[1] as $val )
											<li>
												<a href="{{($val->link)}}" target="_blank">{{$val->nombre}}</a>
											</li>
											@endforeach
											
											
											
										</ul><!-- /.socials-dropdown -->
									</li>
									@endif
									@if( isset($sn[2]) && count($sn[2]) )
									<li>
										<a href="#">
											<i class="fa fa-twitter" aria-hidden="true"></i>
										</a>

										<ul class="socials-dropdown">
											@foreach( $sn[2] as $val )
											<li>
												<a href="{{($val->link)}}" target="_blank">{{$val->nombre}}</a>
											</li>
											@endforeach
											
											
										</ul><!-- /.socials-dropdown -->
									</li>
									@endif
									@if( isset($sn[3]) && count($sn[3]) )
									<li>
										<a href="#">
											<i class="fa fa-youtube-play" aria-hidden="true"></i>
										</a>

										<ul class="socials-dropdown">
											@foreach( $sn[3] as $val )
											<li>
												<a href="{{($val->link)}}" target="_blank">{{$val->nombre}}</a>
											</li>
											@endforeach
											
											
										</ul><!-- /.socials-dropdown -->
									</li>
									@endif
								</ul>
							</div><!-- /.socials-footer -->
						</div><!-- /.col col-size4 -->
					</div><!-- /.cols -->

					<p class="copyright"><strong>&copy; 2016 Casino Caliente</strong> | Todos los Derechos Reservados | <a href="#"><strong>Aviso de Privacidad</strong></a></p><!-- /.copyright -->
				</div><!-- /.shell -->
			</footer><!-- /.footer -->
		</div><!-- /.wrapper -->
		@yield('js')
	</body>
</html>

 