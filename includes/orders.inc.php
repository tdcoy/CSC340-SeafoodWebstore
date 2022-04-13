<?php
if (isset($_POST['order-submit'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once '../db_connect.php';

    

    } else {
    header("location: ../html/ordersvendor.php");
    exit();
}
