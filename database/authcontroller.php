<?php


session_start();
  require ('connection.php');
  require 'db.php';
  require_once 'emailcontroller.php';



function dd($value) //detete
{
echo "<pre>", print_r($value, true), "</pre>";
die();
}


function executeQuery($sql, $data)
{
  global $conn;
  $stmt = $conn->prepare($sql);
  $values = array_values($data);
  $types = str_repeat('s', count($values));
  $stmt->bind_param($types, ...$values);
  $stmt->execute();
  return $stmt;
}


function selectAll($table, $conditions = [])
{

  global $conn;
  $sql = "SELECT * FROM $table";
  if (empty($conditions)) {
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
      return $records;
}else {
  $i = 0;
  foreach ($conditions as $key => $value) {
    if ($i === 0) {
        $sql = $sql . " WHERE $key=?";
    }else {
        $sql = $sql . " AND $key=?";
    }
    $i++;
  }

  $stmt = executeQuery($sql, $conditions);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}
}


function selectOne($table, $conditions){

  global $conn;
  $sql = "SELECT * FROM $table";

  $i = 0;
  foreach ($conditions as $key => $value) {
    if ($i === 0) {
        $sql = $sql . " WHERE $key=?";
    }else {
        $sql = $sql . " AND $key=?";
    }
    $i++;
  }

  $stmt = $sql . " LIMIT 1";
  $stmt = executeQuery($sql, $conditions);
  $records = $stmt->get_result()->fetch_assoc();
  return $records;
}


function create($table, $data)
 {
  global $conn;
//  $sql = "INSERT INTO users SET username=?, admin=?, email=?, password=?"
$sql = "INSERT INTO $table SET ";

$i = 0;
foreach ($data as $key => $value) {
  if ($i === 0) {
      $sql = $sql . " $key=?";
  }else {
      $sql = $sql . ", $key=?";
  }
  $i++;
}

$stmt = executeQuery($sql, $data);
$id = $stmt->insert_id;
return $id;
}

function update($table, $id, $data) {
  global $conn;
  //$sql = "UPDATE users SET username=?, admin=?, email=?, password=? WHERE id=?"
$sql = "UPDATE $table SET ";

$i = 0;
foreach ($data as $key => $value) {
  if ($i === 0) {
      $sql = $sql . " $key=?";
  }else {
      $sql = $sql . ", $key=?";
  }
  $i++;
}

$sql = $sql . " WHERE id=?";
$data['id'] = $id;
$stmt = executeQuery($sql, $data);
return $stmt->affected_rows;
}

function delete($table, $id) {
  global $conn;
  $sql = "DELETE FROM $table WHERE id=?";

$stmt = executeQuery($sql, ['id' =>$id]);
return $stmt->affected_rows;
}

function getPublishedposts(){
  global $conn;
  $sql = "SELECT p.*, u.username FROM music AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=?";

  $stmt = executeQuery($sql, ['published' => 1]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;

}

function searchPosts($term){
  $match = '%' . $term . '%';
  global $conn;
  $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? AND p.path LIKE ? OR p.body LIKE ? ";

  $stmt = executeQuery($sql, ['published' => 1, 'path' => $match, 'body' => $match]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;

}

function getPostsByTopicId($artist_id){
  global $conn;
  $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? AND artist_id=?";

  $stmt = executeQuery($sql, ['published' => 1, 'artist_id' => $artist_id]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;

}




function getPostsByMoodId($artist_id){
  global $conn;
  $sql = "SELECT p.*, u.username FROM music AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? AND artist_id=?";

  $stmt = executeQuery($sql, ['published' => 1, 'artist_id' => $artist_id]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;

}

function getPostsByGenreId($artist_id){
  global $conn;
  $sql = "SELECT p.*, u.username FROM music AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? AND artist_id=?";

  $stmt = executeQuery($sql, ['published' => 1, 'artist_id' => $artist_id]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;

}

//USERS//


$errors = array();
$username = "";
$email = "";
$surname = "";
$type = "";

if(isset($_POST['signup-btn'])){

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $passwordConf = $_POST['passwordConf'];
  $profileImageName = time() . '_' . $_FILES['profileImage']['name'];

  $target = 'img/' . $profileImageName;




  if (empty($username)) {
    $errors['username'] = "Username required";
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['email'] = "Invalid Email address";
  }
  if (empty($email)) {
    $errors['email'] = "Email required";
  }
  if (empty($password)) {
    $errors['password'] = "Password required";
  }
  if ($password !== $passwordConf) {
    $errors['password'] = "The two passwords do not match";
  }

  $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
  $stmt = $conn->prepare($emailQuery);
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $userCount = $result->num_rows;
  $stmt->close();

  if ($userCount > 0){
    $errors['email'] = "Email already exists";
  }
  if (count($errors) === 0) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $token = bin2hex(random_bytes(50));
    $verified = false;

    if (move_uploaded_file($_FILES['profileImage']['tmp_name'],$target)) {
    $sql = "INSERT INTO users (username, email, verified, token, password,image) VALUES (?, ?, ?, ?, ?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssbsss', $username, $email, $verified, $token, $password,$profileImageName);

      
    if ($stmt->execute()){

      $user_id = $conn->insert_id;
      $_SESSION['id'] = $user_id;
      $_SESSION['username'] = $username;
      $_SESSION['email'] = $email;
      $_SESSION['verified'] = $verified;


      sendVerificationEmail($email, $token);



      $_SESSION['alert-class'] = "alert-success";
      header('location: index.php');
      exit();
    }else {
      $errors['db_error'] = "Database error: failed to register";
    }
  }
}
}

if(isset($_POST['login-btn'])){
  $username = $_POST['username'];
  $password = $_POST['password'];


  if (empty($username)) {
    $errors['username'] = "Username required";
  }

  if (empty($password)) {
    $errors['password'] = "Password required";
  }

  if (count($errors) === 0) {
    $sql = "SELECT * FROM users WHERE email=? OR username=? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {

      $_SESSION['id'] = $user['id'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['verified'] = $user['verified'];


      $_SESSION['message'] = "You are now logged in!";
      $_SESSION['alert-class'] = "alert-success";
      header('location: index.php');
      exit();

    }else {
      $errors['login_fail'] = "Wrong credentials";
      }
  }
}

//ADMIN LOGIN//
//END ADMIN//

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['id']);
  unset($_SESSION['username']);
  unset($_SESSION['email']);
  unset($_SESSION['verified']);
  header('location: login.php');
  exit();
}

function verifyUser($token)
{
  global $conn;
  $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $update_query = "UPDATE users SET verified=1 WHERE token='$token'";

    if (mysqli_query($conn, $update_query)) {

      $_SESSION['id'] = $user['id'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['verified'] = 1;

      $_SESSION['message'] = "Your email address was successfully verified!";
      $_SESSION['alert-class'] = "alert-success";
      header('location: index.php');
      exit();

    }
  } else {
    echo 'User not found';
  }
}

//RESET LINK//
if (isset($_POST['forgot-password'])) {
  $email = $_POST['email'];

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['email'] = "Email address is invalid";
  }
  if (empty($email)) {
    $errors['email'] = "Email required";
  }

  if(count($errors) == 0) {
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    $token = $user['token'];
    sendPasswordResetLink($email, $token);
    header('location: link.php');
    exit(0);
  }
}

//RESETING PASSWORD//
if (isset($_POST['reset-password-btn'])) {
  $password = $_POST['password'];
  $passwordConf = $_POST['passwordConf'];

  if (empty($password) || empty($passwordConf)) {
    $errors['password'] = "Password required";
  }
  if ($password !== $passwordConf) {
    $errors['password'] = "The two passwords do not match";
  }

  $password = password_hash($password, PASSWORD_DEFAULT);
  $email = $_SESSION['email'];

  if (count($errors) == 0) {
    $sql = "UPDATE users SET password='$password' WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if ($result) {


        echo 'Thank you! Your password was successfully changed.';
      }

      header("refresh:3; url=http://localhost/music/home.php");
      exit(0);
    }
  }


function resetPassword($token)
  {
    global $conn;
    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $user['email'];
    header('location: database/reset_password.php');
    exit(0);
  }



//RESET LINK EMAIL//
if (isset($_POST['new-email'])) {
  $email = $_POST['email'];

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['email'] = "Email address is invalid";
  }
  if (empty($email)) {
    $errors['email'] = "Email required";
  }

  if(count($errors) == 0) {
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    $token = $user['token'];
    sendEmailChangeLink($email, $token);
    header('location: links.php');
    exit(0);
  }
}

//Change EMAIL//

if (isset($_POST['change-email-btn'])) {
$email= $_POST['email'];

$user_id = $_SESSION['id'];

  if (count($errors) == 0) {
$query = "UPDATE users SET email='$email' WHERE id='$user_id'";
    $result = mysqli_query($conn, $query);
    if ($result) {

      echo '<script type/javascript> alert("Your Email was successfully changed.")</script>';
      header("refresh:2; url=http://localhost/sound/home.php");
      exit(0);
    }
    else {
    echo '<script type/javascript> alert("Email already Exists.")</script>';
}
}
}

//CHANGING EMAIL//
function resetEmail($token)
  {
    global $conn;
    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $user['email'];
    header('location: database/change_email.php');
    exit(0);
  }

  $con = mysqli_connect('localhost', 'root','');

  if(!$con)
  {
    echo '';
  }
  if(!mysqli_select_db($con, 'music_storae'))
  {
    echo '';
  }


  if (isset($_POST['fav'])) {
   


    $sql = "INSERT INTO playlists (title, user_id,) VALUES('$fav', '$id')";

    if(!mysqli_query($con,$sql))
    {
          echo '<script>alert("Please try again")</script>';
    }
    else{
              echo '<script>alert("Subscription Added")</script>';
    }

  }

//Change USERNAME//

if (isset($_POST['username'])) {
  $user= $_POST['user'];
  
  $user_id = $_SESSION['id'];
  
    if (count($errors) == 0) {
  $query = "UPDATE users SET username='$user' WHERE id='$user_id'";
      $result = mysqli_query($conn, $query);
      if ($result) {
  
        echo '<script type/javascript> alert("Your Username was successfully changed.")</script>';
        header("refresh:2; url=http://localhost/sound/settings.php");
        exit(0);
      }
      else {
      echo '<script type/javascript> alert("Try again")</script>';
  }
  }
  }
//END Change USERNAME//


  //Change EMAIL//

if (isset($_POST['change-email-btn'])) {
  $email= $_POST['email'];
  
  $user_id = $_SESSION['id'];
  
    if (count($errors) == 0) {
  $query = "UPDATE users SET email='$email' WHERE id='$user_id'";
      $result = mysqli_query($conn, $query);
      if ($result) {
  
        echo '<script type/javascript> alert("Your Email was successfully changed.")</script>';
        header("refresh:2; url=http://localhost/music/home.php");
        exit(0);
      }
      else {
      echo '<script type/javascript> alert("Email already Exists.")</script>';
  }
  }
  }
  //END E+USERNAME//


//OLD PASS//
if(isset($_POST['change-password'])){
 
  $pass = $_POST['pass'];
  $user_id = $_SESSION['id'];
  if (empty($pass)) {
    $errors['pass'] = "Password required";
  }

  if (count($errors) === 0) {
    $sql = "SELECT * FROM users WHERE id='$user_id'";
    $stmt = $conn->prepare($sql);
 
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (password_verify($pass, $user['password'])) {

      $_SESSION['id'] = $user['id'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['verified'] = $user['verified'];


      $_SESSION['message'] = "You are now logged in!";
      $_SESSION['alert-class'] = "alert-success";
      header('location: change_password.php');
      exit();

    }else {
      $errors['login_fail'] = "Incorrect Password";
      }
  }
}

//END OLD PASS//
  
//DOWNLOAD COUNT//
function record_dowload($conn,$id,$user_id){
	$download_time = time();
	$sql = "INSERT INTO `downloads` 
			(id,user_id,timestamp)
			VALUES 
			(
				{$id},{$user_id},'{$download_time}'
			)
	";

 	if($conn->query($sql)){

 	}else{

 	}
 	
}
//END DOWNLOAD COUNT//
 ?>