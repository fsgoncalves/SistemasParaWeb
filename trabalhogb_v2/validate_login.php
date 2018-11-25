<?php
	require_once ("Classes/DB.php");
	require_once ("validateModel.php");
	require_once ("login.php");

	if (isset($_POST['login'])) {
		$usuario = $_POST['usuario'];
		$senha = $_POST['senha'];
	
		$retorno = login($usuario, $senha);

		if ($retorno > 0) {
			if (isset($_POST['remember'])) {
				setcookie('usuario', $usuario, time()+60*60*7);
				setcookie('senha', $senha, time()+60*60*7);
			}
			session_start();
			$_SESSION["login"] = $_POST['usuario'];
			header("location:index.php");
		} else {
			$message = '<label>Usuário ou senha incorretos!</label>';
		}

	} else {
		header("location:login.php");
	}


?>