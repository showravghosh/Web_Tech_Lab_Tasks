<?php
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = intval($_POST['product_id']);
    $name = $_POST['product_name'];
    $price = floatval($_POST['price']);

    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }

    // Check if item already in cart
    $found = false;
    foreach($_SESSION['cart'] as &$item){
        if($item['product_id'] === $id){
            $item['quantity'] += 1;
            $found = true;
            break;
        }
    }
    unset($item);

    if(!$found){
        $_SESSION['cart'][] = [
            "product_id" => $id,
            "product_name" => $name,
            "price" => $price,
            "quantity" => 1
        ];
    }
}

header('Location: index.php');
exit;
