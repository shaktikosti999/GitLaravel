@extends('layout.front')

	@section('js')
		<script type="text/javascript" src="{{asset('/assets/js/notify.min.js')}}"></script>
		@if( isset($errors) && count($errors) )
		  <script>
            @foreach ($errors->all() as $error)
		    $(function(){
		      //https://notifyjs.com/
		      $.notify(
		        "{{$error}}", 
		        {
		          globalPosition:"top center",
		          className:"error",
		        }
		      );
		    });
            @endforeach
		  </script>
		@endif

		@if(session()->has('success'))
		    <script>
		      $(function(){
		        $.notify(
		          "{{session('success')}}", 
		          {
		            globalPosition:"top center",
		            className:"success",
		          }
		        );
		      });
		    </script>
		@endif
	@stop

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
							<!-- <a href="#" class="btn-scroll">
                                <i class="ico-mouse"></i>
                            </a> -->

							<div class="slider-clip">
								<ul class="slides">

									@foreach( $slider as $s )



										<li class="slide fullscreen" style="background-image: url({{ $s->imagen }});">
											<div class="slide-content ">
												<!--<div class="shell"-->
												<h1>{{ $s->titulo }}</h1>
												<!--h1>
                                                    Navidad Excepcional
                                                </h1-->

												<!-- <a href="{{ $s->link }}" class="btn btn-white">{{ $s->texto_boton }} <i class="ico-arrow-right"></i></a> -->

												<!--</div> /.shell -->
											</div><!-- /.slide-content -->
										</li><!-- /.slide -->

									@endforeach


								</ul><!-- /.slides -->
							</div><!-- /.slider-clip -->
						</div><!-- /.slider-intro -->

					@endif


				</ul><!-- /.slides -->
			</div><!-- /.slider-clip -->

			<div class="slider-label red-label large">
				<i class="ico-slot"></i>
			</div><!-- /.slider-label -->
		</div><!-- /.slider-secondary -->

		<div class="intro" style="background-image: url(css/images/temp/intro-contact-bg.jpg);">
			<div class="intro-content">
				<div class="shell">
					<h1 class="intro-title">Contacto</h1>
					<p>Nulla sem justo, maximus in mattis ac, sodales a orci. Vivamus aliquet dolor ut sem consectetur porta. Aliquam vel elementum enim, nec feugiat sem. Mauris a consectetur nisl. Pellentesque tellus ex, maximus sit amet cursus vel, elementum ut mi. Etiam sed risus turpis. Etiam vitae dui dolor. Integer sed mauris ligula. </p>	
					
					{{isset($sucursal) ? '<h2>Sucursal Tecamachalco</h2>' :''}}
					
					@if( isset( $sucursales ) && count( $sucursales ) && 1==2)

					<div class="intro-content-actions">
						<div class="cols">
							<div class="col col-1of2"> 
								<div class="filter-secondary">
									<label for="field-filter-secondary1" class="form-label hidden">filter-secondary1</label>
									<select name="field-filter-secondary1" id="field-filter-secondary1" class="select">
										@foreach( $sucursales as $item )

										<option value="{{$item->id_sucursal}}">{{$item->nombre}}</option>

										@endforeach
									</select>
								</div><!-- /.filter-secondary -->
							</div><!-- /.col col-1of2 -->
							
							<div class="col col-1of2">
								@include('front.includes.breadcrumbs')
							</div><!-- /.col col-1of2 -->
						</div><!-- /.cols -->
					</div><!-- /.intro-content-actions -->

					@endif

				</div><!-- /.shell -->
			</div><!-- /.intro-content -->
		</div><!-- /.intro -->
		<div class="main">
			<section class="section-contacts">
				<div class="shell">
					<div class="section-head">
						<h2>Tu opinión es muy importante </h2>

						<h4 style="color:rgb(0,0,0)"> Escríbenos a: programa.lealtad@caliente.com.mx</h4> 
						

						<h4 style="color:rgb(0,0,0)">Llámanos sin costo al: 01 800 831 1310</h4>
						

						<h4 style="color:rgb(0,0,0)">o si lo prefieres envíanos tu mensaje:</h4>
						
						<!-- <p>Donut icing oat cake icing macaroon. Fruitcake apple pie sweet roll lemon drops pie. Cheesecake powder marshmallow cupcake marzipan jelly. Powder cake macaroon gingerbread tart. Bear claw lemon drops pastry gingerbread wafer dessert cheesecake carrot cake. Biscuit apple pie carrot cake tiramisu.</p> -->
					</div><!-- /.section-head -->

					<div class="section-body">
						<div class="form-contact">
							<form action="{{url('contacto/guardar')}}" method="post">
								{{csrf_field()}}
								<input type="hidden" name="_method" value="PUT">
								<div class="form-body">

									<div class="form-row">
										<label for="field-name" class="form-label" hidden>*Primer Nombre</label>
										<div class="form-controls">
											<input type="text" class="field" name="field-name" id="field-name" value="" placeholder="*Primer Nombre" required>
										</div><!-- /.form-controls -->
									</div><!-- /.form-row -->

									<div class="form-row">
										<label for="field-apat" class="form-label" hidden>*Apellido Paterno</label>
										<div class="form-controls">
											<input type="text" class="field" name="field-apat" id="field-apat" value="" placeholder="*Apellido Paterno" required>
										</div><!-- /.form-controls -->
									</div><!-- /.form-row -->

									<div class="form-row">
										<label for="field-mat" class="form-label" hidden>*Apellido Materno</label>
										<div class="form-controls">
											<input type="text" class="field" name="field-mat" id="field-mat" value="" placeholder="*Apellido Materno" required>
										</div><!-- /.form-controls -->
									</div><!-- /.form-row -->
									
									<div class="form-row">
										<label for="field-email" class="form-label" hidden>*Email</label>
										
										<div class="form-controls">
											<input type="email" class="field" name="field-email" id="field-email" value="" placeholder="*Email" >
										</div><!-- /.form-controls -->
									</div><!-- /.form-row -->
									
									<div class="form-row">
										<label for="field-phone" class="form-label" hidden>Teléfono a 10 dígitos</label>
										
										<div class="form-controls">
											<input type="text" class="field" name="field-phone" id="field-phone" value="" placeholder="Teléfono a 10 dígitos">
										</div><!-- /.form-controls -->
									</div><!-- /.form-row -->
									
									<div class="form-row">
										<label for="field-card" class="form-label" hidden>No. de tarjeta Caliente Club</label>
										
										<div class="form-controls">
											<input type="text" class="field" name="field-card" id="field-card" value="" placeholder="No. de tarjeta Caliente Club">
										</div><!-- /.form-controls -->
									</div><!-- /.form-row -->

									<div class="form-row form-row-checkboxes">
										<span>Tipo de mensaje</span>

										<div class="form-controls">
											<ul class="list-checkboxes">
												<li>
													<div class="checkbox-primary">
														<input type="radio" name="field-tipo" value="1" id="field-tipo1">
														
														<label class="form-label" for="field-tipo1">Duda</label>
													</div><!-- /.checkbox -->
												</li>
												
												<li>
													<div class="checkbox-primary">
														<input type="radio" name="field-tipo" value="2" id="field-tipo2">
														
														<label class="form-label" for="field-tipo2">Sugerencia</label>
													</div><!-- /.checkbox -->
												</li>
												
												<li>
													<div class="checkbox-primary">
														<input type="radio" name="field-tipo" value="3" id="field-tipo3">
														
														<label class="form-label" for="field-tipo3">Felicitación</label>
													</div><!-- /.checkbox -->
												</li>
												
												<li>
													<div class="checkbox-primary">
														<input type="radio" name="field-tipo" value="4" id="field-tipo4" checked>
														
														<label class="form-label" for="field-tipo4">Queja</label>
													</div><!-- /.checkbox -->
												</li>
											</ul><!-- /.list-checkboxes -->
										</div><!-- /.form-controls -->
									</div><!-- /.form-row -->

									<div class="form-row select-wrapper">
										<label for="field-sucursal" class="form-label" hidden>Casino al que hace referencia</label>
										
										@if( isset($sucursales) && count($sucursales) )

										<div class="form-controls">
											<select name="field-sucursal" id="field-sucursal" class="select">
												<option value="">Casino al que hace referencia</option>
												@foreach( $sucursales as $item )

													<option value="{{$item->id_sucursal}}">{{$item->nombre}}</option>

												@endforeach

											</select>
										</div><!-- /.form-controls -->

										@endif

									</div><!-- /.form-row select-wrapper -->

									<div class="form-row">
										<label for="field-message" class="form-label" hidden>Mensaje</label>
										
										<div class="form-controls">
											<textarea class="textarea" name="field-message" id="field-message" placeholder="* Mensaje" required></textarea>
										</div><!-- /.form-controls -->
									</div><!-- /.form-row -->
								</div><!-- /.form-body -->
								
								<div class="form-actions">
									<?php /*
									<ul class="list-checkboxes">
										<li>
											<div class="checkbox-primary checkbox-primary-small-right">
												<input type="checkbox" name="field-promo" id="field-promo" value="1">
												
												<label class="form-label" for="field-promo">Quiero recibir promociones exclusivas de Caliente</label>
											</div><!-- /.checkbox -->
										</li>
									</ul><!-- /.list-checkboxes -->*/
									?>

									<input type="submit" value="Enviar" class="form-btn btn btn-black">
									<!--<h5 style="color:rgb(0,0,0)">Si lo prefieres
									Escríbenos a: programa.lealtad@caliente.com.mx <br>
									Llámanos sin costo al: 01 800 831 1310</h5>-->
								</div><!-- /.form-actions -->
							</form>
						</div><!-- /.form-contact -->
					</div><!-- /.section-body -->
				</div><!-- /.shell -->
			</section><!-- /.section-contacts -->

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