<?php 

$conn = new PDO("mysql:host=localhost;dbname=trabalhogb","root","");
$sql = "SELECT * FROM produto order by descricao asc";
$stmt = $conn->prepare($sql);
$stmt->execute();

	header('Content-Type: text/csv; charset=utf-8');  
	header('Content-Disposition: attachment; filename=Produtos.csv');  
	$output = fopen("C:/temp/Produtos.csv", "w");  
	fputcsv($output, array('ID', 'Descricao','Preco'));
	$result = $stmt->fetchAll();  

	foreach ($result as $fields) {
	    fputcsv($output, $fields);
	}

	fclose($output);

?>