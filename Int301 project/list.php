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

$result = mysql_query("SELECT * FROM `movies` ");
echo ' <table>
    <tr>
    <th>image</th>
    <th>movie ID</th>
    <th>Title</th>
    <th>Year</th>
    <th>Rating</th>
    <th>Nation</th>
    <th>director</th>
    <th colspan="2">operation</th>
  </tr>';
while($row = mysql_fetch_array($result))
 {
    echo "<tr>";

       echo '<td><a  href="show.html?mID='.$row['movieID'].'">' ;
       echo' <img  class="image" src="images/details/'.$row['movieID'].'.jpg" width="20px" height="40px"/>';
       echo '  </a></td>';
       echo '<td>'.$row['movieID'].'</td>';
       echo '<td>'.$row['movieName'].'</td>';
       echo '<td>'.$row['movieDate'].'</td>';
       echo '<td>'.$row['mrates'].'</td>';
       echo '<td>'.$row['mnation'].'</td>';
       echo '<td>'.$row['director'].'</td>';
           echo '<td><a  href="edit.html?mID='.$row['movieID'].'" >' ;
           echo' edit';
           echo '</a></td>';
           echo '<td><a  href="delete.php?mID='.$row['movieID'].'">' ;
           echo' delete';
           echo '</a></td>';

 }
 echo "</tr></table>";
 mysql_close($con);
?>
</body>
</html>