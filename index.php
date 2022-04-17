<?php
	$root = $_SERVER['DOCUMENT_ROOT']."/rush00";
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
	$clothes= mysqli_query($connection, "SELECT * FROM clothes_type");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Online shop</title>
	<link rel="stylesheet" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<?php include $root."/header.php"; ?>
	<div class="container">
		<div class="content">
			<div class="top-container">
				<div class="deal"><h2>
					30% OFF
				</h2>
					<h1>
					<a href="getcategory.php?category=women"><li>
					<?php
						$cat=mysqli_fetch_assoc($category);
						print_r($cat['title']);
						// if this clicked: show men clothes only

					?>
					</li></a>
					</h1></div>
				<div class="deal"><h2>
					HOT DEAL
				</h2>
				<h1>
					<a href="getcategory.php?category=men"><li>
					<?php
						$cat=mysqli_fetch_assoc($category);
						print_r($cat['title']);
						// if this clicked: show men clothes only

					?>
					</li></a>
				</h1></div>
				<div class="deal"><h2>NEW ARRIVALS</h2><h1>
					<a href="getcategory.php?category=kids"><li>
						<?php
							$cat=mysqli_fetch_assoc($category);
							print_r($cat['title']);
							// if this clicked: show men clothes only

						?>
					</li></a>
				</h1></div>
			</div>
			<div class="featured-items">
				<h1>Products</h1>
				<div class="products-list">
					<?php while ($product = mysqli_fetch_assoc($products)) : ?>
						<div class="products">
							<h2><?=$product['title'] ?></h2>
							<img class="" src="<?=$product['image']; ?>" alt="alt">
							<p><?=$product['description'] ?></p>
							<p><?=$product['price']?>$</p>
						</div>
						<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<p>	&#9400; Anton & Kimmo corporation</p>
	</div>
</body>
</html>