<?php 

require 'dbconfig.php';


$sql = "select * from usuario where login = :login and senha = :senha";
$stmt = $conn->prepare($sql);
$stmt->bindParam("login", $login);
$stmt->bindParam("senha", $senha);
$stmt->execute();

$user = $stmt->fetchObject();
$conn = null;



$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    // Method is POST
} elseif ($method == 'GET') {
    $object = new stdclass();
	$object->mensagem = "Hello World!";
	echo json_encode($object);	
} elseif ($method == 'PUT') {
    // Method is PUT
} elseif ($method == 'DELETE') {
    // Method is DELETE
} else {
    // Method unknown
}