<?php

$eliminar = $_POST['idReg'];

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

  $sql = "DELETE FROM registros WHERE id=$eliminar";
  	//$sql = $eliminar;

	if($conn->query($sql)===true)
	{
    echo $sql;
		header ("Location: bajas.php");

	}
	else
	{
		echo "error" .$conn->error;
	}

	$conn->close();

?>
