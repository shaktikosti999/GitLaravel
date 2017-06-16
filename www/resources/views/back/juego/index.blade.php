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
						url:'/administrador/estatus/juego.html',
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

				$('#delcat').on('click', function(){
					$('#myModal').modal('show');
				});

				$('.eliminar_categoria').on('click', function(){
					if( confirm('Eliminar?') ){
						context = $(this);
						var id = $(this).attr('data-id');
						$.ajax({
							url:'eliminar/categoria.html',
							method:'post',
							data:{
								_method:'DELETE',
								'id':id
							},
							success:function(data){
								if(data == 'eliminado')
									context.parent().parent().remove();
							}
						})
					}
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
						<div class="panel-title">Juegos
						</div>
						<div class="pull-right">
							<div class="col-xs-6">
		                    	<a class="btn btn-primary btn-cons" id="delcat"><i class="fa fa-trash"></i> Categorías</a>
			              	</div>
							<div class="col-xs-6">
		                    	<a href="{{url('/administrador/agregar/juego.html')}}" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Agregar</a>
			              	</div>
		                </div>
					</div>
					</br>
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						@foreach($juegos as $val => $linea)
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="panel{{$val}}">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#interno{{$val}}" aria-expanded="true" aria-controls="interno{{$val}}">
											{{current($linea)->linea}}
										</a>
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
															<th class="sorting_disabled" rowspan="1" colspan="1">Título</th>
															<th class="sorting_disabled" rowspan="1" colspan="1">Estatus</th>
															<th class="sorting_disabled" rowspan="1" colspan="1">Opciones</th>
														</tr>
													</thead>
													<tbody>
														@foreach($linea as $juego)
														<tr role="row" class="">
															<td class="v-align-middle">{{$juego->nombre}}</td>
															<td class="v-align-middle">{{$juego->titulo}}</td>
															<td class="v-align-middle"><input type="checkbox" {{$juego->estatus == 1 ? "checked" : ""}} class="activo" data="{{$juego->id}}" data-toggle="toggle"></td>
															<td class="v-align-middle">
																<div class="btn-group btn-group-justified">
										                            <div class="btn-group">
										                              	<form action="{{url('/administrador/modificar/juego' . $juego->id . '.html')}}" method="post">
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
										                            	<form action="{{url('/administrador/eliminar/juego' . $juego->id . '.html')}}" method="post" class="del_element">
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
					</div>
				</div>
				<!-- END PANEL -->
			</div>
		</div>
		<!-- Large modal -->

		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  	<div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
		      		<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal">&times;</button>
			        	<h4 class="modal-title">Eliminar categorías</h4>
			      	</div>
			      	<div class="modal-body">
			      		@if( isset($categorias) && count($categorias) )
			      			<table class="table table-hover">
			      				@foreach($categorias as $item)
			      					<tr>
			      						<td><strong>{{$item->nombre}}</strong></td>
			      						<td><button type="button" class="btn btn-default eliminar_categoria" data-id="{{$item->id}}"><i class="glyphicon glyphicon-trash"></i></button></td>
			      					</tr>
			      				@endforeach
			      			</table>
			      		@endif
			      	</div>
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      	</div>
			    </div>

		  	</div>
		</div>

	@stop