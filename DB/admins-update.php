<?php

	$User_user_sender = $_GET['Usuario_user_sender'];
	$Pass_user_sender = $_GET['Password_user_sender'];

	$act = $_GET['action'];

	$olduser = $_GET['Usuario'];
	$oldpass = $_GET['Password'];

	if (isset($act) && $act == "Editar") {

		$Usernew = $_GET['newUsuario'];
		$Passnew = $_GET['newPassword'];

		$sql = "UPDATE `Admins` SET `Usuario`='$Usernew',`Password`='$Passnew' WHERE Usuario = $olduser and Password = $oldpass";

		$user = "SELECT * FROM `Admins` WHERE Usuario = $User_user_sender and Password = $Pass_user_sender";

		if ($usuario = mysqli_query($conexion, $user)) {
			mysqli_query($conexion, $sql);
			return true;	
		}else {
			return false;
		}
	}elseif (isset($act) && $act == "Eliminar") {
		$sql = "DELETE FROM `Admins` WHERE Usuario = $olduser and Password = $oldpass";

		$user = "SELECT * FROM `Admins` WHERE Usuario = $User_user_sender and Password = $Pass_user_sender";

		if ($usuario = mysqli_query($conexion, $user)) {
			mysqli_query($conexion, $sql);
			return true;	
		}else {
			return false;
		}
	}elseif (isset($act) && $act == "Insertar") {

		$sql = "INSERT INTO `Admins`(`Usuario`, `Password`) VALUES ('$olduser','$oldpass')";

		$user = "SELECT * FROM `Admins` WHERE Usuario = $User_user_sender and Password = $Pass_user_sender";

		if ($usuario = mysqli_query($conexion, $user)) {
			mysqli_query($conexion, $sql);	
		}
	}

?>