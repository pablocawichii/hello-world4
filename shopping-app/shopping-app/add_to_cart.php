<?php 

session_start();

$id = $_POST['id'];

if(isset($_SESSION['cart'])){
    $in = false;
    for($i = 0; $i < count($_SESSION['cart']); $i++){
        if($_SESSION['cart'][$i]['id'] == $id){
            $in = true;
            $_SESSION['cart'][$i]['quantity']++;
            break;
        }
    }
    if (!$in) {
        array_push($_SESSION['cart'],['id'=> $id, 'quantity'=>1]); 
    }
} else {
    $_SESSION['cart'] = array(['id'=> $id, 'quantity'=>1]);
}


?>