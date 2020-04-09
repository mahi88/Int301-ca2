<?php 
$aID=$_GET["aID"];
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

$result = mysql_query("SELECT * FROM `actor` WHERE `actorID` = $aID");

while($row = mysql_fetch_array($result))
 {
  echo  '<h1>'.$row['aName'].'</h1>';
  echo "<hr>";
  echo '<div id="mainpic" class="">';
       echo '<a  href="http://movie.douban.com/subject/25890005/?from=tag" target="_blank">' ;
       echo' <img  class="height_small left" src="images/'.$row['aName'].'.jpg" />';
  echo ' </a></div>';
  echo ' <div id="info">';
        echo ' <p class="pl">Age: <span class="attrs">'.$row['age'].'</a></span></p><br/>';
        echo '<p class="pl">Nation: <span class="attrs" >'.$row['aNation']. '</span></p><br/>';
        echo ' <p class="pl">Date of Birth: <span class="attrs" property="v:genre">'.$row['adatebirth'].'</span></p><br/>';
  echo' </div>';
  echo '<div id="detail">';
        echo '<p class="pl paddingb">Details:</p>';
        echo ' <p class="details">'.$row['ainfo'].'</p>';
  echo ' </div>';
  
 }



mysql_close($con);
?>
</body>
</html>