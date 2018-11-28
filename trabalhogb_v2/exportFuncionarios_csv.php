<?php 

$conn = new PDO("mysql:host=localhost;dbname=trabalhogb","root","");
$sql = "SELECT * FROM funcionario order by nome asc";
$stmt = $conn->prepare($sql);
$stmt->execute();

	header('Content-Type: text/csv; charset=utf-8');  
	header('Content-Disposition: attachment; filename=Funcionarios.csv');  
	$output = fopen("C:/temp/Funcionarios.csv", "w");  
	fputcsv($output, array('ID', 'Nome', 'Matricula'));
	$result = $stmt->fetchAll();  

	foreach ($result as $fields) {
	    fputcsv($output, $fields);
	}

	fclose($output);

?>