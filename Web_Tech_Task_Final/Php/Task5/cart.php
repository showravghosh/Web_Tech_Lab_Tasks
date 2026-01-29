<?php
session_start();

// Remove item
if(isset($_GET['remove'])){
    $id = (int)$_GET['remove'];
    unset($_SESSION['cart'][$id]);
    header("Location: cart.php");
    exit();
}

// Update quantities
if(isset($_POST['update'])){
    foreach($_POST['quantity'] as $id => $qty){
        $id = (int)$id;
        $qty = (int)$qty;
        if($qty <= 0){
            unset($_SESSION['cart'][$id]);
        } else {
            $_SESSION['cart'][$id]['quantity'] = $qty;
        }
    }
    header("Location: cart.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Shopping Cart</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: rgb(240, 240, 240);
    margin: 0;
    padding: 0;
}

.container {
    width: 800px;
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

nav {
    text-align: center;
    margin-bottom: 20px;
}

nav a {
    margin: 0 15px;
    text-decoration: none;
    color: rgb(33, 150, 243);
    font-weight: bold;
}

nav a:hover {
    color: rgb(30, 130, 210);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
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

input[type=number] {
    width: 60px;
    padding: 5px;
    text-align: center;
}

button {
    padding: 6px 10px;
    background: rgb(33, 150, 243);
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: rgb(30, 130, 210);
}
</style>
</head>
<body>
<div class="container">
<h2>Your Cart</h2>
<nav>
<a href="index.php">Continue Shopping</a>
<a href="checkout.php">Checkout</a>
</nav>

<?php if(!empty($_SESSION['cart'])): ?>
<form method="post">
<table>
<tr>
<th>Product</th>
<th>Price</th>
<th>Quantity</th>
<th>Subtotal</th>
<th>Remove</th>
</tr>
<?php 
$grandTotal = 0;
foreach($_SESSION['cart'] as $id => $item):
    $subtotal = $item['price'] * $item['quantity'];
    $grandTotal += $subtotal;
?>
<tr>
<td><?php echo $item['name']; ?></td>
<td>$<?php echo number_format($item['price'],2); ?></td>
<td><input type="number" name="quantity[<?php echo $id; ?>]" value="<?php echo $item['quantity']; ?>" min="0"></td>
<td>$<?php echo number_format($subtotal,2); ?></td>
<td><a href="cart.php?remove=<?php echo $id; ?>"><button type="button">Remove</button></a></td>
</tr>
<?php endforeach; ?>
<tr>
<td colspan="3"><strong>Grand Total</strong></td>
<td colspan="2"><strong>$<?php echo number_format($grandTotal,2); ?></strong></td>
</tr>
</table>
<button type="submit" name="update">Update Cart</button>
</form>
<?php else: ?>
<p>Your cart is empty. <a href="index.php">Shop Now</a></p>
<?php endif; ?>
</div>
</body>
</html>
