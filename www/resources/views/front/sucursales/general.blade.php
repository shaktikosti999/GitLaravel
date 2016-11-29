@extends('layout.front')
	@section('contenido')
		<div class="intro-gray"></div><!-- /.intro-gray -->


		<div class="main">
			<section class="section-articles head-padding">
				<div class="shell">
					<article class="article">
						<div class="article-head head-padding">
							<h2>Sucursales</h2>
							<div class="fs-dropdown btn-ciudades" tabindex="-1"><!-- BEGIN boton sucursal -->
								<div class="select btn-ubn fs-dropdown-element" tabindex="-1"> 
			                        <select name="ciudad">
										<option value="Ciudad de México">Ciudad de México</option>
										<option value="Ciudad de México">Ciudad de México</option>
										<option value="Ciudad de México">Ciudad de México</option>
									</select> <!-- END boton sucursal -->
								</div>
							<button type="button" class="fs-dropdown-selected fs-touch-element">Ciudad de México</button><div class="fs-dropdown-options">
							<button type="button" class="fs-dropdown-item fs-dropdown-item_selected" data-value="Ciudad de México">Ciudad de México</button>
							<button type="button" class="fs-dropdown-item" data-value="Ciudad de México">Ciudad de México</button>
							<button type="button" class="fs-dropdown-item" data-value="Ciudad de México">Ciudad de México</button>
							</div>
						</div><!-- END boton sucursal -->
						</div><!-- /.article-head -->
					</article>
				</div>
			</section>
		</div>

		<div class="shell">
			<div class="sucursales">
				<ul>
					<li>
						<h3>Tecamachalco</h3>
						<div class="section-actions btn-action">
							<a href="#" class="btn btn-red btn-red-small">
								<i class="ico-human"></i>

								Cómo llegar aquí
							</a>
						</div>
						<h6>Dirección</h6>
						<p>Calle Fuente del molino #49-B Col. San Miguel Tecamachalco Naucalpan, Edo. de México C.P. 53970</p>
						<h6>Teléfonos</h6>
						<p>01 + 55 123456789</p>
						<p>045 + 55 123456789</p>
						<p>779 + 55 123456789</p>
					</li>

					<li>
						<h3>Bosques de Aragón</h3>
						<div class="section-actions btn-action">
							<a href="#" class="btn btn-red btn-red-small">
								<i class="ico-human"></i>

								Cómo llegar aquí
							</a>
						</div>
						<h6>Dirección</h6>
						<p>Av. Carlos Hank González, interior Multiplaza San Juan, Col. Bosques de Aragón, Nezahualcóyotl. Estado de México  57170</p>
						<h6>Teléfonos</h6>
						<p>01 + 55 123456789</p>
						<p>045 + 55 123456789</p>
						<p>779 + 55 123456789</p>
					</li>
				</ul>
			</div>
		</div>

		<div class="shell">
			<div class="sucursales">
				<ul>
					<li>
						<h3>Naucalpan</h3>
						<div class="section-actions btn-action">
							<a href="#" class="btn btn-red btn-red-small">
								<i class="ico-human"></i>

								Cómo llegar aquí
							</a>
						</div>
						<h6>Dirección</h6>
						<p>Blvd. Toluca No. 117, Col. San Andrés Atoto, Naucalpan, Estado de México 53300</p>
						<h6>Teléfonos</h6>
						<p>01 + 55 123456789</p>
						<p>045 + 55 123456789</p>
						<p>779 + 55 123456789</p>
					</li>

					<li>
						<h3>Bosque de Duraznos</h3>
						<div class="section-actions btn-action">
							<a href="#" class="btn btn-red btn-red-small">
								<i class="ico-human"></i>

								Cómo llegar aquí
							</a>
						</div>
						<h6>Dirección</h6>
						<p>Calle Bosque de Duraznos No. 67-5, Col. Bosques de las Lomas, Delegación Miguel Hidalgo México, D.F.  11700</p>
						<h6>Teléfonos</h6>
						<p>01 + 55 123456789</p>
						<p>045 + 55 123456789</p>
						<p>779 + 55 123456789</p>
					</li>
				</ul>
			</div>
		</div>

		<div class="shell">
			<div class="sucursales">
				<ul>
					<li>
						<h3>Tecamachalco</h3>
						<div class="section-actions btn-action">
							<a href="#" class="btn btn-red btn-red-small">
								<i class="ico-human"></i>

								Cómo llegar aquí
							</a>
						</div>
						<h6>Dirección</h6>
						<p>Calle Fuente del molino #49-B Col. San Miguel Tecamachalco Naucalpan, Edo. de México C.P. 53970</p>
						<h6>Teléfonos</h6>
						<p>01 + 55 123456789</p>
						<p>045 + 55 123456789</p>
						<p>779 + 55 123456789</p>
					</li>

					<li>
						<h3>Tecamachalco</h3>
						<div class="section-actions btn-action">
							<a href="#" class="btn btn-red btn-red-small">
								<i class="ico-human"></i>

								Cómo llegar aquí
							</a>
						</div>
						<h6>Dirección</h6>
						<p>Calle Fuente del molino #49-B Col. San Miguel Tecamachalco Naucalpan, Edo. de México C.P. 53970</p>
						<h6>Teléfonos</h6>
						<p>01 + 55 123456789</p>
						<p>045 + 55 123456789</p>
						<p>779 + 55 123456789</p>
					</li>
				</ul>
			</div>
		</div>



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
