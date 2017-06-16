@extends('layout.front')
	@section('contenido')
	<div class="intro-gray"></div><!-- /.intro-gray -->

	<div class="main">
		<section class="section-articles">
			<div class="shell">
				<article class="article">
					<div class="article-head">
						<h2>{{$promocion->nombre}}</h2>
					</div><!-- /.article-head -->
					
					<div class="article-entry">
						@if( $promocion->fecha_inicio !== null || $promocion->fecha_fin !== null )
						<p style="color:rgb(0,0,0)">
							Válido @if( ($promocion->fecha_inicio) !== null )del {{$promocion->fecha_inicio}}@endif @if( ($promocion->fecha_fin) !== null )al {{$promocion->fecha_fin}}@endif
						</p>
						@endif
						<p style="color:rgb(0,0,0)">{!!$promocion->resumen!!}</p>
						
						<p style="color:rgb(0,0,0)">{!!$promocion->descripcion!!}</p>
						
					</div><!-- /.article-entry -->
					
					<div class="article-image">
						<img src="{{$promocion->imagen}}" alt="">
					</div><!-- /.article-image -->
				</article><!-- /.article -->
				
			</div><!-- /.shell -->
		</section><!-- /.section-articles -->
	</div><!-- /.main -->
	@stop