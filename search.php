<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:login.php');
}
include('functions.php'); 
include('includes/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link id="stylesheet" rel="stylesheet" type="text/css" href="includes/style.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
</head>
<body>
<br>
<div class="upload">
<form action="" method="post" enctype="multipart/form-data">
<input style="width:80%;float:left;border-bottom: 2px solid white;background:none;border-style: none none solid;" class="form-control" type="text" name="name" id="name">
<br>
<button style="width:20%;color:white;" onclick="return foo2();" style="background-color:blue;" class="btn btn-primary" type="submit"  name="submit">Q</button>
<!--<label>Category</label>-->
<?php
$required = array('name');

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
$servername = "localhost";
$username = "root";
$password = "";
$database = "vuploads";
$name = $_POST['name'];
$imcl =" class='im1'";
$im2cl =" class='im2'";
$imsrc =" 'src='.$username.''";
$ima = "<p2 style='color: black;'><a href = 'javascript:void(0)' onclick = 'document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block''>:</a></p2>";
// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
$sql = "SELECT * FROM `persons` WHERE Name LIKE '%$name%' ";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
// Display the rows returned by the sql query
if($num> 0){
      while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
        include('includes/db.php');
        $user = $row['uploadby'];
        $sql3 = " SELECT * FROM `users` WHERE name = '$user'";
        $result3 = mysqli_query($conn,$sql3);
        $num3 = mysqli_num_rows($result3);
        if($num3> 0){
          while(($row3 = mysqli_fetch_assoc($result3))){
            echo "<br>";
            echo "<div id="."s2".">";
            echo "<p1><img ".$imcl." src='".$row3['image']."'>".$row3['name']."</p1>".$ima;
            echo "<a href=watch.php?video=".$row['id']."><img".$im2cl."src=".$row['thumbpath']."></a>";
            echo "<p3>".$row['Name']."</p3></a>";
        }
      }
    }
  }
}
?>
</div>
</form>
</body>
</html>