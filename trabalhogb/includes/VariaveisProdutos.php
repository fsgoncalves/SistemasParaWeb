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

if (isset($_POST['Descricao'])){
    $Descricao=filter_input(INPUT_POST,'Descricao',FILTER_SANITIZE_SPECIAL_CHARS);
}elseif (isset($_GET['Descricao'])){
    $Descricao=filter_input(INPUT_GET,'Descricao',FILTER_SANITIZE_SPECIAL_CHARS);
}else{
    $Descricao = "";
}

if (isset($_POST['Preco'])){
    $Preco=filter_input(INPUT_POST,'Preco',FILTER_SANITIZE_SPECIAL_CHARS);
}elseif (isset($_GET['Preco'])){
    $Preco=filter_input(INPUT_GET,'Preco',FILTER_SANITIZE_SPECIAL_CHARS);
}else{
    $Preco = "";
}
?>