<?php 
$mID=$_GET["mID"];
?>

<?php
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("movierate", $con);
$result = mysql_query("SELECT * FROM `movies` WHERE `movieID` = $mID");
echo '<form  method = "POST" action="update.php?id='.$mID.'" >';
while($row = mysql_fetch_array($result))
 {
    
       echo 'movie name:<input type ="text" name = "moviename" value="'.$row['movieName'].'"/><br>';
       echo 'year:<input type ="text" name = "movieDate" value="'.$row['movieDate'].'"/><br>';
       echo 'nation:<input type ="text" name = "mnation" value="'.$row['mnation'].'"/><br>';
       echo 'director:<input type ="text" name = "director" value="'.$row['director'].'"/><br>';
       echo '		actor:<select name="actor">
		  <option value ="Leonardo DiCaprio">Leonardo DiCaprio</option>
		  <option value ="Matthew McConaughey">Matthew McConaughey</option>
		  <option value ="Anne Hathaway">Anne Hathaway</option>
		  <option value ="Chris Pratt">Chris Pratt</option>
		  <option value ="Scarlett Johansson">Scarlett Johansson</option>
		</select><br>
		category:<select name="category">
		  <option value ="action">action</option>
		  <option value ="drama">drama</option>
		  <option value ="comedy">comedy</option>
		  <option value ="romance">romance</option>
		  <option value ="scifi">sci-fi</option>
		</select><br>';
 }
 echo '<button type="submit" >update</button>
		</form>';

mysql_close($con)
?>