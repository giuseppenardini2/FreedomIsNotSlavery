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
	$name=$_POST['name-rf'];
	$surname=$_POST['surname-rf'];
	$email=$_POST['email-rf'];
	$username=$_POST['username-rf'];
	$password=$_POST['password-rf'];
	$messagetype=$_POST['message-type-rf'];
	$body=$_POST['message-rf'];
	
	//Check if all fields are complete
	if($name=='' or $surname=='' or $email=='' or $username=='' or $password=='' or $body==''){
		$connection->close();
		die("Complete all fields :(");
	}
	
	//Check if the user or email are already registrered
	$sql_checkuser="SELECT * FROM User WHERE username='$username' OR email='$email'";
	$result_checkuser=$connection->query($sql_checkuser);
	if ($result_checkuser->num_rows != 0) {
		$connection->close();
		die("Username or email already registered :(");
	}
	
	//Check if the message type is already stored in the database, else store it
	$sql_checkmessagetype="SELECT name FROM MessageType WHERE name='$messagetype'";
	$result_checkmessagetype=$connection->query($sql_checkmessagetype);
	if ($result_checkmessagetype->num_rows == 0) {
		$sql_messagetype="INSERT INTO MessageType (name) VALUES('$messagetype')";
		$result_messagetype=$connection->query($sql_messagetype);
		if (!$result_messagetype) {
			$connection->close();
			die("Message type error");
		}
	}
	
	//Insert the user and message into the database
	$sql_usermessage="INSERT INTO User (name, surname, username, email, password) VALUES('$name', '$surname', '$username', '$email', '$password');";
	$sql_usermessage.="INSERT INTO Message (type, body, user) VALUES('$messagetype', '$body', '$username')";
	$connection->multi_query($sql_usermessage);
	do{
		if ($result_usermessage=$connection->store_result()) {
			echo "Ok";
		}
	} while($connection->next_result());
	
	
	echo "User registered :)\n";
	
	$connection->close();
?>

