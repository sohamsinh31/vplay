<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="row">
        <div class="col-lg-6">
            <h2>Log in form</h2>
            <form action="login.php" method="post">
                <div class="form-groop">
                    <label>username</label>
                    <input type="text" name="user" class="form-control">
</div>
<div class="form-groop">
                    <label>password</label>
                    <input type="password" name="password" class="form-control">
</div>
<br>
<button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
<div class="col-lg-6">
            <h2>signup form</h2>
            <form action="login.php" method="post" enctype="multipart/form-data">
                <div class="form-groop">
                    <label>username</label>
                    <input type="text" name="user" class="form-control">
</div>
<div class="form-groop">
                    <label>email</label>
                    <input type="text" name="email" class="form-control">
</div>
<div class="form-groop">
                    <label>password</label>
                    <input type="password" name="password" class="form-control">
</div>
<div class="form-groop">
                    <label>user profile image</label>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
<br>
<input  class="btn btn-primary" type="submit" value="Upload" name="submit">
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php
session_start();
include_once('functions.php');
function userimage() {
    $con = mysqli_connect('localhost','root');
    mysqli_select_db($con,'vuploads');
    $q = " SELECT * FROM `users` ";
    $result = mysqli_query($con,$q);
    $num = mysqli_num_rows($result);
    while($row = mysqli_fetch_assoc($result)){
        $target_dir = "users/".$row['name']."/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
        }
        
        if($imageFileType != "png" && $imageFileType != "gif" && $imageFileType != "jpeg"
        && $imageFileType != "jpg" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
    }
    }
// header('location:login.php');
$con = mysqli_connect('localhost','root');
if($con){
    echo "connection was successfull";
}
else{
    echo "no connection";
}
mysqli_select_db($con,'vuploads');
$name = $_POST['user'];
$pass = $_POST['password'];
//$image = $_POST['userim'];
$target_dir = "users/".$name."/";
$email = $_POST['email'];
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$q = " SELECT * FROM `users` where email = '$email' && password = '$pass'";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
if($num == 1){
    echo "Already taken";
}
else{
    $qy=" INSERT into `users`(name , email , password , image ) values ('$name' , '$email' , '$pass' , '$target_file')";
    mysqli_query($con,$qy);
    createDirectory();
    userimage();
}

?>