<?php
class Conexao {
    public function conectaDB(){
        try {
            $Con= new PDO("mysql:host=localhost;dbname=trabalhogb","root","");
            return $Con;
        } catch (Exception $Erro) {
            return $Erro->getMessage();
        }
    }
}