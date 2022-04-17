<?php
	function get_account_by_login($login)
	{
		$query = "SELECT * FROM users WHERE username=".$login;
		$user = myqli_query($connection, $query);
		return ($user);
	}
	function auth($login, $password)
	{
		$hash = hash('whirlpool', $password);
		$account = get_account_by_login($login);
		if ($hash === $account['password'])
			return (1);
		else
			return (0);
	}
?>