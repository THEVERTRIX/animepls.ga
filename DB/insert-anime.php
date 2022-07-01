<?php

include 'conection.php';

$User = $_GET['Usuario'];
$pass = $_GET['Password'];

$Nombre = $_GET['Titulo_anime'];
$Desc = $_GET['Desc_anime'];
$IMG = $_GET['Img_anime'];

$sql = "INSERT INTO `Animes`(`Titulo_anime`, `Desc_anime`, `Img_anime`) VALUES ('$Nombre','$Desc','$IMG')";

$user = "SELECT * FROM `Admins` WHERE Usuario = $User and Password = $pass";

if ($usuario = mysqli_query($conexion, $user)) {
	mysqli_query($conexion, $sql);	
}

?>