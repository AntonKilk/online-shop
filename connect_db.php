<?php
$root = $_SERVER['DOCUMENT_ROOT']."/rush00";
$servername = "localhost";
$username = "root";
$password = "1233anton";
$dbname = "rush_db";
$connection = mysqli_connect($servername, $username, $password, $dbname);
if (!$connection)
	die("Connection failed: " . mysqli_connect_error());	$category = mysqli_query($connection, "SELECT * FROM category");
?>