<?php
include ("../Includes/VariaveisClientes.php");
include ("../Class/ClassCrud.php");
$Crud = new ClassCrud();

if($acao == 'Cadastrar'){
    $Crud->InsertDB(
        "cliente",
        "?,?,?,?",
        array(
            $Id,
            $Nome,
            $Endereco,
            $Telefone
        )
    );
    echo "Cadastro realizado com sucesso!";
} else {
    $Crud->updateBD(
        "cliente",
        "Nome=?,Endereco=?,Telefone=?",
        "id=?",
        array(
            $Nome, $Endereco, $Telefone, $Id
        )
    );

    echo "Cadastro Atualizado com sucesso!";
}



?>