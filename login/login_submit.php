<?php

/*** begin our session ***/
session_start();

/*** ER GAAT IETS MIS, NETTE BOODSCHAP EN STOP  ***/
function safeExit($msg)
{
    echo $msg;
   // die  "something went wrong";
}


/*** check if the users is already logged in ***/
if(isset( $_SESSION['id'] ))
{
    safeExit('Users is already logged in');
}

/*** check that both the username, password have been submitted ***/
if(!isset( $_POST['name'], $_POST['password']))
{
    safeExit('Please enter a valid username and password');
}

    /*** if we are here the data is valid and we can insert it into database ***/

    $name = preg_replace("/[^A-Za-z0-9-_ ]/","",$_POST["name"]);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
		$password = mysqli_real_escape_string($db, $password);
//        $pepper=md5($name);
        $pepper="";
        $salt=md5("Bas");
		$password = hash("SHA256",$pepper.$password.$salt);

    $name = mysqli_real_escape_string($db, $name);

// check of de gebruiker het geod heeft

		$sql="SELECT * FROM users WHERE password='$password' AND username='$name' ";
		$result=mysqli_query($db,$sql);
if($result == false)
{
    safeExit($sql);
}
        $num_rows=mysqli_num_rows($result);
        if($num_rows==0)
        {
            safeExit("sorry maar dat klopt nie");
        }
// hij had het goed
		$user=mysqli_fetch_array($result,MYSQLI_ASSOC);

// zet de session
/*** if we have no result then fail boat ***/
        if($name == false)
        {
            $message = 'Login Failed';
        }
        /*** if we do have a result, all is well ***/
        else
        {
            /*** set the session user_id variable ***/
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] =  $user["username"];
            $_SESSION['last_login'] = time();
            session_regenerate_id();

            /*** tell the user we are logged in ***/
            $message = 'You are now logged in';
            header("location:index.php?page=user"); 
            //debug
//            var_dump( $_SESSION['user_id']);
        }
?>

<html>
<div class="container">
<h2><?php echo $message; ?></h2>
    <br>

</div>

</html>