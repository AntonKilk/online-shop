<?php
	include 'auth.php';
	session_start();
	foreach ($_POST as $key => $value)
	{
		if($key === "submit" && $value === "OK")
			$submit = 1;
	}
	if ($submit == 1)
	{
		foreach ($_POST as $key => $value)
		{
			if($key === "login")
				$login = $value;
			else if($key === "passwd")
				$passwd = $value;
		}
		$ret = auth($login, $passwd);
		if ($ret == 1)
		{
			$_SESSION['loggued_on_user'] = $login;
			header("Location: shop.php");
		}
		else
		{
			$_SESSION['loggued_on_user'] = "";
			echo("ERROR\n");
			header("Location: index.html");
		}
	}
	if($_SESSION['loggued_on_user'] === "")
	{
		header("Location: index.html");
	}
?>

<html>
<head>
	<link rel="stylesheet" href="style.css">
</head>
<body style="margin-left: 5%; margin-top: 5%; margin-right: 5%">
<div class="form-style-3">
	<h1>42Store</h1>
	<iframe src="products.php" title="Shop" width=100% height="550px"></iframe>
	<form action="index.html" method="post">
		<input type="submit" name=submit value="Back to login page.">
	</form>
</div>
</body>
</html>