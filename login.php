<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['submit'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
   $query = "SELECT * FROM `user` WHERE username='$username' and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);

   if($rows==1){
	    $_SESSION['username'] = $username;
            // Redirect user to index.php
	    header("Location: index.php");
     }
   else{
      $query = "SELECT * FROM `user` WHERE username='$username'";
      $result = mysqli_query($con,$query) or die(mysql_error());
      $rows = mysqli_num_rows($result);
   
      if($rows==1){
         header("Location: invalidpwd.php");
      }
      else {  
         header("Location: invalidusr.php");
      }
	}
  }
else{
?>
<center><h1>Welcome to Online Photo Gallery!</h1>
<br><br><br>
<h2>Log In</h2>
<div class="form">
<form action="" method="post" name="login">
   <table>
   <tr>
      <th>Username</th>
      <th><input type="text" name="username" placeholder="Enter username" required /></th>
   </tr>
   <tr>
      <th>Password</th>
      <th><input type="password" name="password" placeholder="*******" required /></th>
   </tr>
   <tr>
      <th></th>
      <th><input type="submit" name="submit" value="Login" /></th>
   </tr>
</table>
</div>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
</center>
<?php } ?>
</body>
</html>