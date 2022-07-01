<?php

include 'conection.php';

$User = $_GET['Usuario'];
$pass = $_GET['Password'];

$id = $_GET['ID'];
$Nombre = $_GET['Titulo_anime'];
$Desc = $_GET['Desc_anime'];
$IMG = $_GET['Img_anime'];

$sql = "UPDATE `Animes` SET `Titulo_anime`='$Nombre',`Desc_anime`='$Desc',`Img_anime`='$IMG' WHERE ID = $ID";

$user = "SELECT * FROM `Admins` WHERE Usuario = $User and Password = $pass";

if ($usuario = mysqli_query($conexion, $user)) {
	mysqli_query($conexion, $sql);	
}

?>