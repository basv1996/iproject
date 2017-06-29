<?php
	$msg = "";
	if(isset($_POST["submit"]))
	{
		$name = preg_replace("/[^A-Za-z0-9-_ ]/","",$_POST["name"]);
		$email = $_POST["email"];
        $email= filter_var($email, FILTER_SANITIZE_EMAIL);
        
		

		$name = mysqli_real_escape_string($db, $name);
		$email = mysqli_real_escape_string($db, $email);
        
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
		$password = mysqli_real_escape_string($db, $password);
//        $pepper=md5($name);
        $pepper="";
        $salt=md5("Bas");
		$password = hash("SHA256",$pepper.$password.$salt);
		
        /*** check the password is the correct length ***/
        if (strlen( $_POST['password']) <8)
{
            // hier moet je even aangeven dat ze dom zijn.
}
        $token=uniqid();
        
        $sql="SELECT email FROM users WHERE email='$email'";
		$result=mysqli_query($db,$sql);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		if(mysqli_num_rows($result) == 1)
		{
			echo "Sorry...This email already exist...";
		}
		else
		{
			$query = mysqli_query($db, "INSERT INTO users (username, email, password)VALUES ('$name', '$email', '$password')");
		}
        $user_id=mysqli_insert_id($db);
        //echo "new user id= ".$user_id."<br>";
        echo "Je hebt een mail gekregen, klik op de link in mail.";
        

        // mail token naar user
        $msg = "Hallo $name Ga naar ";
        
                $msg .= "http://21248.hosts.ma-cloud.nl/bewijzenmap/leerjaar2/periode4/project/index.php?page=verify_email& token=".$token." om je email te verifieren";

        $timestamp=time();
			$query = "INSERT INTO tokens (id,user,time, kind)VALUES ('$token','$user_id', '$timestamp', 'email_verification')";
		$result=mysqli_query($db,$query);
        if (!$result) {
           echo "couldn't create token" .mysqli_error($db);
           exit();
        }

        
        
// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail($email,"Please verify your email",$msg);

//        header( "refresh:1;url=index.php?page=login2" );
	
    }

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<form method="post" action="">
<fieldset>
<legend>Registration Form</legend>
<table>
<!--<tr>
<td><?php echo $msg;?></td>
</tr>-->
<tr>
<td><div><label for="name">Name</label></div></td>
<td><input name="name" type="text" class="input" size="25" required /></td>
</tr>
<tr>
<td><div><label for="email">Email</label></div></td>
<td><input name="email" type="email" class="input" size="25" required /></td>
</tr>
<tr>
<td><div><label for="password">Password</label></div></td>
<td><input name="password" type="password" class="input" size="25" required /></td>
</tr>
<tr>
<td></td>
<td><div>
  <input type="submit" name="submit" value="Register!" />
</div></td>
</tr>
</table>
</fieldset>
</form>
</body>
</html>