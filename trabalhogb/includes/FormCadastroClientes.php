<?php
include ("{$_SERVER['DOCUMENT_ROOT']}/trabalhogb/Class/ClassCrud.php");
/*Edição de Dados*/
if(isset($_GET['id'])){
    $acao="Editar";

    $Crud = new ClassCrud();
    $BFetch = $Crud->selectBD("*","cliente","where id=?", array($_GET['id']));
    $Fetch = $BFetch->fetch(PDO::FETCH_ASSOC);
    $Id = $Fetch['id'];
    $Nome = $Fetch['nome'];
    $Endereco = $Fetch['endereco'];
    $Telefone = $Fetch['telefone'];
}
/*Cadastro Novo*/
else {
    $acao="Cadastrar";
    $Id=0;
    $Nome="";
    $Endereco="";
    $Telefone = "";
}

?>

<div class="Formulario">
    <form name="FormCadastro" id="FormCadastro" method="post" action="Controllers/ControllerCadastroClientes.php">
        <input type="hidden" id="acao" name="acao" value="<?php echo $acao; ?>">
        <input type="hidden" id="Id" name="Id" value="<?php echo $Id; ?>">
        <div class="FormularioInput">
            Nome:<br>
            <input type="text" id="Nome" name="Nome" value="<?php echo $Nome; ?>">
        </div>

        <div class="FormularioInput">
            Endereço:<br>
            <input type="text" id="Endereco" name="Endereco" value="<?php echo $Endereco; ?>">
        </div>

        <div class="FormularioInput">
            Telefone:<br>
            <input type="text" id="Telefone" name="Telefone" value="<?php echo $Telefone; ?>">
        </div>

        <div class="FormularioInput">
            <input type="submit" value="<?php echo $acao; ?>">
        </div>
    </form>
</div>