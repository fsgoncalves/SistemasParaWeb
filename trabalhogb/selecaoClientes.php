<?php include("includes/Header.php");
include ("{$_SERVER['DOCUMENT_ROOT']}/trabalhogb/Class/ClassCrud.php");
?>
<div class="Content">
    <table class="TabelaCrud" border="1">
        <tr>
            <td>Nome</td>
            <td>Endereço</td>
            <td>Telefone</td>
            <td>Ações</td>
        </tr>

        <!-- Estrutura de Loop -->
        <?php
        $Crud = new ClassCrud();
        $BFetch=$Crud->selectBD(
            "*",
            "cliente",
            "",
            array()
        );

        while ($Fetch=$BFetch->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?php echo $Fetch['nome']; ?></td>
                <td><?php echo $Fetch['endereco']; ?></td>
                <td><?php echo $Fetch['telefone']; ?></td>
                <td>
                    <a href="<?php echo "visualizarClientes.php?id={$Fetch['id']}";?>">Visualizar</a>
                    <a href="<?php echo "cadastroClientes.php?id={$Fetch['id']}";?>">Editar</a>
                    <a class="Deletar" href="<?php echo "Controllers/ControllerDeletarClientes.php?id={$Fetch['id']}";?>">Deletar</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<?php include("includes/Footer.php");?>
