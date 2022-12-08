import {load_content} from "./loader.js"
import { ensure_session } from "./loader.js"
const httpRequest = new XMLHttpRequest()

const value = 1
window.onload = () => {
	load_content('content','element/header.html')
	load_content('content','element/sidebar.html')
    document.getElementById('contact-add').onclick = () => {
		window.location.href = "./addcontacts.html"
	}
	const btn_filters = document.getElementsByClassName('filter-ctrl')
	for (let index = 0; index < btn_filters.length; index++) {
		const element = btn_filters[index];
		element.addEventListener('click', () => {
			console.log("Button pressed");
		})
	}
	document.getElementById('filter-all').onclick = () =>{
		console.log("Button pressed");
	}
	httpRequest.onreadystatechange = () => {
		if(httpRequest.readyState === XMLHttpRequest.DONE) {
			if( httpRequest.status === 200 ) {
				console.log(httpRequest.responseText)
			} else {
				console.log("Error");
			}
		}
	} 

    btn_filters.onclick = () => {
        const tf_title = document.getElementById('title').value
        const tf_name1 = document.getElementById('firstname').value
        const tf_name2 = document.getElementById('lastname').value
        const tf_email = document.getElementById('email').value
        const tf_telephone = document.getElementById('telephone').value
        const tf_company = document.getElementById('company').value
		const tf_type = document.getElementById('type').value
		const tf_assigned = document.getElementById('assigned').value
		const tf_button_value = document.getElementById('addBtn').value


			httpRequest.open('POST',`server/dashboard.php?buttonValue=${button_value}`)
        	httpRequest.send(null)
    }
    ensure_session("server/session.php")
}
