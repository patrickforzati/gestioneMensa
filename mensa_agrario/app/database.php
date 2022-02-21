<?php 

$host = 'localhost';
$dbname = 'mensa';
$user = 'root';
$pwd = '';

try{
$pdo = new PDO(
	$config = "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
	$user,
	$pwd,
	$options = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    	PDO::ATTR_EMULATE_PREPARES   => false
	]
);
}catch(PDOException $e){
	echo $e->getMessage();
}