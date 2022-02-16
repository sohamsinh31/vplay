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
<link id="stylesheet" rel="stylesheet" type="text/css" href="includes/style.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<video controls controlsList="nodownload" width="640" height="320" controls>
  <source src="<?php echo $_GET['video'] ?>" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
Your browser does not support the video tag.
</video>
<br>
<?php
$vidpath2 = $_GET['video'];
	$sql = "SELECT * FROM `persons` WHERE vidpath = '$vidpath2'";
	$result = mysqli_query($conn, $sql);
	$num = mysqli_num_rows($result);
	if($num> 0){
		while($row = mysqli_fetch_assoc($result)){
			echo "Title:".$row['Name']."";
		}
	}
?>
</body>