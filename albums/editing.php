<?php

  include 'connect_edit.php';

  if (!isset($_SESSION['id'])) {
    header('location:../index.php');
    exit();
  }
//$table = 'topics';

//$topics = selectAll($table);


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="scripts.js" defer></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!--CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
<link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">
    <title></title>
  </head>
  <body>
    <header>
     

      <i class="fa fa-bars menu-toggle"></i>
      <ul class="nav">

        <li><a href="#">
           
        
            <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
        </a>
              <ul>
                <li><a href="#" class="logout" >Logout</a> </li>
                <!--DARK/LIGHT MODE-->
              <button class="theme-toggle-button">
                <svg class="icon" style="width:20px;height:20px" viewBox="0 0 24 24">
                  <path fill="currentColor" d="M7.5,2C5.71,3.15 4.5,5.18 4.5,7.5C4.5,9.82 5.71,11.85 7.53,13C4.46,13 2,10.54 2,7.5A5.5,5.5 0 0,1 7.5,2M19.07,3.5L20.5,4.93L4.93,20.5L3.5,19.07L19.07,3.5M12.89,5.93L11.41,5L9.97,6L10.39,4.3L9,3.24L10.75,3.12L11.33,1.47L12,3.1L13.73,3.13L12.38,4.26L12.89,5.93M9.59,9.54L8.43,8.81L7.31,9.59L7.65,8.27L6.56,7.44L7.92,7.35L8.37,6.06L8.88,7.33L10.24,7.36L9.19,8.23L9.59,9.54M19,13.5A5.5,5.5 0 0,1 13.5,19C12.28,19 11.15,18.6 10.24,17.93L17.93,10.24C18.6,11.15 19,12.28 19,13.5M14.6,20.08L17.37,18.93L17.13,22.28L14.6,20.08M18.93,17.38L20.08,14.61L22.28,17.15L18.93,17.38M20.08,12.42L18.94,9.64L22.28,9.88L20.08,12.42M9.63,18.93L12.4,20.08L9.87,22.27L9.63,18.93Z" />
                </svg>

              </button>
              <div class="sun-moon-container">
                <svg class="sun" style="width:24px;height:24px" viewBox="0 0 24 24">
                  <path d="M3.55,18.54L4.96,19.95L6.76,18.16L5.34,16.74M11,22.45C11.32,22.45 13,22.45 13,22.45V19.5H11M12,5.5A6,6 0 0,0 6,11.5A6,6 0 0,0 12,17.5A6,6 0 0,0 18,11.5C18,8.18 15.31,5.5 12,5.5M20,12.5H23V10.5H20M17.24,18.16L19.04,19.95L20.45,18.54L18.66,16.74M20.45,4.46L19.04,3.05L17.24,4.84L18.66,6.26M13,0.55H11V3.5H13M4,10.5H1V12.5H4M6.76,4.84L4.96,3.05L3.55,4.46L5.34,6.26L6.76,4.84Z" />
                </svg>

                <svg class="moon" style="width:24px;height:24px" viewBox="0 0 24 24">
                  <path d="M17.75,4.09L15.22,6.03L16.13,9.09L13.5,7.28L10.87,9.09L11.78,6.03L9.25,4.09L12.44,4L13.5,1L14.56,4L17.75,4.09M21.25,11L19.61,12.25L20.2,14.23L18.5,13.06L16.8,14.23L17.39,12.25L15.75,11L17.81,10.95L18.5,9L19.19,10.95L21.25,11M18.97,15.95C19.8,15.87 20.69,17.05 20.16,17.8C19.84,18.25 19.5,18.67 19.08,19.07C15.17,23 8.84,23 4.94,19.07C1.03,15.17 1.03,8.83 4.94,4.93C5.34,4.53 5.76,4.17 6.21,3.85C6.96,3.32 8.14,4.21 8.06,5.04C7.79,7.9 8.75,10.87 10.95,13.06C13.14,15.26 16.1,16.22 18.97,15.95M17.33,17.97C14.5,17.81 11.7,16.64 9.53,14.5C7.36,12.31 6.2,9.5 6.04,6.68C3.23,9.82 3.34,14.64 6.35,17.66C9.37,20.67 14.19,20.78 17.33,17.97Z" />
                </svg>
              </div><br><br>

              </ul>
        </li>
      </ul>
    </header><br><br>

    <!--SLIDER-->
    <div class="admin-wrapper">

    <!--    <div class="left-sidebar">
              <ul>
                    <li><a href="admin.php">Manage Posts</a></li>
                    <li><a href="admin.php">Manage Users</a></li>
                    <li><a href="admin.php">Manage Topics</a></li>
                  </ul>
        </div>-->

<!--ADMIN CONTENT-->
          <div class="admin-content">
              <div class="button-group">
                <!--  <a href="create-topic.php" class="btn btn-big">Add Post</a> -->
                <a href="index.php"class="btn btn-big">Manage Post</a>
                  <?php include 'flash-messages.php'; ?>
              </div>
<br><br><br>
              <div class="content">
                <h2 class="page-title">Edit Post</h2>

              <form action="editing.php" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <div>

                  <input type="text" class="text-input" value="<?php echo $title; ?>" name="foldername" />
                
                    </div>
                    <div>

        
<input type="text" name="title"   class="text-input" value="<?php echo $title  ?>">
</div>

<div>
<label ></label>
<textarea  name="body" id="body"><?php echo $body ?></textarea>
</div>
                    <div>
                    <label ></label>
                  
                    <input type="file" name="files[]" class="text-input" id="files" multiple directory="" webkitdirectory="" moxdirectory="" /><br/><br/> 
                    <input type="file" name="image"  class="text-input">
      
                      <label>Topic</label>
                      <select name="artist_id" class="text-input" >
                        <option value=""></option>
                        <?php foreach ($artists as $key => $topic): ?>
                          <?php if (!empty($topic['id']) && $artist_id == $topic['id'] ): ?>
                          <option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                        <?php else: ?>
                            <option value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                          <?php endif; ?>

                        <?php endforeach; ?>
                      </select>
                        </div>
                        <?php if (empty($published) && $published == 0): ?>
                        <label>
                          <input type="checkbox" name="published">
                          publish

                        </label>
                      <?php else: ?>
                        <label>
                          <input type="checkbox" name="published" checked>
                          publish
                        </label>
                      <?php endif; ?>
                        <div><div><br>

                      <button type="submit" name="update-post" class="btn btn-big">Update Post</button>
                          </div>
              </form>
              </div>
          </div>
              </div>
              <?php 
     
     if(isset($_POST['update-post']))
  {
  
    $songs= $_POST['songs'];
  
   

  	if($_POST['foldername'] != "")
  	{
  		$foldername=$_POST['foldername'];
  		if(!is_dir($foldername)) mkdir($foldername);
  		foreach($_FILES['files']['name'] as $i => $name)
		{
  		    if(strlen($_FILES['files']['name'][$i]) > 1)
  		    {  move_uploaded_file($_FILES['files']['tmp_name'][$i],$foldername."/".$name);
  		    }
          $sql = "UPDATE albums_names SET songs ='$name' WHERE id='$id'";

          $res = mysqli_query($con,$sql);
      
          if ($res ==1) {
            echo "<h1>success</h1>";
          }}
  		echo "Folder is successfully uploaded";
  	}
  	else
  	    echo "Upload folder name is empty";
  }
     
  
     ?>



    <!--FOOTER-->

    <!--QUERy-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!--EDITOR-->
<script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>

  <!--CUSTom jS-->

  </body>



</html>
