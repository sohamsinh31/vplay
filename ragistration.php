<?php
session_start();
include_once('functions.php');
header('location:login.php');
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
$email = $_POST['email'];
$image = $target_dir . basename($_FILES["userim"]["name"]);
$q = " SELECT * FROM `users` where email = '$email' && password = '$pass'";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
if($num == 1){
    echo "Already taken";
}
else{
    $qy=" INSERT into `users`(name , email , password , image ) values ('$name' , '$email' , '$pass' , '$image')";
    mysqli_query($con,$qy);
    createDirectory();
}

?>