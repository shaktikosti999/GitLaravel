@extends('layout.front')

	@section('js')
		<script type="text/javascript" src="js/front/promotions.js"></script>
	@stop

	@section('contenido')
		@if( isset($slider) && count($slider) )
			<div class="slider-secondary">
				<div class="slider-clip">
					@if( isset( $slider ) && count( $slider ) > 1 )
						<ul class="slides">
					@endif
						@foreach($slider as $item)
								@if($item->is_show_img_video)
									<li class="slide fullscreen">
										<embed  width="100%" height="100%" src="<?php echo $item->video_url; ?>">
									</li>
								@else
							<li class="slide" style="background-image: url({{ asset($item->imagen) }})">
								<div class="slide-body">
									<div class="shell"> 		 
										 <div class="slide-content">
										 	{{--<h1>--}}
										 		{{--{{$item->titulo}}--}}
										 	{{--</h1>--}}
											 @if(isset($item->texto_boton))
												 <form action="{{$item->link}}" target="{{$item->is_new_tab}}">
													 <input type="submit" value="{{$item->texto_boton}}" style="min-width: 7em;padding-left: 5px;padding-right: 5px; font-size: 30px;background-color: red;box-shadow: 1px 1px 1px 1px black;border-radius: 10px;color: white;">
												 </form>
											 @endif

											 <h1><?php if(isset($item->titulo)){ echo html_entity_decode($item->titulo); } ?></h1>

										 	<!-- <h3>
										 		Sucursal Tecamachalco
										 	</h3>

										 	<div class="filter-secondary">
											<label for="field-filter-secondary1" class="form-label hidden">filter-secondary1</label>
											<select name="field-filter-secondary1" id="field-filter-secondary1" class="select">
												<option value="">Cambiar sucursal</option>
												<option value="">Cambiar sucursal 1</option>
												<option value="">Cambiar sucursal 2 </option>
											</select>
										</div> --><!-- /.filter-secondary -->
										 </div><!-- /.slide-content -->
										 @include('front.includes.breadcrumbs')
									</div><!-- /.shell -->
								</div><!-- /.slide-body -->
							</li><!-- /.slide -->
								@endif
						@endforeach
					@if( isset( $slider ) && count( $slider ) > 1 )
								</ul>
					@endif
				</div><!-- /.slider-clip --> 
			</div><!-- /.slider-secondary -->
		@endif

		<div class="main"> 

			<section>
				<div class="shell">
					<header class="section-head">
						<div class="listing-filters">
							<label for="field-filter" class="form-label hidden">filter</label>
							<select name="field-filter" id="field-filter" class="select select-black">
								<option value>Mostrar todo</option>
								<option value="1">Especial</option>
								<option value="2">Regular</option>
							</select>
						</div><!-- /.listing-filters-->
					</header>
				</div>
			</section>

			{{--@if(isset($promocion))--}}
				{{--@foreach($promocion as $dinamica)--}}
					{{--<section class="section-listings" data-sucursal="{{current($dinamica)->id_categoria}}">--}}
						{{--<div class="shell">--}}
							{{--<h4 style="color:rgb(0,0,0)" class="title-calendar">--}}
										{{--Calendario--}}
							{{--</h4>--}}
							{{--<header class="section-head">--}}
								{{--<h2>--}}
									{{--{{current($dinamica)->categoria}}--}}
									{{--</h2>--}}

								{{--<!-- <div class="section-head-entry">--}}
									{{--<h2>--}}
										{{--Marzo, 2016--}}
									{{--</h2>--}}

								{{--</div> --><!-- /.section-head-entry -->--}}
							{{--</header><!-- /.section-head -->--}}

							{{--@if( isset($dinamica) && count($dinamica) )--}}
							{{--<div class="section-body">--}}
								{{--<div class="section-inner green">--}}


									{{--<ul class="promotions">--}}
										{{--@foreach( $dinamica as $item )--}}
										{{--<li class="promotion">--}}
											{{--<div class="promotion-date promotion--day">--}}
												{{--<strong>--}}
													{{--@if( (int)$item->id_categoria == 1 )--}}
														{{--<span>--}}
															{{--{{date('d',strtotime($item->inicio))}}--}}
														{{--</span>--}}

														{{--<small>--}}
															{{--{{date('M',strtotime($item->inicio))}}--}}
														{{--</small>--}}
													{{--@else--}}
														{{--<small>Todos los</small>--}}
														{{--<span>{{$item->dia}}</span>--}}
													{{--@endif--}}
												{{--</strong>--}}
											{{--</div><!-- /.promotion-date -->--}}

											{{--<div class="promotion-info">--}}
												{{--<strong class="promotion-title">--}}
													{{--{{$item->titulo}}--}}
												{{--</strong>--}}

												{{--<strong class="promotion-entry">--}}
													{{--<span>--}}
														{{--{!!$item->descripcion!!}--}}
													{{--</span>--}}
												{{--</strong>--}}
											{{--</div><!-- /.promotion-info -->--}}
										{{--</li>--}}
										{{--@endforeach--}}
									{{--</ul><!-- /.promotion -->--}}

									{{--<!-- <div class="section-actions">--}}
										{{--<a href="#" class="btn btn-border">--}}
											{{--Cargar más--}}
										{{--</a>--}}
									{{--</div> --><!-- /.section-actions -->--}}
								{{--</div><!-- /.section-inner -->--}}
							{{--</div><!-- /.section-body -->--}}
							{{--@endif--}}
						{{--</div><!-- /.shell -->--}}
					{{--</section><!-- /.section-listing -->--}}
				{{--@endforeach--}}
			{{--@endif--}}

			{{--@if(isset($promociones)){--}}
				{{--@include('front.includes.promotions',['promociones' => $promociones,'sucursal'=>$sucursal_info])--}}
			{{--@endif--}}

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
		</div><!-- /.main -->
	@stop