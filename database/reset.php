<?php require_once 'authcontroller.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
      body{
    background: #101820FF;
        background-size: cover;
        background-position: center;
        color: white! important;
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


      .social{
        right: 72px;
        bottom: 50px;
        position: relative;
        align-items: center;
      }
      .social ul li{
        list-style: none;
        margin-top: 15px;
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


      </style>
  </head>
  <body>
    <br>
    <ul>

    </ul><br><br><br><br>


    <div class="container">
      <div class="row">
        <div class="col-md-4 offset-md-4 form-div login">
          <form action="reset.php" method="post">
            <h3 class="text-center">Recover your password</h3>
            <p>Please enter your email address you used to sign-up on this site and we will assist you in recovering your password.</p>

            <?php if(count($errors) > 0): ?>
             <div class="alert alert-danger">
              <?php foreach($errors as $error): ?>
              <li><?php echo $error; ?></li>
            <?php endforeach; ?>
            </div>
          <?php endif; ?>

            <div class="form-group">
              <input type="email" name="email" class="form-control form-control-lg">
            </div>

            <div class="form-group">
              <button type="submit" name="forgot-password" class="btn btn-primary btn-block btn-lg">Recover your password</button>

            </div>

          </form>

        </div>

      </div>

    </div>
    <div class="social">
      <ul>
          <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
      </ul>

    </div>

  </body>
</html><br>
<br>
<br>
<br>
<br>
<br><br>
<footer> © 2020 </footer>
