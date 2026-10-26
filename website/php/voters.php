<?php
	//Connect to the database
	$servername='db';
	$username='winston';
	$password='winston1984';
	$dbname='finsDB';
	
	$connection=new mysqli($servername, $username, $password, $dbname);
	
	if($connection->connect_error){
		die('Connection failed: ' . $connection->connect_error);
	}
	
	//Select all users and show them
	$sql_usersnumber="SELECT email FROM User WHERE 1";
	$result_usersnumber=$connection->query($sql_usersnumber);
	echo "$result_usersnumber->num_rows";
		
	$connection->close();
?>


