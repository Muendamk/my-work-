<?php require_once 'authcontroller.php';  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
      .form-div.login{
        margin-top: 90px;
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



           h3{
             color: blue;
             font-size: 12px;
             text-align: center;
           }
           h4{
             color: blue;
             font-size: 13px;
             text-align: center;
           }
           ul {
             margin: 0px;
             padding: 0px;
             list-style: none;
           }
           ul li {
             float: left;
             width: 100px;
             height: 40px;
             opacity: .8;
             line-height: 20px;
             text-align: center;
             font-size: 15px;
           }
           ul li a {
             text-decoration: none;
             color: white;
             display: block;
           }
           ul li a:hover {
             background-color: grey;
           }
           .eye{
             position: absolute;
             color: white;
           }
           #hide1{
             display: none;
           }
           .logo img{
             width: 300px;
             align-items: center;
             margin-left: 500px;
           }
           @media only screen and (max-width: 520px){
   
  
}
      </style>
  </head>
  <body><br><br>

    <ul>


<br><br>
    <div class="container">
      <div class="row">
        <div class="col-md-4 offset-md-4 form-div login">
          <form class="" action="old_password.php" method="post">
            <h3 class="text-center"></h3>

            <?php if(count($errors) > 0): ?>
             <div class="alert alert-danger">
              <?php foreach($errors as $error): ?>
              <li><?php echo $error; ?></li>
            <?php endforeach; ?>
            </div>
          <?php endif; ?>
          <?php echo $_SESSION['id']; ?>
         
            <div class="form-group">
              <label for="password"></label>
              <input  type="password"  name="pass" placeholder="Password" id="myInput" class="form-control form-control-lg" >
              <span class="eye" onclick=" myFunction()">
                <i id="hide1" class="fa fa-eye" aria-hidden="true"></i>
                <i id="hide2"class="fa fa-eye-slash" aria-hidden="true"></i>
              </span>

            </div><br><br>
            <div class="form-group">
              
              <button type="submit" name="change-password" class="btn btn-primary btn-block btn-lg">Verify</button><br>
          </div>
          
        

          </form>

        </div>

      </div>

    </div>
<script>
  function myFunction() {
    var x = document.getElementById("myInput");
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
  </body>
</html>

