<?php
	//connect to database
	$servername = "localhost";
	$username = "root";
	$password = "1233anton";
	$dbname = "rush_db";
	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if (!$connection)
		die("Connection failed: " . mysqli_connect_error());	$category = mysqli_query($connection, "SELECT * FROM category");
	//check video settings if this doesn't work
	$category = mysqli_query($connection, "SELECT * FROM category");
	$products = mysqli_query($connection, "SELECT * FROM products");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<div>helllo World!</div>
	<div>
		<?php while ($product = mysqli_fetch_assoc($products)) : ?>
			<h4><?=$product['title'] ?></h4>
			<img src="<?=$product['image']; ?>" alt="alt">
			<p><?=$product['description'] ?></p>
		<?php endwhile; ?>
	</div>

</body>
</html>