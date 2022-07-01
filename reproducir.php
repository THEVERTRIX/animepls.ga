<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Animeplus</title>
	<link rel="stylesheet" href="./CSS/styles-reprod.css">
	<link rel="icon" href="./IMG/animeplus.png">
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
		        <li class="nav-item">
		          <a class="nav-link text-light" href="Directorio.php">Directorio</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link text-danger" href="https://www.paypal.com/donate/?hosted_button_id=JQMYSHQ48CMQE">Donar | Apoyar</a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>
	</header><!-- /header -->
	<?php 
	include './DB/conection.php';
	$id = base64_decode($_GET['id']);
	$episodio = base64_decode($_GET['sub_id']);
	$temp = base64_decode($_GET['tmp']);
	$sql = "SELECT * FROM Episodios WHERE id = '$id' and episodio = '$episodio' and Temporada = $temp";
	$consulta = mysqli_query($conexion,$sql);
	$response = mysqli_fetch_array($consulta);

	?>
	<section class="Episodio">
		<div class="contenedor-ep">
			<div class="video">
				<iframe frameborder="0" src="<?php echo $response['Episode_link'] ?>" scrolling="no" allowfullscreen="yes">
				</iframe>
			</div>
			<div class="desc-ep">
				<?php 

				$sqlss = "SELECT `ID`, `Titulo_anime` FROM `Animes` WHERE ID = '$id'";
				$query_tit = mysqli_query($conexion, $sqlss);
				$title_ani = mysqli_fetch_array($query_tit); ?>
				<h6><a class="text-decoration-none text-light" href="anime.php?id=<?php echo base64_encode($title_ani['ID']) ?>"><?php echo $title_ani['Titulo_anime'] ?></a></h6>
				<h1>T<?php echo $response['Temporada'] ?> E<?php echo $response['episodio'] ?> <?php echo $response['Ep_nombre'] ?></h1>
				<p><?php echo $response['Desc_ep'] ?></p>
			</div>
		</div>
	</section>
	<section class="Episodios">
		<div class="title">
			<h1>Mas de la temporada</h1>
		</div>

		<div class="contenedor-episodios">
			    <div class="Temporadas">
			    	<?php
			    		$Temporada_sql = "SELECT Temporada_nombre FROM `Episodios` WHERE `id` = $id and Temporada = $temp";
			    		$query_t = mysqli_query($conexion, $Temporada_sql);
			    		$co = "";
			    	?>
			    	<?php while($data = mysqli_fetch_array($query_t)): ?>
			    		<?php 
			    		$temp = explode('.', $data['Temporada_nombre']);
			    		?>

			    		<?php if ($co == $data['Temporada_nombre']): ?>
			    			<?php continue; ?>
			    		<?php else: ?>
			    			<?php 

			    			$d = $data['Temporada_nombre'];
			    			$ep_sql = "SELECT * FROM `Episodios` WHERE Temporada_nombre = '$d' and `id` = $id and episodio != $episodio ORDER BY episodio ASC";
			    			$query_ep = mysqli_query($conexion, $ep_sql);

			    			?>
			    	<div class="contenedor-temporada">
			    		<div class="title-temporada">
			    			<button class="button-temporada" id="button-<?php echo $temp['0'] ?>" onclick="Show_hide('#showhide<?php echo $temp[0] ?>')"><label>Temporada <?php echo $temp[0]; ?> <?php echo $temp[1] ?></label>
			    			<i class='bx bx-down-arrow-alt'></i></button>
			    		</div>
			    		<div class="contenedor-episodios-temporada" id="showhide<?php echo $temp[0] ?>">
			    			    <?php while($data_ep = mysqli_fetch_array($query_ep)): ?>
			    			        <div class="c">
			    			        <div class="card-anime">
			    			            <div class="img-card">
			    			                <img src="<?php echo $data_ep['Img_anime'] ?>">
			    			                <div class="icon-card">
			    			                    <a class="title-anime-display d-inline-block text-truncate" style=" text-decoration: none; color: white;" href="reproducir.php?id=<?php echo base64_encode($data_ep['id']) ?>&sub_id=<?php echo base64_encode($data_ep['episodio']) ?>"><i class="bx bx-play bx-flashing"></i></a>
			    			                </div>
			    			            </div>
			    			            <div class="about-ep">
			    			                <div><a href="anime.php?id=<?php echo base64_encode($data_ep['id']) ?>"><?php echo $response['Titulo_anime'] ?></a></div>
			    			                <div><a class="title-anime-display d-inline-block text-truncate" href="reproducir.php?id=<?php echo base64_encode($data_ep['id']) ?>&sub_id=<?php echo base64_encode($data_ep['episodio']) ?>&tmp=<?php echo base64_encode($data_ep['Temporada']) ?>"><?php echo $data_ep['Ep_nombre'] ?></a></div>
			    			                <div>Episodio <?php echo $data_ep['episodio'] ?></div>
			    			                <div><?php echo $data_ep['Estado'] ?></div>
			    			            </div>
			    			        </div>
			    			    </div>
			    			<?php endwhile ?>
			    		</div>
			    	</div>
			    	<?php $co = $data['Temporada_nombre']; ?>
			    		<?php endif ?>
			    		
			    <?php endwhile ?>
			    </div>
		</div>
	</section>
	<div id="fotter"></div>
</body>
</html>