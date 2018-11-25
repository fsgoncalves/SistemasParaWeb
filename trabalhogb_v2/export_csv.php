<?php 

$conn = new PDO("mysql:host=localhost;dbname=trabalhogb","admin","admin");
$sql = "SELECT * FROM cliente order by nome asc";
$stmt = $conn->prepare($sql);
$stmt->execute();

	header('Content-Type: text/csv; charset=utf-8');  
	header('Content-Disposition: attachment; filename=data.csv');  
	$output = fopen("/opt/lampp/htdocs/ftec/trabalhogb/data.csv", "w");  
	fputcsv($output, array('ID', 'Nome', 'Endereco', 'Telefone'));
	$result = $stmt->fetchAll();  

	foreach ($result as $fields) {
	    fputcsv($output, $fields);
	}

	fclose($output);

?>