<?php

session_start();

if(!isset($_SESSION['logged_in']))
{
    echo $message = 'You must be logged in to access this page';
    header( "refresh:1;url=../login.php" );
    return;
}

	$id =$_GET['id'];
	
	// sending query
	mysqli_query($db, "DELETE FROM assignments WHERE id = '$id'")
	or die(mysql_error());  	
	
	header("Location: index.php?page=cms");
?>