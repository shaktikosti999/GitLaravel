$(document).ready(function(){

	//En editar
  	$( "#elimina_imagen" ).click(function( e ) {
  		e.preventDefault();
  		$('#imagen_principal').remove();
  		$('#eliminada').val('1');
  		return false;
  	}); 

  	//En agregar
  	$( "#elimina_img" ).click(function( e ) {
  		e.preventDefault();
  		$('#img_principal').val('');
  		return false;
  	});  	

});