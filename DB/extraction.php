<?php

include 'conection.php';

$user = $_POST['Usuario'];
$pass = $_POST['Password'];

$sql = "SELECT * FROM `Admins` WHERE Usuario = $user and Password = $pass";

if ($query = mysqli_query($conexion, $sql)) {
	return true;
}else {
	return false;
}

?>