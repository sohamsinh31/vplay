<?php
session_start();
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
$q = " SELECT * FROM `users` where name = '$name' && password = '$pass'";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
if($num == 1){
    echo "Already taken";
}
else{
    $qy=" INSERT into `users`(name , password) values ('$name' , '$pass')";
    mysqli_query($con,$qy);
}
?>