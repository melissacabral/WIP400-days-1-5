<?php require('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>AJAX Example Dropdown menu</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	<style type="text/css">
	.loading{
		background-color: #919191;
	}
	</style>
</head>
<body>
	<h1>Choose a Category</h1>

	<?php //get all the categories
	$query = "SELECT * FROM categories";
	$result = $db->query($query); 
	if($result->num_rows >= 1){
	?>

	<select class="picker">
		<option>Choose one</option>
		<?php while( $row = $result->fetch_assoc() ){ ?>
		<option value="<?php echo $row['category_id'] ?>">
			<?php echo $row['title']; ?>
		</option>
		<?php } ?>
	</select>

	<?php }//end if categories ?>

	<div id="display-area">
		Choose a category and posts will display here
	</div>


	<script type="text/javascript">
		//when the value of the dropdown changes, trigger the ajax request
		$(".picker").change(function(){
			//what category?
			var cat_id = this.value;
			//create ajax request to display.php
			$.ajax({
				type	: "GET",
				url		: "display.php",
				data	: { 'cat_id' : cat_id }, //this info needs to be sent to display.php
				dataType: "html", //what type of data will be returned?
				success	: function(response){
					$("#display-area").html(response);
					$("#display-area").css({'background' : '#D0F1C0'});
				} 
			});
		});
		//do stuff while the ajax request is loading
		$(document).on({
			ajaxStart: function(){ $("body").addClass("loading"); },
			ajaxStop: function(){ $("body").removeClass("loading"); }
		});
	</script>
</body>
</html>