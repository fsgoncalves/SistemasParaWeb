<?php
include ("../Includes/VariaveisProdutos.php");
include ("../Class/ClassCrud.php");

$Crud = new ClassCrud();
$IdProduto = filter_input(INPUT_GET,'id',FILTER_SANITIZE_SPECIAL_CHARS);

$Crud->deleteBD(
    "produto",
    "id=?",
    array($IdProduto)
);

echo "Dado deletado com sucesso!"

?>