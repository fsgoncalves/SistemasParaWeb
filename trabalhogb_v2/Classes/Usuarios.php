<?php
require_once 'Crud.php';

class Usuarios extends Crud{

    protected $tabela = 'usuario';

    private $login;
    private $senha;

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function insert(){
        $sql = "INSERT INTO $this->tabela (login, senha) values (:login, :senha)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':login', $this->login);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->execute();
        return $stmt;
    }

    public function update($id){
        $sql = "UPDATE $this->tabela SET :senha where id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt;

    }
}