@extends ('layouts.inicio')
@section('contenido')

<style>
  .errors{
    background-color: #fcc;
    border: 1px solid #966;
  }
</style>

<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{URL::action('UsuarioController@index')}}">Usuarios</a></li>
    <li class="active">Editar</li>
  </ol>
</section>

<br>
<br>
<h4 style="text-align: center; font-family:  'Trebuchet MS', Helvetica, sans-serif; color: #333333;">ASESORES FINANCIEROS MICRO IMPULSADORES DE NEGOCIOS</h4>
<h4 style="text-align: center; font-family:  'Trebuchet MS', Helvetica, sans-serif; color: #333333;">AFIMID, S.A DE C.V</h4>


<h4 style="text-align: center;font-family:  'Trebuchet MS', Helvetica, sans-serif; color: #333333; padding: 50px 0px 5px 0px;"><b>EDITAR USUARIO</b></h4>



{!!Form::open(array('action' => array('UsuarioController@update',$usuario->idusuario),'method'=>'PATCH','autocomplete'=>'off'))!!}

   {{Form::token()}}
<div class="container">
  <div class="col-lg-12 col-md-12 col-sm-12"> 
         
          <div class="row">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              @if(count($errors) > 0)
              <div class="errors">
                <ul>
                  <p><b>Por favor, corrige lo siguiente:</b></p>
                  <?php $cont = 1; ?>
                @foreach($errors->all() as $error)
                  <li>{{$cont}}. {{ $error }}</li>
                  <?php $cont=$cont+1; ?>
                @endforeach
                </ul>
              </div>
            @endif
            </div>
          </div>
          
          <div class="row"> 

            <div class="form-group col-lg-4 col-md-4 col-sm-4">
              <label for="nombre">Nombre de Empleado</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                </div>
                {!! Form::text('nombre', $usuario->nombre, ['class' => 'form-control' , 'required' => 'required', 'autofocus'=>'on', 'maxlength'=>'30']) !!}
              </div>
            </div>

            <div class="form-group col-lg-4 col-md-4 col-sm-4">
              <label for="name">Username</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                {!! Form::text('name', $usuario->name, ['class' => 'form-control' , 'required' => 'required', 'autofocus'=>'on', 'maxlength'=>'30']) !!}
              </div>
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-4">
              <label for="cartera">Rol de Usuario</label>
              {{ Form::select('idtipousuario', $tipousuario->pluck('nombre','idtipousuario'), $usuario->idtipousuario, ['class'=>'form-control', 'required' => 'required', 'placeholder'=>'-- Seleccione un Tipo de usuario --']) }}
            </div>
            
          </div>
          <div class="row"> 

          <div class="form-group col-lg-4 col-md-4 col-sm-4">
              <label for="apellido">Email</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-at" aria-hidden="true"></i>
                </div>
                {!! Form::email('email', $usuario->email, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Introduzca el apellido . . .', 'autofocus'=>'on', 'maxlength'=>'30']) !!}
              </div>
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-4">
              <label for="apellido">Contraseña</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-lock" aria-hidden="true"></i>
                </div>
                {!! Form::password('password',['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Introduzca una nueva contraseña . . .', 'autofocus'=>'on', 'maxlength'=>'30']) !!}
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="guardar">
              <div class="form-group">
              
                  <a href="{{URL::action('UsuarioController@index')}}" class="btn btn-danger btn-lg col-lg-offset-2 col-md-offset-2 col-sm-offset-2"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                  <button class="btn btn-primary btn-lg col-lg-offset-6 col-md-offset-6 col-sm-offset-6" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Actualizar</button>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <h4 style="text-align:center; font-family:  'Trebuchet MS', Helvetica, sans-serif; color: #333333; float: right;">{{$fecha_actual}}</h4>
            </div>
          </div>
         
  </div>
</div>      

{!!Form::close()!!}

@push('scripts')


<!-- InputMask -->
<script src="{{asset('js/inputmask/jquery3.js')}}"></script>  
<script src="{{asset('js/inputmask/input-mask.js')}}"></script>
<script src="{{asset('js/inputmask/input-mask-date.js')}}"></script>

<script>
  $(function () {
    //Money Euro
    $('[data-mask]').inputmask()

  })
</script>
@endpush


@endsection