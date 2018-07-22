<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>SCRPU</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
				<form action="?c=classlogin&m=sesion" method="post">
					<div class="panel " style=" max-width: 500px; margin-left: auto; margin-right: auto; margin-bottom: auto; padding-bottom: 25px; padding-top: 250px">
						<div class="panel-heading">
							<div class="panel-title">
								<center>
									<h3><strong>Iniciar Sesión</strong></h3> 
								</center>
							</div>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<div class="input-group">
									<!--<div class="col-lg-5">
										
									</div>-->
									<label for="usuario" class="control-label input-group-addon">Usuario</label>
									<input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
									<!--<label for="usuario" class="control-label input-group-addon">Usuario</label>
									<input type="text" style="max-width:500px;margin-left:auto;margin-right:auto;" name="usuario" id="usuario" class="form-control" placeholder="Usuario">-->
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<!--<div class="col-lg-5">
										
									</div>-->
									<label for="clave" class="control-label input-group-addon">Contraseña</label>
									<input type="password" name="clave" id="clave" class="form-control" placeholder="Contraseña">
									<!--<label for="clave" class="control-label input-group-addon">Contraseña</label>
									<input type="password" name="clave" id="clave" class="form-control" placeholder="Contraseña">-->
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<input type="submit" name="submit" id="submit" class="btn btn-success btn-block" value="Iniciar">

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<footer>
	    <div class="container-fluid">
	        <div class="text-center">
	          <small>Derechos Reservados Planificación Urbana 2018</small>
	        </div>
	    </div>
	</footer>
	<script src="assets/bootstrap/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>