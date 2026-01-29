<?php
session_start();

if(isset($_SESSION['cart'])) {
    if(isset($_POST['update']) && isset($_POST['quantities'])){
        foreach($_POST['quantities'] as $index => $qty){
            $qty = intval($qty);
            if($qty > 0){
                $_SESSION['cart'][$index]['quantity'] = $qty;
            }
        }
    }

    if(isset($_POST['remove'])){
        $index = intval($_POST['remove']);
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }

    if(isset($_POST['empty'])){
        unset($_SESSION['cart']);
    }
}

header('Location: cart.php');
exit;
