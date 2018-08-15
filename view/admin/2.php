<?php
  // Se prendio esta mrd :v
  session_start();

  // Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
  if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1){
    /*
      Para redireccionar en php se utiliza header,
      pero al ser datos enviados por cabereza debe ejecutarse
      antes de mostrar cualquier informacion en el DOM es por eso que inserto este
      codigo antes de la estructura del html, espero haber sido claro
    */
    header('location: ../../index.php');
  }

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Exammen</title>
  <!-- Bootstrap core CSS-->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">  Hola administrador <?php echo ucfirst($_SESSION['nombre']); ?></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">


        <li class="nav-item">
          <a class="nav-link" href="altas.php">Altas</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="modificacion.php">Modificacion</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="bajas.php">Bajas</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="consultas.php">Consultas</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <li class="nav-item">
            <a class="nav-link" href="../../controller/cerrarSesion.php">
              <i class="fa fa-fw fa-sign-out"></i>Cerrar Sesion</a>
            </li>
      </ul>

    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">

      <h3><label>Registar</label></h3>

      <div id="register_form">
      	<form name="register" method="post" action="">
          <div class="form-group">
      		    <label for="nombre">Nombre(s)</label>
      		    <input type="text" id="nombre" name="nomb" />
          </div>
          <div class="form-group">
      		<label for="apellidoP">Apelldi Paterno</label>
      		<input type="text" id="apellidoP" name="apeP" />
          </div>
          <div class="form-group">
          <label for="apellidoM">Apellido Materno</label>
          <input type="text" id="apellidoM" name="apeM" />
          </div>
          <div class="form-group">
          <label for="documento">Documento</label>
          <input type="file" id="documento" name="docu" />
          </div>
          <div class="form-group">
      		<input name="submit" type="submit" value="enviar" id="enviar-btn" />
          </div>
      	</form>
      </div>
    </div>
  </div>

    <script src="../../js/jquery.js"></script>



    <script type="text/javascript">

    $("#enviar-btn").click(function() {

  		var usuario =  <?php echo ucfirst($_SESSION['id']); ?>;
    		var nombre = $("input#nombre").val();
    		var apellidoP = $("input#apellidoP").val();
    		var apellidoM = $("input#apellidoM").val();
       var documento = $("input#documento").val();

       console.log(usuario);
       console.log(nombre);
       console.log(apellidoP);
       console.log(apellidoM);
       console.log(documento);

        var dataString = 'usuario=' + usuario + '&nombre=' + nombre + '&apellidoP=' + apellidoP + '&apellidoM=' + apellidoM + '&documento=' + documento ;


    		$.ajax({
    			type: "POST",
    			url: "altasController.php",
    			data: dataString,
    			success: function() {
            console.log(dataString);
    		    }
    		});
    		return false;
    	});


    </script>





  </div>
</body>

</html>
