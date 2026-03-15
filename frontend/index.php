<?php
include '../config/conn.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Order System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-4">
<h2 class="text-center mb-4">Our Products</h2>

<div class="row">

<?php
$selectQuery = "SELECT * FROM products;";
$stmt = $conn->prepare($selectQuery);
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
// print_r($row);
// exit;
	echo file_exists('product_img/' . $row['image']) 
	? 'Image Found':'';

?>

<div class="col-md-3">
<div class="card mb-4" style="border:2px solid black">

<img src="../product_img/<?php echo $row['image']; ?>" class="card-img-top" height="200">

<div class="card-body text-center">

<h5><?php echo $row['name']; ?></h5>

<p>Price: <?php echo $row['price']; ?> Rs</p>

<form action="order.php" method="POST">

<input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">

<input type="number" name="qty" value="1" class="form-control mb-2">
<input type="text" name="customer_name" value="" class="form-control mb-2" placeholder="Customer Name...">
<input type="text" name="phone" value="" class="form-control mb-2" placeholder="Phone...">
<input type="text" name="address" value="" class="form-control mb-2" placeholder="Address...">

<button class="btn btn-primary w-100" name="order">
Order Now
</button>

</form>

</div>
</div>
</div>

<?php } ?>

</div>
</div>

</body>
</html>