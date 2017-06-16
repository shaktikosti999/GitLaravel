@extends('layout.admin')
	@section('script')
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="{{asset('/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js')}}"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script>
		$( function() {
		    $.widget( "custom.combobox", {
		      _create: function() {
		        this.wrapper = $( "<span>" )
		          .addClass( "custom-combobox" )
		          .insertAfter( this.element );
		 
		        this.element.hide();
		        this._createAutocomplete();
		        // this._createShowAllButton();
		      },
		 
		      _createAutocomplete: function() {
		        var selected = this.element.children( ":selected" ),
		          value = selected.val() ? selected.text() : "";
		 
		        this.input = $( "<input>" )
		          .appendTo( this.wrapper )
		          .val( value )
		          .attr( "title", "" )
		          .addClass( "form-control" )
		          .autocomplete({
		            delay: 0,
		            minLength: 0,
		            source: $.proxy( this, "_source" )
		          })
		          .tooltip({
		            classes: {
		              "ui-tooltip": "ui-state-highlight"
		            }
		          });
		 
		        this._on( this.input, {
		          autocompleteselect: function( event, ui ) {
		            ui.item.option.selected = true;
		            this._trigger( "select", event, {
		              item: ui.item.option
		            });
		          },
		 
		          autocompletechange: "_removeIfInvalid"
		        });
		      },
		 
		      _source: function( request, response ) {
		        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
		        response( this.element.children( "option" ).map(function() {
		          var text = $( this ).text();
		          if ( this.value && ( !request.term || matcher.test(text) ) )
		            return {
		              label: text,
		              value: text,
		              option: this
		            };
		        }) );
		      },
		 
		      _removeIfInvalid: function( event, ui ) {
		 
		        // Selected an item, nothing to do
		        if ( ui.item ) {
		          return;
		        }
		 
		        // Search for a match (case-insensitive)
		        var value = this.input.val(),
		          valueLowerCase = value.toLowerCase(),
		          valid = false;
	          	$('#categoria').val(0);
	          	// alert($('#categoria').val());
		        $('#categoria_txt').val(value);
		      },
		 
		      _destroy: function() {
		        this.wrapper.remove();
		        this.element.show();
		      }
		    });
		 
		    // $( "#categoria" ).combobox();
		  } );
		$(function(){
			$('#form-agregar').validate();
			$('[name="fecha"]').datepicker({dateFormat: "yy-mm-dd"});
			$('[name="hora_inicio"]').timepicker({showMeridian:false,defaultTime:false});
			$('[name="hora_fin"]').timepicker({showMeridian:false,defaultTime:false});
		});
		</script>
	@stop

	@section('css')
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css')}}">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	@stop

	@section('contenido')
		
		<div class="col-lg-7 col-md-6 col-md-offset-3">
		<!-- START PANEL -->
			<div class="panel panel-transparent">
		  		<div class="panel-body">
				    <form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/agregar/calendario.html')}}" enctype="multipart/form-data">
				    	{!!csrf_field()!!}
				    	<input type="hidden" name="_method" value="PUT">

				    	<div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="titulo">Título</label>
				            		<input type="text" id="titulo" class="form-control required" name="titulo" required="required" aria-required="true" aria-invalid="true">
				          		</div>
				        	</div>
				      	</div>

		                <div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="descripcion">Descripción</label>
				            		<textarea id="descripcion" class="form-control required" name="descripcion" required="required" aria-required="true" aria-invalid="true"></textarea>
				          		</div>
				        	</div>
				      	</div>

				      	<div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="categoria">Categoría</label>
				            		<select id="categoria" class="form-control required" name="categoria" required="required" aria-required="true" aria-invalid="true">
				            			<option value="1">Especial</option>
				            			<option value="2">Regular</option>
				            		</select>
				            		<input type="hidden" name="categoria_txt" id="categoria_txt">
				          		</div>
				        	</div>
				      	</div>
				      	
				      	<div class="row">
		        			<div class="col-sm-12">
		        				<div class="form-group form-group-default">
		        					<label for="sucursal">Sucursal</label>
					      			<select class="cs-select cs-skin-slide" data-init-plugin="cs-select" name="sucursal" id="sucursal">
					      				@foreach($sucursales as $sucursal)
				                      	<option value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>
				                      	@endforeach
		                    		</select>
		                    	</div>
		                	</div>
		                </div>
		                
		                <div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="fecha">Fecha</label>
				            		<input type="text" id="fecha" class="form-control required" name="fecha" required="required" aria-required="true" aria-invalid="true">
				          		</div>
				        	</div>
				      	</div>

		               	<div class="clearfix"></div>
				      	<input class="btn btn-primary" type="submit" value="Agregar">
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