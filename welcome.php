<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "form";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("sorry we failed to connect :" . mysqli_connect_error());
}

if(isset($_FILES['image']))
{
    $file_name = $_FILES['image'] ['name'];
    $temp_name = $_FILES['image'] ['tmp_name'];

    move_uploaded_file($temp_name , "/opt/lampp/htdocs/form_crud/uploads" . $file_name);
        echo "stored in: " . "/opt/lampp/htdocs/form_crud/uploads" . $_FILES ["image"] ["name"];

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
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image" />
<button type="submit" name="submit" class="btn btn-primary">upload</button>
    </form>
    <div>
    
</body>
</html>