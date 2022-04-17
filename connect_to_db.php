<?php
	function connect_to_database()
	{
		$servername = "localhost";
		$username = "root";
		$password = "mh5KF7xd";
		$dbname = "shop";
		$connection = mysqli_connect($servername, $username, $password, $dbname);
		if (!$connection)
			die("Connectioon error: " . mysqli_connect_error());
		else
		{
			return ($connection);
		}
		return $connection;
	}
?>