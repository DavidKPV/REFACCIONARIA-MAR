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
}

?> 

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="estilos.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>EDITAR PRODUCTO</title>
	</head>
	<body>

<!-- PARTE QUE MUESTRA TODO EL CONTENIDO DE LA CABEZA DE LA PÁGINA ************************************************-->
		<header>
			<div class="container">
				<div class="row">
					<div class="col-xs-10 col-sm-8 col-md-8">
						<br>
						<h1>REFACCIONARIA MAR</h1>
						<h6><?php echo $usuario." ten cuidado a la hora de editar";  ?></h6>
						
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

<form method="POST" enctype="multipart/form-data">
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
			    				<h3 id="wordinicio">No de unidades</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="cantidad" value="<?php echo "$cantidad"; ?>" placeholder="No de unidades..." autocomplete="off">
			    			</td>
			    			<td>
			    				<h3 id="wordinicio">Proveedor</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="proveedor" value="<?php echo "$proveedor" ?>" placeholder="Proveedor..." autocomplete="off">
			    			</td>
			    			<td>
			    				<h3 id="wordinicio">Precio del producto</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="precio" value="<?php echo "$precio"; ?>" placeholder="Precio..." autocomplete="off">
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				<h3 id="wordinicio">Descripción</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="descripcion" value="<?php echo "$descripcion"; ?>" placeholder="Descripcion..." autocomplete="off">
			    			</td>
			    			<td>
			    				<h3 id="wordinicio">Lugar de almacen</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="almacen" value="<?php echo "$almacen"; ?>" placeholder="Lugar de almacen..." autocomplete="off">
			    			</td>
			    			<td>
			    				<h3 id="wordinicio">Tipo de producto</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="tipo" value="<?php echo "$tipo"; ?>" placeholder="Accesorio o Refaccion..." autocomplete="off">
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				<h3 id="wordinicio">Nombre</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="nombre" value="<?php echo "$nombre"; ?>" placeholder="Nombre..." autocomplete="off"> 
			    			</td>
			    			<td>
			    				<h3 id="wordinicio">Nuevo Código</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="codigonew" value="<?php echo $codigo; ?>" placeholder="Nuevo Código..." autocomplete="off">
			    			</td>
			    			<td>
			    				<h3 id="wordinicio">Código Actual</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="text" name="codigonow" value="<?php echo $codigo; ?>" placeholder="No Modificar..." autocomplete="off">
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				<h3 id="wordinicio">Foto 1</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="file" name="foto">
			    			</td>
			    			<td>
			    				<h3 id="wordinicio">Foto 2</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="file" name="fotoo">
			    			</td>
			    			<td>
			    				<h3 id="wordinicio">Foto 3</h3>
			    				<input id="input" class="col-xs-11 col-sm-11 col-md-11" type="file" name="fotooo">
			    			</td>
			    			<td>
			    				<center>
						    		<button type="submit" class="btn btn-primary" name="editar">Editar</button>
						    	</center>
			    			</td>
			    		</tr>
			    </table>
</form>

<?php
	if(isset($_POST['editar'])){

		$codigonew=$_POST['codigonew'];
		$codigonow=$_POST['codigonow'];
		$cantidad=$_POST['cantidad'];
		$proveedor=$_POST['proveedor'];
		$precio=$_POST['precio'];
		$almacen=$_POST['almacen'];
		$tipo=$_POST['tipo'];
		$nombre=$_POST['nombre'];
		$descripcion=$_POST['descripcion'];
		//$foto=$_FILES['foto'];
		//$fotoo=$_FILES['fotoo'];
		//Obtencion de nombre y ruta de la foto1		
		$foto=$_FILES['foto']['name'];
		$ruta=$_FILES['foto']['tmp_name'];
		//Creacion de los destinos de las fotos
						$destino_foto="fotos_productos/".$foto;

		//Obtencion de nombre y ruta de la foto2
		$fotoo=$_FILES['fotoo']['name'];
		$rutaa=$_FILES['fotoo']['tmp_name'];
		//Creacion de los destinos de las fotos
						$destino_fotoo="fotos_productos/".$fotoo;

		//Obtencion de nombre y ruta de la foto3
		$fotooo=$_FILES['fotooo']['name'];
		$rutaaa=$_FILES['fotooo']['tmp_name'];
		echo $rutaaa;
		//Creacion de los destinos de las fotos
						$destino_fotooo="fotos_productos/".$fotooo;


		if(
			$codigonew=="" ||
			$codigonow=="" ||
			$cantidad=="" ||
			$proveedor=="" ||
			$precio=="" ||
			$almacen=="" ||
			$tipo=="" ||
			$nombre=="" ||
			$descripcion==""
		){
			?>
				<script>
					alert("Debes de intoducir el código primero, después darle en continuar para posteriormente editar los campos necesario y finalizar dandole en editar");
				</script>
			<?php
		}
		else{
			if($foto==null && $fotoo==null && $fotooo==null){
				$editar=("UPDATE productos SET codigo='$codigonew', cantidad='$cantidad', proveedor='$proveedor', precio='$precio', lugar_almacen='$almacen', tipo_producto='$tipo', id_login='$id_user', nombre_producto='$nombre', descripcion_producto='$descripcion' where codigo='$codigonow'");										
				
				mysqli_query($conexion, $editar);
				?>
					<script>
						alert("PRODUCTO EDITADO CORRECTAMENTE");
					</script>
				<?php
			}
			else{
					if($foto==null){	
					}
					else{			
						//Copia de las fotos a una ruta exacta
						copy($ruta, $destino_foto);										
						$editar=("UPDATE productos SET codigo='$codigonew', cantidad='$cantidad', proveedor='$proveedor', precio='$precio', lugar_almacen='$almacen', tipo_producto='$tipo', id_login='$id_user', nombre_producto='$nombre', descripcion_producto='$descripcion', foto1='$destino_foto' where codigo='$codigonow'");
						mysqli_query($conexion, $editar);							
					}

					if($fotoo==null){
					}
					else{
						//Copia de las fotos a una ruta exacta
						copy($rutaa, $destino_fotoo);											
						$editar=("UPDATE productos SET codigo='$codigonew', cantidad='$cantidad', proveedor='$proveedor', precio='$precio', lugar_almacen='$almacen', tipo_producto='$tipo', id_login='$id_user', nombre_producto='$nombre',descripcion_producto='$descripcion', foto2='$destino_fotoo' where codigo='$codigonow'");					
						mysqli_query($conexion, $editar);
					}

					if($fotooo==null){
					}
					else{
						//Copia de las fotos a una ruta exacta
						copy($rutaaa, $destino_fotooo);											
						$editar=("UPDATE productos SET codigo='$codigonew', cantidad='$cantidad', proveedor='$proveedor', precio='$precio', lugar_almacen='$almacen', tipo_producto='$tipo', id_login='$id_user', nombre_producto='$nombre', descripcion_producto='$descripcion', foto3='$destino_fotooo' where codigo='$codigonow'");
						mysqli_query($conexion, $editar);
					}

					?>
						<script>
							alert("PRODUCTO EDITADO CORRECTAMENTE");
						</script>
					<?php
			}
		}
	}
?>

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