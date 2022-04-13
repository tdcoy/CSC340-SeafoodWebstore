<?php
session_start();
?>

<head>
  <meta charset="utf-8" />
  <title>Seafood WebStore</title>
</head>

<div class="logobar">

  <body>
    <h1 style="font-family: Rockwell; color: white; font-size: 40px">
      &nbsp;Seafood Store
    </h1>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="index.js"></script>
  </body>
</div>

<div style="font-family: Rockwell" class="topbarLeft">
  <a class="active" href="index.php">Home</a>
  <a href="about.html">About </a>



  <?php
  require_once '../db_connect.php';


  if (isset($_SESSION["user_email"])) {
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
    if ($rowUserType = mysqli_fetch_assoc($resultUserType) && $rowUserType['user_type'] == 'admin') {
      echo '<a href="admin.php">Admin</a>';
    }

    mysqli_stmt_close($stmtUserType);
  } else {
    echo '<a href="orders.php">Orders</a>';
  }
  ?>


  <a class="cart" style="float: right" href="cart.php">
    <ion-icon name="cart"></ion-icon> <span> 0</span>
  </a>
  <?php
  if (isset($_SESSION["user_email"])) {
    echo '<a style="float: right" href="logout.php">Logout</a>';
  } else {
    echo '<a style="float: right" href="login.php">Login</a>';
  }
  ?>

  </form>
</div>
