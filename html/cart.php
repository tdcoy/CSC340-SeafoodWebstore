<!DOCTYPE html>
<html>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <style>
    .content {
      max-width: auto;
      margin: 0 auto;
      position: relative;
      min-height: 100%;
      padding-bottom: 100px;
    }

    html,
    body {
      height: 100%;
    }

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

    form.example input[type="text"] {
      padding: 15px;
      font-size: 17px;
      border: 1px solid white;
      float: left;
      width: 17%;
      background: #ffffff;
    }
    form.example button {
      float: left;
      width: 3%;
      padding: 15px;
      background: #2196f3;
      color: white;
      font-size: 17px;
      border: 1px solid grey;
      border-left: none; /* Prevent double borders */
      cursor: pointer;
    }

    * {
      box-sizing: border-box;
      margin: 0px;
      padding: 0px;
      overflow-x: hidden;
      max-width: auto;
    }

    .card {
      float: left;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: 300px;
      margin: auto;
      text-align: center;
      font-family: Rockwell;
    }



    .card button {
      border: none;
      outline: 0;
      padding: 12px;
      color: white;
      background-color: #00228a;
      text-align: center;
      cursor: pointer;
      width: 100%;
      font-size: 18px;
    }

    .card button:hover {
      opacity: 0.7;
    }

    body {
      font-family: Rockwell;

      padding: 0px;
    }


    .container {
      background-color: #f2f2f2;
      padding: 5px 20px 15px 20px;
      border: 1px solid lightgrey;
      border-radius: 3px;
    }

    input[type="text"] {
      width: 90%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    label {
      margin-bottom: 10px;
      display: block;
    }

    .icon-container {
      margin-bottom: 20px;
      padding: 7px 0;
      font-size: 24px;
    }

    a {
      color: #45a049;
    }

    hr {
      border: 1px solid lightgrey;
    }



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

  .products-container{
    width: 100%;
    max-width: 1000px;
    justify-content: center;
    margin: 0 auto;
    margin-top: 50px;
    display: flex;
    flex-wrap: wrap;
    font-family: Rockwell;
    position: relative;
  }
  .products-adding {
    width: 100%;
    max-width: 1000px;
    justify-content: center;
    margin: 0 auto;
    display: flex;
    flex-wrap: wrap;
  }

  .products-container ion-icon {
    font-size: 50px;
    color: darkblue;
    margin-left: 5px;
    margin-right: 5px;
    cursor: pointer;
    display: flex;
    width: 5%;
  }
  .products img{
  width: 30%;
  }
  .product-header {
    width: 100%;
    max-width: 1000px;
    display: flex;
    justify-content: flex-start;
    border-bottom: 5px solid darkblue;
    margin: 0 auto;
  }

  .product-title {
    width: 45%;
  }

  .price {
    width: 15%;
    border-bottom: 5x solid darkblue;
    display: flex;
    align-items: center;
  }

  .total {
    width: 10%;
    border-bottom: 5x solid darkblue;
    display: flex;
    align-items: center;
  }

  .quantity {
    width: 30%;
    border-bottom: 5x solid darkblue;
    display: flex;
    align-items: center;
    margin: 0 auto;
  }

  .products {
    width: 45%;
    flex-grow: 4;
    display: flex;
    /**flex-wrap: wrap;**/
    align-items: center;
    padding: 10px 0;
    border-bottom: 5x solid darkblue;
  }
  .products span{
    padding-left: 20px;
  }
  .basketTotalContainer, .checkoutButtonSection {
    display: flex;
    justify-content: flex-end;
    width: 100%;
    padding: 10px 0;
    
}

.basketTotalTitle {
    width: 30%;
}

.basketTotal {
    width: 10%;
}

.checkoutButton{
  background-color: #00228a;
  width:13%;
  color: white;
  cursor: pointer;
  font-family: Rockwell;
  padding: 3px;
  border-radius: 10px;

}
.checkoutButton:hover{
  opacity: 0.7;

}

.emptyCart{
  width: 100%;
  padding-top: 15%;
  text-align: center;
}
.emptyCart{
  width: 100%;
  text-align: center;
}
  img {
    max-width: 100%;
  }
  </style>

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

      <div style="font-family: Rockwell" class="topbarLeft">
        <a class="active" href="index.php">Home</a>
        <a href="about.html">About </a>
        <a href="orders.php">Orders</a>
        <a class="cart" style="float: right" href="cart.php">
          <ion-icon name="cart"></ion-icon> <span>0</span>
          </a>
        <a style="float: right" href="login.php">Login</a>
        <form class="example" action="action_page.php"></form>
      </div>
      <div class="products-container">
        <div class="product-header">
          <h5 class="product-title">Item</h5>
          <h5 class="price">Price</h5>
          <h5 class="quantity">Quantity</h5>
          <h5 class="total">Total</h5>
        </div>
  
        <div class="products-adding">
        
        <?php 
		    if (isset($_POST['checkoutButton'])){
            //function addProduct($conn){
            require_once '../db_connect.php';

            $sql = "INSERT INTO order_table (order_id, item_name, item_quantity, order_number) VALUES(?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            

            if(!mysqli_stmt_prepare($stmt, $sql)){
              echo "<script>alert('preparing error!')</script>";
                exit();
            }

            $order_number=10;
            $item_name='test';
            $item_quantity=1;
            $order_id=101;

            //Bind data from user to the statement
            mysqli_stmt_bind_param($stmt, "isii", $order_id, $item_name, $item_quantity, $order_number);
			      echo "<script>alert('Order has been placed!')</script>";

            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            //$num_rows=mysqli_stmt_affected_rows($stmt);

            //}          
        }
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
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="index.js"></script>
  </body>
</html>