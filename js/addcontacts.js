//THIS BETTER NOT BE BULLSHIT
import { execute_http_request } from './utils.js'
import { verify_php_session } from './utils.js'
import {validate_form} from './utils.js'

const httpRequest = new XMLHttpRequest()
const form_fields = new Array(
	'firstname',
	'lastname',
	'email',
	'telephone',
);

const form_patterns = new Array(
	"^[a-z ,.'-]+$",
	"^[a-z ,.'-]+$",
	"^[a-zA-Z0-9_-]+@[a-zA-Z_-]+?\\.[a-zA-Z]{2,3}$",
	"^(\\+\\d{1,2}\\s)?\\(?\\d{3}\\)?[\\s.-]\\d{3}[\\s.-]\\d{4}$",
);

function verify_fields() {
	var title = document.getElementById("title");
	var fname = document.getElementById("firstname");
    var lname = document.getElementById("lastname");
	var email = document.getElementById("email");
	var telephone = document.getElementById("telephone");
	var company = document.getElementById("company")
	var type = document.getElementById("type");
	var assigned = document.getElementById("assigned");
	var errormsg = document.getElementById("error");
	var check = true;
	errormsg.innerText = "";
    title.style.borderColor = "black";
    fname.style.borderColor = "black";
    lname.style.borderColor = "black";
    email.style.borderColor = "black";
	telephone.style.borderColor = "black";
	company.style.borderColor = "black";
	type.style.borderColor = "black";
	assigned.style.borderColor = "black";
	
	if (title.value == "") {
		title.style.borderColor = "red";
		errormsg.innerText = "Please enter all fields";
		check = false;
	}

    if (fname.value == "") {
		fname.style.borderColor = "red";
		errormsg.innerText = "Please enter all fields";
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

	if (telephone.value == "") {
		telephone.style.borderColor = "red";
		errormsg.innerHTML = "Please enter all fields";
		check = false;
	}

	if (company.value == "") {
		company.style.borderColor = "red";
		errormsg.innerHTML = "Please enter all fields";
		check = false;
	}

	if (type.value == "") {
		type.style.borderColor = "red";
		errormsg.innerHTML = "Please enter all fields";
		check = false;
	}

	if (assigned.value == "") {
		assigned.style.borderColor = "red";
		errormsg.innerHTML = "Please enter all fields";
		check = false;
	}

	if (check) {
		return true;
	} else {
		return false;
	}
}

const onloadRequest = new XMLHttpRequest()
window.onload = () => {
    verify_php_session()
    document.getElementById('assigned').innerHTML =execute_http_request('GET','php/employee.php',null)
    const btn_add = document.getElementById('addBtn')
	httpRequest.onreadystatechange = () => {
		if(httpRequest.readyState === XMLHttpRequest.DONE) {
			if( httpRequest.status === 200 ) {
				alert(httpRequest.responseText)
				const in_all = document.getElementsByTagName('input')
				for (const input in in_all) {
					if (Object.hasOwnProperty.call(in_all, input)) {
						const element = in_all[input];
						element.value = ""
					}
				}
			} else {
				alert("Error");
			}
		}
	} 
    btn_add.onclick = () => {
        const tf_title = document.getElementById('title').value
        const tf_name1 = document.getElementById('firstname').value
        const tf_name2 = document.getElementById('lastname').value
        const tf_email = document.getElementById('email').value
        const tf_telephone = document.getElementById('telephone').value
        const tf_company = document.getElementById('company').value
		const tf_type = document.getElementById('type').value
		const tf_assigned = document.getElementById('assigned').value
		const tf_button_value = document.getElementById('addBtn').value

        if(validate_form(form_fields,form_patterns))
		{
			httpRequest.open('POST',`./php/addcontacts.php?title=${tf_title}&fname=${tf_name1}&lname=${tf_name2}&email=${tf_email}&telephone=${tf_telephone}&company=${tf_company}&assigned=${tf_assigned}&type=${tf_type}&buttonValue=${tf_button_value}`)
        	httpRequest.send(null)
		}
    }
}