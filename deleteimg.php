<html>
  <head>
    <meta charset="utf-8">
    <title>Deleting..</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
  <?php
    require('db.php');
    echo $_GET['$imgid'];
    if (isset($_GET['$imgid'])){
        // removes backslashes
	     $img=$_GET['$imgid'];
       echo $img;
       $query = "DELETE FROM `image` WHERE `imageid`=$img";
	     $result = mysqli_query($con,$query) or die(mysql_error());
        header("Location: index.php");
    }
?>
<h1>Deleteing...</h1>
</body>
</html>