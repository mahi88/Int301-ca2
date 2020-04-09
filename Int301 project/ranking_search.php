<?php 

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

$movie = mysql_query("SELECT * FROM `movies` ORDER BY `mrates` DESC");

echo '<hr>';
while($row = mysql_fetch_array($movie))
 {
  echo '<table width="100%">';
  echo "<tbody>";
  echo '<tr class="item">';
  echo '<td width="100" valign="top">';
  echo '<a href="#" title="pic"><img id="1" src="images/details/'.$row['movieID'].'.jpg" width="100px" height="150px" alt="movie pic"/></a>';
  echo "</td>";
  echo '<td valign="top">
							<div class="mcontent">';
  echo '<a href="movie_detail.html?id='.$row['movieID'].'">'.$row['movieName'].'</a>';
  $mId=$row['movieID'];
  $actor = mysql_query("SELECT * FROM `actor` WHERE `actorID`IN(SELECT `actorID` FROM `mactor`AS a LEFT JOIN `movies` as m ON a.`movieID` =m.`movieID` WHERE m.`movieID`=$mId)");
  $row2= mysql_fetch_array($actor);
  echo '<a href="actor_detail.html?id='.$row2['actorID'].'">'.'<p class="info">Actor:'. $row2['aName'].'</p></a>';
  echo '<div class="rating">';
  if ($row['mrates']>0&&$row['mrates']<=1) {
  	echo '<img id="1" src="images/rating/ic_rating_0.5star.jpg" alt="star"  />';
  	# code...
  } else if ($row['mrates']>1&&$row['mrates']<=2) {
  	echo '<img id="1" src="images/rating/ic_rating_1star.jpg" alt="star"  />';
  }
  else if ($row['mrates']>2&&$row['mrates']<=3) {
  echo '<img id="1" src="images/rating/ic_rating_1.5star.jpg" alt="star"/>';
  }
  elseif ($row['mrates']>3&&$row['mrates']<=4) {
  echo '<img id="1" src="images/rating/ic_rating_2star.jpg" alt="star"/>';
  }
  else if ($row['mrates']>4&&$row['mrates']<=5) {
 echo '<img id="1" src="images/rating/ic_rating_2.5star.jpg" alt="star"/>';
  }
  else if ($row['mrates']>5&&$row['mrates']<=6) {
 echo '<img id="1" src="images/rating/ic_rating_3star.jpg" alt="star"/>';
  }
  else if ($row['mrates']>6&&$row['mrates']<=7) {
 echo '<img id="1" src="images/rating/ic_rating_3.5star.jpg" alt="star"/>';
  }
  else if ($row['mrates']>7&&$row['mrates']<=8) {
 echo '<img id="1" src="images/rating/ic_rating_4star.jpg" alt="star"/>';
  }
  else if ($row['mrates']>8&&$row['mrates']<=9) {
 echo '<img id="1" src="images/rating/ic_rating_4.5star.jpg" alt="star"/>';
  }
  else if ($row['mrates']>9&&$row['mrates']<=10) {
 echo '<img id="1" src="images/rating/ic_rating_5star.jpg" alt="star" />';
  }
  else{
  	echo '<img id="1" src="images/rating/ic_rating_0star.jpg" alt="star"/>';
  }
  echo "</br><span class='rating_nums'>".$row['mrates']."</span>";

  echo '</br><a href="movie_detail.html?id='.$row['movieID'].'">Details >> </a>';
  echo "</div></div></td>";
  echo "</tr>";
  echo "</tbody>";
  echo '</table>';
  echo "<hr>";
}
sql_close($con);
?>
</body>

</html>