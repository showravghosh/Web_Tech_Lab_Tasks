<?php
session_start();

// Products array (can be replaced with DB later)
$products = [
    ["id"=>1,"name"=>"Laptop","price"=>800,"image"=>"images/product1.jpg"],
    ["id"=>2,"name"=>"Smartphone","price"=>500,"image"=>"images/product2.jpg"],
    ["id"=>3,"name"=>"Headphones","price"=>100,"image"=>"images/product3.jpg"],
    ["id"=>4,"name"=>"Smartwatch","price"=>150,"image"=>"images/product4.jpg"],
    ["id"=>5,"name"=>"Camera","price"=>300,"image"=>"images/product5.jpg"]
];

// Count items in cart
$cart_count = isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'],'quantity')) : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Electronics Store</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: rgb(240,242,245);
    margin: 0;
    padding: 0;
}
.header {
    background-color: rgb(76,175,80);
    color: white;
    padding: 15px;
    text-align: center;
}
.container {
    width: 90%;
    max-width: 1000px;
    margin: 20px auto;
}
.products {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}
.product {
    background: white;
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
    width: 180px;
    text-align: center;
}
.product img {
    width: 150px;
    height: 150px;
}
.product button {
    padding: 8px 10px;
    background-color: rgb(76,175,80);
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
.product button:hover {
    background-color: rgb(56,142,60);
}
.cart-link {
    display: inline-block;
    margin-top: 10px;
    padding: 8px 12px;
    background-color: rgb(33,150,243);
    color: white;
    text-decoration: none;
    border-radius: 5px;
}
</style>
</head>
<body>

<div class="header">
    <h2>Electronics Store</h2>
    <a class="cart-link" href="cart.php">Cart (<?php echo $cart_count; ?>)</a>
</div>

<div class="container">
    <div class="products">
        <?php foreach($products as $p): ?>
        <div class="product">
            <img src="<?php echo $p['image']; ?>" alt="<?php echo htmlspecialchars($p['name']); ?>">
            <h4><?php echo htmlspecialchars($p['name']); ?></h4>
            <p>$<?php echo number_format($p['price'],2); ?></p>
            <form method="POST" action="add_to_cart.php">
                <input type="hidden" name="product_id" value="<?php echo $p['id']; ?>">
                <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($p['name']); ?>">
                <input type="hidden" name="price" value="<?php echo $p['price']; ?>">
                <button type="submit">Add to Cart</button>
            </form>
        </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
