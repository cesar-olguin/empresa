<?php

  # Incluimos la clase conexion para poder heredar los metodos de ella.
  require_once('conexion.php');


  class Altas extends Conexion
  {

    public function registroAltas($usuario,$nombre, $apellidoP, $apellidoM ,$documento);
    {
      parent::conectar();

      $usuario  = parent::filtrar($usuario);
      $nombre = parent::filtrar($nombre);
      $apellidoP = parent::filtrar($apellidoP);
    $apellidoM = parent::filtrar($apellidoM);
        $documento = parent::filtrar($documento);


        parent::query('insert into archivos(id_usuario,nombre,apellidoP,apellidoM,documentos) values("'.$usuario.'", "'.$nombre.'", "'.$apellidoP.'", "'.$apellidoM.'", "'.$nombre.'")');


      }

      parent::cerrar();
    }

  }


?>
