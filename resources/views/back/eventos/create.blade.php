@extends('layout.admin')
	@section('script')
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="{{asset('/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js')}}"></script>
		<script>
		$(function(){
			$('#form-agregar').validate();
			$('[name="fecha_inicio"]').datepicker();
			$('[name="fecha_fin"]').datepicker();
			$('[name="hora_inicio"]').timepicker({showMeridian:false,defaultTime:false});
			$('[name="hora_fin"]').timepicker({showMeridian:false,defaultTime:false});
		});
		</script>
	@stop

	@section('css')
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css')}}">
	@stop

	@section('contenido')
		
		<div class="col-lg-7 col-md-6 col-md-offset-3">
		<!-- START PANEL -->
			<div class="panel panel-transparent">
		  		<div class="panel-body">
				    <form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/agregar/eventos.html')}}" enctype="multipart/form-data">
				    	{!!csrf_field()!!}
				    	<input type="hidden" name="_method" value="PUT">
				    	<div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="titulo">Título</label>
				            		<input type="text" id="titulo" class="form-control required" name="titulo" required="required" aria-required="true" aria-invalid="true">
				          		</div>
				        	</div>
				      	</div>
				      	<div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="slug">Slug</label>
				            		<input type="text" id="slug" class="form-control required" name="slug" required="required" aria-required="true" aria-invalid="true">
				          		</div>
				        	</div>
				      	</div>
			      		<div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="tipo">Tipo de torneo / Evento </label>
				            		<select id="tipo" class="cs-select cs-skin-slide" name="tipo" data-init-plugin="cs-select" required="required" aria-required="true" aria-invalid="true">
				            			@foreach($tipos as $tipo)
											@if($tipo->nombre != "Torneo regional" )
				            					<option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
											@endif
				            			@endforeach
				            		</select>
				          		</div>
				        	</div>

				      	</div>
				      	<div class="row">
		        			<div class="col-sm-12" style="border: 1px solid #eeeeee;margin-bottom: 0.8em;">
								<div class="form-group col-sm-12">
		        					<label for="sucursal" style="margin-left: 1em;">Sucursal</label>
					      			{{--<select class="cs-select cs-skin-slide" data-init-plugin="chosen-select" multiple="multiple" name="sucursal[]" id="sucursal">--}}
					      				{{--@foreach($sucursales as $sucursal)--}}
				                      	{{--<option value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>--}}
				                      	{{--@endforeach--}}
		                    		{{--</select>--}}
								</div>

								<div class="col-sm-12" style="padding-left: 0.8em;margin-top: -1em;">
									<select  id="sucursal" name="sucursal[]" multiple="multiple" onchange="console.log('changed', this)" placeholder="Seleccione sucursal" class="SlectBox" required style="border-color: #eeeeee;margin-bottom: 0.2em;" >
										@foreach($sucursales as $sucursal)
											<option value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>
										@endforeach
                                  </select>
                              </div>
                          </div>
                      </div>
                      {{--<div class="row">--}}
		        			{{--<div class="col-sm-12">--}}
		        				{{--<div class="form-group form-group-default">--}}
		        					{{--<label for="juego">Juego</label>--}}
					      			{{--<select class="cs-select cs-skin-slide" data-init-plugin="cs-select" name="juego" id="juego">--}}
					      				{{--@foreach($juegos as $juego)--}}
				                      	{{--<option value="{{$juego->id}}">{{$juego->nombre}}</option>--}}
				                      	{{--@endforeach--}}
		                    		{{--</select>--}}
		                    	{{--</div>--}}
		                	{{--</div>--}}
		                {{--</div>--}}
		                <div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="descripcion">Descripción</label>
				            		<textarea id="descripcion" class="form-control required" name="descripcion" required="required" aria-required="true" aria-invalid="true"></textarea>
				          		</div>
				        	</div>
				      	</div>
		                <div class="row clearfix">
					        	<div class="col-sm-12">
					          		<div class="form-group form-group-default" aria-required="true">
					            		<label for="fecha_inicio">Inicio</label>
					            		<input type="text" id="fecha_inicio" class="form-control required" name="fecha_inicio" required="required" aria-required="true" aria-invalid="true">
					          		</div>
					        	</div>
					      	</div>
					      	<div class="row clearfix">
					        	<div class="col-sm-12">
					          		<div class="form-group form-group-default" aria-required="true">
					            		<label for="fecha_fin">Fin</label>
					            		<input type="text" id="fecha_fin" class="form-control required" name="fecha_fin" required="required" aria-required="true" aria-invalid="true">
					          		</div>
					        	</div>
					      	</div>
				      	{{--<div class="row clearfix">--}}
				        	{{--<div class="col-sm-12">--}}
				          		{{--<div class="form-group form-group-default" aria-required="true">--}}
				            		{{--<label for="link">Link</label>--}}
				            		{{--<input type="text" id="link" class="form-control url" name="link" aria-required="true" aria-invalid="true">--}}
				          		{{--</div>--}}
				        	{{--</div>--}}
				      	{{--</div>--}}
		                <div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="archivo">Archivo</label>
				            		<input type="file" id="archivo" class="form-control required" name="archivo" required="required" aria-required="true" aria-invalid="true">
				          		</div>
				        	</div>
				      	</div>
				      	<div class="clearfix"></div>
				      	<input class="btn btn-primary" type="submit" value="Agregar">
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


