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
    ?>

    <?php
    require_once '../db_connect.php';

    if (isset($_SESSION["user_email"])) {
      //user is logged in
      $sql = "SELECT * FROM order WHERE email = '" . $_SESSION["user_email"] . "';";
      $stmt = mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../html/orders.php?error=stmtfailed");
        exit();
      }

      //Bind data from user to the statement
      mysqli_stmt_execute($stmt);

      $resultData = mysqli_stmt_get_result($stmt);

      //Fetch all the data about the user if the user exsists in the db
      if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
      } else {
        $result = false;
        return $result;
      }

      mysqli_stmt_close($stmt);




      $stmt = $mysqli->prepare("SELECT order_number, label FROM test WHERE id = 1");
      $stmt->execute();

      $stmt->bind_result($out_id, $out_label);

      while ($stmt->fetch()) {
        printf("id = %s (%s), label = %s (%s)\n", $out_id, gettype($out_id), $out_label, gettype($out_label));
      }
    } else {
      //nothing to display
    }
    ?>

    <!----Orders
    <div class="small-container orders-page">
      <div class="order-container">
        <table>
          <tr>
            <th>Ordered: 3/20/2022</th>
            <th>Quantity</th>
            <th>Subtotal</th>
          </tr>

          <tr>
            <td>
              <div class="order-info">
                <img src="images/shrimp.jpeg" />
                <div>
                  <p style="font-size: 20px">Shrimp</p>
                  <small>Price: $16.99/1lb</small>
                </div>
              </div>
            </td>
            <td>5.10</td>
            <td>$86.65</td>
          </tr>
        </table>

        <div class="order-total">
          <table>
            <tr>
              <td>Subtotal</td>
              <td>$86.65</td>
            </tr>
            <tr>
              <td>Tax</td>
              <td>$1.73</td>
            </tr>
            <tr>
              <td>Total</td>
              <td>$88.38</td>
            </tr>
          </table>
        </div>
      </div>

      <div class="order-container">
        <table>
          <tr>
            <th>Ordered: 2/14/2022</th>
            <th>Quantity</th>
            <th>Subtotal</th>
          </tr>

          <tr>
            <td>
              <div class="order-info">
                <img src="images/CrabLegs.jpeg" />
                <div>
                  <p style="font-size: 20px">Crab Legs</p>
                  <small>Price: $21.99/1lb</small>
                </div>
              </div>
            </td>
            <td>1 lb</td>
            <td>$21.99</td>
          </tr>

          <tr>
            <td>
              <div class="order-info">
                <img src="images/mussels.jpeg" />
                <div>
                  <p style="font-size: 20px">Mussels</p>
                  <small>Price: $23.99/1lb</small>
                </div>
              </div>
            </td>
            <td>2 lb</td>
            <td>$45.98</td>
          </tr>
        </table>

        <div class="order-total">
          <table>
            <tr>
              <td>Subtotal</td>
              <td>$67.97</td>
            </tr>
            <tr>
              <td>Tax</td>
              <td>$1.36</td>
            </tr>
            <tr>
              <td>Total</td>
              <td>$69.33</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  --->

    <?php
    include_once 'footer.php';
    ?>
</body>

</html>