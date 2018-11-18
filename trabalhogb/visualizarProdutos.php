<?php include("includes/Header.php");
include("Class/ClassCrud.php");
?>
<div class="Content">
    <?php
    $Crud = new ClassCrud();
    $Id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_SPECIAL_CHARS);
    $BFetch=$Crud->selectBD(
        "*",
        "produto",
        "where id=?",
        array($Id)
    );
    $Fetch=$BFetch->fetch(PDO::FETCH_ASSOC);
    ?>
    <h2>Dados do Produto</h2>
    <hr>
    <strong>Descricao:</strong><?php echo  $Fetch['descricao'];?><br>
    <strong>Preço:</strong><?php echo  $Fetch['preco'];?><br>
</div>

<?php include("includes/Footer.php");?>
