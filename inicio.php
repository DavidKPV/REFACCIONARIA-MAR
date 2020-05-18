<!DOCTYPE html>
<html lang="en">
<html>
	<head>
	    <meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="estilos.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title> REFACCIONARIA - BIENVENIDO </title>
	</head>
	<body>

		<header>
			<div class="container">
				<div class="main row">
					<div class="col-xs-11 col-sm-7 col-md-7">
						<br>
						<h1>REFACCIONARIA MAR</h1>
						<h6>Los mejores del mercado en accesorios y refacciones para motocicletas</h6>
						<br>
					</div>

					<div class="col-xs-3 col-sm-2 col-md-2">
						<br>
						<h6><center><strong>¡Tenemos lo que buscas!</strong></center></h6>
					</div>

					<div class="col-xs-9 col-sm-3 col-md-3">
						<img src="imagenesrefa/motob.png" width="120" heigth="120">
					</div>
				</div>
			</div>
		</header>

	<!-- LIMPIA ERRORES SI EL CONTENIDO DE OTRA CAJA ES MUY GRANDE	<div class="clearfix visible-lg-block">
			</div>
	-->
		<br>
		<center>
			<div class="col-xs-8 col-sm-7 col-md-5" id="caja_login">
				<form method="POST">
					<br><br>
					<h1>INICIAR SESIÓN<h1>
					<input id="input" class="col-xs-8 col-sm-7 col-md-5" type="text" name="usuario" required placeholder="Usuario..." autocomplete="off">
					<br><br>
					<input id="input" class="col-xs-8 col-sm-7 col-md-5" type="password" name="pass" required placeholder="Password...">
					<br><br>
					<button class="btn btn-primary" name="iniciar_sesion" type="submit">Iniciar Sesion</button>
					<br>
					<label id="word-registro"><a href="registro.php">Registrarme</a></label>
					<br>
				</form>	
			</div>
		</center>
		
			<?php
			if (isset($_POST['iniciar_sesion'])) {
				//conexion de php a MySQL
				include("conexion.php");
						$usuario=$_POST['usuario'];
						$pass=$_POST['pass'];

						$resultado=mysqli_query($conexion, "SELECT * from login where nombre_usuario='$usuario'");

						if($contenido=mysqli_fetch_array($resultado)){

							if($contenido['password']==$pass){
								session_start();
								$_SESSION['nombre_usuario']=$usuario;
								$_SESSION['autentico']="yes";
								$_SESSION['id']=$contenido['tipo_usuario'];
								$_SESSION['id_user']=$contenido['id'];
								$_SESSION['con']=0;
								$_SESSION['carrito']=1;
								$_SESSION['compra']=1;
								$_SESSION['folio']="1";
								header("Location: sesion_admin.php");
							}
							else{
								?>
								<script>
									alert("Password Incorrecto");
								</script>
								<?php
								exit();
							}
						}
						else{
							?>
								<script>
									alert("Usuario Incorrecto");
								</script>
							<?php
							exit();
						}
			}
			?>
		
		<!-- PIE DE LA PÁGINA ********************************************************************************** -->
		
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