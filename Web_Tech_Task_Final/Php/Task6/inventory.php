<?php
// Products array
$products = [
    ['name'=>'Laptop', 'price'=>1200, 'quantity'=>5, 'category'=>'Electronics'],
    ['name'=>'Smartphone', 'price'=>800, 'quantity'=>10, 'category'=>'Electronics'],
    ['name'=>'Jeans', 'price'=>60, 'quantity'=>20, 'category'=>'Clothing'],
    ['name'=>'Shoes', 'price'=>90, 'quantity'=>15, 'category'=>'Clothing'],
    ['name'=>'Coffee Maker', 'price'=>150, 'quantity'=>8, 'category'=>'Appliances'],
];

// Discount array by category
$discounts = [
    'Electronics' => 10, // 10%
    'Clothing' => 20,    // 20%
    'Appliances' => 15   // 15%
];

// Function to calculate discounted price
function discountedPrice($price, $category, $discounts) {
    if(isset($discounts[$category])){
        return $price - ($price * $discounts[$category]/100);
    }
    return $price;
}

// Function to find most expensive product
function mostExpensiveProduct($products){
    $max = 0;
    $prodName = '';
    foreach($products as $product){
        if($product['price'] > $max){
            $max = $product['price'];
            $prodName = $product['name'];
        }
    }
    return $prodName . " ($$max)";
}

// Calculate total inventory value (after discount)
$totalValue = 0;
foreach($products as $product){
    $totalValue += discountedPrice($product['price'], $product['category'], $discounts) * $product['quantity'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Inventory Management</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: rgb(245,245,245);
    margin: 0;
    padding: 0;
}

.container {
    width: 900px;
    margin: 50px auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
}

h2 {
    text-align: center;
    color: rgb(33,150,243);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th, table td {
    border: 1px solid rgb(200,200,200);
    padding: 12px;
    text-align: center;
}

table th {
    background: rgb(33,150,243);
    color: white;
}

.highlight {
    background: rgb(255, 244, 229);
    font-weight: bold;
}

.total {
    text-align: right;
    margin-top: 15px;
    font-size: 18px;
    color: rgb(50,50,50);
}
</style>
</head>
<body>
<div class="container">
<h2>Inventory Management</h2>

<table>
<tr>
<th>Product Name</th>
<th>Category</th>
<th>Original Price ($)</th>
<th>Discounted Price ($)</th>
<th>Quantity</th>
<th>Total Value ($)</th>
</tr>
<?php foreach($products as $product): 
    $discPrice = discountedPrice($product['price'], $product['category'], $discounts);
    $totalProd = $discPrice * $product['quantity'];
?>
<tr>
<td><?php echo $product['name']; ?></td>
<td><?php echo $product['category']; ?></td>
<td><?php echo number_format($product['price'],2); ?></td>
<td><?php echo number_format($discPrice,2); ?></td>
<td><?php echo $product['quantity']; ?></td>
<td><?php echo number_format($totalProd,2); ?></td>
</tr>
<?php endforeach; ?>
</table>

<p class="total">Most Expensive Product: <?php echo mostExpensiveProduct($products); ?></p>
<p class="total">Total Inventory Value: $<?php echo number_format($totalValue,2); ?></p>
</div>
</body>
</html>
