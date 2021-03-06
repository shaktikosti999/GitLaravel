<section class="section-promotions">
	<div class="shell">
		<header class="section-head">
			<div class="stick--point" id="maquinas"></div>
			<h2>
				@yield('head-title','Máquinas de juego disponibles')
			</h2>

			<a href="/aprende_a_jugar" class="btn btn-red">
				Aprende a jugar
			</a>
		</header><!-- /.section-head -->
		
		<div class="section-body">
			<ul class="games-filters">
				<li>
					<span>Selecciona</span>
				</li>

				<li>
				 	<div class="games-filter-select">
				 		<label for="field-games-filter-select1" class="form-label hidden">games-filter-select1</label>
				 		<select name="field-games-filter-select1" id="field-games-filter-select1" class="select">
				 			<option value="">Populares</option>
				 			<option value="">Populares</option>
				 			<option value="">Populares</option>
				 		</select>
				 	</div><!-- /.form-controls -->
				</li>
			</ul><!-- /.games-filters -->
			
			<ul class="games">
				
				@foreach( $maquinas as $item )

					<li class="game">
						<a href="#" style="background-image: url('{{ $item->imagen }}')"> 
							<span class="jackpot">
								<small>JACKPOT</small>
								<strong>
									${{$item->acumulado}}
								</strong>
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

		<div class="section-foot">
			<a href="#" class="btn btn-border">
				Conoce más maquinas
			</a>
		</div><!-- /.section-foot -->
	</div><!-- /.shell -->
</section><!-- /.section-promotions -->