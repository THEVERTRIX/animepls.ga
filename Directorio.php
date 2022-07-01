<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Animeplus</title>
	<link rel="stylesheet" href="./CSS/styles.css">
	<link rel="icon" href="./IMG/animeplus.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg fixed-top">
		  <div class="container-fluid">
		    <a class="navbar-brand text-light" href="./">Animeplus</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span><i class='bx bx-menu'></i></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link text-light" href="./">Inicio</a>
		        </li>
		      </ul>
		      <form class="d-flex">
		        <input class="form-control me-2" onkeyup="buscar_ahora($('#search').val());" type="search" id="search" placeholder="Buscar" aria-label="Buscar">
		      </form>
		    </div>
		  </div>
		</nav>
	</header><!-- /header -->
	<section class="Catalogo">
		<div class="contenedor-catalogo">
			<div class="search_result"></div>
			<div class="subcontainer">
				<?php

				include './DB/conection.php';
				$sql = "SELECT * FROM Animes";
				$consulta = mysqli_query($conexion, $sql);


				?>
				<?php while($response = mysqli_fetch_array($consulta)): ?>
				<div class="Anime">
					<a href="anime.php?id=<?php echo base64_encode($response['ID']) ?>">
						<div class="contenido">
							<img src="<?php echo $response['Img_anime']?>">
							<div class="text-over">
								<h1><?php echo $response['Titulo_anime'] ?></h1>
							</div>
						</div>
					</a>
				</div>
				<?php endwhile ?>
			</div>
		</div>
	</section>
	<script>
		function buscar_ahora(search) {
		    var data = {'input': search};
		    if (data['input'] === "") {
		    	document.querySelector('div.subcontainer').classList.remove("visually-hidden");
		    	document.querySelector('div.search_result').innerHTML = "";
		    }else {
		    	document.querySelector('div.subcontainer').classList.add("visually-hidden");
		    	$.ajax({
		    		data: data,
		    		type: 'POST',
		    		url: './Helpers/buscador.php',
		    		success:function (data) {
		    			document.querySelector('div.search_result').innerHTML = data;
		    		}
		    	})
		    }
		}
	</script>
	<div class="alert alert-dismissible fade show" role="alert">
		<div class="fixed-bottom">
			<div class="position-relative">
			  <div class="position-absolute bottom-0 end-0">
			  	<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
			  	<a href="https://www.paypal.com/donate/?hosted_button_id=JQMYSHQ48CMQE">
			  		<img src="https://previewengine-accl.zohoexternal.com/image/WD/nznqpf1fddf4d8be94d43a59c00351ee91276?width=2046&height=1536" width="250" alt="">
			  	</a>
			  </div>
			</div>
		</div>
	</div>
</body>
</html>