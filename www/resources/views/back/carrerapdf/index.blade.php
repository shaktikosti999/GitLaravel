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
						url:'/administrador/estatus/pdfcarrera.html',
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
						<div class="panel-title">PDF de Carreras</div>

						<div class="pull-right">
							<div class="col-xs-6">
		                    	<button class="btn btn-primary" data-toggle="modal" data-target="#myModal"	><i class="fa fa-plus"></i> Masivo</button>
			              	</div>	
							<div class="col-xs-6">
		                    	<a href="{{url('/administrador/agregar/pdfcarrera.html')}}" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Agregar</a>
			              	</div>
		                </div>
					</div>
					</br>
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						<table class="table table-hover table-condensed table-detailed dataTable no-footer" id="detailedTable" role="grid">
							<thead>
								<tr role="row">
									<th class="sorting_disabled" rowspan="1" colspan="1" style="width:20%">Nombre</th>
									<th class="sorting_disabled" rowspan="1" colspan="1" style="width:20%">Juego</th>
									<th class="sorting_disabled" rowspan="1" colspan="1" style="width:10%">Fecha</th>
									<th class="sorting_disabled" rowspan="1" colspan="1" style="width:30%">Opciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach($carreras as $carrera)
								<tr role="row" class="">
									<td class="v-align-middle">{{$carrera->titulo}}</td>
									<td class="v-align-middle">{{$carrera->juego}}</td>
									<td class="v-align middle">{{$carrera->fecha}}</td>
									<td class="v-align-middle">
										<div class="btn-group btn-group-justified">
											<div class="btn-group">
												<a href="{{url($carrera->archivo)}}" target="_blank" class="btn btn-default">
				                              		<span class="p-t-5 p-b-5">
				                              			<i class="fa fa-external-link fs-15"></i>
				                              		</span>
				                              		<br>
				                              		<span class="fs-11 font-montserrat text-uppercase">Ver</span>
				                              	</a>
				                            </div>
				                            <div class="btn-group">
				                              	<form action="{{url('/administrador/modificar/pdfcarrera' . $carrera->id . '.html')}}" method="post">
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
				                            	<form action="{{url('/administrador/eliminar/pdfcarrera' . $carrera->id . '.html')}}" method="post" class="del_element">
													{!!csrf_field()!!}
													<input type="hidden" name="_method" value="DELETE">
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
							</tbody>
						</table>						
					</div>
					{!!$carreras->render()!!}
				</div>
				<!-- END PANEL -->
			</div>
		</div>

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
			  		<div class="modal-header">
				    	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				    	<h4 class="modal-title" id="myModalLabel">Carga Masiva de Carreras</h4>
				  	</div>
				  	<div class="modal-body">
				    	<form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/agregar/pdfcarrera.html')}}" enctype="multipart/form-data">
					    	{!!csrf_field()!!}
					    	<input type="hidden" name="_method" value="PATCH">
					    	<div class="row clearfix">
					        	<div class="col-sm-12">
					          		<div class="form-group form-group-default" aria-required="true">
					            		<label for="csv">Archivo CSV</label>
					            		<input type="file" id="csv" class="form-control" name="csv" aria-required="true" aria-invalid="true" accept=".csv">
					          		</div>

									<div class="form-group form-group-default" aria-required="true">
										<label for="pdf">Archivo PDF</label>
										<input type="file" id="pdf" class="form-control required" name="pdf[]" multiple="multiple" required="required" aria-required="true" aria-invalid="true" accept=".pdf">
									</div>
					          		<div class="form-group"><input type="submit" value="Guardar" class="btn btn-default"></div>
					        	</div>
					      	</div>
				     	</form>
				  	</div>
				</div>
			</div>
		</div>

	@stop