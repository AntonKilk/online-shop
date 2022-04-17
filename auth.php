
<?php
	include ("connect_to_db.php");
	function get_password_by_login($login)
	{
		$query = "SELECT `password` FROM `users` WHERE `name`='$login';";
		$con = connect_to_database();
		$res = $con->query($query);
		while ($row = mysqli_fetch_assoc($res))
			$password = $row['password'];
		return ($password);
	}
	function auth($login, $password)
	{
		$hash = hash('whirlpool', $password);
		$pass_in_db = get_password_by_login($login);
		if ($hash === $pass_in_db)
			return (1);
		else
			return (0);
	}
?>