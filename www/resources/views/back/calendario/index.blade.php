@extends('layout.admin')

	@section('css')
		<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
		<link rel="stylesheet" href="plugins/bootstrap-timepicker/bootstrap-timepicker.min.css">
	@stop
	@section('script')
		<script src="plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
		<script src="{{asset('/assets/js/calendario/index.js')}}"></script>
		<script>
			$(function(){
				$('.activo').on('change', function(){
					id=parseInt($(this).attr('data'));
					$.ajax({
						url:'/administrador/estatus/calendario.html',
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
						<div class="panel-title">calendarios
						</div>
						<div class="pull-right">
							<div class="col-xs-12">
								<a data-toggle="modal" data-target="#importCSV" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Masivo</a>
								<a href="{{url('/administrador/agregar/calendario.html')}}" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Agregar</a>
			              	</div>
		                </div>
					</div>
					</br>
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						@if( isset($categorias) && count($categorias) )
							@foreach($categorias as $val => $sucursal)
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="panel{{$val}}">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#interno{{$val}}" aria-expanded="true" aria-controls="interno{{$val}}">
												{{current($sucursal)->sucursal}}
											</a>
											<div class="btn-group">
												<button type="button" role="button" class="btn btn-default gallery_images" data-id="{{current($sucursal)->id_sucursal}}" data-sucname="{{current($sucursal)->nombre}}">
				                              		<span class="p-t-5 p-b-5">
				                              			<i class="fa fa-picture-o fs-15" aria-hidden="true"></i>
				                              		</span>
				                              		<br>
				                              		<span class="fs-11 font-montserrat text-uppercase">Slider</span>
				                              	</button>
				                            </div>
										</h4>
									</div>
									<div id="interno{{$val}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="panel{{$val}}">
										<div class="panel-body">
											<div class="table-responsive">
												<div id="detailedTable_wrapper" class="dataTables_wrapper form-inline no-footer">
													<table class="table table-hover table-condensed table-detailed dataTable no-footer" id="detailedTable" role="grid">
														<thead>
															<tr role="row">
																<th class="sorting_disabled" rowspan="1" colspan="1">Nombre</th>
																<th class="sorting_disabled" rowspan="1" colspan="1">Categoría</th>
																<th class="sorting_disabled" rowspan="1" colspan="1">Fecha</th>
																<th class="sorting_disabled" rowspan="1" colspan="1">Estatus</th>
																<th class="sorting_disabled" rowspan="1" colspan="1">Opciones</th>
															</tr>
														</thead>
														<tbody>
															@foreach($sucursal as $item)
															<tr role="row" class="">
																<td class="v-align-middle">{{$item->nombre}}</td>
																<td class="v-align-middle">{{$item->categoria}}</td>
																<td class="v-align middle">{{date('d/m/Y',strtotime($item->inicio))}}</td>
																<td class="v-align-middle"><input type="checkbox" {{$item->estatus == 1 ? "checked" : ""}} class="activo" data="{{$item->id}}" data-toggle="toggle"></td>
																<td class="v-align-middle">
																	<div class="btn-group btn-group-justified">
											                            
											                            <div class="btn-group">
											                              	<form action="{{url('/administrador/modificar/calendario' . $item->id . '.html')}}" method="post">
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
											                            	<form action="{{url('/administrador/eliminar/calendario' . $item->id . '.html')}}" method="post" class="del_element">
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
											</div>
										</div>
									</div>
								</div>
							@endforeach
						@endif
					</div>
				</div>
				<!-- END PANEL -->
			</div>
		</div>

		<div class="modal fade slide-up disable-scroll in" id="gallery_modal" tabindex="-1" role="dialog" aria-hidden="false" style="display: none; padding-right: 17px;">
			<div class="modal-dialog  modal-lg">
				<div class="modal-content-wrapper">
					<div class="modal-content">
						<div class="modal-header clearfix text-left">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
							</button>
							<h5>Galería</h5>
						</div>
						<div class="modal-body">
							<form action="{{url('/administrador/slider/calendario.html')}}" enctype="multipart/form-data" method="post" id="modal_form_gallery">
								<div class="row" style="height:300px;overflow-y:auto;" id="list_gallery">
									<ul class="list-group"></ul>
								</div>
								<div class="row">
									<input type="hidden" name="_method" value="patch">
									<input type="hidden" name="id_sucursal" id="id_sucursal">
									{{csrf_field()}}

									<div class="form-group col-lg-8 col-lg-offset-2">
										<labe fot="titulo">Titulo</labe>
										<input type="text" name="titulo" id="titulo" class="form-control">
									</div>
									
									<div class="form-group col-lg-8 col-lg-offset-2">
										<label for="archivo">Slider</label>
										<input type="file" name="archivo" multiple id="archivo" >
									</div>

									<div class="form-group col-lg-8 col-lg-offset-2">
										<input type="submit" value="Guardar" class="btn btn-success">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
		</div>


		<div class="modal fade" id="importCSV" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Carga Masiva de Calendarios</h4>
					</div>
					<div class="modal-body">
						<form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/calendario/importCSV')}}" enctype="multipart/form-data">
							{!!csrf_field()!!}
							<input type="hidden" name="_match"  value="PATCH">
							<div class="row clearfix">
								<div class="col-sm-12">
									<div class="form-group form-group-default" aria-required="true">
										<label for="csv">Archivo CSV</label>
										<input type="file" name="fileImportCSV" id="csv" class="form-control required" required="required" aria-required="true" aria-invalid="true" accept=".csv">
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