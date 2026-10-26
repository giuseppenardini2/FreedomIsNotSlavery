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
	
	//Get fields
	$username=$_POST['username-mf'];
	$password=$_POST['password-mf'];
	$messagetype=$_POST['message-type-mf'];
	$body=$_POST['message-mf'];
	
	//Check if all fields are complete
	if($username=='' or $password=='' or $body==''){
		die("Complete all fields :(");
	}
	
	//Check if the username and password are valid
	$sql_checkuser="SELECT name, username FROM User WHERE username='$username' AND password='$password'";
	$result_checkuser=$connection->query($sql_checkuser);
	if ($result_checkuser->num_rows != 1) {
		$connection->close();
		die("Wrong username or password :(");
	}
	$row=$result_checkuser->fetch_assoc();
	echo "Welcome " . $row['name']." (".$row['username'].") :)\n";
	
	//Check if the message type is already stored in the database, else store it
	$sql_checkmessagetype="SELECT name FROM MessageType WHERE name='$messagetype'";
	$result_checkmessagetype=$connection->query($sql_checkmessagetype);
	if ($result_checkmessagetype->num_rows == 0) {
		$sql_messagetype="INSERT INTO MessageType (name) VALUES('$messagetype')";
		$result_messagetype=$connection->query($sql_messagetype);
		if (!$result_messagetype) {
			echo $mysqli->error;
			$connection->close();
			die("Message type error :(");
		}
	}

	//Insert the message into the database
	$sql_message="INSERT INTO Message (type, user, body) VALUES('$messagetype', '$username', '$body')";
	$result_message=$connection->query($sql_message);
	if (!$result_message) {
		echo $mysqli->errno;
		$connection->close();
		die("Message error : (");
	}
	
	echo "Message sent successfully :)";
	$connection->close();
?>

