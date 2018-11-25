<?php
require_once 'Classes/Funcionarios.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro Funcionarios</title>
    <link rel="stylesheet" href="style.css" type="text/css" href="style.css">
</head>
<body>
<div class="input-group">
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
            <input type="text" name="nome" placeholder="Nome:">
            <input type="text" name="matricula" placeholder="Matricula:">
            <input type="hidden" name="id" value="">
            <br/>
            <input type="submit" name="cadastrar" value="Cadastrar Funcionarios">
        </form>
    <?php } ?>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome:</th>
            <th>Matricula:</th>
            <th cosplan="2">Ação:</th>
        </tr>
        </thead>
        <?php foreach ($funcionario->findAll() as $key => $value) { ?>
            <tbody>
            <tr>
                <td><?php echo $value->id; ?></td>
                <td><?php echo $value->nome; ?></td>
                <td><?php echo $value->matricula; ?></td>
                <td>
                    <?php echo "<a class='editar_btn' href='CadastroFuncionarios.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?>
                    <?php echo "<a class='apagar_btn' href='CadastroFuncionarios.php?acao=deletar&id=" . $value->id . "'>Deletar</a>"; ?>
                </td>
            </tr>
            </tbody>
        <?php } ?>
    </table>
</div>
</body>
</html>
