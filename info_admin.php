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

	//$finalizado=1;
	//conexion a la base de datos
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
		<title>VENTAS</title>
	</head>
	<body>

<!-- PARTE QUE MUESTRA TODO EL CONTENIDO DE LA CABEZA DE LA PÁGINA ************************************************-->
		<header>
			<div class="container">
				<div class="row">
					<div class="col-xs-10 col-sm-8 col-md-8">
						<br>
						<h1>REFACCIONARIA MAR</h1>
						<h6><?php echo $usuario." Aquí se muestran los productos que se han vendido";  ?></h6>
						
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
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<br>
			<center><h4 id="wordinicio">PRODUCTOS VENDIDOS</h4><center>
			<center>
				<table border="1"> 
					<tr>
						<td><center><h6 class="wordinicio">Tipo-Producto</center><h6></td>
						<td><center><h6 class="wordinicio">Almacen</center><h6></td>
						<td><center><h6 class="wordinicio">Proveedor</center><h6></td>
						<td><center><h6 class="wordinicio">Cantidad</center><h6></td>
						<td><center><h6 class="wordinicio">Codigo</center><h6></td>
						<td><center><h6 class="wordinicio">Nombre del Producto</center><h6></td>
						<td><center><h6 class="wordinicio">Foto</center><h6></td>
						<td><center><h6 class="wordinicio">Precio</center><h6></td>
					</tr> 

					<?php

	    			$resultado=mysqli_query($conexion, "SELECT * from productos INNER JOIN productos_factura where productos.codigo=productos_factura.codigo");
	    			while($datos=mysqli_fetch_array($resultado)){ 
	    			    ?>
	    			  		<tr>
	    			  			<td><?php echo "<center><h6 id='wordinicio'><strong>".$datos['tipo_producto']."</strong></h6></center>";?></td>
	    			  			<td><?php echo "<center><h6 id='wordinicio'><strong>".$datos['lugar_almacen']."</strong></h6></center>";?></td>
	    			  			<td><?php echo "<center><h6 id='wordinicio'><strong>".$datos['proveedor']."</strong></h6></center>";?></td>
	    			  			<td><?php echo "<center><h6 id='wordinicio'><strong>".$datos['cantidad']."</strong></h6></center>";?></td>
	    			  			<td><?php echo "<center><h6 id='wordinicio'><strong>".$datos['codigo']."</strong></h6></center>";?></td>
	    			    		<td><?php echo "<center><h4 id='wordinicio'><strong>".$datos['nombre_producto']."</strong></h4><center>";?></td>	
	    						<td><center><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".'<img id="img-sesion" src="'.$datos['foto1'].'"width="100" heigth="80">';?></center></td>
	    						<td><center><?php echo "<h4 id='wordprecio'><strong>"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; MXN <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$datos['precio']."</strong></h4>";?></center></td>
	                  		</tr>
	                  	<?php
	    			}
	    		?>
    			</table>
    		</center>
		</div>
	</div>


	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<br><br>
			<center><h4 id="wordinicio">PEDIDOS PENDIENTES</h1></center>
			<br>
			<center>
				<table border="1">
					<tr>
						<td><center><h6 class="wordinicio">Folio Factura</center><h6></td>
						<td><center><h6 class="wordinicio">Pago por</center><h6></td>
						<td><center><h6 class="wordinicio">No Tarjeta</center><h6></td>
						<td><center><h6 class="wordinicio">No Nombre Tarjeta</center><h6></td>
						<td><center><h6 class="wordinicio">Envio por</center><h6></td>
						<td><center><h6 class="wordinicio">Nombre del Comprador</center><h6></td>
						<td><center><h6 class="wordinicio">Direccion</center><h6></td>
						<td><center><h6 class="wordinicio">Ciudad</center><h6></td>
						<td><center><h6 class="wordinicio">Detalles del Pedido</center><h6></td>
						<td><h6 class="wordinicio"><center><strong>Finalizar pendiente</strong></center></h6></td>
					</tr> 

					<?php

	    			$resultado=mysqli_query($conexion, "SELECT * from facturas where finalizado=0");
	    			while($datos=mysqli_fetch_array($resultado)){
	    					$folio=$datos['folio']; 
	    			    ?>
	    			  		<tr>
	    			  			<td><?php echo "<center><h6 id='wordinicio'><strong>".$datos['folio']."</strong></h6></center>";?></td>
	    			  			<td><?php echo "<center><h6 id='wordinicio'><strong>".$datos['pago_por']."</strong></h6></center>";?></td>
	    			  			<td><?php echo "<center><h6 id='wordinicio'><strong>".$datos['no_tarjeta']."</strong></h6></center>";?></td>
	    			  			<td><?php echo "<center><h6 id='wordinicio'><strong>".$datos['nombre_tarjeta']."</strong></h6></center>";?></td>
	    			  			<td><?php echo "<center><h6 id='wordinicio'><strong>".$datos['envio_por']."</strong></h6></center>";?></td>
	    			    		<td><?php echo "<center><h4 id='wordinicio'><strong>".$datos['nombre_comprador']."</strong></h4><center>";?></td>	
	    						<td><?php echo "<center><h4 id='wordinicio'><strong>".$datos['direccion']."</strong></h4><center>";?></td>
	    						<td><?php echo "<center><h4 id='wordinicio'><strong>".$datos['ciudad']."</strong></h4><center>";?></td>
	    						<td>
	    <center><form method="POST"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?><button type="submit" class="btn btn-primary" name="detalles" id="btn-vermas" value="<?php echo "$folio"; ?>">DETALLES</button></form></center>
	    						</td>
	    						<td>
	    <center><form method="POST"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?><button type="submit" class="btn btn-primary" name="finalizar" id="btn-vermas" value="<?php echo $folio; ?>">FINALIZAR</button></form></center>
	    						</td>
	                  		</tr>
	                  	<?php
	    			}
	    		?>
    			</table>
    		</center>
		</div>
	</div>
	<br>
</div>	

<?php
 if(isset($_POST['detalles'])){
 	$folio=$_POST['detalles'];
 	?>
 	<div class="container">
	 	<div class="row">
	 		<div class="col-xs-12 col-sm-12 col-md-12">
	 			<center>
				 	<table border="2">     
						<?php
							
						?>
						<tr>
							<td colspan="7"><h6 class="wordinicio"><center><strong>PRODUCTOS DE LA COMPRA</strong></center></h6></td>
						</tr> 

						<tr>
							<td><h6 class="wordinicio"><center><strong>Codigo</strong></center></h6></td>
							<td><h6 class="wordinicio"><center><strong>Cantidad</strong></center></h6></td>
							<td><h6 class="wordinicio"><center><strong>Precio (MXN)</strong></center></h6></td>
							<td><h6 class="wordinicio"><center><strong>Tipo de producto</strong></center></h6></td>
							<td><h6 class="wordinicio"><center><strong>Nombre del producto</strong></center></h6></td>
							<td><h6 class="wordinicio"><center><strong>Descripción del producto</strong></center></h6></td>
						</tr>
						<?php
						$productoscom=("SELECT * from productos_factura where folio='$folio'");	
						$resultadodos=mysqli_query($conexion, $productoscom);
						while($datos=mysqli_fetch_array($resultadodos)){
							$foliodos=$datos['folio'];  
						?>
						  	<tr>
						  		<td><?php echo "<h5>".$datos['codigo']."</h5>";?></td>
						  		<td><?php echo "<h5>".$datos['cantidad']."</h5>";?></td>
						 		<td><?php echo "<h5>".$datos['precio']."</h5>";?></td>
						  		<td><?php echo "<h5>".$datos['tipo_producto']."</h5>";?></td>
						  		<td><?php echo "<h5>".$datos['nombre_producto']."</h5>";?></td>
						  		<td><?php echo "<h5>".$datos['descripcion_producto']."</h5>";?></td>
							</tr>
							<?php
						}
						?>
					</table>
				</center>
			</div>
		</div>
	</div>
	<?php
 }
?>

<?php
	if(isset($_POST['finalizar'])){
		$folio=$_POST['finalizar'];

		mysqli_query($conexion, "UPDATE facturas SET finalizado=1 where folio='$folio'");
		mysqli_query($conexion, "UPDATE productos SET id_login='$id_user'");
		
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