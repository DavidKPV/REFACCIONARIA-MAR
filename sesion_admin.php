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
	//Conexion a la base de datos...
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
		<title>REFACCIONARIA MAR</title>
	</head>
	<body>

<!-- PARTE QUE MUESTRA TODO EL CONTENIDO DE LA CABEZA DE LA PÁGINA ************************************************-->
		<header>
			<div class="container">
				<div class="row">
					<div class="col-xs-11 col-sm-4 col-md-5">
						<br>
						<h1>REFACCIONARIA MAR </h1>
						<h3>Bienvenid@ <?php echo $usuario; ?> (Adminisrador)</h3>
						<form method="POST">
							<button name="cerrar" id="cerrar" class="btn btn-primary" type"submit">Cerrar sesion</button>
						</form>
						<br>
					</div>

					<?php
						if(isset($_POST['cerrar'])){
							mysqli_query($conexion, "DELETE FROM pedidos");
							session_destroy();
							header("Location: inicio.php");
						}

						$ventas=0;
						$ok_carrito=$_SESSION['carrito'];
						if($ok_carrito!=1){
							$ok_carrito=$_GET['carrito'];
							$ventas=$_SESSION['con'];
							if($ok_carrito=="add_carrito"){
								$_SESSION['con']=$_SESSION['con']+1;
								$ventas=$_SESSION['con'];
							}
						}
						else{
							$ventas=$_SESSION['con'];
						}

						$compra=$_SESSION['compra'];
							if($compra!=1){
								$_SESSION['con']=$_GET['numero_depro'];
								$ventas=$_SESSION['con'];		
							}
							else{
								$ventas=$_SESSION['con'];
							}
					
					?>

					<div class="col-xs-11 col-sm-2 col-md-2" id="caja_administrador">
						<ul class="nav">
							<li><a href="">Servicios</a>
								<ul>
									<li><a href="ventana_ingreso.php">Agregar</a></li>
									<li><a href="ventana_eliminar.php">Eliminar</a></li>
									<li><a href="ventana_editar.php">Editar</a></li>
								</ul>
							</li>
							<li><a href="info_admin.php">Ventas</a></li>
						</ul>

						<br>
						<center><img src="imagenesrefa/admin.png" width="100" heigth="100"></center>
					</div>	

					<div class="col-xs-11 col-sm-2 col-md-2" id="caja_administrador">
						<br>
						<center><img src="imagenesrefa/motob.png" width="120" heigth="120"></center>
					</div>

					<div class="col-xs-11 col-sm-4 col-md-3" id="caja_buscador">
						<center>
							<h3>¿QUÉ ESTAS BUSCANDO?</h3>
								<form method="POST">		    
									<input id="barra-bus" name="browser" type="text" placeholder="Buscar..." autocomplete="off" class="col-xs-8 col-sm-8 col-md-8">
									<br><br>		    	
									<button class="btn btn-primary" type="submit" name="buscar">Buscar</button>
								</form>
						</center>
					</div>
				</div>
			</div>

			<div class="row">
				
				<div class="col-xs-10 col-sm-5 col-md-5" id="box1">
					<h1 id="wordinicio"><strong><em><center>CONOCE NUESTROS PRODUCTOS...</center></em></strong></h1>
				</div>	
				
				<div class="col-xs-10 col-sm-2 col-md-2" id="box2">
					<br>
					<center><h6 id="wordanuncio"><em>Los mejores del mercado en accesorios y refacciones para motocicletas</em></h6></center>
				</div>	
				
				<div class="col-xs-10 col-sm-3 col-md-3" id="box3">
					<br>
					<center><h6 id="wordanuncio"><strong>¡APROVECHA NUESTRAS PROMOCIONES QUE TENEMOS PARA TÍ!</strong></h6></center>
				</div>
				
				<div class="col-xs-10 col-sm-2 col-md-2" id="box4">
					<form method="GET" action="<?php if($ventas<1){$_SESSION['carrito']=1; echo ""; }else{$_SESSION['carrito']=1; echo "realizar_compra.php"; } ?>">
						<img src="imagenesrefa/carrito2.png" width="60" heigth="60">
						<input id="barra-bus" name="carrito" type="text" disabled class="col-xs-4 col-sm-4 col-md-4" value="<?php echo "$ventas"; ?>">
						<button class="btn btn-primary" name="comprar">¡Realizar compra!</button>
					</form>
				</div>			
			</div>

		</header>

<!--	CODIGO DEL BUSCADOR *********************************************************************** -->

<?php //tabla de la busqueda

    	if(isset($_POST['buscar'])){
    		$buscador=$_POST['browser'];
    		?>
    		<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
					<br>
						<center>
						<table border="1">
							<tr>
								<td colspan="9"><h6 class="wordinicio"><center><strong>PRODUCTOS ENCONTRADOS</strong></center><h6></td>
							</tr> 
						 
							<tr>
								<td><center><h6 class="wordinicio">Tipo-Producto</center><h6></td>
								<td><center><h6 class="wordinicio">Almacen</center><h6></td>
								<td><center><h6 class="wordinicio">Proveedor</center><h6></td>
								<td><center><h6 class="wordinicio">No Existencia</center><h6></td>
								<td><center><h6 class="wordinicio">Codigo</center><h6></td>
								<td><center><h6 class="wordinicio">Nombre del Producto</center><h6></td>
								<td><center><h6 class="wordinicio">Foto</center><h6></td>
								<td><center><h6 class="wordinicio">Precio</center><h6></td>
								<td><center><h6 class="wordinicio">Comprar (Detalles)</center><h6></td>
							</tr> 

							<?php

			    			$resultado=mysqli_query($conexion, "SELECT * from productos where codigo='$buscador' OR nombre_producto='$buscador'");
			    			while($datos=mysqli_fetch_array($resultado)){
			    					$codigo=$datos['codigo']; 
			    			    ?>
			    			  		<tr>
			    			  			<td><?php echo "<center><h6 id='wordinicio'><strong>".$datos['tipo_producto']."</strong></h6></center>";?></td>
			    			  			<td><?php echo "<center><h6 id='wordinicio'><strong>".$datos['lugar_almacen']."</strong></h6></center>";?></td>
			    			  			<td><?php echo "<center><h6 id='wordinicio'><strong>".$datos['proveedor']."</strong></h6></center>";?></td>
			    			  			<td><?php echo "<center><h6 id='wordinicio'><strong>".$datos['cantidad']."</strong></h6></center>";?></td>
			    			  			<td><?php echo "<center><h6 id='wordinicio'><strong>".$datos['codigo']."</strong></h6></center>";?></td>
			    			    		<td><?php echo "<center><h4 id='wordinicio'><strong>".$datos['nombre_producto']."</strong></h4><center>";?></td>	
			    						<td><center><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".'<img id="img-sesion" src="'.$datos['foto1'].'"width="150" heigth="100">';?></center></td>
			    						<td><center><?php echo "<h4 id='wordprecio'><strong>"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; MXN <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$datos['precio']."</strong></h4>";?></center></td>
			    						<td>
			    <center><form method="GET" action="ver_mas.php"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?><button type="submit" class="btn btn-primary" name="ver_mas" id="btn-vermas" value="<?php echo "$codigo"; ?>">VER MÁS</button></form></center>
			    						</td>
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
    	
   <!--   *********************************************************************************************     -->


<!-- PARTE QUE MUESTRA TODO EL CONTENIDO DE LA PÁGINA ************************************************-->

		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
				<br>
				<center>
					<table id="" border="1"> 
						<tr>
							<td><center><h6 class="wordinicio">Tipo-Producto</center><h6></td>
							<td><center><h6 class="wordinicio">Almacen</center><h6></td>
							<td><center><h6 class="wordinicio">Proveedor</center><h6></td>
							<td><center><h6 class="wordinicio">No Existencia</center><h6></td>
							<td><center><h6 class="wordinicio">Codigo</center><h6></td>
							<td><center><h6 class="wordinicio">Nombre del Producto</center><h6></td>
							<td><center><h6 class="wordinicio">Foto</center><h6></td>
							<td><center><h6 class="wordinicio">Precio</center><h6></td>
							<td><center><h6 class="wordinicio">Comprar (Detalles)</center><h6></td>
						</tr>    
			    		<?php
			    			
			    			$resultado=mysqli_query($conexion, "SELECT * from productos");
			    			while($datos=mysqli_fetch_array($resultado)){  
			    					$codigo=$datos['codigo']; 
			    			    ?>
			    			  		<tr>
			    			  			<td><?php echo "<center><h6 id='wordinicio'><strong>".$datos['tipo_producto']."</strong></h6></center>";?></td>
			    			  			<td><?php echo "<center><h6 id='wordinicio'><strong>".$datos['lugar_almacen']."</strong></h6></center>";?></td>
			    			  			<td><?php echo "<center><h6 id='wordinicio'><strong>".$datos['proveedor']."</strong></h6></center>";?></td>
			    			  			<td><?php echo "<center><h6 id='wordinicio'><strong>".$datos['cantidad']."</strong></h6></center>";?></td>
			    			  			<td><?php echo "<center><h6 id='wordinicio'><strong>".$datos['codigo']."</strong></h6></center>";?></td>
			    			    		<td><?php echo "<center><h4 id='wordinicio'><strong>".$datos['nombre_producto']."</strong></h4><center>";?></td>	
			    						<td><center><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".'<img id="img-sesion" src="'.$datos['foto1'].'"width="150" heigth="100">';?></center></td>
			    						<td><center><?php echo "<h4 id='wordprecio'><strong>"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; MXN <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$datos['precio']."</strong></h4>";?></center></td>
			    						<td>
			    <center><form method="GET" action="ver_mas.php"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?><button type="submit" class="btn btn-primary" name="ver_mas" id="btn-vermas" value="<?php echo "$codigo"; ?>">VER MÁS</button></form></center>
			    						</td>
			                  		</tr>
			                  	<?php
			    			}
			    		?>
			    	</table>
			    </center>
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