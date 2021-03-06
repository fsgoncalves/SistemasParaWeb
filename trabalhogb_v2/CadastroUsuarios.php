<?php
require_once 'Classes/Usuarios.php';
?>
<?php
session_start();
if (isset($_SESSION["login"])) { ?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro Usuarios</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div>
    <?php #cadastrar novo Usuario
    $usuario = new Usuarios();
    if(isset($_POST['cadastrar'])){
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        $usuario->setLogin($login);
        $usuario->setSenha($senha);

        if($usuario->insert()){
            echo "Usuario incluido com sucesso!";
        }
    }
    ?>
    <?php #atualizar Usuario
    if (isset($_POST['atualizar'])){
        $id        = $_POST['id'];
        $senha    = $_POST['senha'];

        $usuario->setSenha($senha);

        if($usuario->update($id)){
            echo "Usuario atualizado com sucesso!";
        }
    }
    ?>
    <?php #deletar Usuarios
    if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'){
        $id = $_GET['id'];
        if($usuario->delete($id)){
            echo "Usuario deletado com sucesso!";
        }
    }
    ?>
    <?php #atualizar Usuario
    if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){
        $id = $_GET['id'];
        $resultado = $usuario->find($id);
        ?>
        <form method="post" action="">
            <input type="text" name="login" value="<?php echo $resultado->login; ?>" placeholder="Login:">
            <input type="password" name="senha" value="<?php echo $resultado->senha; ?>" placeholder="Senha:">
            <input type="hidden" name="id" value="<?php echo $resultado->id; ?>"> <br/>
            <input type="submit" name="atualizar" value="Atualizar Usuarios">
        </form>
    <?php } else { ?>
        <form method="post" action="">
            <input class="form-control" type="text" name="login" required="true" placeholder="Login:">
            <input class="form-control" type="password" name="senha" required="true" placeholder="Senha:">
            <input type="hidden" name="id" value="">
            <br/>
            <input class="btn btn-success btn-block" type="submit" name="cadastrar" value="Cadastrar Usuarios">
        </form>
    <?php } ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Login:</th>
            <th scope="col">Senha:</th>
            <th cosplan="2">Ação:</th>
        </tr>
        </thead>
        <?php foreach ($usuario->findAll() as $key => $value) { ?>
            <tbody>
            <tr>
                <td><?php echo $value->id; ?></td>
                <td><?php echo $value->login; ?></td>
                <td><?php echo $value->senha; ?></td>
                <td>
                    <?php echo "<a class='btn btn-success' href='CadastroUsuarios.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?>
                    <?php echo "<a class='btn btn-danger' href='CadastroUsuarios.php?acao=deletar&id=" . $value->id . "'>Deletar</a>"; ?>
                </td>
				<td><a class="btn btn-warning" href="exportUsuarios_csv.php">Exportar</td>
            </tr>
            </tbody>
        <?php } ?>
    </table>
</div>
<a class="btn btn-danger" href="logout.php">Sair</a>
</body>
</html>
<?php } else {
    header("location:login.php");
} ?>
