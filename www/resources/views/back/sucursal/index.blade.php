@extends('layout.admin')

	@section('css')
		<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	@stop

	@section('script')
		<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
		<script src="{{asset('/assets/js/index.js')}}"></script>
		<script src="{{asset('/assets/js/sucursal/index.js')}}"></script>
	@stop

	@section('contenido')
		<div class="row">
			<div class="col-md-12">
			<!-- START PANEL -->
				<div class="panel panel-transparent">
					<div class="panel-heading">
						<div class="panel-title">Sucursales CMS
						</div>
						<div class="pull-right">
							<div class="col-xs-12">
		                    	<a href="{{url('/administrador/agregar/sucursal.html')}}" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Agregar</a>
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
												<th class="sorting_disabled" rowspan="1" colspan="1">Teléfono</th>
												<th class="sorting_disabled" rowspan="1" colspan="1">Dirección</th>
												<th class="sorting_disabled" rowspan="1" colspan="1">Estatus</th>
												<th class="sorting_disabled" rowspan="1" colspan="1">Juegos</th>
												<th class="sorting_disabled" rowspan="1" colspan="1">Imágenes</th>
												<th class="sorting_disabled" rowspan="1" colspan="1" style="width:30%">Opciones</th>
											</tr>
										</thead>
										<tbody>
											@foreach($sucursales as $sucursal)
											<tr role="row" class="">
												<td class="v-align-middle">{{$sucursal->nombre}}</td>
												<td class="v-align-middle">{{$sucursal->telefono}}</td>
												<td class="v-align-middle">{{$sucursal->direccion}}</td>
												<td class="v-align-middle"><input type="checkbox" {{$sucursal->estatus == 1 ? "checked" : ""}} class="activo" data="{{$sucursal->id}}" data-toggle="toggle"></td>
												<td class="v-align-middle"><h1 class="text-center">{{$sucursal->juegos}}</h1></td>
												<td class="v-align-middle gallery_images" data-id="{{$sucursal->id}}"><h1 class="text-center">{{$sucursal->galeria}}</h1></td>
												<td class="v-align-middle">
													<div class="btn-group btn-group-justified">
							                            <div class="btn-group">
																<button type="button" role="button" class="btn btn-default game_btn" data-id="{{$sucursal->id}}" data-sucname="{{$sucursal->nombre}}">
								                              		<span class="p-t-5 p-b-5">
								                              			<i class="fa fa-gamepad fs-15"></i>
								                              		</span>
								                              		<br>
								                              		<span class="fs-11 font-montserrat text-uppercase">Juegos</span>
								                              	</button>
							                            </div>
							                            <div class="btn-group">
							                              	<form action="{{url('/administrador/modificar/sucursal' . $sucursal->id . '.html')}}" method="post">
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
							                            	<form action="{{url('/administrador/eliminar/sucursal' . $sucursal->id . '.html')}}" method="post" class="del_element">
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
		<!-- MODAL PARA JUEGOS -->
		<div class="modal fade slide-up disable-scroll in" id="myModal" tabindex="-1" role="dialog" aria-hidden="false" style="display: none; padding-right: 17px;">
			<div class="modal-dialog  modal-lg">
				<div class="modal-content-wrapper">
					<div class="modal-content">
						<div class="modal-header clearfix text-left">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
							</button>
							<h5>Juegos en <span class="semi-bold" id="nombre_sucursal"></span></h5>
						</div>
						<div class="modal-body">
							<div class="row" style="height:150px;overflow-y:auto;" id="game_list">
								<ul class="list-group"></ul>
							</div>
							<div class="row" style="display:none">
							  	<div class="col-sm-2 col-sm-offset-5 thumbnail">
										<img src="" alt="" class="img-responsive" id="add_imagen">
							  	</div>
							</div>
							<div class="row">
								<form action="{{url('/administrador/agregar/juego.html')}}" enctype="multipart/form-data" method="post" id="modal_form">
									<input type="hidden" name="_method" value="patch">
									<input type="hidden" name="add_sucursal" id="add_sucursal">
									{{csrf_field()}}
									<div class="form-group">
										<label for="add_juego">Juego</label>
										<select name="add_juego" id="add_juego" class="form-control">
											@foreach($juegos as $val)
											<option value="{{$val->id}}">{{$val->nombre}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label for="add_desc">Descripción</label>
										<textarea name="add_desc" id="add_desc" class="form-control"></textarea>
									</div>
									<div class="form-group col-sm-6">
										<label for="add_archivo">Imagen</label>
										<input type="file" name="add_archivo" id="add_archivo" >
									</div>
									<div class="form-group col-sm-6">
										<label for="add_link">Enlace</label>
										<input type="text" name="add_link" id="add_link" class="form-control">
									</div>
									<div class="form-group col-sm-3">
										<label for="add_disp">Disponibilidad</label>
										<input type="text" name="add_disp" id="add_disp" class="form-control">
									</div>
									<div class="form-group col-sm-3">
										<label for="add_apuesta">Apuesta Mínima</label>
										<input type="text" name="add_apuesta" id="add_apuesta" class="form-control">
									</div>
									<div class="form-group col-sm-3">
										<label for="add_acumulado">Acumulado</label>
										<input type="text" name="add_acumulado" id="add_acumulado" class="form-control">
									</div>
									<div class="form-group col-sm-3">
										<label for="add_pagado">Pagado</label>
										<input type="text" name="add_pagado" id="add_pagado" class="form-control">
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
		<!-- END MODAL PARA JUEGOS -->

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
								<form action="{{url('/administrador/agregar/sucursal.html')}}" enctype="multipart/form-data" method="post" id="modal_form_gallery">
									<input type="hidden" name="_method" value="patch">
									<input type="hidden" name="add_sucursal" id="add_sucursal_gallery">
									{{csrf_field()}}
									
									<div class="form-group col-lg-6">
										<label for="add_archivo">Galería</label>
										<input type="file" name="add_archivo[]" multiple id="add_archivo" >
									</div>

									<div class="form-group col-lg-6">
										<label for="add_galeria">Slider</label>
										<input type="file" name="add_galeria[]" multiple id="add_galeria" >
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