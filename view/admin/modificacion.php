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
    <form id="formulario_altas" method="post" action="bajasController.php" enctype="multipart/form-data">
      <table class="table">
    <thead>
      <tr>
        <th>Registro No.</th>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Imagen</th>
        <th>Modificar</th>
      </tr>
    </thead>
    <tbody>
</form>

       <?php
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

       $sql = "SELECT * FROM registros";
       $result = $conn->query($sql);

       if ($result->num_rows > 0) {
           // output data of each row
           while($row = $result->fetch_assoc()) {


               echo "<tr>". "<form id='formulario_modificar' method='post' action='modicarRegi.php'>".
               "<td>".$row["id"]."<input style='visibility:hidden' class='' id='idReg' name='idReg' value=".$row['id']." type='text' >"."</td>".
               "<td>". $row["nombre"]. "</td>" .
               "<td>" . $row["apellidoP"]. "</td>".
                "<td>" . $row["apellidoM"]."</td>".
              "<td>" ."<img src='".$row["imagen"]."' width='50' height='50'>". "</td>".
                "<td>" . "<button type='submit' class='btn btn-warning btn-block' name='button' value='".$row["id"]."' id='btnEliminar'>Modificar</button> " . "</td>".
                "</form>". "</tr>";

           }
       } else {
           echo "0 results";
       }
       $conn->close();
       ?>

    </tbody>
  </table>

        </div>
      </div>


  </div>
</body>

</html>
