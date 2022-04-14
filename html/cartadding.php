<?php
// database connection code
if(isset($_POST['ItemName']))
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','seafood_webstore');

// get the post records
$ItemQuantity = $_POST['ItemQuantity'];
$ItemName = $_POST['ItemName'];
$ItemPrice = $_POST['ItemPrice'];


// database insert SQL code
$sql = "INSERT INTO `cart` (`cart_item_name`, `cart_item_price`, `cart_item_quantity`) VALUES ('$ItemName', '$ItemPrice', '$ItemQuantity')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Item Added";
}

?>