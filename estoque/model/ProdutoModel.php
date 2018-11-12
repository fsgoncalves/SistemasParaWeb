<?php

class ProdutoModel extends Crud {

	protected $table = 'produto';

	$produto = new Produto();
	$produto = this->find($id, this->table);

	public function insert() {
		$sql = "INSERT INTO $this->table (descricao, preco) VALUES (:descricao, :preco)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":descricao", $produto->getDescricao());
		$stmt->bindParam(":preco", $produto->getPreco());
		return $stmt->execute();
	}

	public function update($idProduto) {
		$sql = "UPDATE $this->table SET descricao = :descricao, preco = :preco WHERE idProduto = :idProduto";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":descricao", $produto->getDescricao());
		$stmt->bindParam(":preco", $produto->getPreco());
		$stmt->bindParam(':idProduto', $idProduto);
		return $stmt->execute();
	}

}

?>