<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>SICOES</title>
  <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>

<body>
  <div class="background-wrap">
  <div class="background"></div>
</div>

<form id="accesspanel" action="login" method="post">
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  <h1 id="litheader">AFIMID</h1>
  <div class="inset">
    <p>
      <input type="text" name="name" placeholder="Usuario" required="">
    </p>
    <p>
      <input type="password" name="password" placeholder="Contraseña" required="">
    </p>
    <div style="text-align: center;">
       @if (Session::has('message'))
        <p id="litheader">{{ Session::get('message')}}</p>
       @endif
    </div>
    <input class="loginLoginValue" type="hidden" name="service" value="login" />
  </div>
  <p class="p-container">
    <input type="submit" name="Login" id="go" value="Autorizar">
  </p>
</form>
  
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="{{asset('js/login.js')}}"></script>

</body>

</html>












