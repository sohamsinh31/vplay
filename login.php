<?php
session_start();
if(!isset($_SESSION['username'])){
 echo "not logged in";
}
else{
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="row">
        <div class="col-lg-6">
            <h2>Log in form</h2>
            <form action="validation.php" method="post" enctype="multipart/form-data">
            <div class="form-groop">
                    <label>username</label>
                    <input type="text" name="user" class="form-control">
</div>
<div class="form-groop">
                    <label>password</label>
                    <input type="password" name="password" class="form-control">
</div>
<br>
<button onclick="return foo();" type="submit" name="submit" class="btn btn-primary">Login</button>
</form>
</div>
<span><a href="signup.php">Not logged in yet click to Sign up</a></span>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
<script src="script/script.js"></script>
</html>
