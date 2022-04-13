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
      border-radius: 10px;
      border: none;
      outline: 0;
      padding: 12px;
      color: Black;
      border: 2px solid #00228a;
      text-align: center;
      cursor: pointer;
      width: 100%;
      font-size: 18px;
    }
    .card button {
      margin-top: 10px;
      border-radius: 10px;
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
    <?php
    include_once 'header.php';
    ?>

<h1 style="text-align: center; margin-top: 50px; margin-bottom: 50px; font-family: Rockwell;">Admin Dashboard</h1>

<fieldset style="width: 23%; height: 70%; margin-top: 20px; margin-bottom: 0; margin-left: auto; margin-right: auto; text-align: justify; padding: 10px 20px; font-family: Rockwell; position: relative; display: flex; flex-wrap: wrap;:">
<h1>Insert Item</h1>
<form name="AdminInsert" method="post" action="admininsert.php">
<p>
<br>
<label for="Item Id">Item Id: </label>
<input type="text" name="ItemId" id="ItemId" required>
</p>
<p>
<br>
<label for="Item Name">Item Name: </label>
<input type="text" name="ItemName" id="ItemName" required>
</p>
<br>
<p>
<label for="Item Price">Item Price: </label>
<input type="text" name="ItemPrice" id="ItemPrice" required>
</p>
<br>
<p>
<label for="Item Description">Description: </label>
<input type="text" name="ItemDescription" id="ItemDescription" required>
</p>
<br>
<p>
<label for="Item Image Url">Item Image Url: </label>
<input type="text" name="ItemUrl" id="ItemUrl" required>
</p>
<br>
<p>
<input style="padding: 3px 5px;" type="submit" name="Insert" id="Insert" value="Insert">
</p>
<br>
<br>
</form>
<h1>Delete Item</h1>
<form name="AdminDelete" method="post" action="admindelete.php">
<p>
<br>
<label for="Item Name">Item Name: </label>
<input type="text" name="ItemName" id="ItemName" required>
</p>
<br>
<p>
<input style="padding: 3px 5px;" type="submit" name="Delete" id="Delete" value="Delete">
</p>
<br>
<br>
</form>
<h1>Update Item Price</h1>
<form name="AdminUpdatePrice" method="post" action="adminupdateprice.php">
<p>
<br>
<label for="Item Name">Item Name: </label>
<input type="text" name="ItemName" id="ItemName" required>
</p>
<br>
<p>
<label for="Item Price">Item Price: </label>
<input type="text" name="ItemPrice" id="ItemPrice" required>
</p>
<br>
<p>
<input style="padding: 3px 5px;" type="submit" name="UpdatePrice" id="UpdatePrice" value="Update Price">
</p>
<br>
<br>
</form>
<h1>Update Item Description</h1>
<form name="AdminUpdateDescription" method="post" action="adminupdatedescription.php">
<p>
<br>
<label for="Item Name">Item Name: </label>
<input type="text" name="ItemName" id="ItemName" required>
</p>
<br>
<label for="Item Description">Description: </label>
<input type="text" name="ItemDescription" id="ItemDescription" required>
</p>
<br>
<p>
<input style="margin-bottom: 2%; padding: 3px 5px;" type="submit" name="UpdateDescription" id="UpdateDescription" value="Update Description">
</p>
</form>
</fieldset>

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
