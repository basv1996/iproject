<?php


function safeExit($msg) {
    echo $msg;
    exit(0);
}
// haal token uit $_REQUEST
if(!isset($_REQUEST["token"]))safeExit("geen token"); 
$token_id=$_REQUEST["token"]; // preg replace schoonmakeN!
// haal token uit database.
$sql="SELECT * FROM tokens WHERE id='$token_id'";
// check of user nog niet geverifieerd is
		$result=mysqli_query($db,$sql);
		$token=mysqli_fetch_array($result,MYSQLI_ASSOC);
		if(mysqli_num_rows($result) != 1){
            safeExit("sorry, deze token bestaat niet");
        }
// check of token niet te oud is.
$dt=time()-$token["time"];

if($dt>60*60)
{
    safeExit("sorry, deze token is te oud".$dt );
}
// check of het gaat om een kind "verification" token
if($token["kind"]=="verification")
{
    safeExit("sorry, niet her juiste soort token");
}
// Alles goed?
// dan 
 $sql="SELECT * FROM users WHERE id='".$token["user"]."'";
//->
 $result=mysqli_query($db,$sql);
		$user=mysqli_fetch_array($result,MYSQLI_ASSOC);
		if(mysqli_num_rows($result) != 1){
            safeExit("sorry, kon user niet vinden");
        }


//<-

//zet verified in user database.
    $user_id=$token["user"];
    $sql ="UPDATE users SET email_verified='1' WHERE id=$user_id";
    $result=mysqli_query($db,$sql);
    if(mysqli_affected_rows($db)!=1)
    {
        echo mysqli_error($db);
        echo "sorry, kon user niet updaten of email al geverivieerd";
    }
    //delete token uit database.

    $sql ="DELETE FROM tokens WHERE id='$token_id'";
    echo "Your email has been registered";
    $result=mysqli_query($db,$sql);
    if(mysqli_affected_rows($db)!=1)
    {
            safeExit("error kon token niet deleten");
    }
