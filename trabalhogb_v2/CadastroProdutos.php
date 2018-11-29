<?php
require_once 'Classes/Produtos.php';
?>
<?php
session_start();
if (isset($_SESSION["login"])) { ?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro Produtos</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div>
        <?php #cadastrar novo produto
            $produto = new Produtos();
            if(isset($_POST['cadastrar'])){
                $descricao = $_POST['descricao'];
                $preco     = $_POST['preco'];

                $produto->setDescricao($descricao);
                $produto->setPreco($preco);

                if($produto->insert()){
                    echo "Produto incluido com sucesso!";
                }
            }
        ?>
        <?php #atualizar produtos
            if (isset($_POST['atualizar'])){
                $id        = $_POST['id'];
                $descricao = $_POST['descricao'];
                $preco     = $_POST['preco'];

                $produto->setDescricao($descricao);
                $produto->setPreco($preco);

                if($produto->update($id)){
                    echo "Produto atualizado com sucesso!";
                }
            }
        ?>
        <?php #deletar produtos
            if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'){
                $id = $_GET['id'];
                if($produto->delete($id)){
                    echo "Produto deletado com sucesso!";
                }
            }
        ?>
        <?php #atualizar produto
        if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){
            $id = $_GET['id'];
            $resultado = $produto->find($id);
        ?>
        <form method="post" action="">
            <input type="text" name="descricao" value="<?php echo $resultado->descricao; ?>" placeholder="Descrição:">
            <input type="text" name="preco" value="<?php echo $resultado->preco; ?>" placeholder="Preço:">
            <input type="hidden" name="id" value="<?php echo $resultado->id; ?>"> <br/>
            <input type="submit" name="atualizar" value="Atualizar dados">
        </form>
        <?php } else { ?>
        <form method="post" action="">
            <input class="form-control" type="text" name="descricao" required="true" placeholder="Descrição:">
            <input class="form-control" type="text" name="preco" required="true" placeholder="Preço:">
            <input type="hidden" name="id" value="">
            <br/>
            <input class="btn btn-success btn-block" type="submit" name="cadastrar" value="Cadastrar Produtos">
        </form>
        <?php } ?>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Descricao:</th>
                <th>Preco:</th>
                <th cosplan="2">Ação:</th>
            </tr>
            </thead>
            <?php foreach ($produto->findAll() as $key => $value) { ?>
                <tbody>
                <tr>
                    <td><?php echo $value->id; ?></td>
                    <td><?php echo $value->descricao; ?></td>
                    <td><?php echo $value->preco; ?></td>
                    <td>
                        <?php echo "<a class='btn btn-success' href='CadastroProdutos.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?>
                        <?php echo "<a class='btn btn-danger' href='CadastroProdutos.php?acao=deletar&id=" . $value->id . "'>Deletar</a>"; ?>
                    </td>
					<td><a class="btn btn-warning" href="exportProdutos_csv.php">Exportar</td>
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
