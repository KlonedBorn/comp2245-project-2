//THIS BETTER NOT BE BULLSHIT
import {load_content} from './loader.js';

const httpRequest = new XMLHttpRequest()

function Adding() {
	var fname = document.getElementById("firstname");
    var lname = document.getElementById("lastname");
	var email = document.getElementById("email");
	var password = document.getElementById("password");
    var role = document.getElementById("role");
	var errormsg = document.getElementById("error");
	var check = true;
	errormsg.innerHTML = "";
    fname.style.borderColor = "black";
    lname.style.borderColor = "black";
	password.style.borderColor = "black";
	email.style.borderColor = "black";

    if (fname.value == "") {
		fname.style.borderColor = "red";
		errormsg.innerHTML = "Please enter all fields";
		check = false;
	}

    if (lname.value == "") {
		lname.style.borderColor = "red";
		errormsg.innerHTML = "Please enter all fields";
		check = false;
	}

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

    if (role.value == "") {
		role.style.borderColor = "red";
		errormsg.innerHTML = "Please enter all fields";
		check = false;
	}

	if (check) {
		return true;
	} else {
		return false;
	}
}

window.onload = () => {
	load_content('content','element/header.html')
	load_content('content','element/sidebar.html')
    httpRequest.onreadystatechange = ()=>{
        if(httpRequest.readyState == XMLHttpRequest.DONE){
            if(httpRequest.status == 200){
                console.log(httpRequest.responseText);
            }
            else
            {
                console.log(`Something went wrong ${httpRequest.status}`)
            }
        }
    }
    const btn_add = document.getElementById('addBtn')
    btn_add.onclick = () => {
        const tf_name1 = document.getElementById('firstname').value
        const tf_name2 = document.getElementById('lastname').value
        const tf_email = document.getElementById('email').value
        const tf_password = document.getElementById('password').value
        const tf_role = document.getElementById('role').value
        if (Adding()) 
		{
			httpRequest.open('POST',`server/addusers.php?fname=${tf_name1}&lname=${tf_name2}&email=${tf_email}&password=${tf_password}&role=${tf_role}`)
			httpRequest.send(null)
		}
    }
}