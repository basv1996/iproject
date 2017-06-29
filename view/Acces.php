<?php

function secureExit($msg)
{
    echo 'oeps! u bent nog niet ingelogd';
    header( "refresh:1;url=index.php?page=login2" );
    exit();
}

session_start();
if(!(isset($_SESSION['logged_in'])))
    secureExit("logged_in == false");

if(!(isset($_SESSION['username'])))
{
    secureExit("no username");
}

$dt=time()-$_SESSION['last_login'];
if($dt>60*10)
{
    $_SESSION['logged_in']=false;
    secureExit("you have logged out");
}
$_SESSION['last_login']=time();
// grijp user uit database voor later.
$user_id=$_SESSION['logged_in'];

?>
