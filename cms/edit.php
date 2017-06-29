<?php

session_start();

if(!isset($_SESSION['logged_in']))
{
    echo $message = 'You must be logged in to access this page';
    header( "refresh:1;url=../login.php" );
    return;
}

//include("../config/db.php");

$id =$_REQUEST['id'];

$result = mysqli_query($db, "SELECT * FROM assignments WHERE id  = '$id'");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$title=$test['title'] ;
				$tag1= $test['tag1'] ;					
				$tag2= $test['tag2'] ;					
				$tag3= $test['tag3'] ;					
				$content=$test['content'] ;
				$price=$test['price'] ;

if(isset($_POST['save']))
{	
	$title_save = $_POST['title'];
	$tag1_save = $_POST['tag1'];
	$tag2_save = $_POST['tag2'];
	$tag3_save = $_POST['tag3'];
	$content_save = $_POST['content'];
	$price_save = $_POST['price'];

	mysqli_query($db, "UPDATE assignments SET title='$title_save', 
    tag1='$tag1_save',
    tag2='$tag2_save',
    tag3='$tag3_save',
    content='$content_save',
    price='$price_save' WHERE id = '$id'")
				or die(mysql_error()); 
	echo "Saved!";
	
	header("Location: index.php?page=cms");			
}
mysqli_close($db);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<meta charset="utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form method="post">
<table>
	<tr>
		<td>title:</td>
		<td><input type="text" name="title" maxlength="22" value="<?php echo $title ?>"/></td>
	</tr>
	<tr>
		<td>tag1</td>
		<td><input type="text" name="tag1" maxlength="22" value="<?php echo $tag1 ?>"/></td>
	</tr>
	<tr>
		<td>tag2</td>
		<td><input type="text" name="tag2" maxlength="22" value="<?php echo $tag2 ?>"/></td>
	</tr>
	<tr>
		<td>tag3</td>
		<td><input type="text" name="tag3" maxlength="22" value="<?php echo $tag3 ?>"/></td>
	</tr>
	<tr>
		<td>content</td>
        <td><textarea type="text" name="content"><?php echo $content ?></textarea></td>
	</tr>
	<tr>
		<td>price</td>
		<td><input type="text" name="price" value="<?php echo $price ?>"/></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="save" /></td>
	</tr>
</table>

</body>
</html>
