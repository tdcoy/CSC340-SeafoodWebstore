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

    /*remove the white borders*/
    * {
      margin: 0px;
      padding: 0px;
      overflow-x: hidden;
      box-sizing: border-box;
      max-width: auto;
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

    /*Navigation bar styling*/
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

    /*Logo bar styling*/
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

    /*search bar styling*/
    form.search input[type="text"] {
      padding: 15px;
      font-size: 17px;
      border: 1px solid white;
      float: left;
      width: 17%;
      background: #ffffff;
    }
    form.search button {
      float: left;
      width: 4%;
      padding: 15px;
      background: #2196f3;
      color: white;
      font-size: 17px;
      border: 1px solid grey;
      border-left: none;
      cursor: pointer;
    }

    /*product card styling*/
    .card {
      border-radius: 10px;
      line-height: 450%;
      float: left;
      position: relative;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: 300px;
      margin: auto;
      text-align: center;
      font-family: Rockwell;
      left: 100px;
      top: 120px;
      font-size: 10px;
    }
    .price {
      color: grey;
      font-size: 22px;
    }
    .dropDownList {
      margin-left: auto;
      border-radius: 5px;
      border: none;
      outline: 0;
      padding: 6px;
      color: Black;
      border: 2px solid #00228a;
      text-align: center;
      cursor: pointer;
      width: 75%;
      font-size: 14px;
    }
    button {
      margin-left: auto;
      margin-right: auto;
      margin-top: auto;
      border-radius: 10px;
      border: none;
      outline: 0;
      padding: 16px;
      color: white;
      background-color: #00228a;
      text-align: center;
      cursor: pointer;
      width: 45%;
      font-size: 18px;
    }
    button:hover {
      opacity: 0.7;
    }
    table {
      margin-left: 10%;
      margin-top: 100px;
      width: 80%;
      font-size: 30px;

    }
    th, td {
      text-align: center;
      padding: 2px;
      border-bottom: 3px solid darkblue;
    }
  </style>

  <!--pulling the icons library for the search button--->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
  />

  <head>
    <meta charset="utf-8" />
    <title>Seafood WebStore</title>
  </head>

  <body>
    <div class="content">
      <div class="logobar">
        <body>
          <h1 style="font-family: Rockwell; color: white; font-size: 40px">
            &nbsp;Seafood Store
          </h1>
        </body>
      </div>

      <!--top Nav bar buttons--->
      <div style="font-family: Rockwell" class="topbarLeft">
        <a class="active" href="index.html">Home</a>
        <a href="about.html">About </a>
        <a href="orders.html">Orders</a>
        <a style="float: right" href="cart.html">Checkout</a>
        <a style="float: right" href="login.html">Login</a>
      </div>

      <div
        style="
          font-family: Rockwell;
          position: relative;
          left: 0px;
          top: 35px;
          bottom: auto;
          font-size: 25px;
        "
        class="list1"
      >
        <h1 class="active" href="index.html" style="text-align: center;">
          Best-selling
        </h1>
      </div>

<div class="table" style="font-family: Rockwell; font-size: 40px; margin-left: auto; margin-right: auto;">
  <div class="th">
    <div class="td">
<?php
// database connection code

// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','seafood_webstore');

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the products
$sql = "SELECT * FROM item"; // SQL with parameters
$stmt = $con->prepare($sql); 
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result

echo "<table>";

if (mysqli_num_rows($result) > 0) {
    // output data of each row
while($row = mysqli_fetch_assoc($result))
   {
      echo '<tr>';
      echo '<td style="width:25%"> <img src="images/' . $row['url'] . '" alt="' .$row['item_name'] . '" style="width="300" height="300"" /> </td>';
      echo '<td style="width:20%">' . $row['item_name'] . '</td>';
      echo '<td style="width:20%"> $' . $row['item_price'] . '</td>';
      echo '<td><p stlye = "border-top: 3px solid darkblue" ><button>Add to Cart</button></p></td>';
      echo '</tr>';
   }
    
} else {
    echo "0 results";
}
echo "</table>";
?>
    </div>
  </div>
</div>

      
      
    </div>

    <div class="footer-container">
      <div class="footer">
        <div class="footer heading footer-1">
          <h2>Developers</h2>
          <p>Luong Luu</p>
          <p>Terrence Coy</p>
          <p>Mohammed Almalki</p>
        </div>
      </div>
    </div>
  </body>
</html>