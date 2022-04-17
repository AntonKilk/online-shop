<?php
include "auth.php";

function set_new_userdata($login, $newlogin, $newpw)
{
	$con = connect_to_database();
	$newpw = hash('whirlpool', $newpw);
	$query = "UPDATE `users` SET `password` = '$newpw', `name` = '$newlogin' WHERE `name`='$login';";
	$con->query($query);
}

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
		else if($key === "newpw")
			$newpw = $value;
		else if($key === "newlogin")
			$newlogin = $value;
	}
	if($newpw === "")
	{
		echo("Error\n");
		return (-1);
	}
	session_start();
	if($_SESSION['loggued_on_user'] !== "admin")
		echo("Insufficient priviledges");
	else
	{
		echo("authenticating existing user");
		$query = "SELECT * FROM `users` WHERE `name`='$login';";
		$con = connect_to_database();
		$existing_user = $con->query($query);
		if($existing_user->num_rows == 0)
			echo("No such user in database!");
		else
		{
			echo("updating user data");
			set_new_userdata($login, $newlogin, $newpw);
			echo("OK\n");
			header("Location: index.html");
		}
	}
}
else
	echo("Error\n");
?>