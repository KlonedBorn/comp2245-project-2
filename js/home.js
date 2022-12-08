import {load_content} from "./loader.js"

import { ensure_session } from "./loader.js"

//THIS BETTER NOT BE BULLSHIT
import {load_content} from './loader.js'

const httpRequest = new XMLHttpRequest()

const onloadRequest = new XMLHttpRequest()
window.onload = () => {
	load_content('content','element/header.html')
	onloadRequest.open('GET',`server/employee.php`)
	onloadRequest.send(null)
	onloadRequest.onreadystatechange = () => {
		if(onloadRequest.readyState === XMLHttpRequest.DONE) {
			if( onloadRequest.status === 200 ) {
				const sl_assigned = document.getElementById('assigned')
				sl_assigned.innerHTML = onloadRequest.responseText
			} else {
				console.log("Error");
			}
		}
	}
    const btn_add = document.getElementById('addBtn')

	httpRequest.onreadystatechange = () => {
		if(httpRequest.readyState === XMLHttpRequest.DONE) {
			if( httpRequest.status === 200 ) {
				console.log(httpRequest.responseText)
			} else {
				console.log("Error");
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

        if(Adding())
		{
			httpRequest.open('POST',`server/addcontacts.php?title=${tf_title}&fname=${tf_name1}&lname=${tf_name2}&email=${tf_email}&telephone=${tf_telephone}&company=${tf_company}&assigned=${tf_assigned}&type=${tf_type}&buttonValue=${tf_button_value}`)
        	httpRequest.send(null)
		}
    }
    ensure_session("server/session.php")
}
