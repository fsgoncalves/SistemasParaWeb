<?php
include ("../Includes/VariaveisProdutos.php");
include ("../Class/ClassCrud.php");
$Crud = new ClassCrud();

if($acao == 'Cadastrar'){
    $Crud->InsertDB(
        "produto",
        "?,?,?",
        array(
            $Id,
            $Descricao,
            $Preco
        )
    );
    echo "Cadastro realizado com sucesso!";
} else {
    $Crud->updateBD(
        "produto",
        "descricao=?,preco=?",
        "id=?",
        array(
            $Descricao, $Preco, $Id
        )
    );

    echo "Cadastro Atualizado com sucesso!";
}



?>