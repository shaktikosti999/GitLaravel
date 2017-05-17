@extends('layout.admin')
@section('script')
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="{{asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js')}}"></script>
	<script src="{{asset('/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>

	<script type="text/javascript" src="{{asset('assets/src/js/jquery.tree.js')}}"></script>
	<script>
		$(function(){
			$('#form-agregar').validate();
			$('.datepkr').datepicker({
				dateFormat: "yy-mm-dd",
				minDate: new Date()
			});
		});

		$(document).ready(function() {
			$( "#accordion" ).accordion({
				'collapsible': true,
				'active': null,
				'heightStyle': 'content'
			});
			$('.jquery').each(function() {
				eval($(this).html());
			});
			$('.button').button();
		});

		$('#example-3 div').tree({
			onCheck: {
				node: 'expand'
			},
			onUncheck: {
				node: 'collapse'
			}
		});

		$('.button').button();
		$('.list > li a').click(function() {
			$(this).parent().find('ul').toggle();
		});
	</script>

@stop

@section('css')
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('assets/src/css/jquery.tree.css')}}"/>
@stop

@section('contenido')

	<div class="col-lg-7 col-md-6 col-md-offset-3">
		<!-- START PANEL -->
		<div class="panel panel-transparent">
			<div class="panel-body">
				<form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/agregar/promocion.html')}}" enctype="multipart/form-data">
					{!!csrf_field()!!}
					<input type="hidden" name="_method" value="PUT">

					<div class="row clearfix">
						<div class="col-sm-12">
							<div class="form-group form-group-default" aria-required="true">
								<label for="nombre">Nombre</label>
								<input type="text" id="nombre" class="form-control required" name="nombre" required="required" aria-required="true" aria-invalid="true">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class=" form-group-default row" aria-required="true" style="margin-bottom: 0.8em;" >
								<label style="font-family: 'Montserrat';font-size: 11px;text-transform: uppercase;font-weight: 600;" >Juego</label>

								{{--<select id="juego" class="form-control required" name="juego" required="required" aria-required="true" aria-invalid="true">--}}
								{{--@foreach( $juegos as $item )--}}
								{{--<option value="{{$item->id}}">{{$item->nombre}}</option>--}}
								{{--@endforeach--}}
								{{--</select>--}}

								{{--<div id="example-3" style="opacity: 1 !important;">--}}

									{{--<div style="background-color:transparent;" >--}}
										{{--<ul>--}}
											{{--@foreach( $juegos as $indexKey => $item )--}}
												{{--@if($item->id !=9)--}}
													{{--<li class="collapsed"><input type="checkbox" name="juego[]" value="{{$item->id}}" ><span>{{$item->nombre}}</span>--}}
														{{--<input type="hidden" name="juegoSub{{$item->id}}[]" >--}}
														{{--@foreach( $sucursales[$indexKey] as $item1 )--}}
															{{--<ul>--}}
																{{--<li class="collapsed">--}}
																	{{--<input type="checkbox" name="juegoSub{{$item->id}}[]" value="{{$item1->id_sucursal}}" ><span>{{$item1->nombre}}</span>--}}
																{{--</li>--}}
															{{--</ul>--}}
														{{--@endforeach--}}
													{{--</li>--}}
												{{--@endif--}}
											{{--@endforeach--}}
										{{--</ul>--}}

										<style>
											ul li ul {
												display: none;
											}
										</style>


										<ul class="list">
											@foreach( $juegos as $indexKey => $item )
												<li>
													<a><input type="checkbox" name="juego[]" value="{{$item->id}}"  ><span>{{$item->nombre}}</span></a>
													@foreach( $sucursales[$indexKey] as $item1 )
														<ul>
															<li class="collapsed"><label><input type="checkbox" name="juegoSub{{$item->id}}[]" value="{{$item1->id_sucursal}}" ><span>{{$item1->nombre}}</span></label>
														</ul>
													@endforeach
												</li>
											@endforeach

										</ul>
									{{--</div>--}}
								{{--</div>--}}


							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-sm-12">
							<div class="form-group form-group-default">
								<label for="slug">Slug</label>
								<input type="text" id="slug" class="form-control" name="slug" aria-required="true" aria-invalid="true">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="form-group form-group-default">
								<label for="resumen">Resumen</label>
								<textarea id="resumen" class="form-control required" name="resumen" required="required" aria-required="true" aria-invalid="true"></textarea>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="form-group form-group-default">
								<label for="descripcion">Descripción</label>
								<textarea id="descripcion" class="form-control required" name="descripcion" required="required" aria-required="true" aria-invalid="true"></textarea>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="form-group form-group-default">
								<label><input type="checkbox" name="is_active_btn" checked=""><span>Botón de URL externo activo</span></label>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="form-group form-group-default">
								<label for="link">URL Externa</label>
								<input type="text" id="link" class="form-control " name="link" aria-required="true" aria-invalid="true">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="form-group form-group-default">
								<label for="fecha_inicio">Inicio</label>
								<input type="text" id="fecha_inicio" class="form-control datepkr" name="fecha_inicio" aria-required="true" aria-invalid="true">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="form-group form-group-default">
								<label for="fecha_fin">Fin</label>
								<input type="text" id="fecha_fin" class="form-control datepkr" name="fecha_fin" aria-required="true" aria-invalid="true">
							</div>
						</div>
					</div>

					<div class="row clearfix">
						<div class="col-sm-12">
							<div class="form-group form-group-default" aria-required="true">
								<label for="imagen">Imagen</label>
								<input type="file" id="imagen" class="form-control required" name="imagen" required="required" aria-required="true" aria-invalid="true">
							</div>
						</div>
					</div>

					<div class="row clearfix">
						<div class="col-sm-12">
							<div class="form-group form-group-default" aria-required="true">
								<label for="thumb">Imagen pequeña</label>
								<input type="file" id="thumb" class="form-control required" name="thumb" required="required" aria-required="true" aria-invalid="true">
							</div>
						</div>
					</div>

					<div class="clearfix"></div>
					<input class="btn btn-primary" type="submit" value="Agregar Promocion">
				</form>
			</div>
		</div>
		@if(count($errors) > 0)
			@foreach($errors->all() as $key => $val)
				<div class="alert alert-danger" role="alert">
					<button class="close" data-dismiss="alert"></button>
					<strong>{{$key}}: </strong>{{$val}}
				</div>
				@endforeach
				@endif
						<!-- END PANEL -->
	</div>
@stop