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


<!--<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
  </head>
  <body>

    Hola administrador <?php echo ucfirst($_SESSION['nombre']); ?>
    <a href="../../controller/cerrarSesion.php">
      <button type="button" name="button">Cerrar sesion</button>
    </a>
  </body>
</html--->


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

<h3><label>Modificacion de Regsitros</label></h3>
<form id="formulario_altas" method="post" action="modificarController.php" enctype="multipart/form-data">
      <fieldset>
  <div class="form-group">
       <?php

        $modificar = $_POST['idReg'];

       $servername = "localhost";
       $username = "root";
       $password = "root";
       $dbname = "agencia";

       // Create connection
       $conn = new mysqli($servername, $username, $password, $dbname);
       // Check connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }

       $sql = "SELECT * FROM registros WHERE id=$modificar";
       $result = $conn->query($sql);

       if ($result->num_rows > 0) {
           // output data of each row
           while($row = $result->fetch_assoc()) {
             echo "<input class='form-control' style='visibility:hidden' id='idReg' name='idReg' value=".$row['id']." type='text' >";
             echo "<div class='form-group'>";
             echo "<label>Nombre</label>";
echo "<input class='form-control' id='nombre' name='nombre' value=".$row['nombre']." type='text' >";
echo "</div>";
   echo "<div class='form-group'>";
          echo "<label>Apelldo Paterno</label>";
echo "<input class='form-control' id='apellidoP' name='apellidoP' value=".$row['apellidoP']." type='text' >";
echo "</div>";
   echo "<div class='form-group'>";
          echo "<label>Apellido Materno</label>";
echo "<input class='form-control' id='apellidoM' name='apellidoM' value=".$row['apellidoM']." type='text' >";
echo "</div>";
   echo "<div class='form-group'>";
          echo "<label>Imagen </label>";
echo "<input class='form-control' id='file' name='file' accept='image/*'' type='file'>";
echo "</div>";
   echo "<div class='form-group'>";
echo "<input name='submit' type='submit' value='Modificar' class='btn btn-primary btn-block' id='registro' />";
echo "</div>";

           }
       } else {
           echo "0 results";
       }
       $conn->close();
       ?>


</form>
        </div>
      </div>


  </div>
</body>

</html>
