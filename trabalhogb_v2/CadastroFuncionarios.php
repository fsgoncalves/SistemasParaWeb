<?php
require_once 'Classes/Funcionarios.php';
?>
<?php 
session_start();
if (isset($_SESSION["login"])) { ?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro Funcionarios</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div>
    <?php #cadastrar novo funcionario
    $funcionario = new Funcionarios();
    if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $matricula     = $_POST['matricula'];

        $funcionario->setNome($nome);
        $funcionario->setMatricula($matricula);

        if($funcionario->insert()){
            echo "Funcionario incluido com sucesso!";
        }
    }
    ?>
    <?php #atualizar funcionario
    if (isset($_POST['atualizar'])){
        $id        = $_POST['id'];
        $nome = $_POST['nome'];
        $matricula    = $_POST['matricula'];

        $funcionario->setNome($nome);
        $funcionario->setMatricula($matricula);

        if($funcionario->update($id)){
            echo "Funcionario atualizado com sucesso!";
        }
    }
    ?>
    <?php #deletar produtos
    if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'){
        $id = $_GET['id'];
        if($funcionario->delete($id)){
            echo "Funcionario deletado com sucesso!";
        }
    }
    ?>
    <?php #atualizar produto
    if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){
        $id = $_GET['id'];
        $resultado = $funcionario->find($id);
        ?>
        <form method="post" action="">
            <input type="text" name="nome" value="<?php echo $resultado->nome; ?>" placeholder="Nome:">
            <input type="text" name="matricula" value="<?php echo $resultado->matricula; ?>" placeholder="Matricula:">
            <input type="hidden" name="id" value="<?php echo $resultado->id; ?>"> <br/>
            <input type="submit" name="atualizar" value="Atualizar Funcionarios">
        </form>
    <?php } else { ?>
        <form method="post" action="">
            <input class="form-control" type="text" name="nome" required="true" placeholder="Nome:">
            <input class="form-control" type="text" name="matricula" required="true" placeholder="Matricula:">
            <input type="hidden" name="id" value="">
            <br/>
            <input class="btn btn-success btn-block" type="submit" name="cadastrar" value="Cadastrar Funcionarios">
        </form>
    <?php } ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome:</th>
            <th scope="col">Matricula:</th>
            <th scope="col" cosplan="2">Ação:</th>
        </tr>
        </thead>
        <?php foreach ($funcionario->findAll() as $key => $value) { ?>
            <tbody>
            <tr>
                <td><?php echo $value->id; ?></td>
                <td><?php echo $value->nome; ?></td>
                <td><?php echo $value->matricula; ?></td>
                <td>
                    <?php echo "<a class='btn btn-success' href='CadastroFuncionarios.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?>
                    <?php echo "<a class='btn btn-danger' href='CadastroFuncionarios.php?acao=deletar&id=" . $value->id . "'>Deletar</a>"; ?>
                </td>
				<td><a class="btn btn-warning" href="exportFuncionarios_csv.php">Exportar</td>
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