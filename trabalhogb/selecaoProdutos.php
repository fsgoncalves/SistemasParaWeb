<?php include("includes/Header.php");
include ("{$_SERVER['DOCUMENT_ROOT']}/trabalhogb/Class/ClassCrud.php");
?>
<div class="Content">
    <table class="TabelaCrud" border="1">
        <tr>
            <td>Descricao</td>
            <td>Preço</td>
            <td>Ações</td>
        </tr>

        <!-- Estrutura de Loop -->
        <?php
        $Crud = new ClassCrud();
        $BFetch=$Crud->selectBD(
            "*",
            "produto",
            "",
            array()
        );

        while ($Fetch=$BFetch->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?php echo $Fetch['descricao']; ?></td>
                <td><?php echo $Fetch['preco']; ?></td>
                <td>
                    <a href="<?php echo "visualizarProdutos.php?id={$Fetch['id']}";?>">Visualizar</a>
                    <a href="<?php echo "cadastroProdutos.php?id={$Fetch['id']}";?>">Editar</a>
                    <a class="Deletar" href="<?php echo "Controllers/ControllerDeletarProdutos.php?id={$Fetch['id']}";?>">Deletar</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<?php include("includes/Footer.php");?>
