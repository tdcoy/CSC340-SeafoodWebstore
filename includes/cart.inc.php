<?php
if (isset($_POST['checkoutButton'])) {
    $order_number=10;
    $item_name="test";
    $item_quantity=1;
    $order_id=101;

    require_once '../db_connect.php';
    require_once './functions.inc.php';


    createOrder($conn, $order_id, $item_name, $item_quantity, $order_number);
} else {
    header("location: ../html/login.php");
    exit();
}