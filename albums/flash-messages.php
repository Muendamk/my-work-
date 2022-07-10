<?php if(isset($_SESSION['message'])): ?>
   <div class="alert alert-success">
  <div class="msg <?php echo $_SESSION['type']; ?>">
    <li><?php echo $_SESSION['message']; ?></li>
      <?php
      unset($_SESSION['message']);
        unset($_SESSION['type']);
       ?>
  </div>

<?php endif; ?>


<?php if(count($errors) > 0): ?>
 <div class="alert alert-danger">
  <?php foreach($errors as $error): ?>
  <li><?php echo $error; ?></li>
<?php endforeach; ?>
</div>
<?php endif; ?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
        li{
          text-decoration: none;
          list-style: none;

        }
    </style>
  </head>
  <body>

  </body>
</html>
