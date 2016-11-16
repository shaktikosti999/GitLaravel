<section class="section-promotions">
	<div class="shell">
		<header class="section-head">
			<div class="stick--point" id="promociones"></div>
			<h2>
				@yield('promo-head','Promociones')
			</h2>

			<a href="#" class="btn btn-black btn-calendar">
				Consulta Calendario Completo
			</a>
		</header><!-- /.section-head -->

		<div class="section-body">
			<div class="slider-games slider-promotions">
				<div class="slider-clip">
					<ul class="slides">
						@foreach($promociones as $item)
						<?php 

						$start = new DateTime( $item->fecha_inicio );
						$end   = new DateTime( $item->fecha_fin );

						?>
						<li class="slide">
							<a href="{{url('promociones/detalle/' . $item->slug)}}" class="slide-content" style="background-image: url({{$item->imagen}}); ">
								<span class="slide-label">
									Válido del {{$start->format('d/m/Y')}} al {{$end->format('d/m/Y')}} 
								</span>

								<span class="slide-inner">
									<span class="slide-inner-entry">
										<strong>{{$item->nombre}}</strong> <br>
									</span>

									<span class="slide-inner-price">
										{{$item->resumen}}
									</span>
								</span>
							</a><!-- /.slide-content -->
						</li><!-- /.slide -->								
						@endforeach
					</ul><!-- /.slides -->
				</div><!-- /.slider-clip -->
			</div><!-- /.slider-games -->
		</div><!-- /.section-body -->	
	</div><!-- /.shell -->
		</section><!-- /.section-promotions -->