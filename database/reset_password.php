<?php require_once 'authcontroller.php';  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="jquery.passwordstrength.js"></script>
      <style>
      body{
        background-color: #333;
      }
      .form-div{
        margin: 50px auto 50px;
        padding: 25px 15px 10px 15px;

        border-radius: 5px;
        font-size: 1.1em;
        font-family: Arial,sans-serif;

      }
      form p{
        font-size: 0.89em;
      }
      .form-div.login{
        margin-top: 100px;
      }
      .eye{
        position: absolute;
        color: white !important;
      }
      #hide1{
        display: none;
        color: white !important;
      }
      #hide3{
        display: none;
        color: white !important;
      }
      .status{
        font-size: 15px;
        padding: 15px;
        color: green;
      }
      .password-strength-indicator{
        font-size: 12px;
        text-align: center;
        display: inline-block;
        min-width: 20%;
        transition: 1s;
        height: 16px;
        color: white;
      }
      .password-strength-indicator.very-weak{
        background: red;
        width: 20%;
      }
      .password-strength-indicator.weak{
        background: #f6891f;
        width: 40%;
      }
      .password-strength-indicator.mediocre{
        background: #eeee00;
        width: 60%;
      }
      .password-strength-indicator.strong{
        background: #99ff33;
        width: 80%;
      }
      .password-strength-indicator.very-strong{
        background: #22cf00;
        width: 100%;
      }

      </style>
  </head>
  <body><br><br>
    <div class="container">
      <div class="row">
        <div class="col-md-4 offset-md-4 form-div login">
          <form class="" action="reset_password.php" method="post">


            <?php if(count($errors) > 0): ?>
             <div class="alert alert-danger">
              <?php foreach($errors as $error): ?>
              <li><?php echo $error; ?></li>
            <?php endforeach; ?>
            </div>
          <?php endif; ?>

            <div class="form-group">
              <label for="password"></label>
              <input type="password" name="password" id="password" required placeholder="New-Password" class="form-control form-control-lg">
              <span class="eye" onclick=" myFunction()">
                <i id="hide1" class="fa fa-eye" aria-hidden="true"></i>
                <i id="hide2"class="fa fa-eye-slash" aria-hidden="true"></i>
              </span>
            </div>
            <div class="form-group">
              <label for="password"></label>
              <input type="password" id="myInput2" required placeholder="Confirm-Password" name="passwordConf" class="form-control form-control-lg">
              <span class="eye" onclick=" myFunction2()">
                <i id="hide3" class="fa fa-eye" aria-hidden="true"></i>
                <i id="hide4"class="fa fa-eye-slash" aria-hidden="true"></i>
              </span>
            </div><br><br>
            <div class="form-group">
              <button type="submit" name="reset-password-btn" class="btn btn-primary btn-block btn-lg">Reset password</button>
            </div>

          </form>
          <script type="text/javascript">
        $(function() {
            $("#password").passwordStrength();
        });
        </script>
        </div>

      </div>

    </div>
  </body>
  <script>
    function myFunction() {
      var x = document.getElementById("password");
        var y = document.getElementById("hide1");
          var z = document.getElementById("hide2");

          if(x.type ==='password'){
            x.type = "text";
            y.style.display = "block";
            z.style.display = "none";
          }
        else{  x.type = "password";
          y.style.display = "none";
          z.style.display = "block";
        }
    }

  </script>
  <script>
    function myFunction2() {
      var x = document.getElementById("myInput2");
        var y = document.getElementById("hide3");
          var z = document.getElementById("hide4");

          if(x.type ==='password'){
            x.type = "text";
            y.style.display = "block";
            z.style.display = "none";
          }
        else{  x.type = "password";
          y.style.display = "none";
          z.style.display = "block";
        }
    }

  </script>
</html>
