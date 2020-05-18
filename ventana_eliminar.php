<?php 
session_start();

if($_SESSION['autentico']!="yes"){	
	header("Location: inicio.php");
	exit();
}
else{
	if($_SESSION['id']==2){
	   header("Location: sesion.php");
	}
	$usuario=$_SESSION['nombre_usuario'];
	$id_user=$_SESSION['id_user'];

	$codigo="";
	$cantidad="";
	$proveedor="";
	$precio="";
	$almacen="";
	$tipo="";
	$nombre="";
	$descripcion="";
	$foto="";
	$fotoo="";
	$fotooo="";
}

?> 

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="estilos.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>ELIMINAR PRODUCTO</title>
	</head>
	<body>

<!-- PARTE QUE MUESTRA TODO EL CONTENIDO DE LA CABEZA DE LA PÁGINA ************************************************-->
		<header>
			<div class="container">
				<div class="row">
					<div class="col-xs-10 col-sm-8 col-md-8">
						<br>
						<h1>REFACCIONARIA MAR</h1>
						<h6><?php echo $usuario." ten cuidado a la hora de eliminar";  ?></h6>
						
					</div>

					<div class="col-xs-11 col-sm-2 col-md-2" id="caja_administrador">
						<center><img src="imagenesrefa/motob.png" width="100" heigth="100"></center>
					</div>

					<div class="col-xs-10 col-sm-2 col-md-2" id="caja_buscador">
						<center>
							<form method="GET" action="
								<?php 
								if($_SESSION['id']==2){
									echo "sesion.php";
								}else{
									echo "sesion_admin.php";
								} ?>
							">	
								<br><br>	    		    	
								<button class="btn btn-primary" type="submit" name="carrito" value="">Regresar</button>
							</form>
						</center>
					</div>
				</div>
			</div>
		</header>

		<?php
			if(isset($_POST['regresar'])){
				header("Location: sesion_admin.php");
			}
		?>

<!-- PARTE QUE MUESTRA TODO EL CONTENIDO DE LA PÁGINA ************************************************-->
		<div class="container">
			<div class="main row">
				<div class="col-xs-11 col-sm-11 col-md-11">

<form method="POST">
					<table id="" border="0">
			    		<tr>
			    			<td>
			    				<h3 id="wordinicio">Código del producto</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="cod" autocomplete="off" value="<?php if(isset($_POST['ok'])){ echo $_POST['cod'];} ?>" required placeholder="Código...">
			    			</td>
			    			<td>
			    				<button type="submit" class="btn btn-primary" name="ok">Continuar</button>
			    			</td>
			    		</tr>

<?php

	//Llamar a la conexion a la base de datos
	include("conexion.php");

	if(isset($_POST['ok'])){
		$codigo=$_POST['cod'];
		
		$resultado=mysqli_query($conexion, "SELECT * from productos where codigo='$codigo'");

		if($contenido=mysqli_fetch_array($resultado)){
			$cantidad=$contenido['cantidad'];
			$proveedor=$contenido['proveedor'];
			$precio=$contenido['precio'];
			$almacen=$contenido['lugar_almacen'];
			$tipo=$contenido['tipo_producto'];
			$nombre=$contenido['nombre_producto'];
			$descripcion=$contenido['descripcion_producto'];
			$foto=$contenido['foto1'];
			$fotoo=$contenido['foto2'];
			$fotooo=$contenido['foto3'];
		}
		else{					
			?>
				<script>
					alert("CÓDIGO DE PRODUCTO INCORRECTO");
				</script>
			<?php  	
		}
	}
?>
			    		<tr>
			    			<td>
			    				<h3 id="wordinicio">Número de unidades</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="cantidad" value="<?php echo "$cantidad"; ?>" disabled>
			    			</td>
			    			<td>
			    				<h3 id="wordinicio">Proveedor</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="proveedor" value="<?php echo "$proveedor" ?>" disabled>
			    			</td>
			    			<td>
			    				<h3 id="wordinicio">Precio del producto</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="precio" value="<?php echo "$precio"; ?>" disabled>
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				<h3 id="wordinicio">Descripción</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="descripcion" value="<?php echo "$descripcion"; ?>" disabled>
			    			</td>
			    			<td>
			    				<h3 id="wordinicio">Lugar de almacen</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="almacen" value="<?php echo "$almacen"; ?>" disabled>
			    			</td>
			    			<td>
			    				<h3 id="wordinicio">Tipo de producto</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="tipo" value="<?php echo "$tipo"; ?>" disabled>
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				<h3 id="wordinicio">Nombre</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="nombre" value="<?php echo "$nombre"; ?>" disabled> 
			    			</td>
			    			<td>
			    				<h3 id="wordinicio">Código del producto</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="codigoo" value="<?php echo $codigo; ?>" disabled>
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				<h3 id="wordinicio">Foto 1</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="foto" value="<?php echo "$foto"; ?>" disabled>
			    			</td>
			    			<td>
			    				<h3 id="wordinicio">Foto 2</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="fotoo" value="<?php echo "$fotoo"; ?>" disabled>
			    			</td>
			    			<td>
			    				<h3 id="wordinicio">Foto 3</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="fotooo" value="<?php echo "$fotooo"; ?>" disabled>
			    			</td>
			    			<td>
			    				<center>
						    		<button type="submit" class="btn btn-primary" name="borrar">Eliminar</button>
						    	</center>
			    			</td>
			    		</tr>

<?php
	if(isset($_POST['borrar'])){
				
		$codigo=$_POST['cod'];												
		
		mysqli_query($conexion, "DELETE FROM productos where codigo='$codigo'");
		?>
			<script>
				alert("PRODUCTO ELIMINADO");
			</script>
		<?php
	}
?>

			    	</table>
</form>

				</div>
			</div>	
		</div>
		<br>	

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