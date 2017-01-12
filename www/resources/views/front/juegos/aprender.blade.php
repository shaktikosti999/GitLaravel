@extends('layout.front')
<!-- Start Content -->
@section('contenido')

<div class="intro-gray"></div><!-- /.intro-gray -->
<div class="main">
        <section class="section-articles">
            <div class="shell">
                <article class="article">
                    <div class="article-head">
                        <h2><small>Aprender a Jugar</small> {{ $juego->nombre }}</h2>
                    </div><!-- /.article-head -->

                    <?php /*
                    <div class="article-image">
                        <img src="{{ $juego->imagen }}" alt="">
                    </div><!-- /.article-image -->
                    */ ?>
                    
                    <div class="article-entry">
                    
                        {{ $juego->aprender }}

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
