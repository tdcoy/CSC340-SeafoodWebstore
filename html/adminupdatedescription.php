<?php
// database connection code
if(isset($_POST['ItemName']))

// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','seafood_webstore');

// get the post records
$ItemName = $_POST['ItemName'];
$ItemDescription = $_POST['ItemDescription'];

// database insert SQL code
$sql = "UPDATE `item` SET `item_description` = '$ItemDescription' WHERE `item_name` =  '$ItemName'";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Description Updated";
}

?>

<br>
<br>
<a href="admin.html">Back to Admin dasboard</a>