<?php

class ClienteModel extends Crud {

	protected $table = 'cliente';

	$cliente = new Cliente();
	$cliente = this->find($id, this->table);

	public function insert() {
		$sql = "INSERT INTO $this->table (nome, endereco, telefone) VALUES (:nome, :endereco, :telefone)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":nome", $cliente->getNome());
		$stmt->bindParam(":endereco", $cliente->getEndereco());
		$stmt->bindParam(":telefone", $cliente->getTelefone());
		return $stmt->execute();
	}

	public function update($id) {
		$sql = "UPDATE $this->table SET nome = :nome, endereco = :endereco, telefone = :telefone WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":nome", $cliente->getNome());
		$stmt->bindParam(":endereco", $cliente->getEndereco());
		$stmt->bindParam(":telefone", $cliente->getTelefone());
		$stmt->bindParam(":id", $id);
		return $stmt->execute();
	}
}

?>