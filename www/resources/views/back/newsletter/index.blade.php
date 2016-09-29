@extends('layout.admin')

	@section('css')
		<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	@stop
	@section('script')
		<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
		<script src="{{asset('/assets/js/index.js')}}"></script>
	@stop

	@section('contenido')
		<div class="row">
			<div class="col-md-12">
			<!-- START PANEL -->
				<div class="panel panel-transparent">
					<div class="panel-heading">
						<div class="panel-title">Newsletter
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<div id="detailedTable_wrapper" class="dataTables_wrapper form-inline no-footer">
								<table class="table table-hover table-condensed table-detailed dataTable no-footer" id="detailedTable" role="grid">
									<thead>
										<tr role="row">
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width:20%">Nombre</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width:20%">Correo</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width:10%">Teléfono</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width:20%">Sucursal</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width:30%">Opciones</th>
										</tr>
									</thead>
									<tbody>
										@foreach($newsletters as $newsletter)
										<tr role="row" class="">
											<td class="v-align-middle">{{$newsletter->nombre}}</td>
											<td class="v-align middle">{{$newsletter->mail}}</td>
											<td class="v-align middle">{{$newsletter->telefono}}</td>
											<td class="v-align middle">{{$newsletter->sucursal}}</td>
											<!--<td class="v-align-middle"><input type="checkbox" {{$newsletter->estatus == 1 ? "checked" : ""}} class="activo" data="{{$newsletter->id}}" data-toggle="toggle"></td>-->
											<td class="v-align-middle">
												<div class="btn-group btn-group-justified">
						                            <div class="btn-group">
						                            	<a data-href="{{url('/administrador/mostrar/newsletter' . $newsletter->id . '.html')}}" data-id="{{$newsletter->id}}" class="btn btn-default mostrar">
						                              		<span class="p-t-5 p-b-5">
						                              			<i class="fa fa-eye fs-15"></i>
						                              		</span>
						                              		<br>
						                              		<span class="fs-11 font-montserrat text-uppercase">Mostrar</span>
						                              	</a>
						                            </div>
						                            <div class="btn-group">
						                            	<form action="{{url('/administrador/eliminar/newsletter' . $newsletter->id . '.html')}}" method="post" class="del_element">
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
				<!-- END PANEL -->
			</div>
		</div>
	@stop