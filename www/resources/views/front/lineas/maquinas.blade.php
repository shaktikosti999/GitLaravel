@extends('layout.front')

@section('js')
	<script src="js/front/maquinas.js"></script>
	<script>
		function redirectPage(url,target) {
			if(target == "_blank"){
				window.open(url);
			} else {
				window.location.href = url;
			}
		}
	</script>
@stop

@section('contenido')

	<!--@{



	}-->


	<div class="wrapper">

    <div class="stick-nav"><!-- Stick nav -->
        <ul>
            <li><a href="#promociones"><img src="/assets/images/icon/todas-las-promociones.svg"><span>Promociones</span></a></li>
            <li><a href="#maquinas"><img src="/assets/images/icon/maquinas-de-juego.svg"><span>Máquinas</span></a></li>
            <!--<li><a href="#proveedores"><img src="/assets/images/icon/marcas-de-juego.svg"><span>Marcas de Juego</span></a></li>-->
            <li><a href="#jackpot"><img src="/assets/images/icon/jackpot.svg"><span>Jackpot</span></a></li>
            <!--<li><a href="#sucursales"><img src="css/images/icons/icon-5.png"><span>Ubicación</span></a></li>-->
            <li><a href="#diversion"><img src="/assets/images/icon/diversion.svg"><span>Diversión</span></a></li>
        </ul>
    </div>

		@if( isset( $slider ) && count( $slider ) )

			<div class=" slider-intro anchor">
				<!-- <a href="#" class="btn-scroll">
                    <i class="ico-mouse"></i>
                </a> -->
				<div class="slider-clip">
					@if( isset( $slider ) && count( $slider ) > 1 )
						<ul class="slides">
							@endif
							@foreach( $slider as $s )
								@if($s->is_show_img_video)
									<li class="slide fullscreen">
										{{--<embed  width="100%" height="100%" src="https://www.youtube.com/embed/E21unYOt2u8">--}}
										<embed  width="100%" height="100%" src="{{$s->video_url}}">
									</li>

								@else
									<li class="slide fullscreen" style="background-image: url({{ $s->imagen }});">
										<div class="slide-body  slide-body--filter">
											<div class="shell">
												<div class="slide-content  slide__body--btn">
													<h2>
														{{$s->titulo}}
													</h2>
													@if(isset($s->texto_boton) && $s->texto_boton != "")
														<form action="{{$s->link}}" target="{{$s->is_new_tab}}" >
															<input  class="btn  btn-red  btn-slider"  type="submit" value="{{$s->texto_boton}}" >
														</form>
													@endif


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
							@if( isset( $slider ) && count( $slider ) > 1 )
						</ul><!-- /.slides -->
					@endif
				</div><!-- /.slider-clip -->
			</div><!-- /.slider-intro -->

		@endif

		<div class="main">

		@if( isset( $promociones ) && count( $promociones ) )

			@include('front.includes.promotions',['promociones' => $promociones,'sucursal'=>$sucursal_info])

		@endif

		<input type="hidden" name="linea" id="linea" value="1">
		@if( isset( $maquinas ) && count( $maquinas ) )

			@include('front.includes.game_machine',['maquinas' => $maquinas])

		@endif

		@if( isset( $proveedores ) && count( $proveedores ) )

			<section class="section-providers">
				<div class="shell">
					<header class="section-head">
						<div class="stick--point" id="proveedores"></div>
						<h2>
							Marcas de Juegos
						</h2>
					</header><!-- /.section-head -->

					<div class="section-body">
						<div class="slider-providers">
							<div class="slider-clip">

								<ul class="slides">

									@foreach( $proveedores as $item )

										<li class="slide">
											<div class="slide-image">
												@if( trim($item->link) != "" )
													<a href="{{$item->link}}" target="_blank">
														<img src="{{ $item->archivo }}" alt="{{ $item->nombre }}">
													</a>
												@else
													<img src="{{ $item->archivo }}" alt="{{ $item->nombre }}">
												@endif
											</div><!-- /.slide-image -->
										</li><!-- /.slide -->

									@endforeach

								</ul><!-- /.slides -->

							</div><!-- /.slider-clip -->
						</div><!-- /.slider-providers -->
					</div><!-- /.section-body -->
				</div><!-- /.shell -->
			</section><!-- /.section-providers -->

		@endif

			<section class="section-jackpots">
				<div class="shell">
					@if( isset($acumulado) && count($acumulado) )
						<header class="section-head">
							<div class="stick--point" id="jackpot"></div>
							<h2>
								<small>Jackpots</small>
								Acumulados
							</h2>
						</header><!-- /.section-head -->

						<div class="section-content">
						<div class="section-entry">
							<p>
								<span>
									Por pagar
								</span>

								{{-- <a href="#">
									Ver más
								</a> --}}
							</p>
						</div><!-- /.section-entry -->

						<div class="cols" id="seeMoreDataAcumulados">

							@foreach ($acumulado as $item)

									<div class="col col-1of2" onClick="redirectPage('{{$item->url}}','{{$item->is_new_tab}}')" style="cursor: pointer;">
										<article class="article-jackpot">
											<div class="article-content">
												<h6>
													{{$item->titulo}}
												</h6>

												<div class="fake-div">
													<div id="counter">
														<div class="counter-value" ><p>${{number_format($item->cantidad)}} <em>MN</em></p></div>
														<!--<div class="counter-value" data-count="400">$100</div>
                                                        <div class="counter-value" data-count="1500">$500</div>-->
													</div>
													<div class="fake-div">
														<!--<p>
												${{$item->cantidad}}
																</p>-->
													</div>
												</div>
											</div><!-- /.article-content -->
										</article><!-- /.article-jackpot -->
									</div><!-- /.col col-1of2 -->
							@endforeach

						</div><!-- /.cols -->
					@endif

					<div class="btn-more">
						<a href="#" class="btn btn-border view_more" id="seeMoreAcumulados">
							Ver más
						</a>
					</div>

						{{--@if( isset($pagados) && count($pagados) )--}}
							{{--<div class="section-entry">--}}
								{{--<p>--}}
									{{--<span>--}}
										{{--Pagados--}}
									{{--</span>--}}

									{{--<!--<a href="{{url('/pagados')}}">--}}
										{{--Conoce los pagados--}}
									{{--</a>-->--}}

									{{--<a class="btn btn-red btn-small" href="{{url('/pagados')}}">--}}
										{{--Miles de pesos repartidos--}}
									{{--</a>--}}

								{{----}}
								{{--</p>--}}
							{{--</div><!-- /.section-entry -->--}}


							{{--<div class="cols" id="seeMoreDataPagados" >--}}
								{{--@foreach($pagados as $pagado)--}}

										{{--<div class="col col-1of2" onClick="redirectPage('{{$item->url}}','{{$item->is_new_tab}}')" style="cursor: pointer;">--}}
											{{--<article class="article-jackpot">--}}
												{{--<div class="article-content">--}}
													{{--<h6>--}}
														{{--{{ucfirst($pagado->titulo)}}--}}
													{{--</h6>--}}

													{{--<div class="fake-div">--}}
														{{--<div id="counter">--}}
															{{--<div class="counter-value"><p>${{number_format($pagado->cantidad)}} <em>MN</em></p></div>--}}
															{{--<!--<div class="counter-value" data-count="400">$100</div>--}}
                                                            {{--<div class="counter-value" data-count="1500">$500</div>-->--}}
														{{--</div>--}}
														{{--<div class="fake-div">--}}
															{{--<!--<p>--}}
												{{--${{$pagado->cantidad}}--}}
																	{{--</p>-->--}}
														{{--</div>--}}
													{{--</div>--}}
												{{--</div><!-- /.article-content -->--}}
											{{--</article><!-- /.article-jackpot -->--}}
										{{--</div><!-- /.col col-1of2 -->--}}

								{{--@endforeach--}}
							{{--</div><!-- /.cols -->--}}
							{{--<div class="btn-more">--}}
								{{--<a href="#" class="btn btn-border view_more" id="seeMorePagados" >--}}
									{{--Ver más--}}
								{{--</a>--}}
							{{--</div>--}}
						{{--@endif--}}
					</div><!-- /.section-content -->
				</div><!-- /.shell -->
			</section><!-- /.section-jackpots -->


			@if( isset($configuracion) && count($configuracion) )
					<section class="section-jackpots secondary">
						<div class="shell">
							<header class="section-head">
								{{--<div class="stick--point" id="jackpot"></div>--}}
								<h2>
									{{--<small>{{$item->titulo}}</small>--}}
									Configuración
								</h2>

								<a class="btn btn-red btn-small" href="{{url('/pagados')}}" style="float: right;height: 2.5em;line-height: 2.5em;margin-top: -1em;">
									Miles de pesos repartidos
								</a>
							</header><!-- /.section-head -->

                                <div class="section-content">
                                    <div class="section-entry">
                                        <p>
                                            <span>
                                                Por pagar
                                            </span>

                                            {{-- <a href="#">
                                                Ver más
                                            </a> --}}
									</p>
								</div><!-- /.section-entry -->

								@foreach($configuracion as $item)
									<div class="cols" onClick="redirectPage('{{$item->url}}','{{$item->is_new_tab}}')" style="cursor: pointer;">
										<div class="col col-1of1">
											<article class="article-jackpot">
												<div class="article-content">
													<h6>
														{{ucfirst($item->titulo)}}
													</h6>

													<div class="fake-div">
														<div id="counter">
															<div class="counter-value">${{number_format($item->cantidad)}} <em>MN</em></div>
														</div>
													</div>
												</div><!-- /.article-content -->
											</article><!-- /.article-jackpot -->
										</div><!-- /.col col-1of1 -->
									</div><!-- /.cols -->
								@endforeach
							</div><!-- /.section-content -->
						</div><!-- /.shell -->
					</section><!-- /.section-jackpots -->
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

									<input type="button" value="Enviar" class="subscribe-btn btn btn-red">
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
										<p>{!! $sucursal_info->horario !!}</p>
									</li>

									<li>
										<i class="ico-car"></i>
										<p>{!! $sucursal_info->instrucciones !!}</p>
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
										<a href="{{ url('/lineas-de-juego/' . $item->slug) }}" style="background-image: url('{{ $item->imagen }}')">
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
	<script type="text/javascript">
	// jQuery Counter
			// var a = 0;
			// 	$(window).scroll(function() {

			// 	  var oTop = $('#counter').offset().top - window.innerHeight;
			// 	  if (a == 0 && $(window).scrollTop() > oTop) {
			// 	    $('.counter-value').each(function() {
			// 	      var $this = $(this),
			// 	        countTo = $this.attr('data-count');
			// 	      $({
			// 	        countNum: $this.text()
			// 	      }).animate({
			// 	          countNum: countTo
			// 	        },

			// 	        {

			// 	          duration: 2000,
			// 	          easing: 'swing',
			// 	          step: function() {
			// 	            $this.text(Math.floor(this.countNum));
			// 	          },
			// 	          complete: function() {
			// 	            $this.text(this.countNum);
			// 	            //alert('finished');
			// 	          }

			// 	        });
			// 	    });
			// 	    a = 1;
			// 	  }

			// 	});

	</script>


@stop
