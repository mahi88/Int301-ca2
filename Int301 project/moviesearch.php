
<?php 
$mname=$_POST["moviename"];
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

$result = mysql_query("SELECT * FROM `movies` WHERE `movieName` = '$mname'");

while($row = mysql_fetch_array($result))
 {
  $mid=$row['movieID'];
 }



mysql_close($con);


  echo "<script language='javascript'>"; 
  echo " location='movie_detail.html?id=$mid';"; 
  echo "</script>"; 
  ?>
</body>
</html>