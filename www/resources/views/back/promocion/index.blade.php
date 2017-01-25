@extends('layout.admin')

	@section('css')
		<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
		<script src="{{asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css')}}"></script>
		<script src="{{asset('assets/plugins/bootstrap-datepicker/css/datepicker3.css')}}"></script>
	@stop
	@section('script')
		<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
		<script src="{{asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js')}}"></script>
		<script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
		<script>
			$(function(){
				$('.activo').on('change', function(){
					id=parseInt($(this).attr('data'));
					$.ajax({
						url:'/administrador/estatus/promocion.html',
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
		<script src="{{asset('/assets/js/promocion/index.js')}}"></script>
	@stop

	@section('contenido')
		<div class="row">
			<div class="col-md-12">
			<!-- START PANEL -->
				<div class="panel panel-transparent">
					<div class="panel-heading">
						<div class="panel-title">Promociones
						</div>
						<div class="pull-right">
							<div class="col-xs-12">
		                    	<a href="{{url('/administrador/agregar/promocion.html')}}" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Agregar</a>
			              	</div>
		                </div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<div id="detailedTable_wrapper" class="dataTables_wrapper form-inline no-footer">
								<table class="table table-hover table-condensed table-detailed dataTable no-footer" id="detailedTable" role="grid">
									<thead>
										<tr role="row">
											<th class="sorting_disabled" rowspan="1" colspan="1">Nombre</th>
											<th class="sorting_disabled" rowspan="1" colspan="1">Juego</th>
											<th class="sorting_disabled" rowspan="1" colspan="1">Slug</th>
											<th class="sorting_disabled" rowspan="1" colspan="1">Estatus</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width:25%">Opciones</th>
										</tr>
									</thead>
									<tbody>
										@if( isset ($promociones) && count($promociones) )
										@foreach($promociones as $promocion)
										<tr role="row" class="">
											<td class="v-align-middle">{{$promocion->nombre}}</td>
											<td class="v-align middle">{{$promocion->juego}}</td>
											<td class="v-align middle">{{$promocion->slug}}</td>
											<td class="v-align-middle"><input type="checkbox" {{$promocion->estatus == 1 ? "checked" : ""}} class="activo" data="{{$promocion->id}}" data-toggle="toggle"></td>
											<td class="v-align-middle">
												<div class="btn-group btn-group-justified">
													<!-- <div class="btn-group">
															<button type="button" role="button" class="btn btn-default pay_btn" data-id="{{$promocion->id}}" data-promoname="{{$promocion->nombre}}">
							                              		<span class="p-t-5 p-b-5">
							                              			<i class="fa fa-usd" aria-hidden="true"></i>
							                              		</span>
							                              		<br>
							                              		<span class="fs-11 font-montserrat text-uppercase">Pagos</span>
							                              	</button>
						                            </div> -->
						                            <div class="btn-group">
															<button type="button" role="button" class="btn btn-default promocion_btn" data-id="{{$promocion->id}}" data-promoname="{{$promocion->nombre}}">
							                              		<span class="p-t-5 p-b-5">
							                              			<i class="fa fa-fort-awesome" aria-hidden="true"></i>
							                              		</span>
							                              		<br>
							                              		<span class="fs-11 font-montserrat text-uppercase">Sucursales</span>
							                              	</button>
						                            </div>
						                            <div class="btn-group">
						                              	<form action="{{url('/administrador/modificar/promocion' . $promocion->id . '.html')}}" method="post">
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
						                            	<form action="{{url('/administrador/eliminar/promocion' . $promocion->id . '.html')}}" method="post" class="del_element">
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
		<div class="modal fade slide-up disable-scroll in" id="myModal" tabindex="-1" role="dialog" aria-hidden="false" style="display: none; padding-right: 17px;">
			<div class="modal-dialog  modal-lg">
				<div class="modal-content-wrapper">
					<div class="modal-content">
						<div class="modal-header clearfix text-left">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
							</button>
							<h5>Sucursales con la promoción <span class="semi-bold" id="nombre_sucursal"></span></h5>
						</div>
						<div class="modal-body">
							<div class="row" style="height:150px;overflow-y:auto;" id="promo_list">
								<ul class="list-group"></ul>
							</div>
							<div class="row" style="display:none">
							  	<div class="col-sm-2 col-sm-offset-5 thumbnail">
										<img src="" alt="" class="img-responsive" id="add_imagen">
							  	</div>
							</div>
							<div class="row">
								<form action="{{url('/administrador/agregar/promocion.html')}}" enctype="multipart/form-data" method="post" id="modal_form">
									<input type="hidden" name="_method" value="patch">
									<input type="hidden" name="add_promocion" id="add_promocion">
									{{csrf_field()}}
									<div class="form-group">
										<label for="add_sucursal">Sucursales</label>
										<select name="add_sucursal" id="add_sucursal" class="form-control">
											<option value="">Elija una opción</option>
											@foreach($sucursales as $val)
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
									<input type="submit" value="Guardar" class="btn btn-success">
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
		</div>
		<!-- Modal para la dinámica de pagos -->
		<div class="modal fade slide-down disable-scroll in" id="payModal" tabindex="-1" role="dialog" aria-hidden="false" style="display: none; padding-right: 17px;">
			<div class="modal-dialog  modal-lg">
				<div class="modal-content-wrapper">
					<div class="modal-content">
						<div class="modal-header clearfix text-left">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
							</button>
							<h5>Sucursales con la promoción <span class="semi-bold" id="nombre_sucursal"></span></h5>
						</div>
						<div class="modal-body">
							<div class="row" style="height:80px;overflow-y:auto;" id="pay_list">
								<ul class="list-group"></ul>
							</div>
							<div class="row">
								<form action="{{url('/administrador/agregar/pago_promocion.html')}}" method="post" id="modal_pay_form">
									<input type="hidden" name="_method" value="put">
									<input type="hidden" name="pay_id_promocion" id="pay_id_promocion">
									{{csrf_field()}}

									<div class="form-group">
										<label for="pay_titulo">Título</label>
										<input type="text" name="pay_titulo" id="pay_titulo" class="form-control">
									</div>

									<div class="form-group">
										<label for="pay_sucursal">Sucursales</label>
										<select name="pay_sucursal[]" id="pay_sucursal" class="form-control" multiple></select>
									</div>

									<div class="form-group">
										<label for="pay_desc">Descripción</label>
										<textarea name="pay_desc" id="pay_desc" class="form-control"></textarea>
									</div>

									<div class="form-group">
										<label for="pay_date">Fecha</label>
										<input type="text" name="pay_date" id="pay_date" class="form-control">
									</div>

									<div class="form-group col-lg-6">
										<label for="pay_date1">Inicio</label>
										<input type="text" name="pay_date1" id="pay_date1" class="form-control">
									</div>

									<div class="form-group col-lg-6">
										<label for="pay_date2">Fin</label>
										<input type="text" name="pay_date2" id="pay_date2" class="form-control">
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
	@stop