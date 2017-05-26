<?php 
error_reporting( E_ALL & ~E_NOTICE ); 

//open or resume the active session
session_start();

//re-create the session if the cookie is still valid
if( $_COOKIE['loggedin'] ){
	$_SESSION['loggedin'] = 1;
}

//lock down this page if no session
if( ! $_SESSION['loggedin'] ){
	//error! go away
	die('You are not allowed to see this page');
}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Secret Page</title>
</head>
<body>
	<a href="login.php?action=logout">Log Out</a>
	You should only be able to see this if you are logged in. We'll secure it later.
	<img src="http://unsplash.it/600/400?image=1062">

</body>
</html>