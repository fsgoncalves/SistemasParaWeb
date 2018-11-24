<?php
//Remover sessão do usuário
session_start();
session_destroy();
	if (isset($_COOKIE['usuario'] and isset($_COOKIE['senha']))) {
			$user = $_COOKIE['usuario'];
			$pass = $_COOKIE['senha'];
			setcookie('user', $user, time()-1);
			setcookie('pass', $pass, time()-1);
	}
header("location:login.php");
?>