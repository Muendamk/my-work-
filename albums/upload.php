
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "music_storage";


$conn = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST['submit'])){

    $fileCount = count($_FILES['file']['name']);
    for($i=0;$i<$fileCount;$i++){
        $fileName = $_FILES['file']['name'][$i];
        $sql = "INSERT INTO album (title,user_id) VALUES('$fileName', '$fileName')";

        if($conn->query($sql) === TRUE){
            echo "succss";
        }else{
            echo "noo";
        }
                move_uploaded_file($_FILES['file']['tmp_name'][$i], 'audio/'.$fileName);
    }

}



?>

<form action=""method="post" enctype="multipart/form-data">

<input type='file' name='file[]' id='file' multiple>

<input type='submit' name='submit' value='upload'>

</form>