<?php
session_start();
$women = mysqli_query($connection, "SELECT * FROM `products` WHERE category=1");

?>
<div class="featured-items">
	<h1>Products</h1>
	<div class="products-list">
		<?php while ($woman = mysqli_fetch_assoc($women)) : ?>
			<div class="products">
				<h2><?=$woman['title'] ?></h2>
				<img class="" src="<?=$woman['image']; ?>" alt="alt">
				<p><?=$woman['description'] ?></p>
				<p><?=$woman['price']?>$</p>
			</div>
			<?php endwhile; ?>
	</div>
</div>