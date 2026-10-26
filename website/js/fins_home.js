function showRegistrationFormPassword(){
	var password_field = document.getElementById("password-rf");
	showHidePassword(password_field);
}

function showMessageFormPassword(){
	var password_field = document.getElementById("password-mf");
	showHidePassword(password_field);
}

function showHidePassword(password_field) {
  if (password_field.type === "password") {
    password_field.type = "text";
  } else {
    password_field.type = "password";
  }
}


