<?php
session_start();

$orderPlaced = false;
if(isset($_POST['place_order'])){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $orderSummary = $_SESSION['cart'] ?? [];
    $orderPlaced = true;
    unset($_SESSION['cart']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Checkout</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: rgb(240, 240, 240);
    margin: 0;
    padding: 0;
}

.container {
    width: 700px;
    margin: 50px auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

h2 {
    text-align: center;
    color: rgb(33, 150, 243);
}

form input, form button {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 6px;
    border: 1px solid rgb(200,200,200);
}

button {
    background: rgb(33, 150, 243);
    color: white;
    border: none;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: rgb(30, 130, 210);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th, table td {
    border: 1px solid rgb(200,200,200);
    padding: 10px;
    text-align: center;
}

table th {
    background: rgb(33, 150, 243);
    color: white;
}
</style>
</head>
<body>
<div class="container">
<h2>Checkout</h2>

<?php if(!$orderPlaced): ?>
<form method="post">
<input type="text" name="name" placeholder="Your Name" required>
<input type="email" name="email" placeholder="Your Email" required>
<button type="submit" name="place_order">Place Order</button>
</form>
<?php else: ?>
<h3>Order Placed Successfully!</h3>
<p>Name: <?php echo $name; ?></p>
<p>Email: <?php echo $email; ?></p>

<?php if(!empty($orderSummary)): ?>
<table>
<tr>
<th>Product</th>
<th>Price</th>
<th>Quantity</th>
<th>Subtotal</th>
</tr>
<?php 
$total = 0;
foreach($orderSummary as $item):
    $subtotal = $item['price'] * $item['quantity'];
    $total += $subtotal;
?>
<tr>
<td><?php echo $item['name']; ?></td>
<td>$<?php echo number_format($item['price'],2); ?></td>
<td><?php echo $item['quantity']; ?></td>
<td>$<?php echo number_format($subtotal,2); ?></td>
</tr>
<?php endforeach; ?>
<tr>
<td colspan="3"><strong>Grand Total</strong></td>
<td><strong>$<?php echo number_format($total,2); ?></strong></td>
</tr>
</table>
<?php endif; ?>
<a href="index.php"><button>Back to Shop</button></a>
<?php endif; ?>
</div>
</body>
</html>
