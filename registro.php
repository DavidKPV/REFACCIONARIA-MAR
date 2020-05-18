<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="estilos.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>REGISTRO</title>
	</head>
	<body>

<!-- PARTE QUE MUESTRA TODO EL CONTENIDO DE LA CABEZA DE LA PÁGINA ************************************************-->
		<header>
			<div class="container">
				<div class="row">
					<div class="col-xs-11 col-sm-8 col-md-8">
						<br>
						<h1>REFACCIONARIA - REGISTRO</h1>
						<h6>El mejor servicio y los mejores precios</h6>
						
					</div>

					<div class="col-xs-11 col-sm-2 col-md-2" id="caja_administrador">
						<center><img src="imagenesrefa/motob.png" width="100" heigth="100"></center>
					</div>	

					<div class="col-xs-11 col-sm-2 col-md-2" id="caja_buscador">
						<h6><center><strong>¡Unete a esta gran comunidad!</strong></center></h6>
						<center>
							<form action="" method="POST">	
								<br>	    		    	
								<button class="btn btn-primary" type="submit" name="regresar">Regresar</button>
							</form>
						</center>
					</div>
				</div>
			</div>
		</header>


<!-- PARTE QUE MUESTRA TODO EL CONTENIDO DE LA PÁGINA ************************************************-->

		<br>
		<center>
			<div class="container">
				
				<div class="col-xs-10 col-sm-8 col-md-8" id="caja_registro">
					<form method="POST">
						<br>
						<h4>Nombre de Usuario<h4>
							<input id="input2" class="col-xs-10 col-sm-7 col-md-5" type="text" name="usuario" required placeholder="Nombre de Usario..." autocomplete="off">
						<h4>Password (Contraseña)<h4>
							<input id="input2" class="col-xs-10 col-sm-7 col-md-5" type="password" name="pass" required placeholder="Password...">
						<h4>Repetir Password</h4>
							<input id="input2" class="col-xs-10 col-sm-7 col-md-5" type="password" name="pass2" required placeholder="Repetir Password...">
						<h4>Password Maestra (Colocar cualquier combinación)<h4>
							<input id="input2" class="col-xs-10 col-sm-7 col-md-5" type="password" name="passkey" required placeholder="ejemplo: 1qw23">
						<br><br>
						<button class="btn btn-primary" name="registrarme" type="submit">Registrarme</button>
						<br>
					</form>
				</div>
			</div>
		</center>

				<?php
					if(isset($_POST['registrarme'])){

					//conexion de php a MySQL
						include("conexion.php");

						$usuario=$_POST['usuario'];
						$pass=$_POST['pass'];
						$pass_try=$_POST['pass2'];
						$pass_key=$_POST['passkey'];

							$resultado=mysqli_query($conexion, "SELECT * from login where nombre_usuario='$usuario'");

							if($contenido=mysqli_fetch_array($resultado)){
								?>
								<script>
									alert("EL USUARIO YA HA SIDO REGISTRADO ANTERIORMENTE");
								</script>
								<?php
							}
							else{
								if($contenido['password']==$pass){
									?>
										<script>
											alert("LA CONTRASEÑA YA HA SIDO REGISTRADA ANTERIORMENTE");
										</script>
									<?php
								}
								else{
									if($pass==$pass_try){
										if($pass_key=="qazwsx"){
										
											$agregar=("INSERT INTO login (nombre_usuario, password, tipo_usuario) VALUES ('$usuario','$pass', 1)");
																			
											mysqli_query($conexion, $agregar);
											?>
												<script>
													alert("REGISTRO COMO ADMINISTRADOR EXITOSO");
												</script>
											<?php  
										}
										else{
											$agregar=("INSERT INTO login (nombre_usuario, password, tipo_usuario) VALUES ('$usuario','$pass', 2)");
																	
											mysqli_query($conexion, $agregar);
											?>
												<script>
													alert("REGISTRO EXITOSO. GRACIAS POR TU PREFERECIA");
												</script>
											<?php 
										}
									}
									else{
										?>
											<script>
												alert("LA CONTRASEÑA REPETIDA NO ES LA MISMA A LA ANTERIOR");
											</script>
										<?php
									}
								}
							}
					}


					if(isset($_POST['regresar'])){
						header("Location: inicio.php");
					}
				?>

		<!-- PIE DE PÁGINA ************************************************************************** -->

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