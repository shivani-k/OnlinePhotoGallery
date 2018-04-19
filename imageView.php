<?php
$conn = mysql_connect("localhost", "root", "");
mysql_select_db("projectdb") or die(mysql_error());
if(isset($_GET['id'])) {
$sql = "SELECT `username` FROM image WHERE username=" . $_GET['id'];
$result = mysqli_query($conn,$sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysql_error());
$row = mysqli_fetch_array($result);
//header("Content-type: " . $row["tag"]);
echo $row["imageid"];
}
mysqli_close($conn);
?>