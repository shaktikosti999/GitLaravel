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
						<p style="color:rgb(0,0,0)">Del {{$promocion->fecha_inicio}} al {{$promocion->fecha_fin}}</p>
						<p style="color:rgb(0,0,0)">{{$promocion->resumen}}</p>
						
						<p style="color:rgb(0,0,0)">{{$promocion->descripcion}}</p>
						
					</div><!-- /.article-entry -->
					
					<div class="article-image">
						<img src="{{$promocion->imagen}}" alt="">
					</div><!-- /.article-image -->
				</article><!-- /.article -->
				
			</div><!-- /.shell -->
		</section><!-- /.section-articles -->
	</div><!-- /.main -->
	@stop