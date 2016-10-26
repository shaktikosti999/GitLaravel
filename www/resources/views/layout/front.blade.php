<!DOCTYPE html>
<html lang="en">
	<head>
		<base href="{{asset('/assets/')}}/">
		<meta charset="utf-8" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>@yield('titulo','Casino Caliente')</title>

		<link rel="shortcut icon" type="image/x-icon" href="css/images/favicon.ico" />

		<!-- Vendor Styles -->
		<link rel="stylesheet" type="text/css" href="vendor/slick-1.6.0/slick/slick.css"/>
		<link rel="stylesheet" href="vendor/font-awesome-4.6.3/css/font-awesome.min.css" type="text/css" media="all" />
		<link rel="stylesheet" href="vendor/formstone/dropdown.css" />

		<!-- App Styles -->
		<link rel="stylesheet" href="css/styles.css" />

		<!-- Vendor JS -->
		<script src="vendor/jquery-1.12.4.min.js"></script>
		<script type="text/javascript" src="vendor/slick-1.6.0/slick/slick.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;language=en"></script>
		<script src="vendor/formstone/core.js"></script>
		<script src="vendor/formstone/touch.js"></script>
		<script src="vendor/formstone/dropdown.js"></script>

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
								<a href="/quienes_somos">Quíenes somos</a>
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
								<li>
									<a href="/">Inicio</a>
								</li>
								
								<li class="has-dropdown">
									<a href="#">opciones De Diversión</a>

									<ul class="dropdown">
										<li>
											<a href="{{url('lineas-de-juego/maquinas-de-juego')}}">Máquinas de juego</a>
										</li>
										
										<li>
											<a href="{{url('lineas-de-juego/mesas-de-juego')}}">Mesas de juego</a>
										</li>		
									</ul><!-- /.dropdown --> 
								</li>
								
								<li>
									<a href="/promociones">promociones Y Eventos</a>
								</li>
								
								<li>
									<a href="/ubicaciones">ubicaciones</a>
								</li>
								
								<li>
									<a href="/caliente_club">caliente Club</a>
								</li>

								<li class="desktop-hidden">
									<a href="/quienes_somos">Quíenes somos</a>
								</li>
								
								<li class="desktop-hidden">
									<a href="/contacto">Contacto</a>
								</li>

								<li class="desktop-hidden tablet-hidden">
									<a href="#">
										<i class="fa fa-facebook" aria-hidden="true"></i>
									</a>
								</li>
								
								<li class="desktop-hidden tablet-hidden">
									<a href="#">
										<i class="fa fa-twitter" aria-hidden="true"></i>
									</a>
								</li>
								
								<li class="desktop-hidden tablet-hidden">
									<a href="#">
										<i class="fa fa-youtube-play" aria-hidden="true"></i>
									</a>
								</li>
							</ul>
						</nav><!-- /.nav -->

						<div class="socials">
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
						</div><!-- /.socials -->
					</div><!-- /.header-content --> 

					<a href="#" class="btn-search"> 
						<i class="ico-search"></i>	

						<span></span>
					</a>

					<div class="search">
						<form action="?" method="get"> 
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
							<a href="#" class="logo"></a>

							<ul class="list-partners">
								<li>
									<a href="http://www.caliente.mx">www.caliente.mx</a>
								</li>
								
								<li>
									<a href="http://www.xolos.com.mx">www.xolos.com.mx</a>
								</li>
								
								<li>
									<a href="http://www.grupocaliente.com.mx">www.grupocaliente.com.mx</a>
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
										<a href="#">Sucursales</a>
									</li>
									
									<li>
										<a href="#">Promociones Y Eventos</a>
									</li>
									
									<!--<li>
										<a href="#">Opciones De Diversión</a>
									</li>-->
									
									<li>
										<a href="/alimentos-y-bebidas">Alimentos Y Bebidas</a>
									</li>
									
									<li>
										<a href="#">Juego Responsable</a>
									</li>
								</ul>
							</nav><!-- /.nav-footer -->
						</div><!-- /.col col-size2 -->
						
						<div class="col col-size3">
							<nav class="nav-footer">
								<ul>
									<li>
										<a href="#">Quiénes Somos</a>
									</li>
									
									<li>
										<a href="#">Contacto</a>
									</li>
									
									<li>
										<a href="#">Aviso De Privacidad</a>
									</li>
									
									<li>
										<a href="#">Bolsa De Trabajo</a>
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
									<li>
										<a href="#">
											<i class="fa fa-facebook" aria-hidden="true"></i>
										</a>

										<ul class="socials-dropdown">
											<li>
												<a href="#">Lorem ipsum dolor.</a>
											</li>
											
											<li>
												<a href="#">Lorem ipsum dolor.</a>
											</li>
											
											<li>
												<a href="#">Lorem ipsum dolor.</a>
											</li>
										</ul><!-- /.socials-dropdown -->
									</li>
									
									<li>
										<a href="#">
											<i class="fa fa-twitter" aria-hidden="true"></i>
										</a>

										<ul class="socials-dropdown">
											<li>
												<a href="#">Lorem ipsum dolor.</a>
											</li>
											
											<li>
												<a href="#">Lorem ipsum dolor.</a>
											</li>
											
											<li>
												<a href="#">Lorem ipsum dolor.</a>
											</li>
										</ul><!-- /.socials-dropdown -->
									</li>
									
									<li>
										<a href="#">
											<i class="fa fa-youtube-play" aria-hidden="true"></i>
										</a>

										<ul class="socials-dropdown">
											<li>
												<a href="#">Lorem ipsum dolor.</a>
											</li>
											
											<li>
												<a href="#">Lorem ipsum dolor.</a>
											</li>
											
											<li>
												<a href="#">Lorem ipsum dolor.</a>
											</li>
										</ul><!-- /.socials-dropdown -->
									</li>
								</ul>
							</div><!-- /.socials-footer -->
						</div><!-- /.col col-size4 -->
					</div><!-- /.cols -->

					<p class="copyright"><strong>&copy; 2016 Casino Caliente</strong> | Todos los Derechos Reservados | <a href="#"><strong>Aviso de Privacidad</strong></a></p><!-- /.copyright -->
				</div><!-- /.shell -->
			</footer><!-- /.footer -->
		</div><!-- /.wrapper -->
	</body>
</html>

