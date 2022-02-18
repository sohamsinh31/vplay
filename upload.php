<!DOCTYPE html>
<html lang="en">
<head>
<link id="stylesheet" rel="stylesheet" type="text/css" href="includes/style.css"/>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>upload</title>
</head>
<body>
<div class="upload">
<form action="process.php" method="post" enctype="multipart/form-data">
  <label>Title:</label>
  <input style="border-bottom: 2px solid white;background:none;border-style: none none solid;" class="form-control" type="text" name="name" id="name">
  <label>Description:</label>
  <input style="border-bottom: 2px solid white;background:none;border-style: none none solid;height:46px;" class="form-control" type="text" name="desc" id="desc">
  <br>
  <label>Uploadthumbnail:</label>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <br>
  <label>Uploadvideo</label>
  <input type="file" name="fileToUpload2" id="fileToUpload2">
  <button style="width:100%;color:white;" onclick="return foo2();" style="background-color:blue;" class="btn btn-primary" type="submit"  name="submit">Uploadvideo</button>
</div>
</form>

</body>
<script src="script/script.js"></script>
</html>

