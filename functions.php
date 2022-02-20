<?php
//function createDirectory() {
//		$add = $_POST['user'];
//		mkdir('users/'.$add.'');
//	}
function userimage() {
	$add = $_POST['user'];
	mkdir('users/'.$add.'');
		$con = mysqli_connect('localhost','root');
		mysqli_select_db($con,'vuploads');
		$q = " SELECT * FROM `users` ";
		$result = mysqli_query($con,$q);
		$num = mysqli_num_rows($result);
		while($row = mysqli_fetch_assoc($result)){
			$target_dir = "users/".$add."/";
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
function uploadvideo() {
	include('includes/db.php');
	session_start();
	$target_dir = "uploads/thumbnails/";
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
$target_dir2 = "uploads/";
$target_file2 = $target_dir2 . basename($_FILES["fileToUpload2"]["name"]);
$uploadOk2 = 1;
$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));

if (file_exists($target_file2)) {
  echo "Sorry, file already exists.";
  $uploadOk2 = 0;
}

if($imageFileType2 != "mp4" && $imageFileType2 != "mkv" && $imageFileType2 != "jpeg"
&& $imageFileType2 != "jpg" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk2 = 0;
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
if ($uploadOk2 == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload2"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
$sql2 = "SELECT * FROM `users`";
$uploadby = $_SESSION['username'];
$sql = "INSERT INTO `persons` (`Name`, `Description`, `thumbpath`, `vidpath` , `uploadby`) VALUES ('$name', '$description', '$target_file', '$target_file2' , '$uploadby')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
function userimmenu() {
	include("includes/db.php");
	$nameu = $_SESSION['username'];
	$sql = "SELECT * FROM `users` WHERE name = '$nameu'";
	$result = mysqli_query($conn, $sql);
	$num = mysqli_num_rows($result);
	if($num> 0){
		while($row = mysqli_fetch_assoc($result)){
			echo "<img style="."'width:38px;height:36px;border-radius:100px;float:left;'"." src='".$row['image']."'>";
		}
	}
}
function getUserid() {
	include("includes/db.php");
	$nameu = $_SESSION['username'];
	$sql = "SELECT * FROM `users` WHERE name = '$nameu'";
	$result = mysqli_query($conn, $sql);
	$num = mysqli_num_rows($result);
	if($num> 0){
		while($row = mysqli_fetch_assoc($result)){
			echo "<img style="."'width:38px;height:36px;border-radius:100px;float:left;'"." src='".$row['image']."'>";
		}
	}

}
function uploadvideo2(){
session_start();
$user = $_SESSION['username'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vuploads";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else
  echo"connection successfull";
$name = $_POST['name'];
$category = $_POST['category'];
$description = $_POST['desc'];
$target_dir = "uploads/thumbnails/";
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
$target_dir2 = "uploads/";
$target_file2 = $target_dir2 . basename($_FILES["fileToUpload2"]["name"]);
$uploadOk2 = 1;
$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));

if (file_exists($target_file2)) {
  echo "Sorry, file already exists.";
  $uploadOk2 = 0;
}

if($imageFileType2 != "mp4" && $imageFileType2 != "mkv" && $imageFileType2 != "jpeg"
&& $imageFileType2 != "jpg" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk2 = 0;
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
if ($uploadOk2 == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload2"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
$required = array('name' , 'desc');

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
$sql = "INSERT INTO `persons` (`Name`, `Description`, `thumbpath`, `vidpath` , `uploadby` , `category`) VALUES ('$name', '$description', '$target_file', '$target_file2' , '$user' , '$category')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header('location:index.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
}
}
// function isLiked() {
// 	include('includes/db.php');
// 	$sql = " SELECT * FROM `likes` WHERE videoid = '$vidpath2'"
// 	$num = mysqli_num_rows($result);
// 	if($num> 0){
// 		$c = $num;
// 		return $c;
// 	}

// }
function like() {
	include('includes/db.php');
	$userid2 = $_SESSION['username'];
	$vidpath2 = $_GET['video'];
	$sql = " SELECT * FROM `likes`";
	isLiked($c);
	$count = $c+1;
	if($this->isLiked){
		echo "already liked";
	}
	else{
		$upload = " INSERT INTO `likes` (`videoid` , `userid` , `count`) VALUES ('$vidpath2','$userid2','$count')";
	}
}
    ?>