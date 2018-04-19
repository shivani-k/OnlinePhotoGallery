<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Upload</title>
		<link rel="stylesheet" href="style.css" />
	</head>
<body>


<?php
require('db.php');
include("auth.php"); //include auth.php file on all secure pages

if (isset($_POST['submit'])){

	$username= $_SESSION['username'];
	$tag=$_POST['tag'];
    $date=date('Y-m-d'); 
    $image=$_FILES['image']['name'];
    $target = "C:\wamp64\www\php\project\images/".basename($image);
    $query="INSERT INTO `image` VALUES('$username','$image','$tag','$date')";
    mysqli_query($con,$query);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}
  	else{
  		$msg = "Failed to upload image";
  	}
  	$result = mysqli_query($con, "SELECT * FROM image");
}

 ?>


<div class="form">
<form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="image"/>
        <!--<input type="text" name="name" placeholder="Name"/>-->
        <input type="text" name="tag" placeholder="Write a tag"/>
        <input type="submit" name="submit" value="submit"/>
</form>
<p><a href="index.php">Home</a></p>
<a href="logout.php">Logout</a>
</div>
</body>
</html>