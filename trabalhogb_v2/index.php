<?php
//Página inicial
session_start();

if (isset($_SESSION["login"])) {
	echo '<h3>Seja Bem-vindo '.$_SESSION["login"].'!</h3>';
} else {
	header("location:login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.18.0/jquery.validate.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<table class="table table-bordered">
		<tr>
			<td class="text-center"><a class="btn btn-primary" href="CadastroClientes.php">Clientes</a></td>
			<td class="text-center"><a class="btn btn-primary" href="CadastroFuncionarios.php">Funcionários</a></td>
			<td class="text-center"><a class="btn btn-primary" href="CadastroProdutos.php">Produtos</a></td>
			<td class="text-center"><a class="btn btn-primary" href="CadastroUsuarios.php">Usuários</a></td>
		</tr>
	</table>
	<a class="btn btn-danger" href="logout.php">Sair</a>
</body>
</html>