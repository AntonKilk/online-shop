<?php
	function connect_to_database()
	{
		$servername = "localhost";
		$username = "root";
		$password = "mh5KF7xd";
		$dbname = "shop";
		echo("connecting to database".$dbname." at ".$servername."\n");
		$connection = mysqli_connect($servername, $username, $password, $dbname);
		if (!$connection)
			die("Connectioon error: " . mysqli_connect_error());
		else
		{
			echo("connected to".$dbname." at ".$servername."\n");
			return ($connection);
		}
		return $connection;
	}
?>