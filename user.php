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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link id="stylesheet" rel="stylesheet" type="text/css" href="includes/style.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER</title>
</head>
<body>
<br>
<div class="upload" id="upload">
<?php
$username = $_SESSION['username'];
	$sql = "SELECT * FROM `users` WHERE name = '$username'";
	$result = mysqli_query($conn, $sql);
	$num = mysqli_num_rows($result);
	if($num> 0){
		while($row = mysqli_fetch_assoc($result)){
            echo "<br>";
			echo "<img class='"."im3"."'"."src='".$row['image']."'><i style='"."float: left;padding-top: 52px;"."'"."class='"."fas fa-pencil-alt"."'></i>"."<span class='"."userim"."'>".$row['name']."<i class='"."fas fa-pencil-alt"."'></i></span>";
			echo "<button onclick='uploads()''>Uploads</button>";
		}
	}
?>
</div>
</body>
<script src="script/script.js"></script>
</html>