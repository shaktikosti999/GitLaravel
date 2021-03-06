
<section class="section-promotions">
	<div class="shell">
		<header class="section-head">
			<div class="stick--point" id="maquinas"></div>
			<h2>
				@yield('head-title','Máquinas de juego disponibles')
			</h2>

			<a href="/aprende_como_jugar" class="btn btn-red">
				Aprende a jugar
			</a>
			<a href="/todos-los-juegos" class="btn btn-red">
				Todos los Juegos
			</a>
		</header><!-- /.section-head -->
		
		<div class="section-body">
			<ul class="games-filters">
				<li>
					<span>Selecciona</span>
				</li>

				<li>
				 	<div class="games-filter-select">
				 		<label for="categorias" class="form-label hidden">games-filter-select1</label>
				 		<select name="categorias" id="categorias" class="select">
				 			<option value="">Todas</option>
					 		{{--@foreach ($categorias as $categoria)--}}
					 			{{--<option value="{{$categoria->id}}" {{$categoria->id == 2 ? 'selected' : ''}}>{{$categoria->nombre}}</option>--}}
					 		{{--@endforeach				 			--}}
				 		</select>
				 	</div><!-- /.form-controls -->
				</li>
			</ul><!-- /.games-filters -->
			
			<ul class="games" id="games">
				
				@foreach( $maquinas as $item )

					<li class="game posts-data" data-id="{{ $item->id }}">
						<a href="{{ url('/maquinas-de-juego/detalle/'.$item->slug) }}" style="background-image: url('{{ $item->thumb !== null ? $item->thumb : $item->imagen }}')"> 
							<span class="jackpot">

							</span>

							<span class="game-title">
								<strong>
									{{ $item->nombre }}
								</strong>

								<span>
									{{ $item->resumen }} 
								</span>
							</span>
						</a>
					</li><!-- /.game -->

				@endforeach
				
			</ul><!-- /.games -->
		</div><!-- /.section-body -->	

		<div class="section-foot" id="mas">
			<a href="#" class="btn btn-border view_more">
				Conoce más maquinas
			</a>
		</div><!-- /.section-foot -->
	</div><!-- /.shell -->
</section><!-- /.section-promotions -->