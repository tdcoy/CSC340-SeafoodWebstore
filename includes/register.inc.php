<?php
if (isset($_POST['register-submit'])) {
    $email = $_POST["email"];
    $first_name = $_POST["first-name"];
    $last_name = $_POST["last-name"];
    $phone_number = $_POST["phone-number"];
    $password = $_POST["password"];

    require_once '../db_connect.php';
    require_once './functions.inc.php';

    if (emptyInputRegister($email, $first_name, $last_name, $phone_number, $password) !== false) {
        header("location: ../html/login.php?error=emptyinput");
        exit();
    }

    if (emailExists($conn, $email) !== false) {
        header("location: ../html/login.php?error=invalidemail");
        exit();
    }
    if(phoneExists($conn, $phone_number) !== false){
        header("location: ../html/login.php?error=invalidphone");
        exit();
    }

    createUser($conn, $email, $first_name, $last_name, $phone_number, $password);
} else {
    header("location: ../html/login.php");
    exit();
}
