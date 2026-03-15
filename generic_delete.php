<?php
include 'config/conn.php';
$id = $_GET['id'];
$page = $_GET['page'];

$deleteQuery = "DELETE FROM products where id = $id;";
$stmt = $conn->prepare($deleteQuery);
$stmt->execute();
header("Location:$page?msg=deleted");
exit(); 
 ?>