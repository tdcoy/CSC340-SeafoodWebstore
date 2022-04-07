<?php

function emptyInputRegister($email, $first_name, $last_name, $phone_number, $password){
    if(empty($email) || empty($first_name) || empty($last_name) || empty($first_name) || empty($password)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function emptyInputLogin($email, $password){
    if(empty($email) || empty($password)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($conn, $email, $password){
    $emailExists = emailExists($conn, $email);

    if($emailExists === false){
        header("location: ../html/login.php?error=emptyinput");
        exit();
    }

    $passwordHashed = $emailExists["user_password"];
    $checkPassword = password_verify($password, $passwordHashed);

    if($checkPassword === false){
        header("location: ../html/login.php?error=wronglogin");
        exit();
    }
    else if($checkPassword === true){
        session_start();
        $_SESSION["user_email"] = $emailExists["user_email"];
        header("location: ../html/index.html");
        exit();
    }
}

function emailExists($conn, $email){
    $sql = "SELECT * FROM user WHERE user_email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../html/login.php?error=stmtfailed");
        exit();
    }
    
    //Bind data from user to the statement
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    //Get result from statement
    $resultData = mysqli_stmt_get_result($stmt);

    //Fetch all the data about the user if the user exsists in the db
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $email, $first_name, $last_name, $phone_number, $password){
    $sql = "INSERT INTO user (user_email, user_first_name, user_last_name, user_phone_number, user_password) VALUES(? ,? ,? ,? ,?)";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../html/login.php?error=stmtfailed");
        exit();
    }

    //Hash the users password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    //Bind data from user to the statement
    mysqli_stmt_bind_param($stmt, "sssss", $email, $first_name, $last_name, $phone_number, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../html/index.html?error=none");
    exit();
}