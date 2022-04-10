<?php
// database connection code
if(isset($_POST['ItemName']))
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','seafood_webstore');

// get the post records
$ItemId = $_POST['ItemId'];
$ItemName = $_POST['ItemName'];
$ItemPrice = $_POST['ItemPrice'];
$ItemDescription = $_POST['ItemDescription'];

// database insert SQL code
$sql = "INSERT INTO `item` (`item_id`, `item_name`, `item_price`, `item_description`) VALUES ('$ItemId', '$ItemName', '$ItemPrice', '$ItemDescription')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Item Inserted";
}

?>
<br>
<br>
<a href="admin.html">Back to Admin dasboard</a>