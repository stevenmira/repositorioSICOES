<!DOCTYPE html>
<html>
  <head>
  
    <meta charset="utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>SICOES</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mis Estilos -->
    <link rel="stylesheet" href="{{asset('css/estilos-stvn.css')}}">
    
  

  </head>

  <style type="text/css">
    div.fondo
    {
      background: rgba(255,255,255,1);
      background: -moz-radial-gradient(center, ellipse cover, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 0%, rgba(237,237,237,1) 100%);
      background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(255,255,255,1)), color-stop(0%, rgba(246,246,246,1)), color-stop(100%, rgba(237,237,237,1)));
      background: -webkit-radial-gradient(center, ellipse cover, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 0%, rgba(237,237,237,1) 100%);
      background: -o-radial-gradient(center, ellipse cover, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 0%, rgba(237,237,237,1) 100%);
      background: -ms-radial-gradient(center, ellipse cover, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 0%, rgba(237,237,237,1) 100%);
      background: radial-gradient(ellipse at center, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 0%, rgba(237,237,237,1) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed', GradientType=1 );
    }
  </style>

  <body class="hold-transition skin-black-light sidebar-mini sidebar-collapse">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="{{ url('home')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>APP</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SICOES</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-circle" style="color:#00FF00"></i>
                  <span class="hidden-xs">{{$usuarioactual->nombre}} </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header" style="color: white;">
                    <br>
                    <h2> {{$usuarioactual->nombre}}</h2>
                    <h4> ({{$usuarioactual->name}})</h4>
                    <p><?= $usuarioactual->tipo($usuarioactual->idtipousuario); ?></p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="{{ route('logout')}}" class="btn btn-default btn-flat">Cerrar Sesión</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>

            
            @if($usuarioactual->idtipousuario==1) 
               @include('menu/admin')
            @endif
            @if($usuarioactual->idtipousuario!=1)
                @include('menu/emp') 
            @endif  

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper fondo">
          <!-- Content Header (Page header) -->
          <!-- Main content -->
          <section class="content" style="padding: 20px 0px 10px 0px;">            
              @yield('contenido')
          </section>
          <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Versión</b> 1.0
        </div>
        <strong>Sistema Informático de Estimación de Créditos Completos para Clientes de AFIMID&copy; <a href="#"> SICOES</a></strong>.  Todos los derechos reservados.
      </footer>

    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Mis Script -->
    @stack('scripts')
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
  </body>
</html>
