<section class="section-promotions">
	<div class="shell">
		<header class="section-head">
			<div class="stick--point" id="promociones"></div>
			<h2>
				@yield('promo-head','Promociones y Eventos')
			</h2>

			@if( isset($sucursal) && count($sucursal) && $sucursal != false)
			<a href="{{url('/promociones/calendario/' . $sucursal->slug)}}" class="btn btn-black">
				consulta calendario completo
			</a>
			@endif
		</header><!-- /.section-head -->

		<div class="section-body">
			<div class="slider-games slider-promotions">
				<div class="slider-clip">
					<ul class="slides">
						@foreach($promociones as $item)
						<?php 
						$start = isset($item->fecha_inicio) && !empty($item->fecha_inicio) ? new DateTime( $item->fecha_inicio ) : null;
						$end   = isset($item->fecha_fin) && !empty($item->fecha_fin) ? new DateTime( $item->fecha_fin ) : null;

						?>
						<li class="slide">
							@if( trim($item->slug) != "" )
							<a href="{{url('promociones/detalle/' . $item->slug)}}" class="slide-content" style="background-image: url({{$item->thumb !== null && !empty($item->thumb) ? $item->thumb : $item->imagen}}); ">
							@else
							<a class="slide-content" style="background-image: url({{$item->thumb !== null && !empty($item->thumb) ? $item->thumb : $item->imagen}}); ">
							@endif
							@if($start !== null || $end !== null)
								<span class="slide-label">
									Válido{{$start !== null ? ' del' . $start->format('d/m/Y') : ''}}{{$end !== null ? ' al' . $end->format('d/m/Y') : ''}} 
								</span>
							@endif

								<span class="slide-inner">

									<span class="slide-inner-price">
										{!!$item->resumen!!}
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