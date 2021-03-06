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
						<div class="slider-intro anchor">
							<div class="slider-clip">
								@if( isset( $slider ) && count( $slider ) > 1 )
									<ul class="slides">
										@endif
									@foreach( $slider as $s )
										@if($s->is_show_img_video)
													<li class="slide fullscreen">
														<embed  width="100%" height="100%" src="<?php echo $s->video_url; ?>">
													</li>
										@else
											<li class="slide fullscreen" style="background-image: url({{ $s->imagen }});">
												<div class="slide-content ">
													<!--<div class="shell"-->
													@if(isset($s->texto_boton))
														<form action="{{$s->link}}" target="{{$s->is_new_tab}}">
															<input type="submit" value="{{$s->texto_boton}}" style="min-width: 7em;padding-left: 5px;padding-right: 5px; font-size: 30px;background-color: red;box-shadow: 1px 1px 1px 1px black;border-radius: 10px;color: white;">
														</form>
													@endif
													<h1><?php echo html_entity_decode($s->titulo); ?></h1>

												</div><!-- /.slide-content -->
											</li><!-- /.slide -->
										@endif
									@endforeach
										@if( isset( $slider ) && count( $slider ) > 1 )
											</ul>
								@endif
							</div><!-- /.slider-clip -->
						</div><!-- /.slider-intro -->
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