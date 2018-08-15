<?php

  $usuario = $_POST['usuario'];
  $nombre   = $_POST['nombre'];
  $apellidoP  = $_POST['apellidoP'];
  $apellidoM  = $_POST['apellidoM'];
  $documento = $_POST['documento'];

  if(empty($nombre ) || empty($apellidoP) || empty($apellidoM))
  {


  }else{

        # Incluimos la clase usuario
        require_once('../model/altass.php');

        # Creamos un objeto de la clase usuario
        $altas = new Altas();

        # Llamamos al metodo login para validar los datos en la base de datos
        $altas -> registroAltas($usuario,$nombre, $apellidoP, $apellidoM ,$documento);




  }



?>
