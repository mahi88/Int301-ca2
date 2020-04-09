<?php
$name = $_POST['moviename'];
$year = $_POST['year'];
$ratings = $_POST['ratings'];
$director = $_POST['director'];
$actor = $_POST['actor'];
$category = $_POST['category'];
$nation = $_POST['nation'];
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
	#insert a new movie
	$query = mysql_query("INSERT INTO `movies` (`movieName` ,`movieDate` ,`mrates`,`director`,`mnation`)
	VALUES ('$name', '$year', '$ratings', '$director','$nation')");
	#get movie id
	$movies = mysql_query("SELECT * FROM `movies` WHERE `movieName`='$name'");
	$row2 = mysql_fetch_array($movies);
	$mID = $row2['movieID'];
	#get actor id
	$actor = mysql_query("SELECT * FROM `actor` WHERE `aName`='$actor'");
	$row3 = mysql_fetch_array($actor);
	$actorID = $row3['actorID'];
	#insert relation to movie and category
	$mcate = mysql_query("INSERT INTO `mcate`(`caID`, `movieID`) VALUES ('$catID','$mID')");
	#inter relation to movie and actor
	$mactor = mysql_query("INSERT INTO `mactor`(`actorID`, `movieID`) VALUES ('$actorID','$mID')");
	echo "insert movie success!<br>";
	echo '<a href="admin.html">back</a>';
	?>
</body>
</html>