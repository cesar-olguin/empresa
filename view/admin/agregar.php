<?php
  $insert = "INSERT INTO archivos id_usuario, nombre, apellidoP, apellidoM, documentos VALUES '1','HOLA','COMO','ESTAS','CESAR'";

  $mysqli = new mysqli('localhost', 'root', 'root', 'agencia');

  mysql_query($insert);

?>
