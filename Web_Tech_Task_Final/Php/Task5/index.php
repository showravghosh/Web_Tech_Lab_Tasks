<?php
session_start();

$products = [
    1 => ['name'=>'Smartphone', 'price'=>499.99, 'image'=>'https://via.placeholder.com/150'],
    2 => ['name'=>'Laptop', 'price'=>899.99, 'image'=>'https://via.placeholder.com/150'],
    3 => ['name'=>'Headphones', 'price'=>79.99, 'image'=>'https://via.placeholder.com/150'],
    4 => ['name'=>'Smartwatch', 'price'=>149.99, 'image'=>'https://via.placeholder.com/150'],
    5 => ['name'=>'Camera', 'price'=>299.99, 'image'=>'https://via.placeholder.com/150'],
];

if(isset($_GET['add'])){
    $id = (int)$_GET['add'];
    if(isset($products[$id])){
        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]['quantity'] += 1;
        } else {
            $_SESSION['cart'][$id] = [
                'name'=>$products[$id]['name'],
                'price'=>$products[$id]['price'],
                'quantity'=>1
            ];
        }
    }
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Product Catalog</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: rgb(240, 240, 240);
    margin: 0;
    padding: 0;
}

.container {
    width: 1000px;
    margin: 50px auto;
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

.products {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.product {
    background: white;
    padding: 15px;
    width: 180px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    text-align: center;
}

.product img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 8px;
}

.product h3 {
    font-size: 16px;
    margin: 10px 0;
}

.product p {
    margin: 5px 0;
    color: rgb(50,50,50);
}

button {
    padding: 8px 12px;
    background: rgb(33, 150, 243);
    color: white;
    border: none;
    border-radius: 8px;
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
<h2>Product Catalog</h2>
<nav>
<a href="index.php">Home</a>
<a href="cart.php">View Cart (<?php echo isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0; ?>)</a>
</nav>

<div class="products">
<?php foreach($products as $id => $prod): ?>
<div class="product">
<img src="<?php echo $prod['image']; ?>" alt="<?php echo $prod['name']; ?>">
<h3><?php echo $prod['name']; ?></h3>
<p>Price: $<?php echo number_format($prod['price'],2); ?></p>
<a href="index.php?add=<?php echo $id; ?>"><button>Add to Cart</button></a>
</div>
<?php endforeach; ?>
</div>
</div>
</body>
</html>
