@extends('layout.admin')
	@section('script')
		<script src="{{asset('/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('/assets/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
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
	          	$('#ciudad').val(0);
	          	// alert($('#ciudad').val());
		        $('#ciudad_txt').val(value);
		      },
		 
		      _destroy: function() {
		        this.wrapper.remove();
		        this.element.show();
		      }
		    });
		 
		    $( "#ciudad" ).combobox();
		  } );
		$(function(){
			$('#form-agregar').validate();
			$('#direccion').wysihtml5();
		});
		</script>
	@stop

	@section('css')
		<link rel="stylesheet" href="{{asset('/assets/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	@stop

	@section('contenido')
		<div class="col-lg-7 col-md-6 col-md-offset-3">
		<!-- START PANEL -->
		<div class="panel panel-transparent">
	  		<div class="panel-body">
			    <form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/agregar/sucursal.html')}}">
			    	{!!csrf_field()!!}
			    	<input type="hidden" name="_method" value="PUT">
		      		<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="nombre">Nombre</label>
			            		<input type="text" id="nombre" class="form-control required" name="nombre" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>
			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="ciudad">Ciudad</label>
			            		<select id="ciudad" class="form-control required" name="ciudad" required="required" aria-required="true" aria-invalid="true">
			            			<option value="0"></option>
			            			@if( isset($ciudades) && count($ciudades) )
			            				@foreach($ciudades as $item)
			            					<option value="{{$item->id_ciudad}}">{{$item->ciudad}}</option>
			            				@endforeach
			            			@endif
			            		</select>
			            		<input type="hidden" name="ciudad_txt" id="ciudad_txt">
			          		</div>
			        	</div>
			      	</div>
			      	<div class="row">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default">
			            		<label for="direccion">Dirección</label>
			            		<textarea id="direccion" class="form-control required" name="direccion" style="height: 350px" aria-required="true" aria-invalid="true" ></textarea>
			          		</div>
			          	</div>
			      	</div>
			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="slug">Slug</label>
			            		<input type="text" id="slug" class="form-control required" name="slug" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>
			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="latitud">Latitud</label>
			            		<input type="text" id="latitud" class="form-control required" name="latitud" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>
			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="longitud">Longitud</label>
			            		<input type="text" id="longitud" class="form-control required" name="longitud" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>
			      	<div class="row">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default">
			            		<label for="horario">Horario</label>
			            		<input type="text" id="horario" class="form-control required" name="horario" aria-required="true" aria-invalid="true" >
			          		</div>
			          	</div>
			      	</div>
			      	<div class="row">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default">
			            		<label for="telefono">Teléfonos</label>
			            		<input type="text" id="telefono" class="form-control required" name="telefono" aria-required="true" aria-invalid="true" >
			          		</div>
			          	</div>
			      	</div>
			      	<div class="row">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default">
			            		<label for="instrucciones">Aparcamiento</label>
			            		<textarea id="instrucciones" class="form-control" name="instrucciones" aria-required="true" aria-invalid="true"></textarea>
			          		</div>
			          	</div>
			      	</div>

			      	<div class="row">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default">
			            		<label for="oferta">Ofertas de juego</label>
			            		<textarea id="oferta" class="form-control" name="oferta" aria-required="true" aria-invalid="true"></textarea>
			          		</div>
			          	</div>
			      	</div>

			      	<div class="clearfix"></div>
			      	<input class="btn btn-primary" type="submit" value="Agregar Sección">
			    </form>
		  	</div>
		</div>
		<!-- END PANEL -->
	</div>
	@stop