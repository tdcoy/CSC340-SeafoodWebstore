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
      </body>
    </div>

    <div style="font-family: Rockwell" class="topbarLeft">
      <a class="active" href="index.html">Home</a>
      <a href="about.html">About </a>
      <a href="orders.php">Orders</a>
      <a style="float: right" href="cart.html">Checkout</a>
      <?php
        if(isset($_SESSION["user_email"])) {
          echo '<a style="float: right" href="logout.php">Logout</a>';
          echo '<a style="float: right" href="acount.php">Acount</a>';
        }
        else{
          echo '<a style="float: right" href="login.php">Login</a>';
        }
      ?>
      
      </form>
    </div>