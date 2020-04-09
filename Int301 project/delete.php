<?php 
$mID=$_GET["mID"];
?>
<html>
<body>
<?php

$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("movierate", $con);

$query = mysql_query("DELETE FROM `movies` WHERE `movieID` = $mID");
echo 'You already delete this movie';
echo '<br><a href="Admin.html">back</a>';

mysql_close($con);
?>
</body>
</html>