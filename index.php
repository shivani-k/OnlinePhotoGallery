<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
	<div action="index.php">
		<center><h1>Welcome to your Photo Gallery <?php echo $_SESSION['username']; ?> !</h1></center>
		<table style="width:100%">
						<tr>
							<th><h3><a href="upload.php">Upload</a></h3></th>
							<th><h3><a href="search.php">Search</a></h3></th>
							<th><h3><a href="logout.php">Logout</a>
							</h3></th>
						</tr>
		</table>
	</div>
	<div >
		<?php

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "projectdb";
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}
			$id=$_SESSION['username'];
			$sql = "SELECT `imageid`,`tag`,`date` FROM `image` WHERE username='$id' ORDER BY `date` DESC;";
			$result = $conn->query($sql);
			$i=0;
			?>
			<table>
				<tr>
			<?php
			if ($result) {
			    while($row=mysqli_fetch_array($result)) {
			    	if($i==3)
			    	{
			    		?></tr><tr><?php	
			    	}
			    	$image="./images/".$row['imageid'];	
			    	?>
			    	<th>
			    	<img src="<?php echo $image;?>" height="350px" width="500px">
			    	<form class="form" action="deleteimg.php" method="post">
			    	<input type="submit" name="edit" value="Edit" />
			    	<input type="submit" name="delete" value="Delete" /><br>
			    	</form>
			    	<?php
			    	/*$date=$row["date"];
			    	$tag = $row["tag"];
					echo "<br>"."Tag: $tag &nbsp;Date: $date"."<br>";
					*/
					$i++;
					?>
					</th>

					<?php
			    }
			}
			else {
			    echo "0 results";
			}
			$conn->close();
 ?>
 </tr>
 </table>
</div>
</body>
</html>