<!DOCTYPE html>
<html lang="en">
	<head>
		<base href="{{asset('/assets/')}}/">
	<meta charset="utf-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Casino Caliente</title>

	<link rel="shortcut icon" type="image/x-icon" href="css/images/favicon.ico" />

	<!-- Vendor Styles -->
	<link rel="stylesheet" type="text/css" href="vendor/slick-1.6.0/slick/slick.css"/>
	<link rel="stylesheet" href="vendor/font-awesome-4.6.3/css/font-awesome.min.css" type="text/css" media="all" />
	<link rel="stylesheet" href="vendor/formstone/dropdown.css" />

	<!-- App Styles -->
	<link rel="stylesheet" href="css/style.css" />

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
<div class="wrapper">
    
	<div class="stick-nav"><!-- Stick nav -->
        <ul>
            <li><a href="#promociones"><img src="css/images/icons/icon-1.png"><span>Promociones</span></a></li>
            <li><a href="#juegos"><img src="css/images/icons/icon-7.png"><span>Juegos</span></a></li>
            <li><a href="#jackpot"><img src="css/images/icons/icon-4.png"><span>Jackpot</span></a></li>
            <li><a href="#torneos"><img src="css/images/icons/icon-8.png"><span>Torneos</span></a></li>
            <li><a href="#sucursales"><img src="css/images/icons/icon-5.png"><span>Ubicación</span></a></li>
        </ul>
    </div><!-- Stick nav -->


    
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
						<a href="#">Quíenes somos</a>
					</li>
					
					<li>
						<a href="#">Contacto</a>
					</li>
				</ul>
			</nav><!-- /.nav-access -->

			<div class="header-content">
				<a href="#" class="logo">casino caliente</a>
				
				<nav class="nav">
					<ul>
						<li>
							<a href="#">Home</a>
						</li>
						
						<li class="has-dropdown">
							<a href="#">opciones De Diversión</a>

							<ul class="dropdown">
								<li>
									<a href="#">promociones Y Eventos</a>
								</li>
								
								<li>
									<a href="#">ubicaciones</a>
								</li>
								
								<li>
									<a href="#">caliente Club</a>
								</li>		
							</ul><!-- /.dropdown --> 
						</li>
						
						<li>
							<a href="#">promociones Y Eventos</a>
						</li>
						
						<li>
							<a href="#">ubicaciones</a>
						</li>
						
						<li>
							<a href="#">caliente Club</a>
						</li>

						<li class="desktop-hidden">
							<a href="#">Quíenes somos</a>
						</li>
						
						<li class="desktop-hidden">
							<a href="#">Contacto</a>
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
									<option value="">Cambiar sucursal</option>
									<option value="">Cambiar sucursal 1</option>
									<option value="">Cambiar sucursal 2 </option>
								</select>
							</div><!-- /.filter-secondary -->
							 </div><!-- /.slide-content -->

							 <div class="slide-inner">
							 	<p class="breadcrumbs">
									<a href="#">Inicio</a>
									<a href="#">Sucursal Tecamachalco</a>
								</p><!-- /.breadcrumbs -->
							 </div><!-- /.slide-inner --> 
							 
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

							 <div class="slide-inner">
							 	<p class="breadcrumbs">
									<a href="#">Inicio</a>
									
									<a href="#">Máquinas de juego</a>
									
									<a href="#">Sucursal Tecamachalco</a>
								</p><!-- /.breadcrumbs -->
							 </div><!-- /.slide-inner --> 
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

							 <div class="slide-inner">
							 	<p class="breadcrumbs">
									<a href="#">Inicio</a>
									
									<a href="#">Máquinas de juego</a>
									
									<a href="#">Sucursal Tecamachalco</a>
								</p><!-- /.breadcrumbs -->
							 </div><!-- /.slide-inner --> 
						</div><!-- /.shell -->
					</div><!-- /.slide-body -->
				</li><!-- /.slide -->
			</ul><!-- /.slides -->
		</div><!-- /.slider-clip -->

		<!--<div class="slider-label red-label large">
			<i class="ico-slot"></i>
		</div> /.slider-label -->
	</div><!-- /.slider-secondary -->

		<section class="section-teritary"> <!-- Begin: promotion buttons 
		 	<div class="shell">
		 		<div class="section-head">
		 			<!--<h2>
		 				Selecciona tu promoción
		 			</h2>

		 			<ul class="section-filters">
						<li class="section-filter active">
							 <a href="#">
							 	<i class="ico-robot"></i>

							 	<span>
							 		Máquinas de Juego
							 	</span>
							 </a>
						</li>

						<li class="section-filter">
							 <a href="#">
							 	<i class="ico-die"></i>

							 	<span>
							 		mesas de juego
							 	</span>
							 </a>
						</li>

						<li class="section-filter">
							 <a href="#">
							 	<i class="ico-ball"></i>

							 	<span>
							 		Apuesta deportiva
							 	</span>
							 </a>
						</li>

						<li class="section-filter">
							 <a href="#">
							 	<i class="ico-horse"></i>

							 	<span>
							 		apuesta de carreras
							 	</span>
							 </a>
						</li>

						<li class="section-filter">
							 <a href="#">
							 	<i class="ico-ticket"></i>

							 	<span>
							 		Ubicación
							 	</span>
							 </a>
						</li>
		 			</ul><!-- /.section-filter 
		 		</div>
		 	</div><!-- /.section-head 
		 </section> <!-- End: promotion buttons -->

	<div class="main"> 
		<section class="section-promotions">
			<div class="shell">
				<header class="section-head">
                    <div class="stick--point" id="promociones"></div>
					<h2>
						Promociones
					</h2>

					<a href="#" class="btn btn-black btn-calendar">
						consulta calendario completo
					</a>
				</header><!-- /.section-head -->
				
				<div class="section-body">
					<div class="slider-games slider-promotions">
						<div class="slider-clip">
							<ul class="slides">
								<li class="slide">
									<a href="#" class="slide-content" style="background-image: url(css/images/temp/slide-promotion.jpg); ">
										 <span class="slide-label">
										 	Válido del 1 al 30 
										 </span>

										 <span class="slide-inner">
										 	<span class="slide-inner-entry">
										 		<strong>Promoción</strong> <br>
												de primavera
										 	</span>

										 	<span class="slide-inner-price">
										 		Repartiremos <br>
												más de $80,000
										 	</span>
										 </span>
									</a><!-- /.slide-content -->
								</li><!-- /.slide -->

								<li class="slide">
									<a href="#" class="slide-content" style="background-image: url(css/images/temp/slide-promotion.jpg); ">
										 <span class="slide-label">
										 	Válido del 15 al 30  
										 </span>

										 <span class="slide-inner">
										 	<span class="slide-inner-entry">
										 		Día de <br>
												<strong>la suerte</strong>
										 	</span>

										 	<span class="slide-inner-price">
										 		Deposita $500 y <br>
												recibe $1,000
										 	</span>
										 </span>
									</a><!-- /.slide-content -->
								</li><!-- /.slide -->

								 <li class="slide">
									<a href="#" class="slide-content" style="background-image: url(css/images/temp/slide-promotion.jpg); ">
										 <span class="slide-label">
										 	Válido del 20 al 30    
										 </span>

										 <span class="slide-inner">
										 	<span class="slide-inner-entry">
										 		Sorteo del <br>
												<strong>afortunado</strong>
										 	</span>

										 	<span class="slide-inner-price">
										 		Deposita y gana <br>
												un iPhone
										 	</span>
										 </span>
									</a><!-- /.slide-content -->
								</li><!-- /.slide -->

								<li class="slide">
									<a href="#" class="slide-content" style="background-image: url(css/images/temp/slide-promotion.jpg); ">
										 <span class="slide-label">
										 	Válido del 17 al 30  
										 </span>

										 <span class="slide-inner">
										 	<span class="slide-inner-entry">
										 		<strong>Invita</strong> a <br>
												un amigo
										 	</span>

										 	<span class="slide-inner-price">
										 		Gana una bebida <br>
												nacional
										 	</span>
										 </span>
									</a><!-- /.slide-content -->
								</li><!-- /.slide -->

								<li class="slide">
									<a href="#" class="slide-content" style="background-image: url(css/images/temp/slide-promotion.jpg); ">
										 <span class="slide-label">
										 	Válido del 20 al 30  
										 </span>

										 <span class="slide-inner">
										 	<span class="slide-inner-entry">
										 		<strong>Invita</strong> a
												un amigo
										 	</span>

										 	<span class="slide-inner-price">
										 		Gana una bebida <br>
												nacional
										 	</span>
										 </span>
									</a><!-- /.slide-content -->
								</li><!-- /.slide -->
							</ul><!-- /.slides -->
						</div><!-- /.slider-clip -->
					</div><!-- /.slider-games -->
				</div><!-- /.section-body -->	
			</div><!-- /.shell -->
		</section><!-- /.section-promotions -->

		<section class="section-promotions">
			<div class="shell">
				<header class="section-head">
                    <div class="stick--point" id="maquinas"></div>
					<h2>
						Máquinas
					</h2>

					<a href="#" class="btn btn-red">
						Aprende a jugar
					</a>
				</header><!-- /.section-head -->
				
				<div class="section-body">
					<ul class="games-filters">
						<li>
							<span>Selecciona</span>
						</li>

						<li>
						 	<div class="games-filter-select">
						 		<label for="field-games-filter-select1" class="form-label hidden">games-filter-select1</label>
						 		<select name="field-games-filter-select1" id="field-games-filter-select1" class="select">
						 			<option value="">Populares</option>
						 			<option value="">Populares</option>
						 			<option value="">Populares</option>
						 		</select>
						 	</div><!-- /.form-controls -->
						</li>
					</ul><!-- /.games-filters -->
					<ul class="games">
						<li class="game">
							<a href="#" style="background-image: url(css/images/temp/game-machine1.jpg)"> 
								<span class="jackpot">
									<small>JACKPOT</small>
									<strong>
										$40,981.00
									</strong>
								</span>

								<span class="game-title">
									<strong>
										Premium Roulette
									</strong>

									<span>
										15 giros GRATIS con multiplicador de desmoronamiento de carretes. 
									</span>
								</span>
							</a>
						</li><!-- /.game -->

						<li class="game">
							<a href="#" style="background-image: url(css/images/temp/game-machine2.jpg)"> 
								<span class="jackpot">
									<small>JACKPOT</small>
									<strong>
										$45,281.00
									</strong>
								</span>

								<span class="game-title">
									<strong>
										Perfect Black Jack
									</strong>

									<span>
										12 giros GRATIS el multiplicador se aplica al giro en curso . El multiplicador baja un nivel en los giros en los que no aparece símbolo. 
									</span>
								</span>
							</a>
						</li><!-- /.game -->

						<li class="game">
							<a href="#" style="background-image: url(css/images/temp/game-machine3.jpg)"> 
								<span class="jackpot">
									<small>JACKPOT</small>
									<strong>
										$39,243.00
									</strong>
								</span>

								<span class="game-title">
									<strong>
										Casino Hold  ‘Em 
									</strong>

									<span>
										Todas las ganancias en partidas gratis seran triplicadas. 
									</span>
								</span>
							</a>
						</li><!-- /.game -->

						<li class="game">
							<a href="#" style="background-image: url(css/images/temp/game-machine4.jpg)"> 
								<span class="jackpot">
									<small>JACKPOT</small>
									<strong>
										$32,391.00
									</strong>
								</span>

								<span class="game-title">
									<strong>
										White King
									</strong>

									<span>
										15 partidas GRATIS con el multiplicador x3. 
									</span>
								</span>
							</a>
						</li><!-- /.game -->

						<li class="game">
							<a href="#" style="background-image: url(css/images/temp/game-machine5.jpg)"> 
								<span class="jackpot">
									<small>JACKPOT</small>
									<strong>
										$40,981.00
									</strong>
								</span>

								<span class="game-title">
									<strong>
										Premium Roulette
									</strong>

									<span>
										15 giros GRATIS con multiplicador de desmoronamiento de carretes. 
									</span>
								</span>
							</a>
						</li><!-- /.game -->

						<li class="game">
							<a href="#" style="background-image: url(css/images/temp/game-machine6.jpg)"> 
								<span class="jackpot">
									<small>JACKPOT</small>
									<strong>
										$45,281.00
									</strong>
								</span>

								<span class="game-title">
									<strong>
										Perfect Black Jack
									</strong>

									<span>
										12 giros GRATIS el multiplicador se aplica al giro en curso . El multiplicador baja un nivel en los giros en los que no aparece símbolo. 
									</span>
								</span>
							</a>
						</li><!-- /.game -->
					</ul><!-- /.games -->
				</div><!-- /.section-body -->	

				<div class="section-foot">
					<a href="#" class="btn btn-border">
						Conoce más maquinas
					</a>
				</div><!-- /.section-foot -->
			</div><!-- /.shell -->
		</section><!-- /.section-promotions -->

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
						<div class="col col-1of2">
							<article class="article-tournament" style="background-image: url(css/images/temp/tournament1.jpg)"> 
								<span class="article-title">
									Próximos torneos
								</span><!-- /.article-title -->	

								<div class="article-content">
									<span class="article-label">
										Final
									</span><!-- /.article-label -->
									
									<h5>
										Poker Texas Holdem
									</h5>

									<p>
										Marzo 26 - Tecamachalco
 									</p>

 									<a href="#" class="btn btn-red">
 										Participar
 									</a>
								</div><!-- /.article-content -->
							</article><!-- /.article-tournament -->
						</div><!-- /.col col-1of2 -->

						<div class="col col-1of2">
							<article class="article-tournament" style="background-image: url(css/images/temp/tournament2.jpg)"> 
								<span class="article-title">
									eXPERIENCIAS PASADAS
								</span><!-- /.article-title -->	

								<div class="article-content">
									<span class="article-label">
										Torneo regional 
									</span><!-- /.article-label -->
									
									<h5>
										Poker Texas Holdem
									</h5>

									<p>
										Enero 17 - Morelia 
 									</p>

 									<a href="#" class="btn btn-red">
 										Ver más
 									</a>
								</div><!-- /.article-content -->
							</article><!-- /.article-tournament -->
						</div><!-- /.col col-1of2 -->
					</div><!-- /.cols -->
				</div><!-- /.section-body -->
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

		<section class="section-gallery secondary gll-btm">
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
							<li>
								<a href="#">Líneas De Juego</a>
							</li>
							
							<li>
								<a href="#">Sucursales</a>
							</li>
							
							<li>
								<a href="#">Promociones Y Eventos</a>
							</li>
							
							<li>
								<a href="#">Opciones De Diversión</a>
							</li>
							
							<li>
								<a href="#">Alimentos Y Bebidas</a>
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
							
							<li>
								<a href="#">Ubicaciones</a>
							</li>
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

