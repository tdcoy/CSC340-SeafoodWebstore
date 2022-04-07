<!DOCTYPE html>
<html>
<link rel="stylesheet" href="stylesheet.css">
<style>
  span {
    color: #777;
    font-size: 12px;
    bottom: 68px;
    position: absolute;
  }

  option {
    font-weight: normal;
    display: block;
    white-space: nowrap;
    min-height: 1.2em;
    padding: 0px 2px 1px;
  }

  #login {
    left: 50px;
  }

  #register {
    left: 450px;
  }

  #button {
    top: 0;
    left: 0;
    position: absolute;
    width: 110px;
    height: 100%;
    background: linear-gradient(to right, #e21f3f, #e2e077);
    transition: 0.5s;
  }
</style>

<body>
  <div class="login-content">
    <?php
    include_once 'header.php';
    ?>

    <div class="login">
      <div id="login-form-box" class="login-form-box">
        <div class="login-button-box">
          <div id="button"></div>
          <button type="button" class="login-toggle-button" onclick="login()">
            Login
          </button>
          <button type="button" class="login-toggle-button" onclick="register()">
            Register
          </button>
        </div>

        <form action="../includes/login.inc.php" id="login" class="login-input-group" method="post">
          <input type="text" name="email" class="login-input-field" placeholder="Email Address" required />
          <input type="password" name="password" class="login-input-field" placeholder="Enter Password" required />
          <button type="submit" name="login-submit" class="login-submit-button">Login</button>
        </form>

        <?php
          if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
              echo "<p>Incomplete fields!</p>";
            }
            else if($_GET["error"] == "wronglogin"){
              echo "<p>Incorrect login!</p>";
            }
          }
        ?>
        
        <form action="../includes/register.inc.php" id="register" class="login-input-group" method="post">
          <input type="text" name="first-name" class="login-input-field" placeholder="First Name" required />
          <input type="text" name="last-name" class="login-input-field" placeholder="Last Name" required />
          <input type="email" name="email" class="login-input-field" placeholder="Email" required />
          <input type="tel" name="phone-number" class="login-input-field" placeholder="Phone Number" required />
          <input type="password" name="password" class="login-input-field" placeholder="Password" required />
          <button type="submit" name="register-submit" class="login-submit-button">Register</button>
        </form>

        <?php
          if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
              echo "<p>Incomplete fields!</p>";
            }
            else if($_GET["error"] == "invalidemail"){
              echo "<p>This email address is already registered!</p>";
            }
            else if($_GET["error"] == "stmtfailed"){
              echo "<p>Something went wrong :(</p>";
            }
            else if($_GET["error"] == "none"){
              echo "<p>Registration Successful!</p>";
            }
          }
        ?>

      </div>
    </div>
  </div>

  <?php
  include_once 'footer.php';
  ?>

  <script>
    var _login = document.getElementById("login");
    var _register = document.getElementById("register");
    var _button = document.getElementById("button");
    var _formbox = document.getElementById("form-box");

    function register() {
      _login.style.left = "-400px";
      _register.style.left = "50px";
      _button.style.left = "110px";
    }

    function login() {
      _login.style.left = "50px";
      _register.style.left = "450px";
      _button.style.left = "0px";
    }
  </script>
</body>

</html>