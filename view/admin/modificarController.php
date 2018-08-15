<?php

$modificar = $_POST['idReg'];
$nomb   = $_POST['nombre'];
$apeP  = $_POST['apellidoP'];
$apeM  = $_POST['apellidoM'];

$name = $_FILES['file']['name'];
 $target_dir = "../../imagenes/";
 $target_file = $target_dir . basename($_FILES["file"]["name"]);

 // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){

   // Convert to base64
   $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
   $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
   // Insert record
   $query = "insert into images(image) values('".$image."')";


   // Upload file
   move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
  }


$db_server ="localhost";
$db_user = "root";
$db_pass = "root";
$db_name ="agencia";

// Create connection
$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

//check connection
if($conn-> connect_error)
{
	die("Could not connect:". $conn->connect_error);
}

  $sql = "UPDATE registros SET nombre='$nomb', apellidoP='$apeP', apellidoM='$apeM', imagen='$image' WHERE id=$modificar";
  	//$sql = $eliminar;

	if($conn->query($sql)===true)
	{
    echo $sql;
		header ("Location: modificacion.php");

	}
	else
	{
		echo "error" .$conn->error;
	}

	$conn->close();

?>
