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

$result = mysql_query("SELECT * FROM `movies` WHERE `movieID` = $mID");

while($row = mysql_fetch_array($result))
 {
  
  
 
   echo ' <div id="mainpic" class="">';
       echo '<h1>'.$row['movieName'].'</h1>';
       echo '<a  href="show.html?mID='.$row['movieID'].'" target="_blank">' ;
       echo' <img  class="image" src="images/'.$row['movieName'].'.jpg" />';
       echo ' <p class="pl">Diector: <span class='attrs'>Christopher Johnathan James Nolan</a></span></p><br/>';
       echo ' <p class="pl">Actor: <span ><a class='attrs' href="/celebrity/1344500/" rel="v:starring">Leonardo DiCaprio</a> </span></p><br/>';
       echo' <p class="pl">Category: <span class='attrs'property="v:genre">Scifi</span></p><br/>';
       echo ' <p class="pl">Country: <span class='attrs'>USA</span></p><br/>';
       echo  '<p class="pl">Movie Date: <span class='attrs'>'.$row['mdate'].'</span></p><br/>';
       echo '  <p class="pl">Rating: <span class='attrs'>'.$row['mrate'].'</span></p><br/>';
       echo '  </a></div>';

        echo ' <div id="info">';
           echo '<p class="pl"><a  href="delete.php?mID='.$row['movieID'].'" target="_blank">' ;
           echo' delete';
           echo '</a></p>';
           echo '<p class="pl"><a  href="edit.html?mID='.$row['movieID'].'" target="_blank">' ;
           echo' edit';
           echo '</a></p>';
           echo '<p class="pl"><a  href="list.php" target="_blank">' ;
           echo' back';
           echo '</a></p>';
           
        echo ' </div>';

 }



mysql_close($con);
?>
</body>
</html>