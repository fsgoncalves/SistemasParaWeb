<?php
require_once 'Crud.php';
    class Funcionarios extends Crud {
    protected $tabela = 'funcionario';
    private $nome;
    private $matricula;

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setMatricula($matricula){
        $this->matricula = $matricula;
    }

    public function insert(){
        $sql = "INSERT INTO $this->tabela (nome, matricula) values (:nome,:matricula)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':matricula', $this->matricula);
        $stmt->execute();
        return $stmt;
    }

    public function update($id){
        $sql = "UPDATE $this->tabela SET nome = :nome, matricula = :matricula where id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':matricula', $this->matricula);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt;
    }
}