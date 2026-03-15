<?php
include '../config/conn.php';

if(isset($_POST['order'])){
	// print_r($_POST);exit();
$product_id = $_POST['product_id'];
$qty = $_POST['qty'];
$customerName = $_POST['customer_name'];
$phone = $_POST['phone'];
$address = $_POST['address'];


$insertQuery = "INSERT INTO orders (product_id, qty, customer_name, phone, address) VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($insertQuery);
$stmt->execute([$product_id, $qty, $customerName, $phone, $address]);

echo "Order placed successfully!";

header("Location:index.php");
exit;
}
?>