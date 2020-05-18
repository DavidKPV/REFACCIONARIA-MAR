<?php 

session_start();

if($_SESSION['autentico']!="yes"){	
	header("Location: inicio.php");
}
else{
	$folio=$_SESSION['folio'];
	
	if($folio=="1"){
		if($_SESSION['id']==2){
			header("Location: sesion.php");
		}
		else{
			header("Location: sesion_admin.php");
		} 
	}
	
}

$total=0;

include("conexion.php");
$folio=$_SESSION['folio'];

$factura=("SELECT * FROM facturas where folio='$folio'");
$productos_fac=("SELECT * FROM productos_factura where folio='$folio'");		

?> 

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="estilos.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title> ¡GRACIAS POR TU COMPRA! </title>
	</head>
	<body>

<!-- CUERPO DE LA PÁGINA ************************************************ -->
<div>

<img src="imagenesrefa/motob.png" width="100" heigth="100">
<h3 id="wordinicio"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TICKET DE COMPRA" ?></h3>
<h4><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REFACCIONARIA MAR";?></h4>
<h5><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TEL : (55) 78329883"; ?></h5>

<br>

<h5><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INFO DEL COMPRADOR"; ?></h5>

<table border="1">
	<tr>
		<td><h5>Folio</h5></td>
		<td><h5>Pago por</h5></td>
		<td><h5>No Tarjeta</h5></td>
		<td><h5>Nombre Tarjeta</h5></td>
	</tr>

<?php
	$resultado=mysqli_query($conexion, $factura);
		
	while($datos=mysqli_fetch_array($resultado)){
?>
	<tr>
  		<td><?php echo "<h5>".$datos['folio']."</h5>";?></td>
  		<td><?php echo "<h5>".$datos['pago_por']."</h5>";?></td>
  		<td><?php echo "<h5>".$datos['no_tarjeta']."</h5>";?></td>
  		<td><?php echo "<h5>".$datos['nombre_tarjeta']."</h5>";?></td>
  	</tr>
<?php
	}
?>
	<tr>
		<td colspan="4"></td>
	</tr> 
	<tr>
		<td><h5>Envio por</h5></td>
		<td><h5>Nombre del Comprador</h5></td>
		<td><h5>Dirección</h5></td>
		<td><h5>Ciudad</h5></td>
	</tr>
<?php
	$resultado=mysqli_query($conexion, $factura);
		
	while($datos=mysqli_fetch_array($resultado)){
?>
	<tr>
  		<td><?php echo "<h5>".$datos['envio_por']."</h5>";?></td>
    	<td><?php echo "<h5>".$datos['nombre_comprador']."</h5>";?></td>	
		<td><?php echo "<h5>".$datos['direccion']."</h5>";?></td>
		<td><?php echo "<h5>".$datos['ciudad']."</h5>";?></td>
  	</tr>
<?php
	}
?>
</table>

<br><br>

<h5><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PRODUCTOS"; ?></h5>

<table border="1">
	<tr>
		<td><h5>Codigo</h5></td>
		<td><h5>Cantidad</h5></td>
		<td><h5>Precio (MXN)</h5></td>
		<td><h5>Tipo de producto</h5></td>
		<td><h5>Nombre del producto</h5></td>
	</tr> 
<?php
	$resultado=mysqli_query($conexion, $productos_fac);
		
	while($datos=mysqli_fetch_array($resultado)){
?>
	<tr>
  		<td><?php echo "<h5>".$datos['codigo']."</h5>";?></td>
  		<td><?php echo "<h5>".$datos['cantidad']."</h5>";?></td>
 		<td><?php echo "<h5>".$datos['precio']."</h5>";
 			$total += $datos['precio'];
 			mysqli_query($conexion, "UPDATE facturas SET total='$total' where folio='$folio'");
 		?></td>
  		<td><?php echo "<h5>".$datos['tipo_producto']."</h5>";?></td>
  		<td><?php echo "<h5>".$datos['nombre_producto']."</h5>";?></td>	
	</tr>
<?php
	}
?>
	<tr>
		<td colspan="5"></td>
	</tr>


	<tr>
		<td colspan="5"><h5>Descripción de los Productos</h5></td>
	</tr>
<?php
	$resultado=mysqli_query($conexion, $productos_fac);
		
	while($datos=mysqli_fetch_array($resultado)){
?>
	<tr>
    	<td colspan="5"><?php echo "<h5>".$datos['descripcion_producto']."</h5>";?></td>	
	</tr>
<?php
	}
?>
</table>

<br><br><br><br><br><br>
<h1><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TOTAL";?></h1>

<h2><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$ $total MXN";?></h2>

<h5><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RefaccionariaMar@gmail.com";?></h5>
<h5><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dudas o Aclaraciones comunicarse por medio del número de teléfono o por el correo electrónico";?></h5>
<h5><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Para ello es indispensable que cuentes con este ticket";?></h5>

</div>

<!-- FIN DEL CUERPO DE LA PÁGINA ************************************************ -->
		
	</body>
</html>