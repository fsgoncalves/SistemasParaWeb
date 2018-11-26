<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.18.0/jquery.validate.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fuild">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12"></div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<form id="formLogin" name="formLogin" class="form-container" method="POST" action="validate_login.php">
					<h1>Sistema - Login</h1>
					<div class="form-group">
						<label for="usuario">Usuário</label>
						<input id="usuario" class="form-control" type="text" name="usuario" placeholder="Digite seu usuário">
					</div>
					<div class="form-group">
						<label for="senha">Senha</label>
						<input id="senha" class="form-control" type="password" name="senha" placeholder="Digite sua senha">
						<br/>
					</div>
						<input type="checkbox" class="form-check-input" name="remember" value="1">
						<label class="form-check-label" for="remember">Lembrar</label>

						<input type="submit" class="btn btn-success btn-block" name="login" value="Entrar">
				</form>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function(){
			$("#formLogin").validate({
				errorClass: 'error',
				rules: {
					usuario: {
						required: true,
						equalTo: "#usuario"
					},
					senha: {
						required: true,
						equalTo: "#senha"
					}
				},
				messages: {
					usuario: {
						required: 'Preencha o nome de usuário.'
					},
					senha: {
						required: 'Preencha a sua senha.'
					}
				},
				errorElement: "div",
	        	wrapper: "div",
	        	errorPlacement: function(error, element) {
			        element.before(error);
			        offset = element.offset();
			        error.css('left', offset.left);
			        error.css('top', offset.top - element.outerHeight());
        		}
			});
		});
	</script>

</body>
</html>

<?php
	if (isset($_COOKIE['usuario']) and isset($_COOKIE['senha'])) {
		$user = $_COOKIE['usuario'];
		$pass = $_COOKIE['senha'];
		echo "<script>
			document.getElementById('usuario').value = '$user';
			document.getElementById('senha').value = '$pass';
		</script>";
	}

?>