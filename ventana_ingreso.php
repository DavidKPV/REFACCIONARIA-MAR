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
}

?> 

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="estilos.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>AÑADIR NUEVO PRODUCTO</title>
	</head>
	<body>

<!-- PARTE QUE MUESTRA TODO EL CONTENIDO DE LA CABEZA DE LA PÁGINA ************************************************-->
		<header>
			<div class="container">
				<div class="row">
					<div class="col-xs-10 col-sm-8 col-md-8">
						<br>
						<h1>REFACCIONARIA MAR</h1>
						<h6><?php echo $usuario." Llena todos los campos";  ?></h6>
						
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
				<div class="col-xs-11 col-sm-10 col-md-11">

<form method="POST" enctype="multipart/form-data">
					<table id="" border="0">
			    		<tr>
			    			<td colspan="4"><center><h3 id="wordinicio"><strong>ACCESORIOS Y REFACCIONES - AGREGAR</strong></h3></center></td>
			    		</tr>

			    		<tr>
			    			<td>
			    				<h3 id="wordinicio">Código del producto</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="cod" required placeholder="Código..." autocomplete="off">
			    			</td>
			    			<td>
			    				<h3 id="wordinicio">Número de unidades</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="cantidad" required placeholder="No de Unidades..." autocomplete="off">
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				<h3 id="wordinicio">Proveedor</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="proveedor" required placeholder="Proveedor..." autocomplete="off">
			    			</td>
			    			<td>
			    				<h3 id="wordinicio">Precio del producto</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="precio" required placeholder="Precio... (solo número)" autocomplete="off">
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				<h3 id="wordinicio">Lugar de almacen</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="almacen" required placeholder="Lugar de almacen..." autocomplete="off">
			    			</td>
			    			<td>
			    				<h3 id="wordinicio">Tipo de producto</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="tipo" required placeholder="Accesorio o refacción..." autocomplete="off">
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				<h3 id="wordinicio">Nombre del producto</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="nombre" required placeholder="Nombre..." autocomplete="off">
			    			</td>
			    			<td>
			    				<h3 id="wordinicio">Descripción del producto</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="descripcion" required placeholder="Descripción del producto..." autocomplete="off">
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				<h3 id="wordinicio">Foto 1</h3>
			    				<input id="btn-imagen" class="col-xs-11 col-sm-11 col-md-11" type="file" name="foto" required>
			    			</td>
			    			<td>
			    				<h3 id="wordinicio">Foto 2</h3>
			    				<input id="btn-imagen" class="col-xs-11 col-sm-11 col-md-11" type="file" name="fotoo" required>
			    			</td>
			    			<td>
			    				<h3 id="wordinicio">Foto 3</h3>
			    				<input id="btn-imagen" class="col-xs-11 col-sm-11 col-md-11" type="file" name="fotooo" required>
			    			</td>
			    			<td>
			    				<center>
			    					<button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
			    				</center>
			    			</td>
			    		</tr>
			    	</table>

				</div>
</form>
			</div>	
		</div>
		<br>


<?php
	if(isset($_POST['registrar'])){
		include("conexion.php");

		$codigo=$_POST['cod'];
		$cantidad=$_POST['cantidad'];
		$proveedor=$_POST['proveedor'];
		$precio=$_POST['precio'];
		$almacen=$_POST['almacen'];
		$tipo=$_POST['tipo'];
		$nombre=$_POST['nombre'];
		$descripcion=$_POST['descripcion'];
		
		//Obtencion de nombre y ruta de la foto1		
		$foto=$_FILES['foto']['name'];
		$ruta=$_FILES['foto']['tmp_name'];

		//Obtencion de nombre y ruta de la foto2
		$fotoo=$_FILES['fotoo']['name'];
		$rutaa=$_FILES['fotoo']['tmp_name'];

		//Obtencion de nombre y ruta de la foto3
		$fotooo=$_FILES['fotooo']['name'];
		$rutaaa=$_FILES['fotooo']['tmp_name'];


		//Creacion de los destinos de las fotos
		$destino_foto="fotos_productos/".$foto;
		$destino_fotoo="fotos_productos/".$fotoo;
		$destino_fotooo="fotos_productos/".$fotooo;

		//Copia de las fotos a una ruta exacta
		copy($ruta, $destino_foto);
		copy($rutaa, $destino_fotoo);
		copy($rutaaa, $destino_fotooo);
		
		$resultado=mysqli_query($conexion, "SELECT * from productos where codigo='$codigo'");

		if($contenido=mysqli_fetch_array($resultado)){
			?>
				<script>
					alert("EL PRODUCTO YA HA SIDO REGISTRADO ANTERIORMENTE");
				</script>
			<?php
		}
		else{					
			$agregar=("INSERT INTO productos (codigo, cantidad, proveedor, precio, lugar_almacen, tipo_producto, id_login, nombre_producto, descripcion_producto, foto1, foto2, foto3) VALUES ('$codigo','$cantidad', '$proveedor', '$precio', '$almacen', '$tipo', '$id_user', '$nombre', '$descripcion', '$destino_foto', '$destino_fotoo', '$destino_fotooo')");
																			
			mysqli_query($conexion, $agregar);
			?>
				<script>
					alert("REGISTRO DE PRODUCTO EXITOSO");
				</script>
			<?php  	
		}
	}
?>
		

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