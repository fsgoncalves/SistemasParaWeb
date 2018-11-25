<?php 

require_once ("Classes/DB.php");

	function login($user, $senha){
		$conn = new PDO("mysql:host=localhost;dbname=trabalhogb","admin","admin");
		$sql = "SELECT * FROM usuario WHERE login = :user AND senha = :senha";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':user', $user);
		$stmt->bindParam(':senha', $senha);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		return $result;
	}
	

 ?>