<?php 
session_start();

if($_SESSION['autentico']!="yes"){	
	header("Location: inicio.php");
	exit();
}
else{
	$usuario=$_SESSION['nombre_usuario'];
	$_SESSION['carrito']=2;
	// Conexion a la base de datos
		include("conexion.php");
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="estilos.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title> REFACCIONARIA - MAR </title>
	</head>
	<body>

<!-- PARTE QUE MUESTRA TODO EL CONTENIDO DE LA CABEZA DE LA PÁGINA ************************************************-->
		<header>
			<div class="container">
				<div class="row">
					<div class="col-xs-10 col-sm-8 col-md-8">
						<br>
						<h1>REFACCIONARIA MAR</h1>
						<h6><?php echo $usuario." Aquí tienes los detalles del producto";  ?></h6>
					</div>

					<div class="col-xs-11 col-sm-2 col-md-2" id="caja_administrador">
						<center><img src="imagenesrefa/motob.png" width="100" heigth="100"></center>
					</div>

					<div class="col-xs-10 col-sm-2 col-md-2" id="caja_buscador">
							<form method="GET" action="
								<?php 
								if($_SESSION['id']==2){
									echo "sesion.php";
								}else{
									echo "sesion_admin.php";
								} ?>
							">	
								<br><br>	    		    	
								<button class="btn btn-primary" type="submit" name="carrito" value="<?php if(isset($_POST['carrito'])){ echo "add_carrito"; }else{ echo ""; } ?>">Regresar</button>
							</form>
					</div>
				</div>
			</div>
		</header>
<!-- FIN DEL CONTENIDO DE LA CABEZA DE LA PÁGINA ************************************************-->

<!-- INICIO CONTENIDO DEL CUERPO DE LA PÁGINA ************************************************-->
<?php
	if($_SESSION['id']==2){
		$codigo_pro=$_GET['ver_mas'];
	}
	else{
		$codigo_pro=$_GET['ver_mas'];
	}
	//DATO DEL PRODUCTO

	//Conexion a la base de datos...	
	include("conexion.php");		

	$resultado=mysqli_query($conexion, "SELECT * from productos where codigo='$codigo_pro'");
	while($datos=mysqli_fetch_array($resultado)){
		$codigo=$datos['codigo'];
		$cantidad=$datos['cantidad'];
		$proveedor=$datos['proveedor'];
		$precio=$datos['precio'];
		$almacen=$datos['lugar_almacen'];
		$tipo=$datos['tipo_producto'];
		$nombre=$datos['nombre_producto'];
		$descripcion=$datos['descripcion_producto'];
		$foto=$datos['foto1'];
		$fotoo=$datos['foto2'];
		$fotooo=$datos['foto3'];

		$id=$_SESSION['id'];
		$id_user=$_SESSION['id_user'];
	}
?>

<!-- TRES IMAGENES ESTÁTICAS -->

<div class="container">
<br><br>
	<div class="row">

		<div class="col-xs-11 col-sm-4 col-md-4">			
			<center><img id="img-sesion" src="<?php echo "$foto"; ?>" width="360" height="385"></center>
		</div>

		<div class="col-xs-11 col-sm-3 col-md-3">			
			<center><img id="img-sesion" src="<?php echo "$fotoo"; ?>" width="200" height="180"></center>
			<br>
			<center><img id="img-sesion" src="<?php echo "$fotooo"; ?>" width="200" height="180"></center>
		</div>

		<div class="col-xs-11 col-sm-5 col-md-5">
			<form method="POST">
				<br>
				<center><h1 id="wordinicio"><strong><em><?php echo "$nombre"; ?></em></strong></h1></center>
				<center><h4 id="wordinicio"><em><?php echo "$descripcion"; ?></em></h4></center>
				<center><h6 id="wordinicio"><strong><em>Número de existencias : <?php echo "$cantidad"; ?> unidades</em></strong></h6></center>
				<center><h1 id="wordprecio"><strong><em>MXN <?php echo "$precio"; ?></em></strong></h1><h6 id="wordprecio">5% IVA</h6></center>
				<center><h4 id="wordinicio"><em><?php echo "$tipo"; ?></em></h4></center>
				<br>
				<center><button class="btn btn-primary" type="submit" name="carrito" value="add_carrito">Agregar al carrito</button></center>
		</div>

		<?php
			if(isset($_POST['carrito'])){
				$agregar=("INSERT INTO pedidos (codigo, cantidad, proveedor, precio, lugar_almacen, tipo_producto, id_login, id_usuario, nombre_producto, descripcion_producto, foto1, foto2, foto3) VALUES ('$codigo', 1, '$proveedor', '$precio', '$almacen', '$tipo', '$id', '$id_user', '$nombre', '$descripcion', '$foto', '$fotoo', '$fotooo')");

				mysqli_query($conexion, $agregar);

				?>
					<script>
							alert("PRODUCTO AGREGADO AL CARRITO, YA PUEDES REGRESAR Y CONTINUAR");
					</script>
				<?php
			}
		?>
	</div>
<br><br>
</div>

<!-- CARRUSEL
<div class="container">
<br><br>
	
		<div class="col-xs-10 col-sm-10 col-md-10">
			<div id="carousel-1" class="carousel slide" data-ride="carousel" data-interval="false">
				 CREACIÓN DE INDICADORES
				<ol class="carousel-indicators">
					<li data-target="#carousel-1" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-1" data-slide-to="1"></li>
				</ol>

				 CONTENEDORES DE LOS SLIDES
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="<?php //echo "$foto"; ?>" class="img-responsive" alt="" width="500" height="400">
					</div>

					<div class="item">
						<img src="<?php //echo "$fotoo"; ?>" class="img-responsive" alt="" width="500" height="400">
					</div>
				</div>

				 CONTROLES 
				<a href="#carousel-1" class="left carousel-control" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Anterior</span>
				</a>

				<a href="#carousel-1" class="right carousel-control" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Siguiente</span>
				</a>

			</div>
		</div>

</div>
-->


<!-- PARTE QUE MUESTRA TODO EL CONTENIDO DEL PIE DE LA PÁGINA ************************************************-->

		<footer>
			<center>
				<div class="col-xs-8 col-sm-7 col-md-5">
					<h6> RefaccionariaMar@gmail.com</h6>
					<div class="row">
						<div class="col-xs-4 col-sm-3 col-md-3">
						</div>
						<div class="col-xs-4 col-sm-1 col-md-1">
							<center><img id="img-sesion" src="imagenesrefa/face.png" width="27" heigth="27"></center>
						</div>

						<div class="col-xs-4 col-sm-4 col-md-4">
							<h6>Refaccionaria Mar</h6>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-4 col-sm-3 col-md-3">
						</div>
						<div class="col-xs-4 col-sm-1 col-md-1">
							<center><img id="img-sesion" src="imagenesrefa/whats.png" width="34" heigth="34"></center>
						</div>

						<div class="col-xs-4 col-sm-4 col-md-4">
							<h6>55-78-32-98-83</h6>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-4 col-sm-3 col-md-3">
						</div>
						<div class="col-xs-4 col-sm-1 col-md-1">
							<center><img id="img-sesion" src="imagenesrefa/twit.png" width="34" heigth="34"></center>
						</div>

						<div class="col-xs-4 col-sm-4 col-md-4">
							<h6>@Refaccionaria Mar</h6>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-4 col-sm-3 col-md-3">
						</div>
						<div class="col-xs-4 col-sm-1 col-md-1">
							<center><img id="img-sesion" src="imagenesrefa/youtube.png" width="34" heigth="34"></center>
						</div>

						<div class="col-xs-4 col-sm-4 col-md-4">
							<h6>Refaccionaria_Mar</h6>
						</div>
					</div>
					
					<h6>Copyright © 2002-2019 - Refaccionaria Mar</h6>
				</div>
			</center>
		</footer>

		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
			
	</body>
</html>