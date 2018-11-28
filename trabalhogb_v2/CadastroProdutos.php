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
    <link rel="stylesheet" href="style.css" type="text/css" href="style.css">
</head>
<body>
    <div class="input-group">
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
            <input type="text" name="descricao" placeholder="Descrição:">
            <input type="text" name="preco" placeholder="Preço:">
            <input type="hidden" name="id" value="">
            <br/>
            <input type="submit" name="cadastrar" value="Cadastrar Produtos">
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
                        <?php echo "<a class='editar_btn' href='CadastroProdutos.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?>
                        <?php echo "<a class='apagar_btn' href='CadastroProdutos.php?acao=deletar&id=" . $value->id . "'>Deletar</a>"; ?>
                    </td>
					<td><a href="exportProdutos_csv.php">Exportar</td>
                </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</body>
</html>
<?php } else {
    header("location:login.php");
} ?>
