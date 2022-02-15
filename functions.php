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
$sql = "INSERT INTO `persons` (`Name`, `Description`, `thumbpath`, `vidpath`) VALUES ('$name', '$description', '$target_file', '$target_file2')";

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
    ?>