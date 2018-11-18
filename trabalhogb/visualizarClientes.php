<?php include("includes/Header.php");
include("Class/ClassCrud.php");
?>
<div class="Content">
    <?php
    $Crud = new ClassCrud();
    $IdCliente = filter_input(INPUT_GET,'id',FILTER_SANITIZE_SPECIAL_CHARS);
    $BFetch=$Crud->selectBD(
        "*",
        "cliente",
        "where id=?",
        array($IdCliente)
    );
    $Fetch=$BFetch->fetch(PDO::FETCH_ASSOC);
    ?>
    <h2>Dados do Cliente</h2>
    <hr>
    <strong>Nome:</strong><?php echo  $Fetch['nome'];?><br>
    <strong>Endereço:</strong><?php echo  $Fetch['endereco'];?><br>
    <strong>Telefone:</strong><?php echo  $Fetch['telefone'];?>
</div>

<?php include("includes/Footer.php");?>
