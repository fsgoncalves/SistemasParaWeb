<?php
//Página inicial
session_start();

if (isset($_SESSION["login"])) {
	echo '<h3>Usuário logado! '.$_SESSION["login"].'</h3>';
	echo '<br/><br/> <a href="logout.php">Sair</a>';
} else {
	header("location:login.php");
}

?>