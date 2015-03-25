<?php
//DB credentials
$db_name = 'melissa_blog';
$db_user = 'mmc_bloguser1114';
$db_password = 'PQ7UVDzvExyM78nz';

//connect to DB
$db = new mysqli( 'localhost', $db_user, $db_password, $db_name );

//handle any errors
if( $db->connect_errno > 0 ){
	//stop the page from loading and show a message instead
	die( 'Unable to connect to Database' );
}

//error reporting - set the sensitivity of PHP's error display
//show all errors except notices (E_ALL & ~E_NOTICE)
//show all errors (E_ALL)
error_reporting( E_ALL & ~E_NOTICE );

//no close php