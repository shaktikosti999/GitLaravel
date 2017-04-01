@extends('layout.front')
	@section('contenido')
		<div class="slider-secondary">
			<!-- 		<a href="/alimentos-y-bebidas" class="btn-menu">
			<img src="css/images/btn-menu@2x.png" alt="">
		</a>
 -->
			<!-- 		<a href="/alimentos-y-bebidas" class="btn-menu">
			<img src="css/images/btn-menu@2x.png" alt="">
		</a>
 -->
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

													{{ $sucursal_info->nombre }}

												@endif
											</h3>
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
	<div class="intro-gray"></div><!-- /.intro-gray -->

	<div class="main">
		<section class="section-articles">
			<div class="shell">
				<article class="article">
					<div class="article-head">
						<h2>Historia</h2>
					</div><!-- /.article-head -->
					
					<div class="article-entry">
						<p>Donut icing oat cake icing macaroon. Fruitcake apple pie sweet roll lemon drops pie. Cheesecake powder marshmallow cupcake marzipan jelly. Powder cake macaroon gingerbread tart. Bear claw lemon drops pastry gingerbread wafer dessert cheesecake carrot cake. Biscuit apple pie carrot cake tiramisu.</p>
						
						<p>Tiramisu croissant bear claw sweet roll chocolate. Ice cream icing bonbon marshmallow macaroon marzipan. Sweet brownie toffee gummies apple pie. Gingerbread danish macaroon danish icing. Pudding powder tootsie roll cheesecake candy canes wafer. Gummies sesame snaps gingerbread chocolate cake pie sweet candy fruitcake.</p>
						
						<p>Ice cream cotton candy ice cream.Pastry chupa chups bonbon jelly beans ice cream ice cream cupcake tart chocolate cake. Marzipan chocolate bar sesame snaps pudding bonbon marshmallow muffin fruitcake. Muffin powder danish pie muffin icing. Chupa chups sesame snaps tootsie roll toffee brownie apple pie.</p>
						
						<p>Toffee muffin fruitcake ice cream toffee. Apple pie candy canes carrot cake dragée bear claw icing. Cake pastry muffin jelly beans. Candy gummi bears wafer caramels cake sweet roll. Chocolate bar jujubes donut jelly macaroon pastry soufflé icing. Jelly wafer brownie. Cheesecake powder apple pie cheesecake tart bear claw. Marshmallow croissant pudding.</p>
					</div><!-- /.article-entry -->
					
					<div class="article-image">
						<img src="css/images/temp/article1.jpg" alt="">
					</div><!-- /.article-image -->
				</article><!-- /.article -->
				
				<article class="article">
					<div class="article-head">
						<h2>Misión</h2>
					</div><!-- /.article-head -->
					
					<div class="article-entry">
						<p>Donut icing oat cake icing macaroon. Fruitcake apple pie sweet roll lemon drops pie. Cheesecake powder marshmallow cupcake marzipan jelly. Powder cake macaroon gingerbread tart. Bear claw lemon drops pastry gingerbread wafer dessert cheesecake carrot cake. Biscuit apple pie carrot cake tiramisu.</p>
						
						<p>Tiramisu croissant bear claw sweet roll chocolate. Ice cream icing bonbon marshmallow macaroon marzipan. Sweet brownie toffee gummies apple pie. Gingerbread danish macaroon danish icing. Pudding powder tootsie roll cheesecake candy canes wafer. Gummies sesame snaps gingerbread chocolate cake pie sweet candy fruitcake.​​​​​​​</p>
					</div><!-- /.article-entry -->
					
					<div class="article-image">
						<img src="css/images/temp/article2.jpg" alt="">
					</div><!-- /.article-image -->
				</article><!-- /.article -->
				
				<article class="article">
					<div class="article-head">
						<h2>Visión</h2>
					</div><!-- /.article-head -->
					
					<div class="article-entry">
						<p>Donut icing oat cake icing macaroon. Fruitcake apple pie sweet roll lemon drops pie. Cheesecake powder marshmallow cupcake marzipan jelly. Powder cake macaroon gingerbread tart. Bear claw lemon drops pastry gingerbread wafer dessert cheesecake carrot cake. Biscuit apple pie carrot cake tiramisu.</p>
						
						<p>Tiramisu croissant bear claw sweet roll chocolate. Ice cream icing bonbon marshmallow macaroon marzipan. Sweet brownie toffee gummies apple pie. Gingerbread danish macaroon danish icing. Pudding powder tootsie roll cheesecake candy canes wafer. Gummies sesame snaps gingerbread chocolate cake pie sweet candy fruitcake.​​​​​​​</p>
					</div><!-- /.article-entry -->
					
					<div class="article-image">
						<img src="css/images/temp/article3.jpg" alt="">
					</div><!-- /.article-image -->
				</article><!-- /.article -->
			</div><!-- /.shell -->
		</section><!-- /.section-articles -->

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
	</div><!-- /.main -->
	@stop