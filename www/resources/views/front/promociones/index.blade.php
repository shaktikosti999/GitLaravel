@extends('layout.front')
@section('contenido')

	<script>

		function measureMenu(url, idSection){
			dataLayer.push ({
				'event': 'promotions',                 //Dato estático
				'promotions': idSection       //Dato dinámico
			});
			window.location.href = url;
		}

	</script>

	<div class="slider-secondary">
		<div class="slider-clip">
			@if( isset( $slider ) && count( $slider ) > 1 )
				<ul class="slides">
					@endif
					@if( count( $slider ) )

						@foreach( $slider as $item )
							@if($item->is_show_img_video)
								<li class="slide fullscreen">
									<embed  width="100%" height="100%" src="<?php echo $item->video_url; ?>">
								</li>
							@else
								<li class="slide" style="background-image: url({{ $item->imagen }})">
									<div class="slide-body">
										<div class="shell">
											<div class="slide-content">
												<h1  style="color: #fff;"><?php
													if(isset($item->titulo)){
														echo html_entity_decode($item->titulo);
													}
													?>

												</h1>
												@if(isset($item->texto_boton))
													<form action="{{$item->link}}" target="{{$item->is_new_tab}}">
														<input class="btn  btn-red  btn-slider" type="submit" value="{{$item->texto_boton}}">
													</form>
												@endif

												<h5 style="color: #fff;">
													@if( isset( $sucursal_info->nombre ) )

														{{ $sucursal_info->nombre }}

													@endif
												</h5>



												@if( isset( $sucursales ) && count( $sucursales ) )

													<div class="filter-secondary">
														<label for="field-filter-secondary1" class="form-label hidden">filter-secondary1</label>
														<select name="field-filter-secondary1" id="field-filter-secondary1" class="select branch-filter">

															<option value="-1">Selecciona tu casino</option>

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
							@endif
						@endforeach

					@endif

					@if( isset( $slider ) && count( $slider ) > 1 )
				</ul>
			@endif
		</div><!-- /.slider-clip -->

		<div class="slider-label red-label second">
			<i class="ico-horse"></i>
		</div><!-- /.slider-label -->
	</div><!-- /.slider-secondary -->


	<div class="main ">

		@if( isset( $promociones ) && count( $promociones ) && 1 == 2 )

			<section class="section-slider">
				<div class="shell">
					<div class="section-body">
						<div class="slider-games reset-margin">
							<h2>Promociones y Eventos</h2>
							<div class="slider-clip">
								<ul class="slides">

										@foreach( $promociones as $item )

											<li class="slide">

												<a href="/promociones/detalle/{{ $item->slug }}">
													<div class="slide-content" style="background-image: url('{{ $item->thumb === null && !empty($item->thumb) ? $item->imagen : $item->thumb}}'); ">
														<div class="gradient-black"></div>
														<div class="slide-caption">
															<p>{{ $item->nombre }}</p>
														</div><!-- /.slide-caption -->
													</div><!-- /.slide-content -->

												</a>
											</li><!-- /.slide -->

										@endforeach

								</ul><!-- /.slides -->
							</div><!-- /.slider-clip -->
						</div><!-- /.slider-games -->
					</div><!-- /.section-body -->
				</div><!-- /.shell -->
			</section><!-- /.section-slider -->

		@endif

		 <section class="section-teritary">
		 	<div class="shell">
		 		<div class="section-head">
		 		<div class="stick--point" id="promociones"></div>
		 			<h2>
		 				Selecciona tu promoción
		 			</h2>

		 			<ul class="section-filters">
						<li class="section-filter {{ ( ! $id_linea ) ? 'active' : ''  }} line-filter">
							 <a href="javascript:void(0);" onclick="measureMenu('<?php echo Request::url(); ?>', 'Todas las promociones')" >
							 	<i class="ico-ticket"></i>

							 	<span>
							 		Todas las promociones
							 	</span>
							 </a>
						</li>

						@if( isset( $lineas ) && count( $lineas ) )

							@foreach( $lineas as $item )

								@if($item->id_linea < 7)
									<li class="section-filter line-filter {{ ( $id_linea == $item->id_linea ) ? 'active' : '' }}" onclick="measureMenu(<?php echo $item->linea; ?>)">
										 <a href="javascript:void(0);" onclick="measureMenu('{{ Request::url() }}?linea={{ $item->id_linea }}', '{{ $item->linea }}')"  data-id="{{ $item->id_linea }}">
										 {{--<a href="{{ Request::url() }}?linea={{ $item->id_linea }}" data-id="{{ $item->id_linea }}">--}}
											<i class="{{ $item->icono }}"></i>

											<span>
												{{ $item->linea }}
											</span>
										 </a>
									</li>
								@endif

							@endforeach

						@endif


		 			</ul><!-- /.section-filter -->
		 		</div><!-- /.section-head -->

		 		<div class="section-body">
		 			<div class="row">
			 			<?php $count = 1; ?>

			 			@if( isset( $promociones ) && count( $promociones ) )

				 			@foreach( $promociones as $item )

				 				@if( $count == 1 )



									<div class="col col-1of2 item-{{ $item->id_linea }}">
										<a href="/promociones/detalle/{{ $item->slug }}">
											<div class="box-current-promotions" style="background-image: url('{{ $item->thumb !== null && !empty($item->thumb) ? $item->thumb : $item->imagen }}')">
												@if($item->is_active_btn==1)
													<form action="{{$item->url}}" target="{{$item->is_new_tab}}">
														<input type="submit" value="{!!$item->button_text!!}" style="width: 9em;padding: 1em;background-color: red;box-shadow: 1px 1px 1px 1px black;border-radius: 10px;color: white;right: 1em;position: absolute;bottom: 1em;">
													</form>
												@endif
											</div><!-- /.box-current-promotions -->
										</a>
									</div><!-- /.col col-1of2 -->

			 				@endif

			 				@if( $count == 2 )
			 					<div class="col col-1of2">
									<div class="cols">
										<div class="col col-1of2 item-{{ $item->id_linea }}">
											<a href="/promociones/detalle/{{ $item->slug }}">
												<div class="box-current-promotions" style="background-image: url('{{ $item->thumb !== null && !empty($item->thumb) ? $item->thumb : $item->imagen }}')">
													{{--<a href="/promociones/detalle/{{ $item->slug }}" class="btn btn-red btn-small">--}}
														{{--Conoce más--}}
													{{--</a>--}}
													@if($item->is_active_btn==1)
														<form action="{{$item->url}}" target="{{$item->is_new_tab}}">
															<input type="submit" value="{!!$item->button_text!!}" style="width: 9em;padding: 1em;background-color: red;box-shadow: 1px 1px 1px 1px black;border-radius: 10px;color: white;right: 1em;position: absolute;bottom: 1em;">
														</form>
													@endif
												</div><!-- /.box-current-promotions -->
											</a>
										</div><!-- /.col col-1of2 -->


			 				@endif

			 				@if( $count == 3 )

					 						<div class="col col-1of2 item-{{ $item->id_linea }}">
												<a href="/promociones/detalle/{{ $item->slug }}">
													<div class="box-current-promotions" style="background-image: url('{{ $item->thumb !== null && !empty($item->thumb) ? $item->thumb : $item->imagen }}')">
														{{--<a href="/promociones/detalle/{{ $item->slug }}" class="btn btn-red btn-small">--}}
															{{--Conoce más--}}
														{{--</a>--}}
														@if($item->is_active_btn==1)
															<form action="{{$item->url}}" target="{{$item->is_new_tab}}">
																<input type="submit" value="{!!$item->button_text!!}" style="width: 9em;padding: 1em;background-color: red;box-shadow: 1px 1px 1px 1px black;border-radius: 10px;color: white;right: 1em;position: absolute;bottom: 1em;">
															</form>
														@endif
													</div><!-- /.box-current-promotions -->
												</a>
											</div><!-- /.col col-1of2 -->
										</div><!-- /.cols -->
									</div><!-- /.col col-1of2 -->




			 				@endif

			 				@if( $count == 4 )

						 				<div class="col col-1of2">
						 					<div class="cols">
												<div class="col col-1of2 item-{{ $item->id_linea }}">
													<a href="/promociones/detalle/{{ $item->slug }}">
														<div class="box-current-promotions" style="background-image: url('{{ $item->thumb !== null && !empty($item->thumb) ? $item->thumb : $item->imagen }}')">
															{{--<a href="/promociones/detalle/{{ $item->slug }}" class="btn btn-red btn-small">--}}
																{{--Conoce más--}}
															{{--</a>--}}
															@if($item->is_active_btn==1)
																<form action="{{$item->url}}" target="{{$item->is_new_tab}}">
																	<input type="submit" value="{!!$item->button_text!!}" style="width: 9em;padding: 1em;background-color: red;box-shadow: 1px 1px 1px 1px black;border-radius: 10px;color: white;right: 1em;position: absolute;bottom: 1em;">
																</form>
															@endif
														</div><!-- /.box-current-promotions -->
													</a>
												</div><!-- /.col col-1of2 -->

			 				@endif

			 				@if( $count == 5 )

						 			<div class="col col-1of2 item-{{ $item->id_linea }}">
										<a href="/promociones/detalle/{{ $item->slug }}">
											<div class="box-current-promotions" style="background-image: url('{{ $item->thumb !== null && !empty($item->thumb) ? $item->thumb : $item->imagen }}')">
												{{--<a href="/promociones/detalle/{{ $item->slug }}" class="btn btn-red btn-small">--}}
													{{--Conoce más--}}
												{{--</a>--}}
												@if($item->is_active_btn==1)
													<form action="{{$item->url}}" target="{{$item->is_new_tab}}">
														<input type="submit" value="{!!$item->button_text!!}" style="width: 9em;padding: 1em;background-color: red;box-shadow: 1px 1px 1px 1px black;border-radius: 10px;color: white;right: 1em;position: absolute;bottom: 1em;">
													</form>
												@endif
											</div><!-- /.box-current-promotions -->
										</a>
										</div><!-- /.col col-1of2 -->
									</div><!-- /.cols -->
				 				</div><!-- /.col col-1of2 -->

			 				@endif

			 				@if( $count == 6 )

								 	<div class="col col-1of2 item-{{ $item->id_linea }}"> <!-- modificar-->
					 					<div class="box-current-promotions" style="background-image: url('{{ $item->thumb !== null && !empty($item->thumb) ? $item->thumb : $item->imagen }}')">
											{{--<a href="/promociones/detalle/{{ $item->slug }}" class="btn btn-red btn-small">--}}
												{{--Conoce más--}}
											{{--</a>--}}
											@if($item->is_active_btn==1)
												<form action="{{$item->url}}" target="{{$item->is_new_tab}}">
													<input type="submit" value="{!!$item->button_text!!}" style="width: 9em;padding: 1em;background-color: red;box-shadow: 1px 1px 1px 1px black;border-radius: 10px;color: white;right: 1em;position: absolute;bottom: 1em;">
												</form>
											@endif
										</div><!-- /.box-current-promotions -->
					 				</div><!-- /.col col-1of2 -->
					 			</div><!-- /.row -->



			 				@endif

			 				<?php

			 					$count++;

			 					if( $count == 6 )
			 						$count = 1;

			 				?>


			 			@endforeach

			 		@endif



		 		</div><!-- /.section-body

		 		<div class="section-actions">
		 			<a href="#" class="btn btn-border">
		 				Cargar más promociones
		 			</a>
		 		</div> /.section-actions -->


		 	</div><!-- /.shell -->
		 </section><!-- /.section-teritary -->

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


	<script>

		$( function(){

			$(".branch-filter").change( function(){

				var $value = $( this ).val();
				var $url   = "/promociones";

				if( $value != -1 ){

					$url = "/promociones/" + $value;

				}

				$( location ).attr("href", $url);

			} );

		} )

	</script>

@stop
