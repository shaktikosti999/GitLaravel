@extends('layout.front')
<!-- Start Content -->
@section('contenido')

<div class="intro-gray"></div><!-- /.intro-gray -->


<div class="slider-secondary">
    <!-- 		<a href="/alimentos-y-bebidas" class="btn-menu">
			<img src="css/images/btn-menu@2x.png" alt="">
		</a>
 -->
    <!-- 		<a href="/alimentos-y-bebidas" class="btn-menu">
			<img src="css/images/btn-menu@2x.png" alt="">
		</a>
 -->

    <div class="slider-clip">
        @if( isset( $slider ) && count( $slider ) > 1 )
            <ul class="slides">
                @endif
                @if( isset( $slider ) && count( $slider ) )

                    @foreach( $slider as $item )
                        @if($item->is_show_img_video)
                            <li class="slide fullscreen">
                                <embed  width="100%" height="100%" src="<?php echo $item->video_url; ?>">
                            </li>
                        @else
                        <li class="slide" style="background-image: url({{ $item->imagen }})">
                            <div class="slide-body">
                                <div class="shell">
                                    <div class="slide-content">
                                        @if(isset($item->texto_boton) && $item->texto_boton != "")
                                            <form action="{{$item->link}}" target="{{$item->is_new_tab}}">
                                                <input type="submit" value="{{$item->texto_boton}}" style="min-width: 7em;padding-left: 5px;padding-right: 5px; font-size: 30px;background-color: red;box-shadow: 1px 1px 1px 1px black;border-radius: 10px;color: white;">
                                            </form>
                                        @endif
                                        <h1>
                                            {{$item->titulo}}
                                        </h1>

                                        @if( isset( $sucursales ) && count( $sucursales ) )

                                            <div class="filter-secondary">
                                                <label for="field-filter-secondary1" class="form-label hidden">filter-secondary1</label>
                                                <select name="field-filter-secondary1" id="field-filter-secondary1" class="select branch-filter">

                                                    <option value="-1">Selecciona tu casino</option>

                                                    @foreach( $sucursales as $item )

                                                        <option value="{{ $item->slug }}" <?php ( $sucursal && $sucursal == $item->slug ) ? print "selected" : print "" ?>>{{ $item->nombre }}</option>

                                                    @endforeach

                                                </select>
                                            </div><!-- /.filter-secondary -->

                                        @endif


                                    </div><!-- /.slide-content -->

                                    @include('front.includes.breadcrumbs')
                                </div><!-- /.shell -->
                            </div><!-- /.slide-body -->
                        </li><!-- /.slide -->
                        @endif
                    @endforeach

                @endif
                @if( isset( $slider ) && count( $slider ) > 1 )
            </ul><!-- /.slides -->
        @endif
    </div><!-- /.slider-clip -->

    <div class="slider-label red-label large">
        <i class="ico-slot"></i>
    </div><!-- /.slider-label -->
</div><!-- /.slider-secondary -->


<div class="main">
        <section class="section-articles">
            <div class="shell">
                <article class="article">
                    <div class="article-head">
                        <h2>{{$pagina->is_show_title==1 ? $pagina->titulo : ""}}</h2>
                    </div><!-- /.article-head -->

                    <div class="article-image">
                        <img src="{{ $pagina->archivo }}" alt="" class="img-responsive">
                    </div><!-- /.article-image -->
                    
                    <div class="article-entry">
                    
                        {!! $pagina->contenido !!}

                    </div><!-- /.article-entry -->
                    
                    
                </article><!-- /.article -->
                
                
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
