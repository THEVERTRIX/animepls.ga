<?php
	
	include 'conection.php';

	$User = $_GET['Usuario'];
	$pass = $_GET['Password'];

	$id = $_GET['id'];
	$temp = $_GET['temp'];
	$temp_name = $_GET['temp_name'];
	$episodio = $_GET['episodio'];
	$Nombre = $_GET['Titulo_episodio'];
	$link = $_GET['link'];
	$Desc = $_GET['Desc_anime'];
	$IMG = $_GET['Img_ep'];
	$estado = $_GET['Estado'];

	$sql = "INSERT INTO `Episodios`(`id`, `Temporada`, `Temporada_nombre`, `episodio`, `Ep_nombre`, `Episode_link`, `Img_anime`, `Desc_ep`, `Estado`) VALUES ('$id','$temp','$temp_name','$episodio','$Nombre','$link','$IMG','$Desc','$estado')";
	
	$user = "SELECT * FROM `Admins` WHERE Usuario = $User and Password = $pass";

	if ($usuario = mysqli_query($conexion, $user)) {
		mysqli_query($conexion, $sql);	
	}

?>