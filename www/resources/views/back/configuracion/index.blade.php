@extends('layout.admin')

	@section('css')
		<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	@stop
	@section('script')
		<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
		<script>
			$(function(){
				$('.activo').on('change', function(){
					id=parseInt($(this).attr('data'));
					$.ajax({
						url:'/administrador/estatus/slider.html',
						type:'POST',
						data:{
							_token:"{{csrf_token()}}",
							id:id
						},
						success:function(data){
							console.log(data);
						}
					});
				});
			});
		</script>
		<script src="{{asset('/assets/js/index.js')}}"></script>
	@stop

	@section('contenido')
		<div class="row">
			<div class="col-md-12">
			<!-- START PANEL -->
				<div class="panel panel-transparent">
					<div class="panel-heading">
						<div class="panel-title">Configuracion
						</div>
						<div class="pull-right">
							<div class="col-xs-12">
		                    	<a href="{{url('/administrador/agregar/configuracion.html')}}" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Agregar</a>
			              	</div>
		                </div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<div id="detailedTable_wrapper" class="dataTables_wrapper form-inline no-footer">
								<table class="table table-hover table-condensed table-detailed dataTable no-footer" id="detailedTable" role="grid">
									<thead>
										<tr role="row">
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width:20%">Título</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width:20%">Cantidad </th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width:15%">url</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width:20%">Opciones</th>
										</tr>
									</thead>
									<tbody>
										@if( isset($configuracion) && count($configuracion) )
										@foreach($configuracion as $con)

										<tr role="row" class="">
											<td class="v-align-middle">{{$con->titulo}}</td>
											<td class="v-align middle">{{$con->cantidad}}</td>
											<td class="v-align middle">{{$con->url}}</td>
											<td class="v-align-middle">
												<div class="btn-group btn-group-justified">
						                            <div class="btn-group">
						                              	<form action="{{url('/administrador/modificar/configuracion' . $con->id_configuracion . '.html')}}" method="post">
															{!!csrf_field()!!}
															<button type="submit" class="btn btn-default">
							                              		<span class="p-t-5 p-b-5">
							                              			<i class="fa fa-paste fs-15"></i>
							                              		</span>
							                              		<br>
							                              		<span class="fs-11 font-montserrat text-uppercase">Modificar</span>
							                              	</button>
														</form>
						                            </div>
						                            <div class="btn-group">
						                            	<form action="{{url('/administrador/eliminar/configuracion' . $con->id_configuracion . '.html')}}" method="post" class="del_element">
															{!!csrf_field()!!}
															{{--<input type="hidden" name="_method" value="DELETE">--}}
							                              	<button type="submit" class="btn btn-default">
							                              		<span class="p-t-5 p-b-5">
							                              			<i class="fa fa-trash-o fs-15"></i>
							                              		</span>
							                              		<br>
							                              		<span class="fs-11 font-montserrat text-uppercase">Eliminar</span>
							                              	</button>
							                            </form>
					                              	</div>
						                        </div>
											</td>
										</tr>
										@endforeach
										@endif
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- END PANEL -->
			</div>
		</div>
	@stop