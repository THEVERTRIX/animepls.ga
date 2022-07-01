<?php

include '../DB/conection.php';
$busqueda = $_REQUEST['input'];

$consulta = "SELECT * FROM Animes WHERE Titulo_anime LIKE '%".$busqueda."%' or ID LIKE '%".$busqueda."%'";

$response = mysqli_query($conexion,$consulta);

while ($data = mysqli_fetch_array($response)) {
    echo "<div class='Anime'>
                    <a href='anime.php?id=".base64_encode($data['ID'])."'>
                        <div class='contenido'>
                            <img src='".$data['Img_anime']."'>
                            <div class='text-over'>
                                <h1>".$data['Titulo_anime']."</h1>
                            </div>
                        </div>
                    </a>
                </div>";
}

?>