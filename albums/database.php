<?php
   require ('../../database/authcontroller.php');
   include 'validation.php';

$table = 'album_names';


$instrumentals = selectAll($table);

$artists = selectAll('artists');

$users = selectAll($table);


$errors =array();
$id = "";
$title = "";
$body = "";
  $artist_id = "";
    $published = "";

    if (isset($_GET['id'])) {
        $beat = selectOne($table, ['id' =>$_GET['id']]);


      $id =  $beat['id'];
      $title =  $beat['title'];
      $body =  $beat['body'];
      $artist_id =  $beat['artist_id'];
      $published = $beat['published'];
    }



if (isset($_POST['add-post'])) {
//  dd($_FILES);
  $errors = validatePost($_POST);

if (!empty($_FILES['image']['name'])) {
    $image_name =$_FILES['image']['name'];
    $destination = "beats/cover/" .$image_name;
    $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
    if ($result){
      $_POST['image'] = $image_name;
    }else{
      array_push($errors, "Upload failed");
    }
}else{
  array_push($errors, "Post image required");
}
$name = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name'];



move_uploaded_file($tmp, "beats/cover/".$name);


if (!empty($_FILES['song']['name'])) {
  $song_name =$_FILES['song']['name'];
  $destination = "beats/" .$song_name;
  $result = move_uploaded_file($_FILES['song']['tmp_name'], $destination);
  if ($result){
    $_POST['path'] = $song_name;
  }else{
    array_push($errors, "Upload failed");
  }
}else{
array_push($errors, "Beat required");
}
$name = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name'];



move_uploaded_file($tmp, "beats/".$name);



    if (count($errors) === 0) {
  unset($_POST['add-post']);
  $_POST['user_id'] = $_SESSION['id'];
  $_POST['published'] = isset($_POST['published']) ? 1 : 0;

  $_POST['body'] = htmlentities($_POST['body']);


  $beat_id = create($table, $_POST);
  header('location: home.php');
  //dd($post_id);
  $_SESSION['message'] = "Topic created successfully!";
  $_SESSION['type'] = "success";

  //$_SESSION['message'] = 'Topic created successfully!';
    //$_SESSION['type'] = "success";
} else {
  $title = $_POST['title'];
  $body = $_POST['artist_id'];
    $artist_id = $_POST['artist_id'];
      $published = isset($_POST['published']) ? 1 : 0;;
}
}

//BEATS//

if (isset($_POST['add-beat'])) {
  //  dd($_FILES);
  
  
  if (!empty($_FILES['image']['name'])) {
      $image_name =$_FILES['image']['name'];
      $destination = "beats/cover/" .$image_name;
      $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
      if ($result){
        $_POST['cover'] = $image_name;
      }else{
        array_push($errors, "Upload failed");
      }
  }else{
    array_push($errors, "Post image required");
  }
  $name = $_FILES['file']['name'];
  $tmp = $_FILES['file']['tmp_name'];
  
  
  
  move_uploaded_file($tmp, "beats/cover/".$name);
  
  
  if (!empty($_FILES['song']['name'])) {
    $song_name =$_FILES['song']['name'];
    $destination = "beats/" .$song_name;
    $result = move_uploaded_file($_FILES['song']['tmp_name'], $destination);
    if ($result){
      $_POST['beats'] = $song_name;
    }else{
      array_push($errors, "Upload failed");
    }
  }else{
  array_push($errors, "Audio File required");
  }
  $name = $_FILES['file']['name'];
  $tmp = $_FILES['file']['tmp_name'];
  
  
  
  move_uploaded_file($tmp, "beats".$name);
  
  
  
      if (count($errors) === 0) {
    unset($_POST['add-beat']);
    $_POST['user_id'] = $_SESSION['id'];
    $_POST['published'] = isset($_POST['published']) ? 1 : 0;
  
 
 
    $post_id = create($table, $_POST);
    header('location: home.php');
    //dd($post_id);
    $_SESSION['message'] = "Topic created successfully!";
    $_SESSION['type'] = "success";
  
    //$_SESSION['message'] = 'Topic created successfully!';
      //$_SESSION['type'] = "success";
  } else {
    $name = $_POST['name'];
   
      $artist_id = $_POST['artist_id'];
        $published = isset($_POST['published']) ? 1 : 0;;
  }
  }
  

//END BEATS//
if (isset($_POST['update-post'])) {
  $errors = validatePost($_POST);

  if (!empty($_FILES['image']['name'])) {
      $image_name = time() . '_' . $_FILES['image']['name'];
      $destination = "poster/" .$image_name;

      $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
      if ($result){
        $_POST['image'] = $image_name;
      }else{
        array_push($errors, "Upload failed");
      }
  }else{
    array_push($errors, "Post image required");
  }

  
  if (count($errors) === 0) {
    $id = $_POST['id'];
unset($_POST['update-post'], $_POST['id']);
  $_POST['user_id'] = $_SESSION['id'];
$_POST['published'] = isset($_POST['published']) ? 1 : 0;
$_POST['body'] = htmlentities($_POST['body']);


$post_id = update($table, $id, $_POST);
//dd($post_id);
$_SESSION['message'] = "Post updated successfully!";
$_SESSION['type'] = "success";
header('location: home.php');
//$_SESSION['message'] = 'Topic created successfully!';
  //$_SESSION['type'] = "success";
} else {
$title = $_POST['title'];
$body = $_POST['artist_id'];
  $artist_id = $_POST['artist_id'];
    $published = isset($_POST['published']) ? 1 : 0;;
}
}

if (isset($_GET['delete_id'])) {
  //$id = $_GET['del_id'];
  $count = delete($table, $_GET['delete_id']);
  $_SESSION['message'] = 'Post deleted successfully!';
  $_SESSION['type'] = 'success';
  header('location: index.php');
  exit();
}

if (isset($_GET['published']) && isset($_GET['p_id'])){
    $published = $_GET['published'];
    $p_id = $_GET['p_id'];
    //update published
    $count = update($table, $p_id, ['published' => $published]);
    $_SESSION['message'] = 'Post status successfully changed!';
    $_SESSION['type'] = 'success';
    header('location: home.php');
    exit();
}




/*  $errors = validateTopic($_POST);

  if (count($errors) === 0) {


  unset($_POST['add-topic']);

  $artist_id = create($table, $_POST);
  $_SESSION['message'] = 'Topic created successfully!';
    $_SESSION['alert-class'] = "alert-success";
  header('location: index.php');
  exit();

} else {
  $name = $_POST['name'];
  $description = $_POST['description'];
}



if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $topic = selectOne($table, ['id' => $id]);
  $id = $topic['id'];
  $name = $topic['name'];
  $description = $topic['description'];
}

if (isset($_GET['del_id'])) {
  $id = $_GET['del_id'];
  $count = delete($table, $id);
  $_SESSION['message'] = 'Post deleted successfully!';
  $_SESSION['type'] = 'success';
  header('location: index.php');
  exit();
}
if (isset($_POST['update-post'])) {
  $errors = validateTopic($_POST);

    if (count($errors) === 0) {
    $id = $_POST['id'];
    unset($_POST['update-post'], $_POST['id']);
    $post_id = update($table, $id, $_POST);
    $_SESSION['message'] = 'Post updated successfully!';
    $_SESSION['type'] = 'success';
    header('location: index.php');
    exit();
  } else {
      $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
  }
}*/
