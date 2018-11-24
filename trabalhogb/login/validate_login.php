<?php
	include ("../Class/ClassCrud.php");

	if (isset($_POST['login'])) {
		$usuario = $_POST['usuario'];
		$senha = $_POST['senha'];

	/*	$sql = "SELECT * FROM usuario WHERE = login = :login AND senha = :senha";
		$stmt = prepare($sql);
		$stmt->execute(
			array(
				'login' => $_POST['usuario'],
				'senha' => $_POST['senha']
			)
		);*/

		$count = $stmt->rowCount();
		
		if ($count > 0) {
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