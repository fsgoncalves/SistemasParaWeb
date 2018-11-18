<?php
include ("{$_SERVER['DOCUMENT_ROOT']}/trabalhogb/Class/ClassCrud.php");
/*Edição de Dados*/
if(isset($_GET['id'])){
    $acao="Editar";

    $Crud = new ClassCrud();
    $BFetch = $Crud->selectBD("*","produto","where id=?", array($_GET['id']));
    $Fetch = $BFetch->fetch(PDO::FETCH_ASSOC);
    $id = $Fetch['id'];
    $Descricao = $Fetch['descricao'];
    $Preco = $Fetch['preco'];
}
/*Cadastro Novo*/
else {
    $acao="Cadastrar";
    $Id=0;
    $Descricao="";
    $Preco="";
}

?>

<div class="Formulario">
    <form name="FormCadastro" id="FormCadastro" method="post" action="Controllers/ControllerCadastroProdutos.php">
        <input type="hidden" id="acao" name="acao" value="<?php echo $acao; ?>">
        <input type="hidden" id="Id" name="Id" value="<?php echo $id; ?>">
        <div class="FormularioInput">
            Descricao:<br>
            <input type="text" id="Descricao" name="Descricao" value="<?php echo $Descricao; ?>">
        </div>

        <div class="FormularioInput">
            Preço:<br>
            <input type="text" id="Preco" name="Preco" value="<?php echo $Preco; ?>">
        </div>

        <div class="FormularioInput">
            <input type="submit" value="<?php echo $acao; ?>">
        </div>
    </form>
</div>