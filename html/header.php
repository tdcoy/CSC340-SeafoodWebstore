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
      <a class="active" href="index.html">Home</a>
      <a href="about.html">About </a>
      <a href="orders.php">Orders</a>
      <a class="cart" style="float: right" href="cart.html">
        <ion-icon name="cart"></ion-icon> <span> 0</span>
      </a>
      <?php
        if(isset($_SESSION["user_email"])) {
          echo '<a style="float: right" href="logout.php">Logout</a>';
        }
        else{
          echo '<a style="float: right" href="login.php">Login</a>';
        }
      ?>
      
      </form>
    </div>