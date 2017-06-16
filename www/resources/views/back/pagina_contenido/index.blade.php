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
						url:'/administrador/estatus/pagina_de_contenido.html',
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
						<div class="panel-title">Páginas de contenido CMS
						</div>
						<div class="pull-right">
							<div class="col-xs-12">
		                    		<a href="{{url('/administrador/agregar/pagina_de_contenido.html')}}" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Agregar</a>
			              	</div>
		                </div>
					</div>
					<br/>
					<div class="panel-body">						
						<div class="col-md-12">
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								@foreach($contenido as $contenido)									
									<div class="panel panel-default">
										<div class="panel-heading" role="tab" id="heading">
									      	<h4 class="panel-title">
									        	<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$contenido['id']}}" aria-expanded="true" aria-controls="collapse{{$contenido['id']}}">
									        		{{$contenido['titulo_padre']}}
									        	</a>	
									        	<input type="checkbox" {{$contenido['estatus'] == 1 ? "checked" : ""}} class="activo" data="{{$contenido['id']}}" data-toggle="toggle">
									        	<div class="col-md-4 pull-right">
										        	<div class="btn-group btn-group-justified">
												        <div class="btn-group">
													        <a data-href="{{url('/administrador/mostrar/pagina_de_contenido' . $contenido['id'] . '.html')}}" data-id="{{$contenido['id']}}" class="btn btn-default mostrar">
							                              		<span class="p-t-5 p-b-5">
							                              			<i class="fa fa-eye fs-15"></i>
							                              		</span>
							                              		<br>
							                              		<span class="fs-11 font-montserrat text-uppercase">Mostrar</span>
							                              	</a>
						                              	</div>
						                              	<div class="btn-group">
							                              	<form action="{{url('/administrador/modificar/pagina_de_contenido' . $contenido['id'] . '.html')}}" method="post">
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
							                            	<form action="{{url('/administrador/eliminar/pagina_de_contenido' . $contenido['id'] . '.html')}}" method="post" class="del_element">
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
											    </div>
									      </h4>

										</div>
										<div id="collapse{{$contenido['id']}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading">
										    <div class="panel-body">
										      	<table class="table table-hover table-condensed table-detailed dataTable no-footer" id="detailedTable" role="grid">
													<thead>
														<tr role="row">
															<th class="sorting_disabled" rowspan="1" colspan="1">Título</th>
															<th class="sorting_disabled" rowspan="1" colspan="1">Estatus</th>
															<th class="sorting_disabled" rowspan="1" colspan="1">Opciones</th>
														</tr>
													</thead>
													<tbody>
														<?php $var = 0; ?>
														@while(isset($contenido[$var]))
															<tr role="row" class="">
																<td class="v-align-middle">{{$contenido[$var]['titulo_padre']}}</td>
																<td class="v-align-middle"><input type="checkbox" {{$contenido[$var]['estatus'] == 1 ? "checked" : ""}} class="activo" data="{{$contenido[$var]['id']}}" data-toggle="toggle"></td>
																<td class="v-align-middle">
																	<div class="btn-group btn-group-justified">
											                          	<div class="btn-group">   
											                            	<a data-href="{{url('/administrador/mostrar/pagina_de_contenido' . $contenido[$var]['id'] . '.html')}}" data-id="{{$contenido[$var]['id']}}" class="btn btn-default mostrar">
											                              		<span class="p-t-5 p-b-5">
											                              			<i class="fa fa-eye fs-15"></i>
											                              		</span>
											                              		<br>
											                              		<span class="fs-11 font-montserrat text-uppercase">Mostrar</span>
											                              	</a>
											                            </div>
											                            <div class="btn-group">
											                              	<form action="{{url('/administrador/modificar/pagina_de_contenido' . $contenido[$var]['id'] . '.html')}}" method="post">
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
											                            	<form action="{{url('/administrador/eliminar/pagina_de_contenido' . $contenido[$var]['id'] . '.html')}}" method="post" class="del_element">
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
															<?php $var++; ?>
														@endwhile	
													</tbody>
												</table>
										    </div>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
				<!-- END PANEL -->
			</div>
		</div>
	@stop