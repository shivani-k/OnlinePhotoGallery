<html>
  <head>
    <title>Forgot password</title>
  </head>
  <body>
    <?php
    require('db.php');
    if(isset($_POST['submit'])){
        $username=mysqli_real_escape_string($con,$_POST['username']);
        $sql = "SELECT `email` FROM `user` WHERE username='$username'";
        $res=mysqli_query($con,$sql);
        $count = mysqli_num_rows($res);
        if($count==1){
          echo "Sending email...";
          $r=mysqli_fetch_assoc($res);
          $to=$r['email'];
          $password=rand(999,99999);
          $password_hash=md5($password);
          $subject="Your recovered Password ";
          $message="Please use this password to login: ".$password;
          $headers="From:ssk.shivani@gmail.com";
          ini_set('SMTP','myserver');
          ini_set('smtp_port',25);
          if(mail($to,$subject,$message,$headers))
            echo "Recovery password sent to your registered email-id";
          else
            echo "Failed to recover your password.. Try again later..";
        }
        else
          echo "Username doesn't exist in Database!";
      }
    ?>
    <div class="form">
    <form action="" method="post" name="forgot">
      <h4>Forgot Password</h4>
      Username : <input type="text" name="username" placeholder="Enter here">
      <input type="submit" name="submit" value="submit"/>
    </form>
  </body>
</html>