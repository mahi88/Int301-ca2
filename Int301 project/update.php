<?php
$mID=$_GET["id"];
$mname=$_POST["moviename"];
$mdate=$_POST["movieDate"];
$nation=$_POST["mnation"];
$md=$_POST["director"];
$actor=$_POST["actor"];
$category=$_POST["category"];
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
#get category id
$cate = mysql_query("SELECT * FROM `category` WHERE `caName`='$category'");
$row = mysql_fetch_array($cate);
$catID = $row['caID'];
#get actor id
$actor = mysql_query("SELECT * FROM `actor` WHERE `aName`='$actor'");
$row3 = mysql_fetch_array($actor);
$actorID = $row3['actorID'];
$result = mysql_query("UPDATE `movies` SET `movieName`='$mname',`movieDate`='$mdate',`director`='$md',`mnation`='$nation' WHERE `movieID`='$mID'");
$mcate = mysql_query("UPDATE `mcate` SET `caID`='$catID' WHERE `movieID`='$mID'");
$mactor = mysql_query("UPDATE `mactor` SET `actorID`='$actorID' WHERE `movieID`='$mID'");
if($result &&$mcate &&$mactor)
{
	echo "update success!";
	echo '<br><a href=Admin.html>Back<a/>';
}
else
{
	echo 'Update failed!';
}
 

mysql_close($con)
?>
</body>
</html>