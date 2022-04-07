<?php
// database connection code
if(isset($_POST['ItemName']) )
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','seafood_store');

// get the post records
$ItemName = $_POST['ItemName'];

// database insert SQL code
$sql = "DELETE FROM `item` WHERE `item_name` =  '$ItemName'";

// insert in database 
$retval = mysqli_query($con, $sql);

if($retval)
{
	echo "Item Deleted";
}

?>
<br>
<br>
<a href="admin.html">Back to Admin dasboard</a>