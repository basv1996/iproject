<!DOCTYPE HTML>
<head>
 <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        CMS
    </title>
</head>
<html>
   <body>
       <table border="1">
<?php
session_start();

if(!isset($_SESSION['logged_in']))
{
    echo $message = 'You must be logged in to access this page';
    header( "refresh:1;url=../login.php" );
    return;
}
			
$query = "SELECT * FROM assignments";
$result = mysqli_query($db, $query) or die(mysqli_error());

			
			while($row = mysqli_fetch_array($result))
			{
				$id = $row['id'];	
				echo "<tr align='center'>";	
				echo"<td>" .$row['title']."</td>";
				echo"<td>". $row['tag1']. "</td>";
				echo"<td>". $row['tag2']. "</td>";
				echo"<td>". $row['tag3']. "</td>";
				echo"<td>". $row['content']. "</td>";
				echo"<td>". $row['price']. "</td>";	
				//echo"<td> <a href ='cms/edit.php?id=$id'>Edit</a>";
                echo"<td> <a href ='?page=cms_edit&id=$id'>Edit</a>";
				echo"<td> <a href ='?page=cms_delete&id=$id'><center>Delete</center></a>";			
				echo "</tr>";
			}
			mysqli_close($db);
			?>
       </table>
      <a href="index.php?page=page1">terag naar home</a>

</body>
</html>
