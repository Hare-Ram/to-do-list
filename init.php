<?php



$_SESSION['user_id'] = 2;

$db = new PDO('mysql:dbname=to-do;host=localhost', 'root', "");

//$db = new mysqli("localhost", "root", "", "to-do");


if ($db === false) {
die("ERROR: Could not connect to database. " . mysqli_connect_error());
}

if(!isset($_SESSION['user_id']))
{
	die('You are not logged in.');
}

?>