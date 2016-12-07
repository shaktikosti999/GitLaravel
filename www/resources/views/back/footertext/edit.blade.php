@extends('layout.admin')
	@section('script')
		<script src="{{asset('/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('/assets/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
		<script src="{{asset('/assets/plugins/bootstrap3-wysihtml5/commands.js')}}"></script>
		<script src="{{asset('/assets/plugins/bootstrap3-wysihtml5/templates.js')}}"></script>
		<script>
		$(function(){
			$('#form-agregar').validate();
			$('textarea').wysihtml5();
		});
		</script>
	@stop

	@section('css')
	<link rel="stylesheet" href="{{asset('/assets/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
	@stop

	@section('contenido')
		
		<div class="col-lg-7 col-md-6 col-md-offset-3">
		<!-- START PANEL -->
		<div class="panel panel-transparent">
	  		<div class="panel-body">
			    <form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/modificar/textfooter' . $texto->id . '.html')}}" enctype="multipart/form-data">
			    	{!!csrf_field()!!}
			    	<input type="hidden" name="_method" value="PATCH">
		      		<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="titulo">Título</label>
			            		<input type="text" id="titulo" value="{{$texto->titulo}}" class="form-control required" name="titulo" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>
	                <div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="texto">Texto</label>
			            		<textarea id="texto" class="form-control required" style="height: 300px" name="texto" required="required" aria-required="true" aria-invalid="true">{{$texto->texto}} </textarea>
			          		</div>
			        	</div>
			      	</div>
			      	
			      	<div class="clearfix"></div>
			      	<input class="btn btn-primary" type="submit" value="Modificar">
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