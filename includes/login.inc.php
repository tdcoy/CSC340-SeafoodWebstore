<?php
if (isset($_POST['login-submit'])) {
    $email = $_POST["email"];
    $email = $_POST["password"];

    require_once '../db_connect.php';
    require_once './functions.inc.php';

    if (emptyInputLogin($email, $password) !== false) {
        header("location: ../html/login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $email, $password);
} else {
    header("location: ../html/login.php");
    exit();
}
