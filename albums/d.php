<?php
//include 'videos/db.php';

 


$table = 'album_names';


$posts = selectAll($table);

$artists = selectAll('artists');

  if(isset($_POST['add-post']))
  {
  	if($_POST['foldername'] != "")
  	{
  		$foldername=$_POST['foldername'];
  		if(!is_dir($foldername)) mkdir($foldername);
  		foreach($_FILES['files']['name'] as $i => $name)
		{
  		    if(strlen($_FILES['files']['name'][$i]) > 1)
  		    {  move_uploaded_file($_FILES['files']['tmp_name'][$i],$foldername."/".$name);
  		    }
          $sql = "INSERT INTO folders (name,image, artist_id) VALUES ('$name', '$artist_id')";

          $res = mysqli_query($con,$sql);
      
          if ($res ==1) {
            echo "<h1>success</h1>";
          }}
  		echo "Folder is successfully uploaded";
  	}
  	else
  	    echo "Upload folder name is empty";
  }
  
 // $sql = "SELECT * FROM topics";
  ?>
<html>
  <head>
  <title> </title>
  </head>
  <body>
  <form action="#" method="post" enctype="multipart/form-data"> 

  </form>
  </body>
  </html>