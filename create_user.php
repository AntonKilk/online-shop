<?php
	include ("connect_to_db.php");
	echo("create_user.php responding\n");
	foreach ($_POST as $key => $value)
	{
		echo("key: ".$ey." value ".$value."\n");
		if ($key === "submit" && $value === "OK")
			$submit_ok = 1;
	}
	if ($submit_ok == 1)
	{
		echo("submit ok");
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
		echo("trying to connect to database\n");
		$con = connect_to_database();
		$query = "SELECT * FROM users WHERE username=".$login;
		echo("quary: ".$query);
		$existing_user = myqli_query($con, $query);
		print_r($existing_user);
		if($existing_user)
			echo("Username already in use!");
		else
		{
			$query = mysqli_query($con, "INSERT INTO users (name, password) VALUES ('$user', '$password')");
			echo("quary: ".$query."\n");
			$user = myqli_query($con, $query);
			$_SESSION['loggued_on_user'] = $user;
		}
	}
?>