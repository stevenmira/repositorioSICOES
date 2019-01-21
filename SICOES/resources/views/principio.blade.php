@extends ('layouts.inicio')
@section('contenido')
<div class="clearfix" style="text-align:center">
    <h2>BIENVENIDO <b>{{$usuarioactual->nombre}} </b>!</h2>
    <p>Al Sistema de Administración de Préstamos Financieros en línea</p>
</div>
    <div style="text-align:center">
    <img src="../img/logo.png"  width="200" height="200">
    </div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row col-sm-12">
              <div class="col-sm-4" align="center">
                <span class="fa fa-money fa-5x"></span>
                <h3>Crédito</h3>
                <p><a href="{{URL::action('calcularCreditoController@create')}}">Cálculos de Créditos</a></p>
              </div>
              
              <div class="col-sm-4" align="center">
                <span class="fa fa-info-circle fa-5x"></span>
                <h3>Interés</h3>
                <p><a href="{{URL::action('TasaInteresController@index')}}">Registra tasas de interés</a></p>
              </div>

              @if($usuarioactual->idtipousuario==1)
              <div class="col-sm-4" align="center">
                <span class="fa fa-users fa-5x"></span>
                <h3>Usuarios</h3>
                <p><a href="{{URL::action('UsuarioController@index')}}">Registra nuevos usuarios</a></p>
              </div>
              @endif

            </div>
        </div>
    </div>
</div>
@endsection