<?php
session_start();
include_once('functions.php');
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
    header('location:login.php');
}
else{
    $qy=" INSERT into `users`(name , email , password , image ) values ('$name' , '$email' , '$pass' , '$target_file')";
    mysqli_query($con,$qy);
    // createDirectory();
    userimage();
    header('location:login.php');
}
?>