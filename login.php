<?php
$login = false;
$servername = "localhost";
$username = "root";
$password = "";
$database = "form";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("sorry we failed to connect :" . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];

      $sql = "SELECT * FROM `register` where email= '$email' AND password= '$password'";
      $run = mysqli_query($conn,$sql);
      $num = mysqli_num_rows($run);

      if($num == 1){
        $login = true;
      }
      else{
          echo"failed" . mysqli_error($conn);
      }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST">
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" id="inputEmail3">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" id="inputPassword3">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>

<?php
  if($login){
    header("location:welcome.php");
  }
  else{
    
  }

?>
</body>
</html>