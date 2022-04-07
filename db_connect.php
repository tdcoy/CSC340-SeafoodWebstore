<?php
//four variables to connect to database
$host = 'localhost';
$username = 'root';
$user_pass = '';
$database_in_use = 'seafood_webstore';

//create a database connection instance
$conn = mysqli_connect($host, $username, $user_pass, $database_in_use);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
