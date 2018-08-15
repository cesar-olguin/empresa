<?php

  $userType = $_POST['usuario'];
  $nomb   = $_POST['nombre'];
  $apeP  = $_POST['apellidoP'];
  $apeM  = $_POST['apellidoM'];
  $docu = $_POST['documento'];


  //Para la conexión deberás introducir el usuario y password de tu base de datos
  $con = mysql_connect('localhost', 'root', 'root');
  mysql_select_db("agencia", $con);

  $insert = "INSERT INTO archivos (	id_usuario, nombre, apellidoP, apellidoM, documentos) VALUES ('$userType' , '$nomb', '$apeP', '$apeM', '$docu')";
  mysql_query($insert);


?>
