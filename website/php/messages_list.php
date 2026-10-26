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
	
	//Select all messages and show them
	$sql_messages="SELECT * FROM Message ORDER BY id DESC";
	$result_messages=$connection->query($sql_messages);
	if ($result_messages->num_rows > 0) {
		while($row = $result_messages->fetch_assoc()){
			echo "<p>&#x2022<i>".$row['user']."</i>: ".$row['body']."</p>";
		}
	}
	
	$connection->close();
?>

