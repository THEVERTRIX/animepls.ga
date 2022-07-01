<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Animeplus</title>
	<link rel="stylesheet" href="./CSS/styles-genin.css">
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
		          <a class="nav-link text-light" href="Directorio.php">Directorio</a>
		        </li>
		      </ul>
		      <div class="dis-flex">
          <a class="nav-link text-danger" href="https://discord.gg/73fEDaGwps" title="¡Unete a nuestro servidor!"><i class='bx bxl-discord-alt'></i></a>
		    </div>
		    </div>
		  </div>
		</nav>
	</header><!-- /header -->
	<?php 
	include './DB/conection.php';

	$consulta = "SELECT * FROM `Episodios` WHERE `episodio` = (SELECT MAX(`episodio`)) ORDER BY `id` DESC, `episodio` DESC, Temporada ASC";
    $consulta3 = "SELECT * FROM Animes LIMIT 24";
    
	$response = mysqli_query($conexion,$consulta);
	$response3 = mysqli_query($conexion,$consulta3);

	?>
	<section class="Ultimos-episodios">
		<div class="title">
			<h1>Ultimos Episodios</h1>
		</div>
		<div class="videos">
                <?php $css = 0; $name = ""; $cont = 0;?>
			<div class="episodio-container">
				<?php while ($data = mysqli_fetch_array($response)): ?>
				
				<?php
				$da = $data['id'];
				$consulta2 = "SELECT * FROM Animes WHERE ID = '$da'";
				$responseq = mysqli_query($conexion,$consulta2); ?>
				    <?php while ($data2 = mysqli_fetch_array($responseq)): ?>
					<?php if ($data['id'] == $css && $name == $data2['Titulo_anime']): ?>
					<?php continue; ?>
					<? elseif ($cont >= 24): ?>
					<?php break; ?>
                <?php else: ?>
                    <div class="c">
                    <div class="card-anime">
                        <div class="img-card">
                            <img src="<?php echo $data['Img_anime'] ?>">
                            <div class="icon-card">
                                <a class="d-inline-block text-truncate" style="max-width: 250px; text-decoration: none; color: white;" href="reproducir.php?id=<?php echo base64_encode($data['id']) ?>&sub_id=<?php echo base64_encode($data['episodio']) ?>"><i class="bx bx-play bx-flashing"></i></a>
                            </div>
                        </div>
                        <div class="about-ep">
                            <div><a href="anime.php?id=<?php echo base64_encode($data['id']) ?>"><?php echo $data2['Titulo_anime'] ?></a></div>
                            <div><a class="title-anime-display d-inline-block text-truncate" href="reproducir.php?id=<?php echo base64_encode($data['id']) ?>&sub_id=<?php echo base64_encode($data['episodio']) ?>&tmp=<?php echo base64_encode($data['Temporada']) ?>"><?php echo $data['Ep_nombre'] ?></a></div>
                            <div>Episodio <?php echo $data['episodio'] ?></div>
                            <div><?php echo $data['Estado'] ?></div>
                        </div>
                    </div>
                </div>
                <?php $css = $data['id']; $name = $data2['Titulo_anime']; ?>
                <?php endif ?>
				<?php endwhile ?>
				<?php endwhile ?>
			</div>

			<div class="result-episodio">
				
			</div>
		</div>
	</section>
	<section class="Ultimos-animes">
		<div class="title">
			<h1>Ultimos Animes</h1>
		</div>
		<div class="Animes">
			
			<div class="Anime-container">
				<?php while ($data3 = mysqli_fetch_array($response3)): ?>
				<div class="Anime">
					<a href="https://adf.ly/26581335/https://animepls.ga/anime?id=<?php echo base64_encode($data3['ID']) ?>">
						<div class="contenido">
							<img src="<?php echo $data3['Img_anime'] ?>">
							<div class="text-over">
								<h1><?php echo $data3['Titulo_anime'] ?></h1>
							</div>
						</div>
					</a>
				</div>
				<?php endwhile ?>
			</div>
			<div class="result-anime">
				
			</div>
		</div>
	</section>
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
	<div id="fotter"></div>
</body>
</html>