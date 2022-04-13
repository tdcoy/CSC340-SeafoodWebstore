<!DOCTYPE html>
<html>
<style>
    .btn {
        background-color: red;
        border: none;
        color: white;
        padding: 5px 5px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 20px;
    }

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

            //------------------------Get orders assoctiated with session user email-------------------------------
            $sqlOrders = "SELECT * FROM orders";
            $stmtOrders = mysqli_stmt_init($conn);

            //------------------------Get Items within each order--------------------------------------------------
            $sqlOrderTable = "SELECT * FROM  order_table WHERE order_number = ?;";

            if (!mysqli_stmt_prepare($stmtOrders, $sqlOrders)) {
                echo "<script>alert('Something went wrong retrieving orders!')</script>";
                exit();
            }

            //bind parameters
            //mysqli_stmt_bind_param($stmtOrders, "s", $email);
            mysqli_stmt_execute($stmtOrders);

            //get result from db
            $resultOrders = mysqli_stmt_get_result($stmtOrders);

            //----------------Orders---------------------
            while ($rowOrders = mysqli_fetch_assoc($resultOrders)) {
                if ($rowOrders['order_status'] == 0) {
                    $orderSubtotal = 0;
                    //Order box
                    echo '<div class="small-container orders-page">';
                    echo ' <div class="order-container">';
                    echo " <table>";
                    echo " <tr>";
                    echo " <th>Ordered: " . $rowOrders['order_date'] . "</th>";
                    echo " <th>Quantity</th>";
                    echo "<th>Subtotal</th>";
                    echo " </tr>";

                    //------------------------Get orders assoctiated with session user email-------------------------------
                    $sqlCustomerInfo = "SELECT * FROM user WHERE user_email = ?;";
                    $stmtCustomerInfo = mysqli_stmt_init($conn);

                    //prepare prepared statement
                    if (!mysqli_stmt_prepare($stmtCustomerInfo, $sqlCustomerInfo)) {
                        echo "<script>alert('Something went wrong retrieving customer info!')</script>";
                        exit();
                    }

                    //bind parameters
                    mysqli_stmt_bind_param($stmtCustomerInfo, "d", $rowOrders['user_email']);
                    mysqli_stmt_execute($stmtCustomerInfo);

                    //get items for each order
                    $resultCustomerInfo = mysqli_stmt_get_result($stmtCustomerInfo);

                    if (!$rowCustomerInfo = mysqli_fetch_assoc($resultCustomerInfo)) {
                        echo "<script>alert('Something went wrong retrieving customer info!')</script>";
                        exit();
                    }

                    //------------------------Get order_table associated with the order-------------------------------
                    $orderNum = $rowOrders['order_number'];
                    $stmtOrderTable = mysqli_stmt_init($conn);

                    //prepare prepared statement
                    if (!mysqli_stmt_prepare($stmtOrderTable, $sqlOrderTable)) {
                        echo "<script>alert('Something went wrong retrieving order table!')</script>";
                        exit();
                    }

                    //bind parameters
                    mysqli_stmt_bind_param($stmtOrderTable, "d", $orderNum);
                    mysqli_stmt_execute($stmtOrderTable);

                    //get items for each order
                    $resultOrderTable = mysqli_stmt_get_result($stmtOrderTable);

                    //----------------Items---------------------
                    while ($rowOrderTable = mysqli_fetch_assoc($resultOrderTable)) {
                        $sqlItemInfo = "SELECT * FROM item WHERE item_name = ?;";
                        $stmtItemInfo = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmtItemInfo, $sqlItemInfo)) {
                            echo "<script>alert('Something went wrong retrieving item info!')</script>";
                            exit();
                        }
                        $item = $rowOrderTable['item_name'];

                        //bind parameters
                        mysqli_stmt_bind_param($stmtItemInfo, "s", $item);
                        mysqli_stmt_execute($stmtItemInfo);

                        //get result from db
                        $resultItemInfo = mysqli_stmt_get_result($stmtItemInfo);
                        if ($rowItemInfo = mysqli_fetch_assoc($resultItemInfo)) {
                            //Calculate subtotal
                            $orderSubtotal += $rowOrderTable['item_quantity'] * $rowItemInfo['item_price'];

                            echo "<tr>";
                            echo "<td>";
                            echo '<div class="order-info">';
                            echo '<img src="images/' . $rowItemInfo['url'] . '" />';
                            echo "<div>";
                            echo '<p style="font-size: 20px">' . $rowItemInfo['item_name'] . "</p>";
                            echo "<small>Price:" . $rowItemInfo['item_price'] . "/1lb</small>";
                            echo "</div>";
                            echo "</div>";
                            echo "</td>";
                            echo '<td>' . $rowOrderTable['item_quantity'] . "</td>";
                            echo '<td>$' . $rowOrderTable['item_quantity'] * $rowItemInfo['item_price'] . ".00</td>";
                            echo "</tr>";
                        }
                    }

                    //make prepared statement for each item
                    mysqli_stmt_close($stmtOrderTable);

                    echo "</table>";

                    //Calculate totals:
                    echo '<div class="order-total">';
                    echo "<table>";

                    //---Subtotal---
                    echo    "<tr>
                <td>Subtotal:</td>";
                    echo '<td>$' . $orderSubtotal . ".00</td>";
                    echo "</tr>";

                    //---Tax---
                    echo "<tr>
                <td>Tax:</td>";
                    echo '<td>$' . $tax = $orderSubtotal * .07 . "</td>";
                    echo "</tr>";

                    //---Total---
                    echo "<tr>
                <td>Total:</td>";
                    echo '<td>$' . $orderSubtotal * 1.07 . "</td>";
                    echo "</tr>";

                    //---Customer---
                    echo "<tr>
                <td>Customer Email:</td>";
                    echo '<td>' . $rowOrders['user_email'] . "</td>";
                    echo "</tr>";

                    //---Order Status---
                    //$rowOrders['order_status']
                    echo "<tr>";
                    echo "<td>";
                    echo '<form action="../includes/orders.inc.php" method="post" >';
                    echo "<a href=../includes/orders.inc.php?id=" . $rowOrders['order_number'] . " class='btn'>Complete Order</a>";
                    echo "</td>";
                    echo "</form>";
                    echo "
            </tr>
            <tr>
            </table>
            </div>";

                    echo "</div>";
                    echo "</div>";
                }
            }

            mysqli_stmt_close($stmtOrders);
        } else {
            echo "<br><br><br><p>No orders to show</p><br><br><br>";
        }
        ?>

        <?php
        include_once 'footer.php';
        ?>
</body>

</html>