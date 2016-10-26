@extends('layout.front')
@section('contenido')

	<div class="intro intro-secondary" style="background-image: url(css/images/temp/intro-menu-bg.jpg);">
		<div class="intro-content">
			<div class="shell">
				<h1>Menú <br>Alimentos y bebidas</h1>
				
				<h2>

					@if( isset( $sucursal_info->nombre ) )
										 			
			 			Sucursal {{ $sucursal_info->nombre }}

			 		@endif

				</h2>
				
				<div class="intro-content-actions">
					<div class="cols">
						
						@if( isset( $sucursales ) && count( $sucursales ) )

							<div class="col col-1of2">
								<div class="filter-secondary">
									<label for="field-filter-secondary1" class="form-label hidden">filter-secondary1</label>
									<select name="field-filter-secondary1" id="field-filter-secondary1" class="select branch-filter">
										
										<option value="-1">Selecciona una sucursal</option>

										@foreach( $sucursales as $item )

											<option value="{{ $item->slug }}" <?php ( $sucursal && $sucursal == $item->slug ) ? print "selected" : print "" ?>>{{ $item->nombre }}</option>

										@endforeach

									</select>
								</div><!-- /.filter-secondary -->
							</div><!-- /.col col-1of2 -->

						@endif
						
						<div class="col col-1of2">
							<p class="breadcrumbs">
								<a href="#">Inicio</a>
								
								<a href="#">Mesas de juego</a>
								
								<a href="#">Menú alimentos y bebidas</a>
							</p><!-- /.breadcrumbs -->
						</div><!-- /.col col-1of2 -->
					</div><!-- /.cols -->
				</div><!-- /.intro-content-actions -->
			</div><!-- /.shell -->
		</div><!-- /.intro-content -->
	</div><!-- /.intro intro-secondary -->

	<div class="main">
		<section class="section-menu">
			<div class="shell">
				<div class="section-body">
					<div class="section-actions">
						<ul class="list-filters">

							<?php $c = 1; ?>
							
							@if( isset( $tipos_alimentos ) && count( $tipos_alimentos ) )

								@foreach( $tipos_alimentos as $t )

									<li class="{{ ( $c++ == 1 ) ? '' : '' }}">
										<a href="#" class="filtro-tipo-alimento" data-id="{{ $t->id_tipo }}">{{ $t->nombre }}</a>
									</li>

								@endforeach
							
							@endif

						</ul><!-- /.list-filters -->
					</div><!-- /.section-actions -->

					<div class="section-inner">
						
						@if( isset( $alimentos ) && count( $alimentos ) )

							@foreach( $alimentos as $alimento )

								<?php if( ! isset( $alimento["alimentos"] ) || ! count( $alimento["alimentos"] ) ) continue; ?>

								<div class="section-head item-tipo-alimento item-tipo-alimento-{{ $alimento['tipo_alimento'] }}">
									<h2>{{ $alimento["categoria"] }}</h2>
								</div><!-- /.section-head -->
								
								@if( isset( $alimento["alimentos"] ) && count( $alimento["alimentos"] ) )

									<div class="section-body-inner item-tipo-alimento item-tipo-alimento-{{ $alimento['tipo_alimento'] }}">
										<div class="slider-games slider-games-menu">
											<div class="slider-clip">
												<ul class="slides">
													
													@foreach( $alimento["alimentos"] as $item )

														<li class="slide tipo-{{ $item->tipo_alimento }}">
															<div class="slide-content" style="background-image: url('{{ $item->archivo }}'); ">
																<div class="slide-caption">
																	<p>{{ $item->nombre }}</p>
																	
																	<span>{{ $item->descripcion }}</span>
																</div><!-- /.slide-caption -->
															</div><!-- /.slide-content -->
														</li><!-- /.slide -->

													@endforeach

												</ul><!-- /.slides -->
											</div><!-- /.slider-clip -->
										</div><!-- /.slider-games -->
									</div><!-- /.section-body-inner -->

								@endif

							@endforeach

						@endif

						
					</div><!-- /.section-inner -->
				</div><!-- /.section-body -->
			</div><!-- /.shell -->
		</section><!-- /.section-menu -->

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

	<script>

		$( function(){

			$(".branch-filter").change( function(){

				var $value = $( this ).val();
				var $url   = "/alimentos-y-bebidas";

				if( $value != -1 ){

					$url = "/alimentos-y-bebidas/" + $value;

				}

				$( location ).attr("href", $url);

			} );

			$(".filtro-tipo-alimento").click( function( e ){

				e.preventDefault();

				$(".list-filters li").removeClass("current");
				$( this ).parent().addClass("current");

				var $id = $( this ).data("id");

				$(".item-tipo-alimento").hide();
				$(".item-tipo-alimento-" + $id).show();


			} );

		} )

	</script>

@stop
