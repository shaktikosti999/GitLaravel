@extends('layout.admin')
	@section('script')
		<script src="{{asset('/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
	@stop

	@section('contenido')
		
		<div class="col-lg-7 col-md-6 col-md-offset-3">
		<!-- START PANEL -->
			<div class="panel panel-transparent">
		  		<div class="panel-body">
				    <form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/agregar/error.html')}}" enctype="multipart/form-data">
				    	{!!csrf_field()!!}
				    	<input type="hidden" name="_method" value="PUT">

			      		<div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="html">HTML</label>
				            		<textarea id="html" class="form-control required" name="html" required="required" style="height:600px" aria-required="true" aria-invalid="true" placeholder="Agregar aquí el código HTML">{!!$cuerpo!!}</textarea>
				          		</div>
				        	</div>
				      	</div>

				      	<div class="clearfix"></div>
				      	<input class="btn btn-primary" type="submit" value="Guardar">
				    </form>
			  	</div>
			</div>
			@if(count($errors) > 0)
				@foreach($errors->all() as $key => $val)
					<div class="alert alert-danger" role="alert">
						<button class="close" data-dismiss="alert"></button>
			          	<strong>{{$key}}: </strong>{{$val}}
			        </div>
	        	@endforeach
	        @endif
			<!-- END PANEL -->
		</div>
	@stop