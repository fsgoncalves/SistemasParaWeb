<?php
include ("../Includes/VariaveisClientes.php");
include ("../Class/ClassCrud.php");

$Crud = new ClassCrud();
$IdUser = filter_input(INPUT_GET,'id',FILTER_SANITIZE_SPECIAL_CHARS);

$Crud->deleteBD(
    "cliente",
    "id=?",
    array($IdUser)
);

echo "Dado deletado com sucesso!"

?>