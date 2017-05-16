@extends('layout.admin')
	@section('script')
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="{{asset('/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('/assets/js/promocion/edit.js')}}"></script>

		<script type="text/javascript" src="{{asset('assets/src/js/jquery.tree.js')}}"></script>
		<script>
		$(function(){
			$('#form-agregar').validate();
			$('.datepkr').datepicker({
				dateFormat: "yy-mm-dd"
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
			$('.list > li a').click(function() {
				$(this).parent().find('ul').toggle();
			});
		});

		$('#example-3 div').tree({
			onCheck: {
				node: 'expand'
			},
			onUncheck: {
				node: 'collapse'
			}
		});

		$('#example-3 div').tree('uncheckAll');
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
			    <form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/modificar/promocion' . $id . '.html')}}" enctype="multipart/form-data">
			    	{!!csrf_field()!!}
			    	<input type="hidden" name="_method" value="PATCH">

		      		<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="nombre">Nombre</label>
			            		<input type="text" id="nombre" class="form-control " name="nombre" value="{{$promocion->nombre}}" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>

			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="" aria-required="true">
			            		{{--<label for="juego">Juego</label>--}}
			            		{{--<select id="juego" class="form-control required" name="juego" required="required" aria-required="true" aria-invalid="true">--}}
			            			{{--@foreach( $juegos as $item )--}}
			            			{{--<option value="{{$item->id}}" {{$promocion->id_juego == $item->id ? 'selected' : ''}}>{{$item->nombre}}</option>--}}
			            			{{--@endforeach--}}
			            		{{--</select>--}}
								<label for="juego">Juego</label>
								{{--<div id="example-3">--}}

								<style>
									ul li ul {
										display: none;
									}
								</style>


								<ul class="list">
										@foreach( $juegos as $indexKey => $item )
										<li>
											<a><input type="checkbox" name="juego[]" value="{{$item->id}}" <?php if(in_array($item->id,$linea)){ echo 'checked'; } ?> ><span>{{$item->nombre}}</span></a>
											@foreach( $sucursales[$indexKey] as $item1 )
												<ul>
													<li class="collapsed"><label><input type="checkbox" <?php if(isset($selectedSucursales[$item->id]) && (in_array($item1->id_sucursal,$selectedSucursales[$item->id]))){ echo 'checked'; } ?> name="juegoSub{{$item->id}}[]" value="{{$item1->id_sucursal}}" ><span>{{$item1->nombre}}</span></label>
												</ul>
											@endforeach
										</li>
										@endforeach

								</ul>

								{{--<div class="list">--}}
									{{--<div style="background-color:transparent;" >--}}
										{{--<ul>--}}
											{{--@foreach( $juegos as $indexKey => $item )--}}
												{{--<li class="collapsed collapsed1"><input type="checkbox" name="juego[]" value="{{$item->id}}" ><span>{{$item->nombre}}</span>--}}
													{{--<input type="hidden" name="juegoSub{{$item->id}}[]" >--}}
													{{--@foreach( $sucursales[$indexKey] as $item1 )--}}
														{{--<ul>--}}
															{{--<li class="collapsed"><input type="checkbox" name="juegoSub{{$item->id}}[]" value="{{$item1->id_sucursal}}" ><span>{{$item1->nombre}}</span>--}}
														{{--</ul>--}}
													{{--@endforeach--}}
											{{--@endforeach--}}
										{{--</ul>--}}
									{{--</div>--}}
								{{--</div>--}}
			          		</div>
			        	</div>
			      	</div>



			      	<div class="row">
	        			<div class="col-sm-12">
	        				<div class="form-group form-group-default">
	        					<label for="slug">Slug</label>
				      			<input type="text" id="slug" class="form-control" name="slug" value="{{$promocion->slug}}" aria-required="true" aria-invalid="true">
	                    	</div>
	                	</div>
	                </div>

	                <div class="row">
	        			<div class="col-sm-12">
	        				<div class="form-group form-group-default">
	        					<label for="resumen">Resumen</label>
				      			<textarea id="resumen" class="form-control required" name="resumen" required="required" aria-required="true" aria-invalid="true">{{$promocion->resumen}}</textarea>
	                    	</div>
	                	</div>
	                </div>

	                <div class="row">
	        			<div class="col-sm-12">
	        				<div class="form-group form-group-default">
	        					<label for="descripcion">Descripción</label>
				      			<textarea id="descripcion" class="form-control required" name="descripcion" required="required" aria-required="true" aria-invalid="true">{{$promocion->descripcion}}</textarea>
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
								<textarea id="link" class="form-control required" name="link" required="required" aria-invalid="true">{{$promocion->link}}</textarea>
								{{--<input type="text" id="link" class="form-control " name="link" aria-required="true" aria-invalid="true">--}}
							</div>
						</div>
					</div>

	                <div class="row">
	        			<div class="col-sm-12">
	        				<div class="form-group form-group-default">
	        					<label for="fecha_inicio">Inicio</label>
				      			<input type="text" id="fecha_inicio" class="form-control datepkr" name="fecha_inicio" value="{{$promocion->fecha_inicio !== null ? date('Y-m-d',strtotime($promocion->fecha_inicio)) : ''}}" aria-required="true" aria-invalid="true">
	                    	</div>
	                	</div>
	                </div>

	                 <div class="row">
	        			<div class="col-sm-12">
	        				<div class="form-group form-group-default">
	        					<label for="fecha_fin">Fin</label>
				      			<input type="text" id="fecha_fin" class="form-control datepkr" name="fecha_fin" value="{{$promocion->fecha_fin !== null ? date('Y-m-d',strtotime($promocion->fecha_fin)) : ''}}" aria-required="true" aria-invalid="true">
	                    	</div>
	                	</div>
	                </div>
			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="imagen">Imagen</label>
			      		      	@if( $promocion->imagen != "" )
			      			      	<div class="col-sm-8 col-sm-offset-2" id="imagen_del">
			      						<button type="button" class="close" id="elimina_imagen" aria-hidden="true">&times;</button>
			      						<div class="thumbnail">
			      							<img src="{{$promocion->imagen}}" class="img-responsive img_promocion">
			      						</div>
			      					</div>
			      		      	@endif
			            		<input type="file" id="imagen" class="form-control" name="imagen" aria-required="true" aria-invalid="true" {{$promocion->imagen != "" ? 'style=display:none' : ''}}>
			          		</div>
			        	</div>
			      	</div>
			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="thumb">Imagen pequeña</label>
			            		@if( $promocion->thumb != "" )
			      			      	<div class="col-sm-8 col-sm-offset-2" id="thumb_del">
			      						<button type="button" class="close" id="elimina_thumb" aria-hidden="true">&times;</button>
			      						<div class="thumbnail">
			      							<img src="{{$promocion->thumb}}" class="img-responsive img_thumb">
			      						</div>
			      					</div>
			      		      	@endif
			            		<input type="file" id="thumb" class="form-control" name="thumb" aria-required="true" aria-invalid="true" {{$promocion->thumb != "" ? 'style=display:none' : ''}}>
			          		</div>
			        	</div>
			      	</div>
			      	<div class="clearfix"></div>
			      	<input class="btn btn-primary" type="submit" value="Modificar Promocion">
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