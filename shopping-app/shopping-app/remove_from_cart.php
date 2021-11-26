<?php

session_start();

if(isset($_SESSION['cart'])){
    array_splice($_SESSION['cart'], $_POST['id'], 1);
}

?>