<?php
//opens or resumes a session
session_start(); 
//parse the form if it was submitted
if( $_POST['did_login'] == true ){
	//extract the user submitted data
	$username = strip_tags( $_POST['username'] );
	$password = strip_tags( $_POST['password'] );

	//TEMPORARY:  the correct credentials. we will replace this with database driven logic in the future
	$correct_username = 'melissa';
	$correct_password = 'phprules';

	//make sure the values are within the length limits
	if( strlen($username) < 20 AND strlen($password) > 5 ){
		//compare the user submitted values with the correct credentials
		//if they match, log them in
		if( $username == $correct_username AND $password == $correct_password ){
			//success!  remember the user for 1 week
			setcookie( 'loggedin', true, time() + 60 * 60 * 24 * 7 );
			$_SESSION['loggedin'] = true;
			$message = 'You are now logged in';
		}else{
			$message = 'Your username and password combo is incorrect.';
		} //end if creds match
	} //end if within limits
	else{
		//length out of bounds
		$message = 'Your username and password combo is incorrect.';
	}
}//end if did login


if( $_GET['action'] == 'logout' ){
	//remove the session_id cookie from the user's computer
	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
			);
	}
	//close the session on the server
	session_destroy(); 
	//remove all the session vars we created
	unset( $_SESSION['loggedin'] );
	//set cookies to null
	setcookie( 'loggedin', '' );
}
elseif( $_COOKIE['loggedin'] == true ){
	$_SESSION['loggedin'] = true;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Simple Login Form</title>
</head>
<body>
	<?php //if the user is logged in, hide the form
	if( $_SESSION['loggedin'] == true ){
		include('content-loggedin.php');
	}else{ ?>
	<h1>Log In to Your Account</h1>

	<?php echo $message; //success/fail message from above ?>

	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		
		<label for="username">Username:</label>
		<input type="text" name="username" id="username">

		<label for="password">Password:</label>
		<input type="password" name="password" id="password">

		<input type="submit" value="Log In!">
		<input type="hidden" name="did_login" value="true">
	</form>

	<?php } //end if logged in ?>

</body>
</html>