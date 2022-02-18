<!DOCTYPE html>
<html>
  <head>
  <link id="stylesheet" rel="stylesheet" type="text/css" href="includes/style.css"/>
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
  </head>
<body>

<form action="process.php" method="post" enctype="multipart/form-data">
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
  <button style="width:100%;" onclick="return foo2();" style="background-color:blue;" class="btn btn-primary" type="submit"  name="submit">Uploadvideo</button>
</div>
</form>

</body>
<script src="script/script.js"></script>
