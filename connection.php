<?php
	session_start();
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'scanphp';

	$con = mysqli_connect($servername , $username , $password , $database);

	if (!$con){
		die('error');
	}
?>