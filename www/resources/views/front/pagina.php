@extends('layout.front')
<!-- Start Content -->
@section('contenido')

 <!-- Start Content -->
<section class="simple-content">
    <div class="container">
        <article>
            <h1>{{ $pagina->nombre }}</h1>
            <!--h2>Cake liquorice muffin icing gummi</h2>
            <h3>Chocolate cake lemon drops</h3>
            <h4>Chocolate gingerbread ice cream</h4>
            <h5>Chupa chups candy donut</h5>
            <h6>Sweet marshmallow </h6-->

            @if( $pagina->imagen_principal )
                
                <img src="{{ $pagina->imagen_principal }}" class="simple-content--largeimg">
            
            @endif

            {!! $pagina->contenido !!}

             @if( $pagina->contenido_extra )
                
                {!! $pagina->contenido_extra !!}
            
            @endif

            
            <!--img src="images/examples/raqv-slider-agenda.jpg" class="simple-content--mediumimg"-->

        </article>
    </div>
</section>
<!-- Finish Content -->

<!-- Finish Content -->
@stop
