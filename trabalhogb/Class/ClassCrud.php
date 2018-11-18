<?php
include ("{$_SERVER['DOCUMENT_ROOT']}/trabalhogb/Class/ClassConexao.php");

class ClassCrud extends Conexao
{
    #Atributos
    private $Crud;
    private $Contador;

    #Preparação das declarativas
    public function preparedStatements($Query , $Parametros)
    {
        $this->countParametros($Parametros);
        $this->Crud=$this->conectaDB()->prepare($Query);
        if ($this->Contador > 0)
        {
            for ($I = 1; $I <= $this->Contador; $I++)
            {
                $this->Crud->bindValue($I, $Parametros[$I - 1]);
            }
        }

        $this->Crud->execute();
    }

    #Contador de Parâmetros
    private function countParametros($Parametros)
    {
        $this->Contador=count($Parametros);
    }

    #Inserção no BD
    public  function  InsertDB($Tabela, $Condicao, $Parametros)
    {
        $this->preparedStatements("insert into {$Tabela} values ({$Condicao})", $Parametros);
        return $this->Crud;
    }

    #Seleção no BD
    public  function  selectBD($Campos,$Tabela, $Condicao, $Parametros)
    {
        $this->preparedStatements("select {$Campos} from  {$Tabela} {$Condicao}", $Parametros);
        return $this->Crud;
    }

    #Deletar no BD
    public function deleteBD($Tabela, $Condicao, $Parametros){
        $this->preparedStatements("delete from {$Tabela} where {$Condicao}", $Parametros);
        return $this->Crud;
    }

    #Atualizar no BD
    public function updateBD($Tabela, $Set, $Condicao, $Parametros){
        $this->preparedStatements("update {$Tabela} set {$Set} where {$Condicao}", $Parametros);
        return $this->Crud;
    }

}