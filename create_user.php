<?php
	include ("connect_to_db.php");
	foreach ($_POST as $key => $value)
	{
		if ($key === "submit" && $value === "OK")
			$submit_ok = 1;
	}
	if ($submit_ok == 1)
	{
		foreach ($_POST as $key => $value)
		{
			if($key === "login")
				$login = $value;
			else if($key === "passwd")
				$password = $value;
		}
		if($password === "")
		{
			echo("Error\n");
			return (-1);
		}
		$password = hash('whirlpool', $password);
		$con = connect_to_database();
		$query = "SELECT * FROM `users` WHERE `name`='$login';";
		$existing_user = $con->query($query);
		if($existing_user->num_rows > 0)
			echo("Username already in use!");
		else
		{
			$id = rand(0,2147483647);
			$query = "INSERT INTO `users` (`id`, `name`, `password`) VALUES ('$id', '$login', '$password');";
			$res = $con->query($query);
			print_r($res);
			$_SESSION['loggued_on_user'] = $login;
			header("Location: index.html");
		}
	}
?>