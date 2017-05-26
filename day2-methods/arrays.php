<?php 
//simple array example
$shows = array( 'Better Call Saul', 'The Leftovers', 'Fargo', 'Bloodline' );
//alphabetize and renumber the keys
sort($shows);


//associative array example
$grocery_list = array(
	'eggs' 				=> '1 dozen',
	'milk'				=> '2 carton',
	'bananas' 			=> 6,
	'cheddar cheese' 	=> '1 pound',
	'baby greens'		=> 'big bag',
);
ksort($grocery_list);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Array Examples</title>
</head>
<body>
<pre>
	<?php print_r($shows); ?>
</pre>

<?php
//display each show title in a heading 
foreach( $shows as $show ){
	echo '<h2>' . $show .  ' is awesome</h2>';
} 
?>


<?php 
//if there are no groceries, hide this list
if( ! empty($grocery_list) ){ ?>
<h3>Groceries</h3>
<ul>
	<?php foreach( $grocery_list as $name => $quantity ){ ?>
		<li><b><?php echo $name; ?></b> - <?php echo $quantity; ?></li>
	<?php } //end foreach ?>

</ul>
<?php 
} //end if not empty
?>


</body>
</html>