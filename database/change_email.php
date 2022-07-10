<?php require_once 'authcontroller.php';  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
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
      body{
        background-color: #333;
      }

      </style>
  </head>
  <body><br><br><br><br><br>
    <div class="container">
      <div class="row">
        <div class="col-md-4 offset-md-4 form-div login">
          <form class="" action="change_email.php" method="post">


            <?php if(count($errors) > 0): ?>
             <div class="alert alert-danger">
              <?php foreach($errors as $error): ?>
              <li><?php echo $error; ?></li>
            <?php endforeach; ?>
            </div>
          <?php endif; ?>

            <div class="form-group">
              <label for="email"></label>
              <input type="email" name="email" required placeholder="New-Email" class="form-control form-control-lg">
            </div>

            <div class="form-group">
              <button type="submit" name="change-email-btn" class="btn btn-primary btn-block btn-lg">Change Email</button>
            </div>

          </form>

        </div>

      </div>

    </div>
  </body>
</html>
