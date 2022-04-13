<!DOCTYPE html>
<html>
<style>
  .content {
    max-width: auto;
    margin: 0 auto;
    position: relative;
    min-height: 100%;
    padding-bottom: 100px;
  }

  * {
    margin: 0px;
    padding: 0px;
    overflow-x: hidden;
    box-sizing: border-box;
    max-width: auto;
  }

  /*Header*/
  .topbarLeft {
    background-color: #00228a;
    overflow: hidden;
  }

  .topbarLeft a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 19px;
  }

  .topbarLeft a:hover {
    background-color: #ffffff;
    color: black;
  }

  .logobar {
    background-color: #00228a;
    overflow: hidden;
    padding: 14px 16px;
  }

  .logobar a {
    float: left;
    color: #00228a;
    text-align: center;
    padding: 14px 16px;

    text-decoration: none;
    font-size: 19px;
  }

  .logobar a:login {
    text-align: left;
  }

  .form-box {
    width: 380px;
    height: 480px;
    position: relative;
    margin: 6% auto;
    background: #fff;
    padding: 5px;
    overflow: hidden;
  }

  .button-box {
    width: 220px;
    margin: 35px auto;
    position: relative;
    box-shadow: 0 0 20px 9px #0000001f;
  }

  .toggle-button {
    padding: 10px 30px;
    cursor: pointer;
    background: transparent;
    border: 0;
    outline: none;
    position: relative;
  }

  .small-container {
    max-width: 1080px;
    margin: auto;
    padding-left: 25px;
    padding-right: 25px;
    padding-top: 25px;
  }

  .order-container {
    padding-top: 25px;
  }

  .orders-page {
    margin: 80px, auto;
  }

  .order-info {
    display: flex;
    flex-wrap: wrap;
  }

  .order-total {
    display: flex;
    justify-content: flex-end;
  }

  .order-total table {
    border-top: 3px solid #ff523b;
    width: 100%;
    max-width: 400px;
  }

  td:last-child {
    text-align: right;
  }

  th:last-child {
    text-align: right;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  th {
    text-align: left;
    padding: 5px;
    color: #fff;
    background: #d1695b;
    font-weight: normal;
  }

  td {
    padding: 10px 5px;
  }

  td img {
    width: 120px;
    height: 120px;
    margin-right: 10px;
  }

  /*prevent the footer from covering content*/
  html,
  body {
    height: 100%;
  }

  /*footer styling*/
  .footer {
    margin-top: auto;
    overflow: hidden;
    position: relative;
    padding: 10px;
    left: 100px;
    bottom: 0px;
    width: 100%;
    background-color: white;
    color: black;
    text-align: left;
    font-family: Rockwell;
  }

  .footer h2 {
    margin-bottom: 5px;
  }

  .footer p {
    margin-bottom: 5px;
  }

  .footer-container {
    border-top: 3px solid darkblue;
  }
</style>

<head>
  <meta charset="utf-8" />
  <title>Seafood WebStore</title>
</head>

<body>
  <div class="content">
    <?php
    include_once 'header.php';
    require_once '../db_connect.php';

    //user is logged in
    if (isset($_SESSION['user_email'])) {
      $email = $_SESSION["user_email"];

      //------------------Get User Type-----------------------------
      $sqlUserType = "SELECT user_type FROM user WHERE user_email = ?;";
      $stmtUserType = mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmtUserType, $sqlUserType)) {
        echo "<script>alert('Something went wrong getting user type!')</script>";
        exit();
      }

      //bind parameters
      mysqli_stmt_bind_param($stmtUserType, "s", $email);
      mysqli_stmt_execute($stmtUserType);

      $resultUserType = mysqli_stmt_get_result($stmtUserType);

      //Fetch all the data about the user if the user exsists in the db
      if ($rowUserType = mysqli_fetch_assoc($resultUserType)) {

        if ($rowUserType['user_type'] == 'customer') {
          header("location: ../html/orderscustomer.php");
        } else {
          header("location: ../html/ordersvendor.php");
        }
      }
      mysqli_stmt_close($stmtUserType);
    } else {
      echo "<br><br><br><p>No orders to show</p><br><br><br>";
    }
    ?>

    <?php
    include_once 'footer.php';
    ?>
</body>

</html>