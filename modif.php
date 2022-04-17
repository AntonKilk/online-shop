<?php
include "auth.php";
include ("../connect_to_db.php");

function set_new_password($login, $newpw)
{
	$con = mysqli_connect($servername, $username, $password, $dbname);
	$query = "UPDATE users SET password = '".$newpw."' WHERE username='".$login."'";
	myqli_query($con, $query);
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
		else if($key === "oldpw")
			$oldpw = $value;
	}
	if($newpw === "")
	{
		echo("Error\n");
		return (-1);
	}
	$ret = auth($login, $oldpw);
	if ($ret == 1)
	{
		set_new_password($login, $newpw);
		echo("OK\n");
		header("Location: index.html");
	}
	else
		echo("Error\n");
}
else
	echo("Error\n");

?>