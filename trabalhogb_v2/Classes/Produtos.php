<?php
require_once 'Crud.php';

class Produtos extends Crud{
    protected $tabela = 'produto';

    private $descricao;
    private $preco;

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function setPreco($preco){
        $this->preco = $preco;
    }

    public function insert(){
        $sql = "INSERT INTO $this->tabela (descricao, preco) VALUES (:descricao, :preco)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':preco', $this->preco);
        $stmt->execute();
        return $stmt;
    }

    public function update($id){
        $sql = "UPDATE $this->tabela SET descricao = :descricao, preco = :preco WHERE id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':preco', $this->preco);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt;
    }

}