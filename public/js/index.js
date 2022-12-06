// Copyright 2022 COMP-2245 Team 2
// 
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
// 
//     http://www.apache.org/licenses/LICENSE-2.0
// 
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

// Created by Kyle King.
//  Edited by by Deondre Mayers.

const httpRequest = new XMLHttpRequest()

function Vali() {
	var password = document.getElementById("password");
	var loginerr = document.getElementById("error");
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

window.onload = () => {
    httpRequest.onreadystatechange = ()=>{
        if(httpRequest.readyState == XMLHttpRequest.DONE){
            if(httpRequest.status == 200){
                window.location.href = "dashboard.php";
            }
            else
            {
                console.log(`Something went wrong ${httpRequest.status}` )
            }
        }
    }
    const btn_login = document.getElementById('loginbtn')
    btn_login.onclick = () => {
        const tf_email = document.getElementById('email').value
        const tf_password = document.getElementById('password').value
        Vali()
        httpRequest.open('GET',`login.php?email=${tf_email}&password=${tf_password}`)
        httpRequest.send(null)
        // if( !tx_password.match("^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)[a-zA-Z\\d]{8,}$") )
        //     alert(`\'${tx_password}\' is not a valid password`)
        // else
        //     alert("Password is valid")
    }
}