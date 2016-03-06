@extends('layouts.app')

@section('content')

<!doctype html>
<html ng-app="InnovationManagement">
  <head>
    <meta charset="utf-8">
    <title>preguntas</title>
    <meta name="description" content="">
 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="styles/vendor.css">

    <link rel="stylesheet" href="styles/app.css">

  </head>
  <body id="instrumentos-modulo">

  <div class="instrumentos-gie-wrapper">


    <!--[if lt IE 10]>
      <p class="browsehappy">Usted esta usando un explorador <strong>muy antiguo</strong>. Por favor <a href="http://browsehappy.com/">Actualice su explorador</a> Para Mejorar su experiencia en este sitio.</p>
    <![endif]-->
<!--<acme-navbar  ></acme-navbar>-->
    <div ui-view></div>
    @if( Auth::check() )
<script type="text/javascript">
         var User =  <?php echo json_encode($user) ?>;
          console.log(User);
       </script>
    
    @endif
    <script src="scripts/vendor.js"></script>

    <script src="scripts/app.js"></script>
 <div class="row">
   <!--  <sponsors class="col-sm-12"></sponsors>    -->
 </div>
 </div>
  <div class="footer col-xs-12 text-center">
        <p>© 2015 GIE. Todos los Derechos Reservados |   <a href="#" >Instrumento de caracterización de la actividad innovadora</a> </p>
    </div>

  </body>
</html>
@endsection