<?php
require_once 'Classes/Clientes.php';
?>

<?php 
session_start();
if (isset($_SESSION["login"])) { ?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Cadastro Clientes</title>
    <link rel="stylesheet" href="style.css" type="text/css" href="style.css">
</head>
<body>
    <div class="input-group">
        <?php #cadastrar novo cliente
            $cliente = new Clientes();
            if (isset($_POST['cadastrar'])){
                $nome = $_POST['nome'];
                $endereco = $_POST['endereco'];
                $telefone = $_POST['telefone'];

                $cliente->setNome($nome);
                $cliente->setEndereco($endereco);
                $cliente->setTelefone($telefone);

                if($cliente->insert()){
                    echo "Cliente inserido com sucesso!";
                }
            }
        ?>
        <?php #atualizar cliente
            if (isset($_POST['atualizar'])){
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $endereco = $_POST['endereco'];
                $telefone = $_POST['telefone'];

                $cliente->setNome($nome);
                $cliente->setEndereco($endereco);
                $cliente->setTelefone($telefone);

                if($cliente->update($id)){
                    echo "Cliente atualizado com sucesso!";
                }
            }
        ?>
        <?php
            if(isset($_POST['export'])){

                header('Content-Type: text/csv; charset=utf-8');  
                header('Content-Disposition: attachment; filename=data.csv');  
                $output = fopen("php://tmp/", "w");  
                fputcsv($output, array('ID', 'Nome', 'Endereco', 'Telefone'));
                $result = $cliente->findAll();  
                while($row = $result){  
                       fputcsv($output, $row);  
                }  
                fclose($output);

            }
        ?>

        <?php #deletar cliente
            if (isset($_GET['acao']) && $_GET['acao'] == 'deletar'):
                $id = $_GET['id'];
                if($cliente->delete($id)){
                    echo "Cliente deletado com sucesso!";
                }
            endif;
        ?>
        <?php #atualizar cliente
         if (isset($_GET['acao']) && $_GET['acao'] == 'editar'){
             $id = $_GET['id'];
             $resultado = $cliente->find($id);
         ?>
        <form method="post" action="">
            <input type="text" name="nome" value="<?php echo $resultado->nome; ?>" placeholder="Nome:">
            <input type="text" name="endereco" value="<?php echo $resultado->endereco; ?>" placeholder="Endereço:">
            <input type="text" name="telefone" value="<?php echo $resultado->telefone; ?>" placeholder="Telefone:">
            <input type="hidden" name="id" value="<?php echo $resultado->id; ?>"> <br/>
            <input type="submit" name="atualizar" value="Atualizar dados" action="CadastroClientes.php">
        </form>
        <?php } else {?>

        <form method="post" action="">
            <input type="text" name="nome" placeholder="Nome:">
            <input type="text" name="endereco" placeholder="Endereço:">
            <input type="text" name="telefone" placeholder="Telefone:">
            <input type="hidden" name="id" value="">
            <br/>
            <input type="submit" name="cadastrar" value="Cadastrar Clientes">
        </form>
        <?php } ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome:</th>
                    <th>Endereco:</th>
                    <th>Telefone:</th>
                    <th cosplan="2">Ação:</th>
                </tr>
            </thead>
            <?php foreach ($cliente->findAll() as $key => $value) { ?>
            <tbody>
                <tr>
                    <td><?php echo $value->id; ?></td>
                    <td><?php echo $value->nome; ?></td>
                    <td><?php echo $value->endereco; ?></td>
                    <td><?php echo $value->telefone; ?></td>
                    <td>
                        <?php echo "<a class='editar_btn' href='CadastroClientes.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?>
                        <?php echo "<a class='apagar_btn' href='CadastroClientes.php?acao=deletar&id=" . $value->id . "'>Deletar</a>"; ?>

                    </td>
                    <td><a href="export_csv.php">Exportar</td>
                </tr>
            </tbody>
            <?php } ?>
        </table>
    </div>
</body>
</html>


<?php } else {
    header("location:login.php");
} ?>
