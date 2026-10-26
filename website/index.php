<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/fins_home.css">
	<script src="js/fins_home.js"></script>
</head>

<body style="background-color:rgb(248, 8, 0)">
    <h1 style="text-align:center;color:rgb(250, 250, 250); font-size: xxx-large;" >Freedom is not slavery!</h1>
    <img src="img/small-brother.jpg" class="centro" width="500">
    <h2 style="text-align:center; color:rgb(250, 250, 250); font-size: x-large;">
        For a long time, the members of the Brotherhood were united only by an idea. The time has come to take action. Join the revolution started by Emmanuel Goldstein to fight Big Brother. Join the Brotherhood.
        <br>THE PROLETARIAT ARE THE REVOLUTION!<br>
    </h2>
	
	<hr style="height:5px; color:rgb(255, 255, 255); background-color:rgb(255, 255, 255);">
	
    <h3 style="text-align:center; color:rgb(250, 250, 0); font-size: x-large;">
        Voters: 
		<?php
		include 'php/voters.php';
		?>
    </h3>
	
	<form action="index.php" method="post">
		<table align="center">
			<tr>
				<th class="box">
				
			</p>
			<h2 style="text-align:center; color:rgb(250, 250, 250); font-size: xx-large;">Subscribe</h2>
			<p style="text-align:center; color:rgb(250, 250, 250); font-size:larger;">
				Name*:<input type="text" name="name-rf" autocomplete="off"><br><br>
				Surname*:<input type="text" name="surname-rf" autocomplete="off"><br><br>
				Email*:<input type="email" name="email-rf" autocomplete="off"><br><br>
				Username*:<input type="text" name="username-rf" autocomplete="off"><br><br>
				Password*:<input type="password" id="password-rf" name="password-rf">
				<input type="checkbox" onclick="showRegistrationFormPassword()"><br><br>

				Message type*:
				<select name="message-type-rf">
					<option value="tml">Two Minutes Love</option>
					<option value="pfa">Proposal for action</option>
					<option value="qi">Questions/Information</option>
					<option value="fc">Free comment</option>
				</select><br><br>

				<label for="body" style="vertical-align: top-left;">Message*:</label>
				<textarea id="body" name="message-rf" rows="10" cols="40" placeholder="Scrivi qui..."></textarea><br><br>
				<input type="submit" name="submit-button-rf" value="Submit">
			</p>
		
				</th>
				
			<th class="box">
			</p>
			<h2 style="text-align:center; color:rgb(250, 250, 250); font-size: xx-large;">Send another message</h2>
			<p style="text-align:center; color:rgb(250, 250, 250); font-size:larger;">
				Username*:<input type="text" name="username-mf" autocomplete="off"><br><br>
				Password*:<input type="password" id="password-mf" name="password-mf">
				<input type="checkbox" onclick="showMessageFormPassword()"><br><br>

				Message type*:
				<select name="message-type-mf">
					<option value="tml">Two Minutes Love</option>
					<option value="pfa">Proposal for action</option>
					<option value="qi">Questions/Information</option>
					<option value="fc">Free comment</option>
				</select><br><br>

				<label for="body" style="vertical-align: top-left;">Message*:</label>
				<textarea id="body" name="message-mf" rows="10" cols="40" placeholder="Scrivi qui..."></textarea><br><br>
				<input type="submit" name="submit-button-mf" value="Submit">
			</p>
				</th>
			</tr>
		</table>
	</form>
	
	<p style="text-align:center; color:rgb(250, 250, 250); font-size:small;">
	(Messages are published together with the username. Data is safe from the Thought Police!)
	</p>
	<p style="text-align:center; color:rgb(250, 250, 250); font-size:larger">
		Expiration date: 1/9/84
	</p>
	
    <h2 style="text-align:center; color:rgb(250, 250, 250); font-size: x-large;">
        Feedback<br>
        <textarea id="corpo" rows="10" cols="50" disabled><?php
			if(isset($_POST['submit-button-rf'])){
			include 'php/registration.php';
			}
			if(isset($_POST['submit-button-mf'])){
			include 'php/send_message.php';
			}
			?>
		</textarea>
    </h2>
	
	<hr style="height:5px; color:rgb(255, 255, 255); background-color:rgb(255, 255, 255);">
	
	<h2 style="text-align:center; color:rgb(250, 250, 255); font-size: xx-large;">
        Sent messages
    </h2>
	
	<div style="text-align:center; color:rgb(250, 250, 255); font-size:large;">
	<?php
		include 'php/messages_list.php';
		?>
	</div>
	
</body>

</html>