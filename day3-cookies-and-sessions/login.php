<?php 
//supress Notice: messages
error_reporting( E_ALL & ~E_NOTICE ); 

//we need to use session data on this page. 
session_start();

//re-create the session if the cookie is still valid
if( $_COOKIE['loggedin'] ){
	$_SESSION['loggedin'] = 1;
}

//Logout Action
if( $_GET['action'] == 'logout' ){
	//close the session and the associated cookie. this snippet is from php.net
	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
			);
	}
	session_destroy();
	//erase all session vars
	$_SESSION['loggedin'] = false;
	//unset all cookies
	setcookie( 'loggedin', false, time() -9999999 );
}//end of logout action

//if the form was submitted, parse it
if( $_POST['did_login'] ){
	//extract the data
	$username = $_POST['username'];
	$password = $_POST['password'];
	//todo: sanitize the data
	//todo: validate the data
	//check the credentials
	$correct_username = 'melissa';
	$correct_password = 'phprules';
	//send the user to the secret page if they got it right, or show an error
	if( $username == $correct_username AND $password == $correct_password ){
		//success - remember the user for 1 day and then redirect to secret page
		setcookie( 'loggedin', 1, time() + 60 * 60 * 24 );
		$_SESSION['loggedin'] = 1;

		header('Location:secret.php');
	}else{
		//error - user feedback
		$error_message = 'Sorry, your username/password combo is incorrect. Try again.';
	}
} //end of login parser	
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<title>Log in to your account</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<?php 
//if we're already logged in, don't show the login form
	if( ! $_SESSION['loggedin'] ){ 
		?>
		<h1>Log in to your account</h1>

		<?php if( $_POST['did_login'] ){ ?>
		<div class="feedback">
			<?php echo $error_message; ?>
		</div>
		<?php } ?>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

			<label for="the_username">Username</label>
			<input type="text" name="username" id="the_username" required>

			<label for="the_password">Password</label>
			<input type="password" name="password" id="the_password" required>

			<input type="submit" value="Log In">

			<input type="hidden" name="did_login" value="1">
		</form>
		<?php 
	}else{
		echo 'You are logged in. Visit your <a href="secret.php">secret page</a>. ';
	} ?>

	<footer>
		This site uses cookies to improve your experience. 
	</footer>
</body>
</html>