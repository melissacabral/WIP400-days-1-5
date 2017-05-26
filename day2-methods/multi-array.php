<?php 
//multi-dimensional array of products
$products = array(
	1 => array(
		'title' 		=> 'Plaid shirt',
		'price' 		=> '$59.99',
		'description' 	=> 'A pretty nice shirt',
		'image'			=> 'http://unsplash.it/200/200?image=0',
		),
	2 => array(
		'title' 		=> 'Jean Shorts',
		'price' 		=> '$29.99',
		'description' 	=> 'Not safe for work',
		'image'			=> 'http://unsplash.it/200/200?image=1080',
		),
	3 => array(
		'title' 		=> 'Red Shoes',
		'price' 		=> '$329.99',
		'description' 	=> 'They go with everything',
		'image'			=> 'http://unsplash.it/200/200?image=1081',
		),
);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Product Catalog with Multi dimensional arrays</title>
</head>
<body>
<h1>Our Products</h1>

<?php //make sure there are products to show
if( !empty($products) ){ 
	//show each product's markup
	foreach( $products as $id => $product ){ 
?>
<article class="product">
	<img src="<?php echo $product['image']; ?>" alt="product image">
	<h2><?php echo $product['title'] ?></h2>

	<span class="price"><?php echo $product['price']; ?></span>
	<p class="desc"><?php echo $product['description'] ?></p>

	<a class="add" href="?id=<?php echo $id; ?>">Add to Cart</a>	
</article>
<?php 
	} //foreach product
} //if not empty
?>

</body>
</html>