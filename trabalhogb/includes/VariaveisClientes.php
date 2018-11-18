<?php

if (isset($_POST['Id'])){
    $Id=filter_input(INPUT_POST,'Id',FILTER_SANITIZE_SPECIAL_CHARS);
}elseif (isset($_GET['Id'])){
    $Id=filter_input(INPUT_GET,'Id',FILTER_SANITIZE_SPECIAL_CHARS);
}else{
    $Id = 0;
}

if (isset($_POST['acao'])){
    $acao=filter_input(INPUT_POST,'acao',FILTER_SANITIZE_SPECIAL_CHARS);
}elseif (isset($_GET['acao'])){
    $acao=filter_input(INPUT_GET,'acao',FILTER_SANITIZE_SPECIAL_CHARS);
}else{
    $acao = "";
}

if (isset($_POST['Nome'])){
    $Nome=filter_input(INPUT_POST,'Nome',FILTER_SANITIZE_SPECIAL_CHARS);
}elseif (isset($_GET['Nome'])){
    $Nome=filter_input(INPUT_GET,'Nome',FILTER_SANITIZE_SPECIAL_CHARS);
}else{
    $Nome = "";
}

if (isset($_POST['Endereco'])){
    $Endereco=filter_input(INPUT_POST,'Endereco',FILTER_SANITIZE_SPECIAL_CHARS);
}elseif (isset($_GET['Endereco'])){
    $Endereco=filter_input(INPUT_GET,'Endereco',FILTER_SANITIZE_SPECIAL_CHARS);
}else{
    $Endereco = "";
}

if (isset($_POST['Telefone'])){
    $Telefone=filter_input(INPUT_POST,'Telefone',FILTER_SANITIZE_SPECIAL_CHARS);
}elseif (isset($_GET['Telefone'])){
    $Telefone=filter_input(INPUT_GET,'Telefone',FILTER_SANITIZE_SPECIAL_CHARS);
}else{
    $Telefone = "";
}
?>