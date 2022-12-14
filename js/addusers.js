//THIS BETTER NOT BE BULLSHIT

import {validate_form} from './utils.js'

const httpRequest = new XMLHttpRequest()

const form_fields = new Array(
	'firstname',
	'lastname',
	'email',
	'password',
	'role'
);

const form_patterns = new Array(
	"^[a-z ,.'-]+$",
	"^[a-z ,.'-]+$",
	"^[a-zA-Z0-9_-]+@[a-zA-Z_-]+?\\.[a-zA-Z]{2,3}$",
	"^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)[a-zA-Z\\d]{8,}$",
	"Member|Admin"
);

function Adding() {
	let fname = document.getElementById("firstname");
    let lname = document.getElementById("lastname");
	let email = document.getElementById("email");
	let pswd = document.getElementById("password");
    let role = document.getElementById("role");
	let errormsg = document.getElementById("error");

	let check = true;
	errormsg.innerHTML = "";
    fname.style.borderColor = "black";
    lname.style.borderColor = "black";
	pswd.style.borderColor = "black";
	email.style.borderColor = "black";

	const re_fname = RegExp("^[a-z ,.'-]+$",'gmi')
	const re_lname = RegExp("^[a-z ,.'-]+$",'gmi')
	const re_email = RegExp("^[a-zA-Z0-9_-]+@[a-zA-Z_-]+?\\.[a-zA-Z]{2,3}$",'gm')
    const re_pswd = RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)[a-zA-Z\\d]{8,}$",'gm')

    if ( !re_fname.exec(fname.value) ) {
		fname.style.borderColor = "red";
		errormsg.innerHTML = "Please enter all fields";
		check = false;
	}

    if ( !re_lname.exec(lname.value) ) {
		lname.style.borderColor = "red";
		errormsg.innerHTML = "Please enter all fields";
		check = false;
	}

	if ( !re_email.exec(email.value) ) {
		email.style.borderColor = "red";
		errormsg.innerHTML = "Please enter all fields";
		check = false;
	}

	if ( !re_pswd.exec(pswd.value) ) {
		pswd.style.borderColor = "red";
		errormsg.innerHTML = "Please enter all fields";
		check = false;
	}

    if (role.value != 'Admin' || role.value != 'Member') {
		role.style.borderColor = "red";
		errormsg.innerHTML = "Please enter all fields";
		check = false;
	}

	return check
}

window.onload = () => {

    httpRequest.onreadystatechange = ()=>{
        if(httpRequest.readyState == XMLHttpRequest.DONE){
            if(httpRequest.status == 200){
				alert(httpRequest.responseText);
				const in_all = document.getElementsByTagName('input')
				for (const input in in_all) {
					if (Object.hasOwnProperty.call(in_all, input)) {
						const element = in_all[input];
						element.value = ""
					}
				}
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
        if (validate_form( form_fields,form_patterns)) 
		{
			httpRequest.open('POST',`php/addusers.php?fname=${tf_name1}&lname=${tf_name2}&email=${tf_email}&password=${tf_password}&role=${tf_role}`)
			httpRequest.send(null)
		}
    }
}