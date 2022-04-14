<?php
// database connection code
if(isset($_GET['id']))
if(isset($_GET['price']))
if(isset($_GET['itemQuantity']))
// get the post records
$ItemQuantity = $_GET['itemQuantity'];
$ItemName = $_GET['id'];
$ItemPrice = $_GET['price'];

//echo "<script>alert($ItemPrice)</script>";

require_once '../db_connect.php';

// database insert SQL code
$sql = "INSERT INTO `cart` (`cart_item_name`, `cart_item_price`, `cart_item_quantity`) VALUES ('$ItemName', '$ItemPrice', '$ItemQuantity')";

// insert in database 
$rs = mysqli_query($conn, $sql);

if($rs)
{
	//echo "Item Added";
	header("location: ../html/index.php");

}

?>