@extends('layout.front')
<!-- Start Content -->
@section('contenido')

<div class="intro-gray"></div><!-- /.intro-gray -->
<div class="main">
        <section class="section-articles">
            <div class="shell">
            	@if( isset($result) && count($result) )
	            	@foreach( $result as $key => $val )
		                <article class="article">
		                    <div class="article-head">
		                        <h2>{{ucfirst($key)}}</h2>
		                    </div><!-- /.article-head -->
		                    
		                    <div class="article-entry">
		                    	<ul>
		                    		@if( count($val) )
			                    		@foreach($val as $res)
				                    		<li>{{$res->nombre}}
				                    		{!!isset($res->descripcion) ? '<br>' . $res->descripcion : ''!!}
				                    		</li>
			                    		@endforeach
			                    	@else
			                    		<li>No existen resultados</li>
			                    	@endif
		                    	</ul>
		                    </div><!-- /.article-entry -->
		                    
		                    
		                </article><!-- /.article -->
	              	@endforeach
	            @endif
                
                
            </div><!-- /.shell -->
        </section><!-- /.section-articles -->

        <section class="section-gray">
            <div class="shell">
                <div class="subscribe">
                    <form action="?" method="post">
                        <div class="subscribe-head">
                            <h2>Regístrate a nuestro newsletter</h2>
                        </div><!-- /.subscribe-head -->

                        <div class="subscribe-wrapper">

                            <div class="subscribe-body-hidden">
                                <div class="subscribe-inner">
                                    <label for="mail" class="hidden">Email</label>
                                    
                                    <input type="email" id="mail" name="mail" value="" placeholder="Email" class="subscribe-field">
                                    
                                    <input type="submit" value="Enviar" class="subscribe-btn btn btn-red">
                                </div><!-- /.subscribe-inner -->

                                <div class="subscribe-actions">
                                    <ul class="list-checkboxes">
                                        <li>
                                            <div class="checkbox">
                                                <input type="checkbox" name="field-notifications" id="field-notifications">
                                                
                                            </div><!-- /.checkbox -->
                                        </li>
                                    </ul><!-- /.list-checkboxes -->
                                </div><!-- /.subscribe-actions -->
                            </div><!-- /.subscribe-body-hidden -->
                        </div><!-- /.subscribe-wrapper -->
                    </form>
                </div><!-- /.subscribe -->
            </div><!-- /.shell -->
        </section><!-- /.section-gray -->
    </div><!-- /.main -->
@stop
