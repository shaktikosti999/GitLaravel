@extends('layout.front')
	@section('contenido')
	<div class="intro-gray"></div><!-- /.intro-gray -->

	<div class="main">
		<section class="section-articles">
			<div class="shell">
				<article class="article">
					<div class="article-head">
						<h2>{{$juego->nombre}}</h2>
					</div><!-- /.article-head -->
					
					<div class="article-entry">
						<p>{{$juego->titulo}}</p>
						<p>{{$juego->resumen}}</p>

						<p>{{$juego->aprender}}</p>

						<p>{{$juego->reglas}}</p>
						
					</div><!-- /.article-entry -->
					
					<div class="article-image">
						<img src="{{$juego->imagen}}" alt="">
					</div><!-- /.article-image -->
				</article><!-- /.article -->
				
			</div><!-- /.shell -->
		</section><!-- /.section-articles -->
	</div><!-- /.main -->
	@stop