<!--  -->
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/
font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>h1</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link id="stylesheet" rel="stylesheet" type="text/css" href="includes/style.css"/>
</head>
<body>
<?php require_once("includes/header.php"); ?>
<br>
<br>
<div id="lightt" class="white_content2">
  <a style="color: black" href = "javascript:void(0)" onclick = "document.getElementById('lightt').style.display='none';document.getElementById('fade').style.display='none'"><button class="butn2">X</button></a>
<button class="butn1"><a href="https://webhost-30b9b.firebaseapp.com/">HOME</a></button>
<button class="butn1"><a href="https://webhost-30b9b.firebaseapp.com/vmtv">VPLAY</a></button>
<button class="butn1"><a href="https://hemaborasia.wixsite.com/website">ABOUT US!</a></button>
<button class="butn1"><a href="https://hemaborasia.wixsite.com/website">HELP</a></button>
</div>
<div id="light" class="white_content" style="color: black"><button style="font-size: x-large; font-weight: bold;"  class="btn1"><a style="color: black" href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">X</a></button><button class="no2" id="q1" style="font-size: x-large;">watch now</button><button class="no2" style="font-size: x-large;">watch later</button><button class="no2" id="s1" style="font-size: x-large;"> not intrested</button></div>
<br>
<div class="start2">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "vuploads";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

$sql = "SELECT * FROM `persons`";
$result = mysqli_query($conn, $sql);
$imcl =" class='im1'";
$im2cl =" class='im2'";
$imsrc =" 'src='.$username.''";
$ima = "<p2 style='color: black;'><a href = 'javascript:void(0)' onclick = 'document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block''>:</a></p2>";
$sql2 = "SELECT * FROM `users`";
$result2 = mysqli_query($conn, $sql2);
$num2 = mysqli_num_rows($result2);
// $userim = $row2['image'];
// $username = $row2['name'];
// Find the number of records returned
$num = mysqli_num_rows($result);
// Display the rows returned by the sql query
if($num> 0){
    while(($row2 = mysqli_fetch_assoc($result2))){
      while($row = mysqli_fetch_assoc($result)){
        // echo var_dump($row);
        echo "<div id="."s2".">";
        echo "<p1><img ".$imcl." src='".$row2['image']."'>".$row2['name']."</p1>".$ima;
        echo "<a href=".$row['vidpath']."><img".$im2cl."src=".$row['thumbpath']."></a>";
        echo "<p3>".$row['Name']."</p3></a>";
    }
  }

}
?>
<br>
<br>
<?php require_once("includes/footer.php"); ?>
    </body>
<script src="script/script.js"></script>
</html>