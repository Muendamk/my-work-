<?php   

//require_once('authcontroller.php');
session_start();
  require ('connection.php');
  require 'db.php';
  require_once 'emailcontroller.php';
$errors = array();

//NEW PASSWORD CHANGE//
if (isset($_POST['new-password'])) {
  $user_id = $_SESSION['id'];
  $pass = $_POST['pass'];
  $passConf = $_POST['passConf'];

  if (count($errors) === 0) {
    $sql = "SELECT * FROM users WHERE id='$user_id'";
    $stmt = $conn->prepare($sql);
 
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

  if (empty($pass) || empty($passConf)) {
    $errors['pass'] = "Password required";
  }
  if ($pass !== $passConf) {
    $errors['pass'] = "The two passwords do not match";
  }

  $pass = password_hash($pass, PASSWORD_DEFAULT);
  $email = $_SESSION['email'];

  if (count($errors) == 0) {
    $sql = "UPDATE users SET password='$pass' WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if ($result) {


        echo 'Thank you! Your password was successfully changed.';
      }

      header("refresh:3; url=http://localhost/sound/settings.php");
      exit(0);
    }
  }
}
//END NEW PASSWORD CHANGE//


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="shortcut icon" href="bg/store.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
          <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
          <script src="jquery.passwordstrength.js"></script>

      <style>
      
        body{
        background: url('../assets/musc.jpg');
    background-size: cover;
   

              font-family: sans-serif, Arial;
      }

     
      form p{
        font-size: 0.80em;
        color: white;
      }


          a{
            color: white !important;
            margin-bottom: -200px !important;
          }
          h1{
            color: white !important;
            margin-top: 200px !important;
            text-align: center;
            text-transform: uppercase;
          }

          footer{
            text-align: center;
            color: white;
            font-family: Arial;
            align-items: center;
            font-size: 12px;
          }
          .social{
            right: 72px;
            bottom: 50px;
            position: relative;
            align-items: center;
          }
          .social ul li{
            list-style: none;
            margin-top: 15px;
            text-align: right;
          }
          .socia ul li {
            list-style: none;
            margin-top: 15px;
            color: white;
          }
          .socia ul li a{
            list-style: none;
            margin-top: 15px;
            color: white;
          }
           h3{
            font-size: 20px;
            text-decoration: underline;
            text-shadow: 15px;
            font-style: italic;
            font-family: Arial;
          }
          .eye{
            position: absolute;
            color:white;
          }
          #hide1{
            display: none;
          }
          #hide3{
            display: none;
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
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-4 offset-md-4 form-div">
          <form class="" action="change_password.php" method="post" enctype="multipart/form-data">
            <h3 class="text-center"></h3>

            <?php if(count($errors) > 0): ?>
             <div class="alert alert-danger">
              <?php foreach($errors as $error): ?>
              <li><?php echo $error; ?></li>
            <?php endforeach; ?>
            </div>
          <?php endif; ?>
<br><br>
<?php echo $_SESSION['id']; ?>
           
      
            <div class="form-group">
              <label for="password"></label>
              <input type="password" name="pass" placeholder="Password"  id="password" class="form-control form-control-lg">
              <span class="eye" onclick=" myFunction()">
                <i id="hide1" class="fa fa-eye" aria-hidden="true"></i>
                <i id="hide2"class="fa fa-eye-slash" aria-hidden="true"></i>
              </span>
            </div>
            <div class="form-group">
              <label for="passwordConf"></label>
              <input  type="password" name="passConf" placeholder="Confirm-Password"  id="myInput2" class="form-control form-control-lg" >
              <span class="eye" onclick=" myFunction2()">
                <i id="hide3" class="fa fa-eye" aria-hidden="true"></i>
                <i id="hide4"class="fa fa-eye-slash" aria-hidden="true"></i>
              </span>
            </div><br>
            
            <div class="form-group">
              <button type="submit" name="new-password" class="btn btn-primary btn-block btn-lg">Change Password</button>

            </div><br>
          
            
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
  
</html><br>
<footer>&copy 2020</footer>
