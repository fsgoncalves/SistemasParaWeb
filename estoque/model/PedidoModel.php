<?php 

class PedidoModel extends Crud {

	protected $table = 'pedido';

	$pedido = new Pedido();
	$pedido = this->find($id, this->table);

	public function insert() {
		$sql = "INSERT INTO $this->table (produto, quantidade, valor) VALUES (:descricao, :quantidade, :valor)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":produto", $pedido->getProduto());
		$stmt->bindParam(":quantidade", $pedido->getQuantidade());
		$stmt->bindParam(":valor", $pedido->getValor());
		return $stmt->execute();
	}

	public function update($idPedido) {
		$sql = "UPDATE $this->table SET produto = :produto, quantidade = :quantidade, valor = :valor WHERE idPedido = :idPedido";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":produto", $pedido->getProduto());
		$stmt->bindParam(":quantidade", $pedido->getQuantidade());
		$stmt->bindParam(":valor", $pedido->getValor());
		$stmt->bindParam(":idPedido", $idPedido);
		return $stmt->execute();
	}

}

?>