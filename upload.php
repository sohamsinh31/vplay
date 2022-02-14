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
  <head>
  <link id="stylesheet" rel="stylesheet" type="text/css" href="includes/style.css"/>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
  </head>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <div class="upload">
  <label>Title:</label>
  <input class="form-control" type="text" name="name" id="name">
  <label>Description:</label>
  <input style="
    width: 62%;" class="form-control" type="text" name="desc" id="desc">
  <br>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <br>
  <input type="file" name="fileToUpload2" id="fileToUpload2">
  <button style="width:100%;" onclick="clickme()" style="background-color:blue;" class="btn btn-primary" type="submit"  name="submit">Uploadvideo</button>
</div>
</form>

</body>
<script>
function clickme(){
var result ="<?php uploadvideo2(); ?>"
document.write(result);
}
</script>
</html>
<?php
function uploadvideo2(){
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
}
?>