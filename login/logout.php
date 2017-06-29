<?php
session_start(); 
$_SESSION['logged_in'] = false;
$_SESSION['id'] = "";
session_destroy(); 
header("location:index.php?page=page1"); 
exit();
?>