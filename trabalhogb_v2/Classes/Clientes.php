<?php
require_once 'Crud.php';

class Clientes extends Crud{

    protected $tabela = 'cliente';
    private $nome;
    private $endereco;
    private $telefone;


    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function insert(){
        $sql  = "INSERT INTO $this->tabela (nome, endereco, telefone) VALUES (:nome, :endereco, :telefone)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':endereco', $this->endereco);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->execute();
        return $stmt;
    }

    public function update($id){
        $sql  = "UPDATE $this->tabela SET nome = :nome, endereco = :endereco, telefone = :telefone where id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':endereco', $this->endereco);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}