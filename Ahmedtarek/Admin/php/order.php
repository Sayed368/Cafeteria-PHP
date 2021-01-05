<?php

include "database.php";

if(isset($_POST["function"])){
    $function=$_POST["function"];
    if($function=="addOrder"){

        $amount = $_POST['amount'];
        $user_fk = $_POST['user_fk'];
        $note = $_POST['note'];
        $room = $_POST['room'];
        $carts = $_POST['cartArray'];

        $sql = "INSERT INTO order_info ( `status`, `user_fk`, `room`, `note`, `amount`)
        VALUES ('process', '$user_fk', '$room', '$note', '$amount')";

        if ($conn->query($sql) === TRUE) {
            $order_fk = $conn->insert_id;
            foreach($carts as $cart){
                $product_fk = $cart['product_id'];
                $count = $cart['count'];
                $sql = "INSERT INTO order_product ( `order_fk`, `product_fk`, `count`)
                VALUES ('$order_fk', '$product_fk', '$count')";
                $conn->query($sql);
            }
            echo 1;
        } else {
            echo -1;
        }

        $conn->close();

    }
}