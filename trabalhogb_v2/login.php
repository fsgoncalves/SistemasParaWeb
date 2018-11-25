<html>
<head>
	<title>Login</title>
</head>
<body>
	<form method="POST" action="validate_login.php">
			<label>Usuário</label>
			<input id="usuario" type="text" name="usuario">
			<br/>

			<label>Senha</label>
			<input id="senha" type="password" name="senha">
			<br/>

			<input type="checkbox" name="remember" value="1">
			<label>Lembrar</label>

			<input type="submit" name="login" value="Entrar">
	</form>
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