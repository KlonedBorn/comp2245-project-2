//THIS BETTER NOT BE BULLSHIT

const httpRequest = new XMLHttpRequest()

function Adding() {
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
	errormsg.innerHTML = "";
    fname.style.borderColor = "black";
    lname.style.borderColor = "black";
	telephone.style.borderColor = "black";
	email.style.borderColor = "black";
	
	if (title.value == "") {
		title.style.borderColor = "red";
		errormsg.innerHTML = "Please enter all fields";
		check = false;
	}

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

window.onload = () => {
    httpRequest.onreadystatechange = ()=>{
        if(httpRequest.readyState == XMLHttpRequest.DONE){
            if(httpRequest.status == 200){
                console.log(httpRequest.responseText);
            }
            else
            {
                console.log(`Something went wrong ${httpRequest.status}` )
            }
        }
    }
    const btn_add = document.getElementById('addBtn')
    btn_add.onclick = () => {
        const tf_title = document.getElementById('title').value
        const tf_name1 = document.getElementById('firstname').value
        const tf_name2 = document.getElementById('lastname').value
        const tf_email = document.getElementById('email').value
        const tf_telephone = document.getElementById('telephone').value
        const tf_company = document.getElementById('company').value
		const tf_type = document.getElementById('type').value
		const tf_assigned = document.getElementById('assigned').value
        Adding()
		httpRequest.open('GET',`addusers.php??title=${tf_title}&fname=${tf_name1}&lname=${ t$tf_name2}&email=${tf_email}&telephone=${tf_telephone}&company=${tf_company}&assigned=${tf_assigned}`)
        httpRequest.send(null)
        // if( !tx_password.match("^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)[a-zA-Z\\d]{8,}$") )
        //     alert(`\'${tx_password}\' is not a valid password`)
        // else
        //     alert("Password is valid")
    }
}