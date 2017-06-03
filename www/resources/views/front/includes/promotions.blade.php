<script>
	function redirectOnExtUrl($url){
		$window.location.href = $url;
	}
</script>
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
						<?php
						?>

						@foreach($promociones as $item)
						<?php 
						$start = isset($item->fecha_inicio) && !empty($item->fecha_inicio) ? new DateTime( $item->fecha_inicio ) : null;
						$end   = isset($item->fecha_fin) && !empty($item->fecha_fin) ? new DateTime( $item->fecha_fin ) : null;

						?>
						<li class="">
							<div>
								@if( trim($item->slug) != "" )
								<a href="{{url('promociones/detalle/' . $item->slug)}}" class="slide-content" style="background-image: url({{$item->thumb !== null && !empty($item->thumb) ? $item->thumb : $item->imagen}}); ">
								@else
								<a class="slide-content" style="background-image: url({{$item->thumb !== null && !empty($item->thumb) ? $item->thumb : $item->imagen}}); ">
								@endif
								@if($start !== null || $end !== null)
									{{--<span class="slide-label">--}}
										{{--Válido{{$start !== null ? ' del' . $start->format('d/m/Y') : ''}}{{$end !== null ? ' al' . $end->format('d/m/Y') : ''}}--}}
									{{--</span>--}}
								@endif

								@if(!empty($item->is_active_btn))
										@if($item->is_active_btn == 1)
											<button>
												<span class="" style="position: absolute;bottom: 1em;left: 0em;text-align: center;width: 100%;" >
													<center>
														<form action="{{$item->url}}" target="{{$item->is_new_tab}}">
															<input type="submit" value="{!!$item->button_text!!}" style="width: 9em;padding: 1em;background-color: red;box-shadow: 1px 1px 1px 1px black;border-radius: 10px;color: white;">
														</form>
													</center>
												</span>
											</button>
										@endif
								@endif
								</a><!-- /.slide-content -->
							</div>
						</li><!-- /.slide -->								
						@endforeach
					</ul><!-- /.slides -->
				</div><!-- /.slider-clip -->
			</div><!-- /.slider-games -->
		</div><!-- /.section-body -->	
	</div><!-- /.shell -->
</section><!-- /.section-promotions -->