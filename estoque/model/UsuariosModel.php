<?php

require_once 'Usuarios.php';
require_once 'Crud.php';

class UsuarioModel extends Crud {

	protected $table = 'usuario';

	$usuario = new Usuario();
	$usuario = this->find($id, this->table);

	public function insert() {
		$sql = "INSERT INTO $this->table (nome, senha, login, email) VALUES (:nome, :senha, :login, :email)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":nome", $usuario->getNome());
		$stmt->bindParam(":senha", $usuario->getSenha());
		$stmt->bindParam(":login", $usuario->getLogin());
		$stmt->bindParam(":email", $usuario->getEmail());
		return $stmt->execute();
	}

	public function update($id) {
		$sql = "UPDATE $this->table SET nome = :nome, senha = :senha, login = :login, email = :email WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":nome", $usuario->getNome());
		$stmt->bindParam(":senha", $usuario->getSenha());
		$stmt->bindParam(":login", $usuario->getLogin());
		$stmt->bindParam(":email", $usuario->getEmail());
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
	}

}

?>