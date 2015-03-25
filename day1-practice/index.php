<?php 
//keep track of the status of the page (error/success/etc)
$status = 'success';

//change the message if the page is in success or error mode
if( $status == 'success' ){
	$message = 'Yay! Good job!';
}else{
	$message = 'Sorry, something went wrong.';
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Php Practice!</title>
	<style type="text/css">
	.success{
		color:green;
		background-color: #B6F3D9;
	}
	.error{
		color:red;
		background-color: #FCC7C8;
	}
	</style>
</head>
<body class="<?php echo $status; ?>">
	<h1>
		<?php 
		//show the message we set at the top of the page
		echo $message; 
		?>	
	</h1>
</body>
</html>