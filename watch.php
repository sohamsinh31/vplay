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
<br>
<?php
$vidpath2 = $_GET['video'];
	$sql = "SELECT * FROM `persons` WHERE id = '$vidpath2'";
	$result = mysqli_query($conn, $sql);
	$num = mysqli_num_rows($result);
	if($num> 0){
		while($row = mysqli_fetch_assoc($result)){
			echo "<video controls controlsList='"."nodownload"."'". "width='"."640"."'"."height='"."320"."'". "controls>";
			 echo "<source src='".$row['vidpath']."' type='video/mp4'>";
			echo "<source src='"."movie.ogg"."'". "type='"."video/ogg"."'".">";
		  echo "Your browser does not support the video tag.";
		  echo "</video>";
			echo "Title:".$row['Name']."<br>";
			echo "Description:".$row['Description']."";
		}
	}
?>
</body>