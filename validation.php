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
$required = array('user' , 'password');

// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

if ($error) {
  echo "All fields are required.";
} else {
mysqli_select_db($con,'vuploads');
$name = $_POST['user'];
$pass = $_POST['password'];
$q = " SELECT * FROM `users` WHERE name = '$name' && password = '$pass'";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
if($num == 1){
    $_SESSION['username'] = $name;
    header('location:index.php');

}
else{
    header('location:login.php');
}
}
?>