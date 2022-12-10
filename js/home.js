import {load_content} from "./loader.js"
import { ensure_session } from "./loader.js"

const httpRequest = new XMLHttpRequest()

var button_value = 2
// window.onload = () => {
// 	load_content('content','element/header.html')
// 	load_content('content','element/sidebar.html')
//     document.getElementById('contact-add').onclick = () => {
// 		window.location.href = "./addcontacts.html"
// 	}
// 	const btn_filters = document.getElementsByClassName('filter-ctrl')
// 	for (let index = 0; index < btn_filters.length; index++) {
// 		const element = btn_filters[index];
// 		element.addEventListener('click', () => {
// 			console.log("Button pressed");
// 		})
// 	}
// 	document.getElementById('filter-all').onclick = () =>{
// 		console.log("Button pressed");
// 	}
// 	httpRequest.onreadystatechange = () => {
// 		if(httpRequest.readyState === XMLHttpRequest.DONE) {
// 			if( httpRequest.status === 200 ) {
// 				console.log(httpRequest.responseText)
// 			} else {
// 				console.log("Error");
// 			}
// 		}
// 	} 


    fetch(`server/dashboard.php?buttonValue=${button_value}`)
    .then(response => response.text())
    .then( data => {
    document.getElementById("contacts-table").innerHTML = data})
    
    ensure_session("../server/session.php")
// }