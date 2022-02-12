<?php
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
?>
<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <br>Title<br>
  <input type="text" name="name" id="name">
  <br>Description<br>
  <input type="text" name="desc" id="desc">
  <br>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <br>
  <input type="file" name="fileToUpload2" id="fileToUpload2">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
<?php
$name = $_POST['name'];
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
}
$sql = "INSERT INTO `persons` (`Name`, `Description`, `thumbpath`, `vidpath`) VALUES ('$name', '$description', '$target_file', '$target_file2')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>