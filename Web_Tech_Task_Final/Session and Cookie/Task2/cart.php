<?php
session_start();
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$grand_total = 0;
foreach($cart as $item){
    $grand_total += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Shopping Cart</title>
<link rel="stylesheet" href="cart.css">
</head>
<body>

<div class="container">
    <h2>Your Shopping Cart</h2>

    <?php if(empty($cart)): ?>
        <p>Your cart is empty.</p>
        <a class="button" href="index.php">Continue Shopping</a>
    <?php else: ?>
        <form method="POST" action="update_cart.php">
        <table>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
            <?php foreach($cart as $index => $item): 
                $subtotal = $item['price'] * $item['quantity'];
            ?>
            <tr>
                <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                <td>$<?php echo number_format($item['price'],2); ?></td>
                <td>
                    <input type="number" name="quantities[<?php echo $index; ?>]" value="<?php echo $item['quantity']; ?>" min="1">
                </td>
                <td>$<?php echo number_format($subtotal,2); ?></td>
                <td>
                    <button type="submit" name="remove" value="<?php echo $index; ?>" class="remove">Remove</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p class="total">Grand Total: $<?php echo number_format($grand_total,2); ?></p>
        <button type="submit" name="update" class="update">Update Cart</button>
        <button type="submit" name="empty" class="remove">Empty Cart</button>
        </form>
        <a class="button" href="index.php">Continue Shopping</a>
    <?php endif; ?>
</div>

</body>
</html>
