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
						url:'/administrador/estatus/linea.html',
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
		<script src="{{asset('/assets/js/linea/index.js')}}"></script>
	@stop

	@section('contenido')
		<div class="row">
			<div class="col-md-12">
			<!-- START PANEL -->
				<div class="panel panel-transparent">
					<div class="panel-heading">
						<div class="panel-title">Lineas CMS
						</div>
						<div class="pull-right">
							<div class="col-xs-12">
		                    	<a href="{{url('/administrador/agregar/linea.html')}}" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Agregar</a>
			              	</div>
		                </div>
					</div>
					<div class="panel-body">
						<div class="col-xs-12">
							<div class="table-responsive">
								<div id="detailedTable_wrapper" class="dataTables_wrapper form-inline no-footer">
									<table class="table table-hover table-condensed table-detailed dataTable no-footer" id="detailedTable" role="grid">
										<thead>
											<tr role="row">
												<th class="sorting_disabled" rowspan="1" colspan="1">Nombre</th>
												<th class="sorting_disabled" rowspan="1" colspan="1">Estatus</th>
												<th class="sorting_disabled" rowspan="1" colspan="1">Imagenes</th>
												<th class="sorting_disabled" rowspan="1" colspan="1">Opciones</th>
											</tr>
										</thead>
										<tbody>
											@foreach($lineas as $linea)
											<tr role="row" class="">
												<td class="v-align-middle">{{$linea->nombre}}</td>
												<td class="v-align-middle"><input type="checkbox" {{$linea->estatus == 1 ? "checked" : ""}} class="activo" data="{{$linea->id}}" data-toggle="toggle"></td>
												<td class="v-align-middle gallery_images" data-id="{{$linea->id}}"><h1 class="text-center">{{$linea->galeria}}</h1></td>
												<td class="v-align-middle">
													<div class="btn-group btn-group-justified">
							                            <div class="btn-group">
							                              	<form action="{{url('/administrador/modificar/linea' . $linea->id . '.html')}}" method="post">
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
							                            	<form action="{{url('/administrador/eliminar/linea' . $linea->id . '.html')}}" method="post" class="del_element">
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
				<!-- END PANEL -->
			</div>
		</div>
		<!-- Large modal -->

		<!-- MODAL PARA GALERÍA -->
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
							<div class="row" style="height:300px;overflow-y:auto;" id="list_gallery">
								<ul class="list-group"></ul>
							</div>
							<div class="row">
								<form action="{{url('/administrador/agregar/linea.html')}}" enctype="multipart/form-data" method="post" id="modal_form_gallery">
									<input type="hidden" name="_method" value="patch">
									<input type="hidden" name="add_linea" id="add_linea_gallery">
									{{csrf_field()}}
									
									<div class="form-group">
										<label for="add_archivo">Imagen</label>
										<input type="file" name="add_archivo[]" multiple id="add_archivo" >
									</div>
									
									<input type="submit" value="Guardar" class="btn btn-success">
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
		</div>
		<!-- END MODAL PARA GALERÍA -->

	@stop