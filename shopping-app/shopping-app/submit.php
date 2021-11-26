
<?php 
    session_start();
    require("fpdf.php");
    require_once("config.php");

    $pdf = new FPDF();

    //get variable
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $name=$fname.' '.$lname;
    $email=$_POST['email'];
    $address=$_POST['address'].','.$_POST['district'];
    $date = date('jS \of F Y h:i:s A');    
    
    $cart = $_SESSION['cart'];
    
    $sql = "INSERT INTO account_receipts (fname, lname, email, address)
        VALUES ('$fname', '$lname', '$email', '$address');
    ";

    if(!mysqli_query($mysqli,$sql)){
        echo ("Error\n".mysqli_error($mysqli));
    } else {
        $sql = "SELECT receipt_id FROM account_receipts WHERE fname = '$fname' AND lname = '$lname' AND email = '$email' ORDER BY created_at DESC LIMIT 1";
        
        $id = 0;
        if($result = $mysqli->query($sql)){
            $obj = $result->fetch_object();
            $id = $obj->receipt_id;
        }
    
        
        // THANK YOU
        $pdf->AddPage();
        $pdf->SetFont("Arial","B",25);
        $pdf->Cell(190,10,"Buy Something",0,1,"C");
        $pdf->Cell(190,10,"",0,1,"C");
        
        $pdf->SetFont("Arial","B",19);
        $pdf->Cell(190,10,"Thank You.",0,1,"C");
        
        $pdf->SetFont("Arial","",12);
        $pdf->Cell(190,10,"Thank You for shopping with Buy Something.",0,1,"C");
        
        $pdf->Cell(190,10,"",0,1,"C");
        
        
        // ORDER DETAILS
        $pdf->SetFont("Arial","B",19);
        $pdf->Cell(190,10,"Order Details",1,1,"C");
        
        $pdf->SetFont("Arial","B",12);
        $pdf->Cell(95, 10, "Full Name:", 0, 0);
        $pdf->Cell(95, 10, "Bill To:", 0, 1);
    
        $pdf->SetFont("Arial","",12);
        $pdf->Cell(95, 10, $name, 0, 0);
        $pdf->Cell(95, 10, $email, 0, 1);
        
        $pdf->SetFont("Arial","B",12);
        $pdf->Cell(95, 10, "Order Date:", 0, 0);
        $pdf->Cell(95, 10, "Address:", 0, 1);
        
        $pdf->SetFont("Arial","",12);
        $pdf->Cell(95, 10, $date, 0, 0);
        $pdf->Cell(95, 10, $address, 0, 1);
        
        $pdf->Cell(95, 10, "", 0, 1);
        
        
        
        // ORDER ITEMS
        $pdf->SetFont("Arial","B",19);
        $pdf->Cell(190,10,"Order Items",1,1,"C");
        
        
        $pdf->SetFont("Arial","",15);
        $pdf->Cell(110, 10, "Item:", 0, 0);
        $pdf->Cell(40, 10, "Quantity:", 0, 0, "R");
        $pdf->Cell(40, 10, "Price:", 0, 1, "R");
        

        $pdf->SetFont("Arial","",12);
        $total = 0;
        for ($i = 0; $i < count($cart); $i++){
            $item_id = $cart[$i]["id"];
            $quantity = $cart[$i]["quantity"];
            $sql = "SELECT * FROM items WHERE item_id = $item_id";
            
            if($result = $mysqli->query($sql)){
                $row = $result->fetch_object();
                
                $pdf->Cell(110, 10, $row->title, 0, 0);
                $pdf->Cell(40, 10, $quantity, 0, 0, "R");
                $pdf->Cell(40, 10, '$'.$row->price.'.00', 0, 1, "R");
                $total += $row->price * $quantity;
                
                $sql = "INSERT INTO receipts_items (receipt_id, title, quantity, price)
                VALUES ($id,'$row->title', '$quantity', '$row->price');
                ";
                if(!mysqli_query($mysqli,$sql)){
                    echo $sql;
                    echo ("Error\n".mysqli_error($mysqli));
                }
                
            }
        }

        $pdf->Cell(110, 10, "", 0, 0);
        $pdf->SetFont("Arial","B",12);
        $pdf->Cell(40, 10, "Total", 0, 0);
        $pdf->Cell(40, 10, '$'.$total.'.00', 0, 1, "R");

        $pdf->Cell(110, 10, "", 0, 0);
        $pdf->SetFont("Arial","B",12);
        $pdf->Cell(40, 10, "Total with GST", 0, 0);
        $pdf->Cell(40, 10, '$'.$total*1.2, 0, 1, "R");


        $pdf->Output();
        unset($_SESSION['cart']);
    }
?>
