<?php 
session_start();

if($_SESSION['autentico']!="yes"){	
	header("Location: inicio.php");
	exit();
}
else{
	$usuario=$_SESSION['nombre_usuario'];
	
	$numero_carrito=$_SESSION['con'];
	//$arreglo_productos[$numero_carrito]=array();
	$id_user=$_SESSION['id_user'];
	// CONEXIÓN A LA BASE DE DATOS
	include("conexion.php");
}

?> 

<!DOCTYPE html>
<html lang="en">
<html>
	<head>
	    <meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="estilos.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title> COMPRA </title>
	</head>
	<body>

		<header>
			<div class="container">
				<div class="main row">
					<div class="col-xs-11 col-sm-5 col-md-5">
						<br>
						<h1>REFACCIONARIA MAR</h1>
						<h6><?php echo $usuario; ?> Finaliza tu compra llenando los siguientes datos</h6>
						<br>
					</div>

					<div class="col-xs-6 col-sm-2 col-md-2" id="caja_administrador">
						<br>
						<h6><center><strong>¡Estas a punto de adquirir tu(s) producto(s)!</strong></center></h6>
					</div>

					<div class="col-xs-6 col-sm-2 col-md-2" id="caja_administrador">
						<center><img src="imagenesrefa/motob.png" width="100" heigth="100"></center>
					</div>

					<div class="col-xs-11 col-sm-2 col-md-2" id="caja_buscador">    		    	
						<form method="GET" action="
							<?php 
							if($_SESSION['id']==2){
								echo "sesion.php";
							}else{
								echo "sesion_admin.php";
							} ?>
							">			    	
							<center>
								<br>
								<button class="btn btn-primary" type="submit" name="carrito" value="">Regresar</button>
								<h6>Número de productos</h6>
								<input id="inputchico" class="col-xs-6 col-sm-6 col-md-6" type="text" name="numero_depro" value="<?php echo $numero_carrito; ?>" disabled>
							</center>	
						</form>
					</div>
				</div>
			</div>
		</header>

	<!-- LIMPIA ERRORES SI EL CONTENIDO DE OTRA CAJA ES MUY GRANDE	<div class="clearfix visible-lg-block">
			</div>
	-->


	<!-- INICIO DEL CONTENIDO DE LA PÁGINA DE COMPRA -->

			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
					<br>
						<center>
						<table border="2">
							<tr>
								<td colspan="9"><h6 class="wordinicio"><center><strong>PRODUCTOS SELECCIONADOS</strong></center><h6></td>
							</tr> 
						 
							<tr>
								<td><center><h6 class="wordinicio">Tipo-Producto</center><h6></td>
								<td><center><h6 class="wordinicio">Cantidad</center><h6></td>
								<td><center><h6 class="wordinicio">Nombre del Producto</center><h6></td>
								<td><center><h6 class="wordinicio">Descripción</center><h6></td>
								<td><center><h6 class="wordinicio">Precio IVA ya incluido</center><h6></td>
								<td><center><h6 class="wordinicio">Foto</center><h6></td>
							</tr> 

							<?php
			    			$con=0;

			    			$resultado=mysqli_query($conexion, "SELECT * from pedidos");
			    			while($datos=mysqli_fetch_array($resultado)){
			    					$arreglo_productos[$con]=$datos['codigo']; 
			    					$con=$con+1;
			    					$precio=(($datos['precio'])*0.05)+$datos['precio'];
			    			    ?>
			    			  		<tr>
			    			  			<td><?php echo "<center><h6 id='wordinicio'><strong>".$datos['tipo_producto']."</strong></h6></center>";?></td>
			    			  			<td>
											<?php echo "<center><h6 id='wordinicio'><strong>1</strong></h6></center>";?>
			    			  			</td>

			    			  			<td><?php echo "<center><h6 id='wordinicio'><strong>".$datos['nombre_producto']."</strong></h6></center>";?></td>
			    			  			<td><?php echo "<center><h6 id='wordinicio'><strong>".$datos['descripcion_producto']."</strong></h6></center>";?></td>
			    			    		<td><?php echo "<center><h4 id='wordinicio'><strong>".$precio."</strong></h4><center>";?></td>	
			    						<td><center><?php echo '<img id="img-sesion" src="'.$datos['foto1'].'"width="100" heigth="100">';?></center></td>
			                  		</tr>
			                  	<?php
			    			}
			    		?>
		    			</table>
		    			</center>
					</div>
				</div>
			</div>

			<br><br>
			<div class="container">
			<form method="POST">
				<div class="row">
						<!-- MÉTODO DE PAGO ****************************************************************************-->
						<div class="col-xs-11 col-sm-5 col-md-5" id="caja_pago">
							<br>
							<center><h4 id="wordinicio"><strong><em>MÉTODO DE PAGO</em></strong></h4></center>
							<br>
							<div class="row">
									<div class="col-xs-6 col-sm-6 col-md-6">
										<center><h4 id="wordinicio"><em>Tipo de pago por tarjeta de...</em></h4></center>
									</div>

									<div class="col-xs-6 col-sm-6 col-md-6">
											<select name="tipo">
											   <option value="credito">Crédito</option> 
											   <option value="debito">Débito</option>
											   <option value="monedero">Monedero</option> 
											</select>
									</div>
							</div>

							<br>
							<div class="row">
									<div class="col-xs-6 col-sm-6 col-md-6">
										<center><h4 id="wordinicio"><em>Número de tarjeta...</em></h4></center>
									</div>

									<div class="col-xs-6 col-sm-6 col-md-6">
										<input id="inputchico" id="btn-imagen" class="col-xs-11 col-sm-11 col-md-11" type="text" name="numero_tar" required autocomplete="off">
									</div>
							</div>

							<br>
							<div class="row">
									<div class="col-xs-6 col-sm-6 col-md-6">
										<center><h4 id="wordinicio"><em>Nombre de tarjeta...</em></h4></center>
									</div>

									<div class="col-xs-6 col-sm-6 col-md-6">
										<input id="inputchico" id="btn-imagen" class="col-xs-11 col-sm-11 col-md-11" type="text" name="nom_tarjeta" required autocomplete="off">
									</div>
							</div>

							<br>
							<div class="row">
									<div class="col-xs-6 col-sm-6 col-md-6">
										<center><h4 id="wordinicio"><em>Fecha de expiración...</em></h4></center>
									</div>

									<div class="col-xs-2 col-sm-2 col-md-2">
									<center><h4 id="wordinicio"><em>Mes...</em></h4></center>
										<center>
											<select name="mes">
											   <option value="1">01</option> 
											   <option value="2">02</option>
											   <option value="3">03</option> 
											   <option value="4">04</option> 
											   <option value="5">05</option> 
											   <option value="6">06</option>
											   <option value="7">07</option> 
											   <option value="8">08</option>
											   <option value="9">09</option> 
											   <option value="10">10</option>
											   <option value="11">11</option> 
											   <option value="12">12</option>     
											</select>
										</center>
									</div>

									<div class="col-xs-4 col-sm-4 col-md-4">
									<center><h4 id="wordinicio"><em>Año 20...</em></h4></center>
										<center>
											<select name="anio">
											   <option value="20">20</option> 
											   <option value="21">21</option>
											   <option value="22">22</option> 
											   <option value="23">23</option> 
											   <option value="24">24</option> 
											   <option value="25">25</option>
											   <option value="26">26</option> 
											   <option value="27">27</option>
											   <option value="28">28</option> 
											   <option value="29">29</option>
											   <option value="30">30</option> 
											   <option value="31">31</option>  
											</select>
										</center>
									</div>

									<br>
									<div class="col-xs-12 col-sm-12 col-md-12">
										<center><img src="imagenesrefa/tarjeta.png" width="380" heigth="380"></center>
									</div>
							</div>
						</div>

						<!-- SEPARACIÓN DE CAJAS ****************************************************************************-->
						<div class="col-xs-11 col-sm-1 col-md-1">
						</div>
						<!-- SEPARACION DE CAJAS ****************************************************************************-->

						<!-- MÉTODO DE ENVIO ****************************************************************************-->
						<div class="col-xs-11 col-sm-6 col-md-6" id="caja_envio">
							<br>
							<center><h4 id="wordinicio"><strong><em>MÉTODO DE ENVÍO</em></strong></h4></center>
							<br>

							<br>
							<div class="row">
									<div class="col-xs-11 col-sm-6 col-md-6">
										<center><h4 id="wordinicio"><em>Envío por...</em></h4></center>
									</div>

									<div class="col-xs-11 col-sm-6 col-md-6">
											<select name="tipo_envio">
											   <option value="dhl">DHL</option> 
											   <option value="fedex">FedEx</option> 
											   <option value="estafeta">ESTAFETA</option> 
											</select>
									</div>
							</div>

							<br>
							<div class="row">
									<div class="col-xs-11 col-sm-6 col-md-6">
										<center><h4 id="wordinicio"><em>Nombre del comprador...</em></h4></center>
									</div>

									<div class="col-xs-11 col-sm-6 col-md-6">
										<input id="inputchico" id="btn-imagen" class="col-xs-11 col-sm-11 col-md-11" type="text" name="nom_com" required autocomplete="off">
									</div>
							</div>

							<br>
							<div class="row">
									<div class="col-xs-11 col-sm-6 col-md-6">
										<center><h4 id="wordinicio"><em>Dirección...</em></h4></center>
									</div>

									<div class="col-xs-11 col-sm-6 col-md-6">
										<input id="inputchico" id="btn-imagen" class="col-xs-11 col-sm-11 col-md-11" type="text" name="direccion_com" required autocomplete="off">
									</div>
							</div>

							<br>
							<div class="row">
									<div class="col-xs-11 col-sm-6 col-md-6">
										<center><h4 id="wordinicio"><em>Ciudad / Suburbio...</em></h4></center>
									</div>

									<div class="col-xs-11 col-sm-6 col-md-6">
										<input id="inputchico" id="btn-imagen" class="col-xs-11 col-sm-11 col-md-11" type="text" name="cuidad_suburbio" required autocomplete="off">
									</div>
							</div>

							<br>
							<div class="row">
									<div class="col-xs-11 col-sm-6 col-md-6">
										<center><h4 id="wordinicio"><em>Estado / Provincia...</em></h4></center>
									</div>

									<div class="col-xs-11 col-sm-6 col-md-6">
										<input id="inputchico" id="btn-imagen" class="col-xs-11 col-sm-11 col-md-11" type="text" name="estado_provincia" required autocomplete="off">
									</div>
							</div>

							<br>
							<div class="row">
									<div class="col-xs-11 col-sm-6 col-md-6">
										<center><h4 id="wordinicio"><em>Código Postal o Código ZIP...</em></h4></center>
									</div>

									<div class="col-xs-11 col-sm-6 col-md-6">
										<input id="inputchico" id="btn-imagen" class="col-xs-11 col-sm-11 col-md-11" type="text" name="codigopostal-zip" required autocomplete="off">
									</div>
							</div>

							<br>
							<div class="row">
									<div class="col-xs-11 col-sm-6 col-md-6">
										<center><h4 id="wordinicio"><em>País...</em></h4></center>
									</div>

									<div class="col-xs-11 col-sm-6 col-md-6">
										<input id="inputchico" id="btn-imagen" class="col-xs-11 col-sm-11 col-md-11" type="text" name="pais" required autocomplete="off">
									</div>
							</div>
						</div>
				</div>

				<br>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<center><button class="btn btn-primary" type="submit" name="compra_full">FINALIZAR COMPRA</button></center>
				</div>
				<br>
			</form>
			</div>
	
	<?php
		if(isset($_POST['compra_full'])){
			$folio=$_POST['mes'].$_POST['anio'].$_POST['codigopostal-zip'].$_POST['nom_com'].$_SESSION['con'].$_SESSION['id_user'];

			$_SESSION['folio']=$folio;

			$pago=$_POST['tipo'];
			$no_tarjeta=$_POST['numero_tar'];
			$nom_tarjeta=$_POST['nom_tarjeta'];
			$mes=$_POST['mes'];
			$anio=$_POST['anio'];
			$envio=$_POST['tipo_envio'];
			$nom_com=$_POST['nom_com'];
			$direccion=$_POST['direccion_com'];
			$ciudad=$_POST['cuidad_suburbio'];
			$estado=$_POST['estado_provincia'];
			$codigo_postal=$_POST['codigopostal-zip'];
			$pais=$_POST['pais'];

			$agregaruno=("INSERT INTO facturas (folio, pago_por, no_tarjeta, nombre_tarjeta, fecha_ex_mes, fecha_ex_anio, envio_por, nombre_comprador, direccion, ciudad, estado, codigo_postal, pais, id_login, finalizado) VALUES ('$folio', '$pago', '$no_tarjeta', '$nom_tarjeta', '$mes', '$anio', '$envio', '$nom_com', '$direccion', '$ciudad', '$estado', '$codigo_postal', '$pais', '$id_user', 0)");

			mysqli_query($conexion, $agregaruno) or die(mysqli_error($conexion));
			
			$resultado=mysqli_query($conexion, "SELECT * from pedidos");
			   while($datos=mysqli_fetch_array($resultado)){
				   	$codigo=$datos['codigo'];
				   	$proveedor=$datos['proveedor'];
				   	$precio=(($datos['precio'])*0.05)+$datos['precio'];
				   	$almacen=$datos['lugar_almacen'];
				   	$tipo=$datos['tipo_producto'];
				   	$id=$_SESSION['id'];
					$id_user=$_SESSION['id_user'];
					$nombre=$datos['nombre_producto'];
					$descripcion=$datos['descripcion_producto'];
					$foto=$datos['foto1'];
					$fotoo=$datos['foto2'];
					$fotooo=$datos['foto3'];

				    $agregardos=("INSERT INTO productos_factura (folio, codigo, cantidad, proveedor, precio, lugar_almacen, tipo_producto, id_login, id_usuario, nombre_producto, descripcion_producto, foto1, foto2, foto3) VALUES ('$folio','$codigo', 1, '$proveedor', '$precio', '$almacen', '$tipo', '$id', '$id_user', '$nombre', '$descripcion', '$foto', '$fotoo', '$fotooo')");

					mysqli_query($conexion, $agregardos);

					$actualizastockuno=mysqli_query($conexion, "SELECT * FROM productos where nombre_producto='$nombre'");
					while($datos=mysqli_fetch_array($actualizastockuno)){
						$newcantidad=(($datos['cantidad'])-1);
						$codigostock=$datos['codigo'];
						$editarstock=("UPDATE productos SET cantidad='$newcantidad' where codigo='$codigostock'");
						mysqli_query($conexion, $editarstock);
					}
			   }
			   
			$_SESSION['con']=0;
			$_SESSION['carrito']=1;
			
			//mysqli_query($conexion, "UPDATE pedidos SET cantidad=2")or die(mysqli_error($conexion));
			//mysqli_query($conexion, "DELETE FROM pedidos");
			?>
				<script>
					alert("GRACIAS POR TU COMPRA DESCARGA TU TICKET :D (Es indispensable en caso de reclamaciones)");
					window.location.href = "ticket.php";
				</script>
			<?php
		
		}
	?>


	<!-- INICIO DE PIE DE PÁGINA -->
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