@extends('layout.admin')

	@section('css')
		<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
		<style>
			.own_item:hover{
				background-color:rgba(255,20,0,0.5);
				cursor:pointer;
			}
			.own_item>span{
				color:white;
				font-size: 18px;
			}
		</style>
	@stop

	@section('script')
		<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
		<script src="{{asset('/assets/js/index.js')}}"></script>
		<script>
			$('#owner_mail').on('click', function(){
				$('#myModal').modal('show');
			});
			$('.own_item').on('click', function(){
				var id = $(this).attr('data-id');
				$(this).hide();
				$('#form_own').append('<input type="hidden" name="borrar_own[]" value="' + id + '">');
			});
			$('#myModal').on('hide.bs.modal', function(){
				$('[name="borrar_own[]"').remove();
				$('.own_item').show();
				$('#mail_own').val('');
			});
		</script>
	@stop

	@section('contenido')
		<div class="row">
			<div class="col-md-12">
			<!-- START PANEL -->
				<div class="panel panel-transparent">
					<div class="panel-heading">
						<div class="panel-title">Contacto <button class="btn btn-default" id="owner_mail"><i class="fa fa-search" aria-hidden="true"></i></button>
						</div>
						<div class="panel-title"><Eventos></Eventos>
						</div>
						<div class="pull-right">
							<div class="col-xs-12">
								<a id="exportCSV" href="/administrador/contactoCSV.html" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> CSV de exportación</a>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<div id="detailedTable_wrapper" class="dataTables_wrapper form-inline no-footer">
								<table class="table table-hover table-condensed table-detailed dataTable no-footer" id="detailedTable" role="grid">
									<thead>
										<tr role="row">
											<th class="sorting_disabled" rowspan="1" colspan="1" >Nombre</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" >Correo</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" >Teléfono</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" >Sucursal</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" >Tipo</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" >Fecha</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" >Opciones</th>
										</tr>
									</thead>
									<tbody>
										@if( isset($contactos) && count($contactos) )
											@foreach($contactos as $contacto)
											<tr role="row" class="">
												<td class="v-align-middle">{{$contacto->nombre}}</td>
												<td class="v-align middle">{{$contacto->email}}</td>
												<td class="v-align middle">{{$contacto->telefono}}</td>
												<td class="v-align middle">{{$contacto->sucursal != null ? $contacto->sucursal : "Ninguna"}}</td>
												<td class="v-align middle">{{$contacto->tipo}}</td>
												<td class="v-align middle">{{$contacto->fecha}}</td>
												<td class="v-align-middle">
													<div class="btn-group btn-group-justified">
							                            <div class="btn-group">
							                            	<a data-href="{{url('/administrador/mostrar/contacto' . $contacto->id . '.html')}}" data-id="{{$contacto->id}}" class="btn btn-default mostrar">
							                              		<span class="p-t-5 p-b-5">
							                              			<i class="fa fa-eye fs-15"></i>
							                              		</span>
							                              		<br>
							                              		<span class="fs-11 font-montserrat text-uppercase">Mostrar</span>
							                              	</a>
							                            </div>
							                            <div class="btn-group">
							                            	<form action="{{url('/administrador/eliminar/contacto' . $contacto->id . '.html')}}" method="post" class="del_element">
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
		<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Correos Administrativos</h4>
					</div>
					<div class="modal-body">
					<form action="/administrador/contacto/newmail.html" method="post" id="form_own">
						{!!csrf_field()!!}
						<input type="hidden" name="_method" value="put">
						<div class="panel panel-default">
						  	<!-- Default panel contents -->
						  	<div class="panel-heading">Correos</div>
						  	<div class="panel-body">
							  	<!-- List group -->
								@if( isset($mails) && count($mails) )
								  	<ul class="list-group">
									@foreach($mails as $item)
									    <li class="list-group-item own_item" data-id="{{$item->id}}">{{$item->mail}} <span>Eliminar</span></li>
									@endforeach
								  	</ul>
								@endif
						  	</div>
						</div>
						<div class="form-group"><input type="email" name="mail_own" id="mail_own" placeholder="Nueva dirección de correo" class="form-control"></div>
						<input type="submit" class="btn btn-primary" value="Guardar">
					</form>
					</div>
				</div>
			</div>
		</div>
	@stop