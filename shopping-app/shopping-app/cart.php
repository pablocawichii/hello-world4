<?php
session_start();
require_once "./config.php";
if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){

    echo '
    <ul class="list-group list-group-flush" >';
    $cart_items = $_SESSION['cart'];
    
    $counter = 0;
    $total = 0;
    foreach ($cart_items as $item) {
        $sql = "SELECT * FROM items WHERE item_id = ".$item['id'];

        if($result = $mysqli->query($sql)){
            $row = $result->fetch_object();

            echo "<li
                class='list-group-item d-flex justify-content-between align-items-center'
                
                >
                $row->title <span class='badge badge-secondary badge-pill'>".$item["quantity"]."</span><span class='badge badge-primary badge-pill'>$$row->price</span>
                <span>
                
                <button class='btn btn-secondary increase_from_cart' data-id='$counter'>^</button></span>
                <button class='btn btn-secondary decrease_from_cart' data-id='$counter'>V</button></span>
                <button class='btn btn-danger remove_from_cart' data-id='$counter'>X</button></span>
                </li>";
            $total += ($row->price * $item["quantity"]);
        }
        $counter += 1;
    }
    echo "<li
    class='list-group-item d-flex justify-content-between align-items-center'
    style='width: 200px'
    >
    <strong>Total</strong> <span class='badge badge-primary badge-pill'>$$total</span>
    </li>";
    echo '</ul>';
} else {
    echo "Nada";
}
echo "<script src='./js/cart.js'></script>"
?>