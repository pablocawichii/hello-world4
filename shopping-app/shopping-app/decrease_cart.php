<?php

session_start();

if(isset($_SESSION['cart'])){
    $_SESSION['cart'][$_POST['id']]["quantity"]--;
    if(!$_SESSION['cart'][$_POST['id']]["quantity"]){    
        array_splice($_SESSION['cart'], $_POST['id'], 1);
    }
}

?>