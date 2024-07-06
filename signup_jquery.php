<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "form";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
  die("sorry we failed to connect :" . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $fname = $_POST['Fname'];
  $mname = $_POST['Mname'];
  $lname = $_POST['Lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $mobile = $_POST['mobilenum'];
  $add = $_POST['add'];
  $country = $_POST['country'];
  $state = $_POST['state'];
  $village = $_POST['village'];
  $postal = $_POST['postal'];

 /* if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo("$email is a valid email address");
  } else {
    echo("$email is not a valid email address");
  }*/

  /*if ($fname != "" && $mname != "" && $lname != "" && $email != "" && $password != "" && 
  $mobile != "" && $add != "" && $country != "" && $state != "" && $village != "" && $postal != "" ) {
*/
  $sql = "INSERT INTO `register` (`Fname`, `Mname`, `Lname`, `Email`, `mobile`, `password`, `address`, `country`, `state`, `village`, `postal_code`, `ID`) VALUES ('$fname', '$mname', '$lname', '$email', '$mobile', '$password', '$add', '$country', '$state', '$village', '$postal', NULL)";
  $run = mysqli_query($conn, $sql);

  if (isset($_FILES['image'])) {
    $file_name = $_FILES['image']['name'];
    $temp_name = $_FILES['image']['tmp_name'];
  
    move_uploaded_file($temp_name, "/opt/lampp/htdocs/form_crud/uploads" . $file_name);
    echo "stored in: " . "/opt/lampp/htdocs/form_crud/uploads" . $_FILES["image"]["name"];
  }

  /*if($run){
        header("location:login.php");
      }
      else{
          echo"failed" . mysqli_error($conn);
      }*/
   /* }
    
    else{
      echo "please fill the form";
    }*/
}
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>



  
  <form class="row g-3 ms-5" method="POST" id="frm">
    <div class="col-md-6">
      <label for="inputFname" class="form-label">First Name</label>
      <input type="textbox" name="Fname" class="form-control" id="inputFname"><?php echo $fnameErr;?>
    </div>
    <div class="col-md-6">
      <label for="inputMname " class="form-label">Middle Name</label>
      <input type="textbox" name="Mname" class="form-control" id="inputMname">
    </div>
    <div class="col-md-6">
      <label for="inputlname" class="form-label">Last Name</label>
      <input type="textbox" name="Lname" class="form-control" id="inputlname">
    </div>
    <div class="col-md-6">
      <label for="inputEmail4" class="form-label">Email</label>
      <input type="textbox" name="email" class="form-control" id="inputEmail4">
    </div>
    <div class="col-md-6">
      <label for="inputEmail4" class="form-label">mobile number</label>
      <input type="textbox" name="mobilenum" class="form-control" id="inputEmail4">
    </div>
    <div class="col-md-6">
      <label for="inputPassword4" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="inputPassword4">
    </div>
    <div class="col-md-6">
      <label for="inputaddress" class="form-label">address</label>
      <input type="textarea" name="add" class="form-control" id="inputaddress">
    </div>
    <div class="col-md-4">
      <label for="inputState" class="form-label">Country</label>
      <select id="inputState" class="form-select" name="country">
        <option selected>India</option>
        <option>Canada</option>
        <option>U.K</option>
      </select>
    </div>
    <div class="col-md-4">
      <label for="inputState" class="form-label">State</label>
      <select id="inputState" class="form-select" name="state">
        <option selected>Gujarat</option>
        <option>Maharastra</option>
        <option>punjab</option>
      </select>
    </div>
    <div class="col-md-4">
      <label for="inputState" class="form-label">Village</label>
      <select id="inputState" class="form-select" name="village">
        <option selected>Gunasvel</option>
        <option>timli</option>
        <option>velanpur</option>
      </select>
    </div>

    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Php
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        html
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        css
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        javascript
      </label>
    </div>



    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
      <label class="form-check-label" for="flexCheckChecked">
        Angular
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
      <label class="form-check-label" for="flexRadioDefault1">
        female
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
      <label class="form-check-label" for="flexRadioDefault2">
        male
      </label>
    </div>
    <div class="col-md-2">
      <label for="inputZip" class="form-label">Zip</label>
      <input type="text" name="postal" class="form-control" id="inputZip">
    </div>
    </div>
    <div>
      <input type="file" name="image" />
      <button type="submit" name="upload" class="btn btn-primary">upload</button>
    </div>
    <div class="col-12">
      <button type="submit" name="submit" class="btn btn-primary">register</button>
    </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js">
    </script>

<script>
        jQuery('#frm').validate({
          rules:{
            Fname:"required",
            Mname:"required",
            Lname:"required",
            mobilenum:"required",
            password:"required",
            add:"required",
            country:"required",
            state:"required",
            village:"required",
            postal:"required",
            email:{
              email:true,
              required:true
            }
            
          }
          ,messages:{
            Fname:"please enter your name",
            Mname:"please enter your name",
            Lname:"please enter your name",
            country:"please enter your name",
            state:"please enter your name",
            
            email:{
              email:"please enter valid email",
              required:"please enter email"
            }
          }
        });


    </script>
  
</body>

</html>