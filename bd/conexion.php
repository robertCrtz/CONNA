<?php
	$host = "localhost";
	$database='cae_conna';
	$user='root';
	$password='';

	$con=mysqli_connect($host,$user,$password);
	mysqli_select_db($con, $database);
?>