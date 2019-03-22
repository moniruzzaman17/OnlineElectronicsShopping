<?php
	$conn=mysqli_connect('localhost','root','','oss_db');
	mysqli_query($conn,'SET CHARACTER SET utf8'); 
	mysqli_query($conn,"SET SESSION collation_connection ='utf8_general_ci'");

function row_count($result)
{
	return mysqli_num_rows($result);
}

function escape($string)
{
	global $conn;
	return mysqli_real_escape_string($conn,$string);
}


function query($query)
{
	global $conn;
	return mysqli_query($conn,$query);

	confirm($result);
}

function confirm($result)
{
	global $conn;

	if (!$result) {
		die("QUERY FAILED".mysqli_error($conn));
	}
}

function fetch_array($result)
{
	global $conn;
	return mysqli_fetch_array($result);
}


?>