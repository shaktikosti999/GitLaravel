@extends('layout.front')
	@section('contenido')
	<div class="intro" style="background-image: url(css/images/temp/intro-contact-bg.jpg);">
		<div class="intro-content">
			<div class="shell">
				<h1 class="intro-title">Contacto</h1>
				
				{{isset($sucursal) ? '<h2>Sucursal Tecamachalco</h2>' :''}}
				
				@if( isset( $sucursales ) && count( $sucursales ) )

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
							<p class="breadcrumbs">
								<a href="#">Inicio</a>
								
								<a href="#">Contacto</a>
							</p><!-- /.breadcrumbs -->
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
					<h2>Tu opinón es importante</h2>
					
					<p>Donut icing oat cake icing macaroon. Fruitcake apple pie sweet roll lemon drops pie. Cheesecake powder marshmallow cupcake marzipan jelly. Powder cake macaroon gingerbread tart. Bear claw lemon drops pastry gingerbread wafer dessert cheesecake carrot cake. Biscuit apple pie carrot cake tiramisu.</p>
				</div><!-- /.section-head -->

				<div class="section-body">
					<div class="form-contact">
						<form action="?" method="post">
							<div class="form-body">
								<div class="form-row">
									<label for="field-name" class="form-label" hidden>*Nombre</label>
									
									<div class="form-controls">
										<input type="text" class="field" name="field-name" id="field-name" value="" placeholder="*Nombre">
									</div><!-- /.form-controls -->
								</div><!-- /.form-row -->
								
								<div class="form-row">
									<label for="field-email" class="form-label" hidden>*Email</label>
									
									<div class="form-controls">
										<input type="text" class="field" name="field-email" id="field-email" value="" placeholder="*Email">
									</div><!-- /.form-controls -->
								</div><!-- /.form-row -->
								
								<div class="form-row">
									<label for="field-phone" class="form-label" hidden>Teléfono</label>
									
									<div class="form-controls">
										<input type="text" class="field" name="field-phone" id="field-phone" value="" placeholder="Teléfono">
									</div><!-- /.form-controls -->
								</div><!-- /.form-row -->
								
								<div class="form-row">
									<label for="field-card" class="form-label" hidden>*No. de tarjeta club</label>
									
									<div class="form-controls">
										<input type="text" class="field" name="field-card" id="field-card" value="" placeholder="*No. de tarjeta club">
									</div><!-- /.form-controls -->
								</div><!-- /.form-row -->

								<div class="form-row form-row-checkboxes">
									<span>Tipo de mensaje</span>

									<div class="form-controls">
										<ul class="list-checkboxes">
											<li>
												<div class="checkbox-primary">
													<input type="checkbox" name="field-option1" id="field-option1">
													
													<label class="form-label" for="field-option1">Duda</label>
												</div><!-- /.checkbox -->
											</li>
											
											<li>
												<div class="checkbox-primary">
													<input type="checkbox" name="field-option2" id="field-option2">
													
													<label class="form-label" for="field-option2">Sugerencia</label>
												</div><!-- /.checkbox -->
											</li>
											
											<li>
												<div class="checkbox-primary">
													<input type="checkbox" name="field-option3" id="field-option3">
													
													<label class="form-label" for="field-option3">Felicitación</label>
												</div><!-- /.checkbox -->
											</li>
											
											<li>
												<div class="checkbox-primary">
													<input type="checkbox" name="field-option4" id="field-option4" checked>
													
													<label class="form-label" for="field-option4">Queja</label>
												</div><!-- /.checkbox -->
											</li>
										</ul><!-- /.list-checkboxes -->
									</div><!-- /.form-controls -->
								</div><!-- /.form-row -->

								<div class="form-row select-wrapper">
									<label for="field-select" class="form-label" hidden>Indique sucursal</label>
									
									<div class="form-controls">
										<select name="field-select" id="field-select" class="select">
											<option value="">Indique sucursal</option>
											<option value="">Option 1</option>
											<option value="">Option 2</option>
											<option value="">Option 3</option>
										</select>
									</div><!-- /.form-controls -->
								</div><!-- /.form-row select-wrapper -->

								<div class="form-row">
									<label for="field-message" class="form-label" hidden>Mensaje</label>
									
									<div class="form-controls">
										<textarea class="textarea" name="field-message" id="field-message" placeholder="Mensaje"></textarea>
									</div><!-- /.form-controls -->
								</div><!-- /.form-row -->
							</div><!-- /.form-body -->
							
							<div class="form-actions">
								<ul class="list-checkboxes">
									<li>
										<div class="checkbox-primary checkbox-primary-small-right">
											<input type="checkbox" name="field-promo" id="field-promo">
											
											<label class="form-label" for="field-promo">Quiero recibir promociones exclusivas de Caliente</label>
										</div><!-- /.checkbox -->
									</li>
								</ul><!-- /.list-checkboxes -->

								<input type="submit" value="Enviar" class="form-btn btn btn-black">
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