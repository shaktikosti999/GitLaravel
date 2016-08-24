<!DOCTYPE html>
<!-- saved from url=(0043)http://getbootstrap.com/examples/jumbotron/ -->
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    @yield('seo')    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="author" content="">
    <link rel="icon" href="{{asset('/assets/public/favicon.ico')}}">    

    <!-- Bootstrap core CSS -->
    <link href="{{asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
    <!-- Slick -->
    <link href="{{asset('/assets/js/slick/slick.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{asset('/assets/css/ie10-viewport-bug-workaround.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('/assets/css/jumbotron.css')}}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{asset('/assets/js/ie-emulation-modes-warning.js')}}"></script><style type="text/css"></style>
   
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body id="landing" ng-app="app"> <!--ng-app (para poder usar los sliders de angular)-->
    
        <div class="visible-xs">
            <div class="menu-top">
                <div class="btn-ham">
                    <a href="http://geo.abardev.net/desarrollo1.html" ng-click="menuOpen = !menuOpen">
                        <span></span>
                        <span></span>
                        <span></span>
                        MENU
                    </a>
                </div>
                <div class="logo">
                    <img src="{{asset('assets/images/ref_logo.svg')}}" alt="logo">
                </div>
                <div class="btn-busqueda">
                    <a href="#">
                        <i class="fa fa-search"></i>
                    </a>
                </div>
            </div>
            <div class="menu-ham" ng-class="{'show': menuOpen}">
                <div class="text-right">
                    <a ng-click="menuOpen = !menuOpen" class="btn-cerrar">x</a>
                </div>
                <ul>
                    <li><a href="#" ng-click="desarrollosOpen = true; menuOpen = false"><b>DESARROLLOS</b></a></li> 
                    <li><a><b>FINANCIAMIENTO</b></a></li> 
                    <li><a><b>CASAS GEO</b></a></li> 
                </ul>
                <ul>
                    <li><a href="#"><b>RELACIÓN CON INVERSIONISTAS</b></a></li>
                    <li><a href="#"><b>CONTÁCTANOS</b></a></li>
                    <li><a href="tel:5588222222"><b>VENTAS (55)88.22.22.22</b></a></li>
                    <li><a href="#"><b>ATENCIÓN A CLIENTES</b></a></li>
                </ul>
                <ul>
                    <li><a href="#"><b>GEO COLABORADORES</b></a></li>
                    <li><a href="#">Extranet GEO</a></li>
                    <li><a href="#">Webmail GEO</a></li>
                    <li><a href="#">Todos sumamos</a></li>
                </ul>
                <ul>
                    <li><a href="#"><b>REESTRUCTURA</b></a></li>
                </ul>
                <ul>
                    <li><a href="#"><b>PROVEEDORES</b></a></li>
                </ul>
            </div>
            <div class="menu-ham menu-ham-right" ng-class="{'show': desarrollosOpen}">
                <div class="text-right">
                    <a ng-click="desarrollosOpen = false; menuOpen = true" class="btn-cerrar">x</a>
                </div>
                <ul class="list-unstyled list-items">
                    <li>
                        <label>Baja California</label>
                        <a>
                            <div class="imagen">
                              <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">                 
                            <div>
                                <b>
                                    Pueblos Mágicos
                                </b>
                                <span>Tecate</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a>
                            <div class="imagen">
                              <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                            </div>
                            <div>
                                <b>
                                    Manglecitos
                                </b>
                                <span>Tijuana</span>
                            </div>
                        </a>
                    </li>
                </ul>
                <ul class="list-unstyled list-items">
                    <li>
                        <label>Chiapas</label>
                        <a>
                            <div class="imagen">
                              <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                            </div>
                            <div>
                                <b>
                                    Chiapas Bicentenario
                                </b>
                                <span>Tuxtla Gutiérrez</span>
                            </div>
                        </a>
                    </li>
                </ul>
                <ul class="list-unstyled list-items">
                    <li>
                        <label>Estado de México</label>
                        <a>
                            <div class="imagen">
                              <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                            </div>
                            <div>
                                <b>
                                    Rancho San Juan
                                </b>
                                <span>Lerma</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a>
                            <div class="imagen">
                              <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                            </div>
                            <div>
                                <b>
                                    Hacienda de las fuentes
                                </b>
                                <span>Toluca</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a>
                            <div class="imagen">
                              <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                            </div>
                            <div>
                                <b>
                                    Real Santa Clara II
                                </b>
                                <span>Toluca</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a>
                            <div class="imagen">
                              <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                            </div>
                            <div>
                                <b>
                                    Nuevo Paseos San Juan
                                </b>
                                <span>Zumpango</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a>
                            <div class="imagen">
                              <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                            </div>
                            <div>
                                <b>
                                    Rinconada de la Laguna
                                </b>
                                <span>Zumpango</span>
                            </div>
                        </a>
                    </li>
                     <li>
                        <a>
                            <div class="imagen">
                              <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                            </div>
                            <div>
                                <b>
                                    La Noria
                                </b>
                                <span>Zumpango</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="hidden-xs">
            <div id="first-navbar">
	            <section class="container">
		            <ul class="menu-lineal" style="font-size: 10px;">
	                    <li><a href="#">RELACIÓN CON INVERSIONISTAS</a></li>
	                    <li><a href="#">CONTÁCTANOS</a></li>
	                    <li><a href="#">VENTAS (55)82.22.22.22</a></li>
	                </ul>
	            </section>
            </div>
            <div id="main-header">
	            <section class="container clear">
		            <div id="logo-container">
	                    <img src="{{asset('assets/images/ref_logo.svg')}}" alt="logo">
	                </div>
                    <div class="form-menu">
                        <div id="busqueda-container">
                            <div class="input-group input-group-sm input-search">
                                <input type="text" class="form-control">
                                <div class="input-group-addon"><i class="fa fa-search"></i></div>
                            </div>
                        </div>
                        <div id="menu-container">
                            <ul class="menu-lineal">
                                <li>
                                    <div>
                                        <b>DESARROLLOS</b>                           
                                        <div class="big-menu">
                                            <div class="big-menu-container">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label style="color: #666666;">BAJA CALIFORNIA NORTE</label>
                                                        <ul class="list-unstyled list-items">
                                                            <li>
                                                                <a>
                                                                    <div class="imagen">
                                                                        <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                                                                    </div>
                                                                    <div>
                                                                        <b>
                                                                            Pueblos Mágicos
                                                                        </b>
                                                                        <span>Tecate</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a>
                                                                    <div class="imagen">
                                                                        <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                                                                    </div>
                                                                    <div>
                                                                        <b>
                                                                            Manglecitos
                                                                        </b>
                                                                        <span>Tijuana</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <label style="color: #666666;">CHIAPAS</label>
                                                        <ul class="list-unstyled list-items">
                                                            <li>
                                                                <a>
                                                                    <div class="imagen">
                                                                      <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                                                                    </div>
                                                                    <div>
                                                                        <b>
                                                                            Chiapas Bicentenario
                                                                        </b>
                                                                        <span>Tuxtla Gutiérrez</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <label style="color: #666666;">ESTADO DE MÉXICO</label>
                                                        <ul class="list-unstyled list-items">
                                                            <li>
                                                                <a>
                                                                    <div class="imagen">
                                                                      <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                                                                    </div>
                                                                    <div>
                                                                        <b>
                                                                            Rancho San Juan
                                                                        </b>
                                                                        <span>Lerma</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a>
                                                                    <div class="imagen">
                                                                      <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                                                                    </div>
                                                                    <div>
                                                                        <b>
                                                                            Hacienda de las Fuentes
                                                                        </b>
                                                                        <span>Toluca</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a>
                                                                    <div class="imagen">
                                                                      <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                                                                    </div>
                                                                    <div>
                                                                        <b>
                                                                            Real Santa Clara II
                                                                        </b>
                                                                        <span>Toluca</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a>
                                                                    <div class="imagen">
                                                                      <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                                                                    </div>
                                                                    <div>
                                                                        <b>
                                                                            Nuevo Paseos San Juan
                                                                        </b>
                                                                        <span>Zumapango</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a>
                                                                    <div class="imagen">
                                                                      <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                                                                    </div>
                                                                    <div>
                                                                        <b>
                                                                            Rinconada de la Laguna
                                                                        </b>
                                                                        <span>Zumapango</span>
                                                                    </div>
                                                                </a>
                                                            </li><li>
                                                                <a>
                                                                    <div class="imagen">
                                                                      <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                                                                    </div>
                                                                    <div>
                                                                        <b>
                                                                            La Noria
                                                                        </b>
                                                                        <span>Zumapango</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label style="color: #666666;">GUANAJUATO</label>
                                                        <ul class="list-unstyled list-items">
                                                            <li>
                                                                <a>
                                                                    <div class="imagen">
                                                                      <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                                                                    </div>
                                                                    <div>
                                                                        <b>
                                                                            La Estancia
                                                                        </b>
                                                                        <span>Irapuato</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <label style="color: #666666;">GUERRERO</label>
                                                        <ul class="list-unstyled list-items">
                                                            <li>
                                                                <a>
                                                                    <div class="imagen">
                                                                      <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                                                                    </div>
                                                                    <div>
                                                                        <b>
                                                                            Marina Diamante
                                                                        </b>
                                                                        <span>Acapulco</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a>
                                                                    <div class="imagen">
                                                                      <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                                                                    </div>
                                                                    <div>
                                                                        <b>
                                                                            Las Garzas Residencial
                                                                        </b>
                                                                        <span>Acapulco</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <label style="color: #666666;">HIDALGO</label>
                                                        <ul class="list-unstyled list-items">
                                                            <li>
                                                                <a>
                                                                    <div class="imagen">
                                                                      <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                                                                    </div>
                                                                    <div>
                                                                        <b>
                                                                            Hacienda Margarita
                                                                        </b>
                                                                        <span>Pachuca</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <label style="color: #666666;">JALISCO</label>
                                                        <ul class="list-unstyled list-items">
                                                            <li>
                                                                <a>
                                                                    <div class="imagen">
                                                                      <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                                                                    </div>
                                                                    <div>
                                                                        <b>
                                                                            Arvento
                                                                        </b>
                                                                        <span>Guadalajara</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a>
                                                                    <div class="imagen">
                                                                      <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                                                                    </div>
                                                                    <div>
                                                                        <b>
                                                                            Fideicomiso Vallarta II
                                                                        </b>
                                                                        <span>Puerto Vallarta</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>                                                        
                                                    <div class="col-sm-4">
                                                        <label style="color: #666666;">MORELOS</label>
                                                        <ul class="list-unstyled list-items">
                                                            <li>
                                                                <a>
                                                                    <div class="imagen">
                                                                      <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                                                                    </div>
                                                                    <div>
                                                                        <b>
                                                                            La Providencia
                                                                        </b>
                                                                        <span>Cuernavaca</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <label style="color: #666666;">NAYARIT</label>
                                                        <ul class="list-unstyled list-items">
                                                            <li>
                                                                <a>
                                                                    <div class="imagen">
                                                                      <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                                                                    </div>
                                                                    <div>
                                                                        <b>
                                                                            La Aurora
                                                                        </b>
                                                                        <span>Tepic</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <label style="color: #666666;">NUEVO LEÓN</label>
                                                        <ul class="list-unstyled list-items">
                                                            <li>
                                                                <a>
                                                                    <div class="imagen">
                                                                      <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                                                                    </div>
                                                                    <div>
                                                                        <b>
                                                                            Las Haciendas
                                                                        </b>
                                                                        <span>Monterrey</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <label style="color: #666666;">OAXACA</label>
                                                        <ul class="list-unstyled list-items">
                                                            <li>
                                                                <a>
                                                                    <div class="imagen">
                                                                      <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                                                                    </div>
                                                                    <div>
                                                                        <b>
                                                                            Dainzu
                                                                        </b>
                                                                        <span>Oaxaca</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <label style="color: #666666;">PUEBLA</label>
                                                        <ul class="list-unstyled list-items">
                                                            <li>
                                                                <a>
                                                                    <div class="imagen">
                                                                      <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                                                                    </div>
                                                                    <div>
                                                                        <b>
                                                                            Los Molinos
                                                                        </b>
                                                                        <span>Atlixco</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <label style="color: #666666;">VERACRUZ</label>
                                                        <ul class="list-unstyled list-items">
                                                            <li>
                                                                <a>
                                                                    <div class="imagen">
                                                                      <img src="{{asset('assets/images/thumb_sm_casa_01.png')}}">
                                                                    </div>
                                                                    <div>
                                                                        <b>
                                                                            Mata de Pita
                                                                        </b>
                                                                        <span>Veracruz</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pico"></div>
                                    </div>
                                </li>
                                <li><a href="#"><b>FINANCIAMIENTO</b></a></li>
                                <li><a href="#">Casas GEO</a></li>
                            </ul>
                        </div> 
                    </div>
	            </section>
            </div>
        </div>
        @yield('contenido')
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 blue-footer">
                        <div class="mapa-container">
                            <div class="slogan">
                            <ul class="menu-lineal">
                                <li>
                                    <div class="text-right">
                                        El mejor lugar<br>para vivir
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{asset('assets/images/logo_footer.svg')}}" height="41" width="62"/>
                                    </div>
                                </li>
                            </ul>
                            </div>
                            <div class="row">
                                    <div class="col-sm-4">
                                        <ul class="list-unstyled">
                                            <li><a><strong>MAPA DE SITIO</strong></a></li>
                                            <li><a>Desarrollo</a></li>
                                            <li><a>Financiamiento</a></li>
                                            <li><a>Quienes somos</a></li>
                                            <li><a>Relación con inversionistas</a></li>
                                            <li><a>Contáctanos</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4 special-list">
                                        <ul class="list-unstyled">
                                        	<hr class="mobile-line">
                                            <li><a><strong>REESTRUCTURA</strong></a></li>
                                            <hr>
                                            <li><a><strong>PROVEEDORES</strong></a></li>
                                            <hr>
                                            <li><a><strong>LEGALES</strong></a></li>
                                            <li><a>Aviso de privacidad</a></li>
                                        </ul>
                                    </div>  
                                    <div class="col-sm-4">
                                        <ul class="list-unstyled">
                                            <li><a><strong>GEO COLABORADORES</strong></a></li>
                                            <li><a>Extranet GEO </a></li>
                                            <li><a>Webmail GEO </a></li>
                                            <li><a>Todos sumamos</a></li>
                                        </ul>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-sm-4 black-footer">
                        <div class="contacto-container">
                            <div class="titulo">
                                CONTÁCTANOS
                            </div>
                            <label>Ventas</label><br>
                            <a href="mailto:ventas@casasgeo.com">clientes@casasgeo.com</a><br>
                            <br>
                            <label>Clientes</label><br>
                            <a href="mailto:clientes@casasgeo.com">clientes@casasgeo.com</a><br>
                            <br>
                            <label>Proveedores</label><br>
                            <a href="mailto:proveedores@casasgeo.com">proveedores@casasgeo.com </a><br>
                            <br>
                            <label>Bolsa de trabajo</label><br>
                            <a href="mailto:bolsadetrabajo@casasgeo.com">bolsadetrabajo@casasgeo.com </a><br><br>
                            <label>Centro de atención telefónica</label>
                            <p class="gris">
                                (55) 5809 4136<br>
                                En la Ciudad de México<br>
                                Lunes a Domingo 9 a 20 hrs.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                   ©2016 Casas Geo. Todos los derechos reservados
                </div>
            </div>
        </div>
   
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset('/assets/js/jquery.min.js')}}"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{asset('/assets/js/ie10-viewport-bug-workaround.js')}}"></script>       
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{-- <script src="{{asset('/assets/bower_components/jquery/dist/jquery.min.js')}}"></script> --}}
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {{-- <script src="{{asset('/assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script> --}}
    <script src="{{asset('/assets/bower_components/image-map-resizer/js/imageMapResizer.min.js')}}"></script>
    <script src="{{asset('/assets/bower_components/angular/angular.min.js')}}"></script>
    <script src="{{asset('/assets/bower_components/angular-animate/angular-animate.min.js')}}"></script>
    <script src="{{asset('/assets/bower_components/angular-touch/angular-touch.min.js')}}"></script>
    <script src="{{asset('/assets/bower_components/angular-bootstrap/ui-bootstrap.min.js')}}"></script>
    <script src="{{asset('/assets/bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js')}}"></script>
    <script src="{{asset('/assets/js/slick/slick.js')}}"></script>
    <script src="{{asset('/assets/js/page-code.js')}}"></script>
    <script src="{{asset('/assets/js/media-querie.js')}}"></script>
    
    @yield('script')  

    <script src="{{asset('/assets/js/script.js')}}"></script>  
    <!--js para el filtro--> 
    <script src="{{asset('/assets/js/desarrollo/front/filtro.js')}}"></script>  
</body>
</html>