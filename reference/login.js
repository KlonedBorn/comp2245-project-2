function Vali() {
	var password = document.getElementById("password");
	var loginerr = document.getElementById("loginerror");
	var email = document.getElementById("email");
	var errormsg = document.getElementById("error");
	var check = true;
	loginerr.innerHTML = "";
	password.style.borderColor = "black";
	email.style.borderColor = "black";
	if (email.value == "") {
		email.style.borderColor = "red";
		errormsg.innerHTML = "Please enter all fields";
		check = false;
	}
	if (password.value == "") {
		password.style.borderColor = "red";
		errormsg.innerHTML = "Please enter all fields";
		check = false;
	}
	if (check) {
		return true;
	} else {
		return false;
	}
}