<?php

function get_product_by_id($products, $id)
{
	$con = mysqli_connect($servername, $username, $password, $dbname);
	$query = "SELECT 1 FROM products WHERE id=".$id;
	return(myqli_query($con, $query));
}

function get_product_by_name($product_name)
{
	$con = mysqli_connect($servername, $username, $password, $dbname);
	$query = "SELECT * FROM products WHERE name=".$product_name;
	return(myqli_query($con, $query));
}

function get_all_products()
{
	$con = mysqli_connect($servername, $username, $password, $dbname);
	$query = "SELECT * FROM products";
	return(myqli_query($con, $query));
}

function get_products_by_category($category)
{
	$con = mysqli_connect($servername, $username, $password, $dbname);
	$query = "SELECT * FROM products WHERE category='$category';";
	return(myqli_query($con, $query));
}

function get_product_name($id)
{
	$con = mysqli_connect($servername, $username, $password, $dbname);
	$query = "SELECT name FROM products WHERE id='".$id."'";
	return(myqli_query($con, $query));
}

?>
<html>
<head>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="form-style-3">
	<?php
		show_products();
	?>
	</div>
</body>
