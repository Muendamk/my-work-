<?php

//require_once 'vendor/autoload.php';
require_once 'constants.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD);
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendVerificationEmail($userEmail, $token)
{
  global $mailer;

  $body = '<!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>verify email address</title>
    </head>
    <body>
      <div class="wrapper">
        <p>
          Thank you for signing up on our website. Please click on the link below to verify your email address.
        </p>
        <a href="http://localhost/music/home.php?token=' .$token. '">
          Verify your email address
        </a>
      </div>
    </body>
  </html>';

  // Create a message
  $message = (new Swift_Message('verify your email address'))
    ->setFrom(EMAIL)
    ->setTo($userEmail)
    ->setBody($body, 'text/html');


  // Send the message
  $result = $mailer->send($message);

}


//RESET PASSWORD//
function sendPasswordResetLink($userEmail, $token)
{
  global $mailer;

  $body = '<!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <title>Are you Reseting your password?</title>
    </head>
    <style>
    form p{
      font-size: 0.80em;
      color: white;
    }
    .form-div.login{
      margin-top: 90px;
    }
    </style>
    <body>
    <div class="container">
      <div class="row">
        <div class="col-md-4 offset-md-4 form-div login">
          <form class="" method="post">

      <div class="wrapper">
        <p>
      Hi  <br>
    If you’ve requested to reset your MusicStore password please hit the below button, which is only valid for 24 hours.
    <br>
    Ignore this message if you did not make a request
        </p>
        <a href="http://localhost/music/home.php?password-token=' .$token. '">
        <div class="form-group">
        <button type="submit" name="login-btn" class="btn btn-primary btn-block btn-lg">Reset your password</button><br>
    </div>

        </a>
      </div>
      </div>

      </div>

    </div>
    </body>
  </html>';

  // Create a message
  $message = (new Swift_Message('Reset your password'))
    ->setFrom(EMAIL)
    ->setTo($userEmail)
    ->setBody($body, 'text/html');


  // Send the message
  $result = $mailer->send($message);

}


//EMAIL CHANGE//
function sendEmailChangeLink($userEmail, $token)
{
  global $mailer;

  $body = '<!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>Are you Changing your Email address?</title>
    </head>
    <body>
      <div class="wrapper">
        <p>
                    Good day <br>
        You recently requested to change your Email address, if you made this request  <br> Please click on the link to change your email address.
        </p>
        <div class="form-group">
        <a href="http://localhost/sound/home.php?email-token=' .$token. '">

        <button type="submit" name="login-btn" class="btn btn-primary btn-block btn-lg">Change your email address</button><br>
    </div>
        </a>
      </div>
      </div>   </div>
    </body>
  </html>';

  // Create a message
  $message = (new Swift_Message('Change Email address'))
    ->setFrom(EMAIL)
    ->setTo($userEmail)
    ->setBody($body, 'text/html');


  // Send the message
  $result = $mailer->send($message);

}


//SENDING EMAIL FOR PASSWORD CHANGE//
function sendPasswordChangeLink($userEmail, $token)
{
  global $mailer;

  $body = '<!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>Did you change your password?</title>
    </head>
    <body>
      <div class="wrapper">
        <p>
                    Good day <br>
        You recently requested to change your Email address, if you made this request  <br> Please click on the link to change your email address.
        </p>
        <div class="form-group">
        <a href="http://localhost/music/home.php?changePassword-token=' .$token. '">

        <button type="submit" name="login-btn" class="btn btn-primary btn-block btn-lg">Recover Your Account</button><br>
    </div>
        </a>
      </div>
      </div>   </div>
    </body>
  </html>';

  // Create a message
  $message = (new Swift_Message('Change Email address'))
    ->setFrom(EMAIL)
    ->setTo($userEmail)
    ->setBody($body, 'text/html');


  // Send the message
  $result = $mailer->send($message);

}
