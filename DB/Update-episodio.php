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

	$sql = "UPDATE Episodios SET `Temporada`='$temp',`Temporada_nombre`='$temp_name',`episodio`='$episodio',`Ep_nombre`='$Nombre',`Episode_link`='$link',`Img_anime`='$IMG',`Desc_ep`='$Desc',`Estado`='$estado' WHERE id = $id and Temporada = $temp and episodio = $episodio";
	
	$user = "SELECT * FROM `Admins` WHERE Usuario = $User and Password = $pass";

	if ($usuario = mysqli_query($conexion, $user)) {
		mysqli_query($conexion, $sql);	
	}

?>