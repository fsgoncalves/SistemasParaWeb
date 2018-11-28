<?php 

$conn = new PDO("mysql:host=localhost;dbname=trabalhogb","root","");
$sql = "SELECT * FROM usuario order by login asc";
$stmt = $conn->prepare($sql);
$stmt->execute();

	header('Content-Type: text/csv; charset=utf-8');  
	header('Content-Disposition: attachment; filename=Usuarios.csv');  
	$output = fopen("C:/temp/Usuarios.csv", "w");  
	fputcsv($output, array('ID', 'Login', 'Senha'));
	$result = $stmt->fetchAll();  

	foreach ($result as $fields) {
	    fputcsv($output, $fields);
	}

	fclose($output);

?>