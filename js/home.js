import { verify_php_session } from './utils.js'

const httpRequest = new XMLHttpRequest()

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

window.onload = (evt) => {
    verify_php_session()
    var button_value = document.getElementById("filter-all").value
   var allButtons = document.getElementsByClassName("filter-ctrl")
    for (var i = 0; i < allButtons.length; i++)  {
        const element = allButtons[i];
        element.onclick = () => {
            button_value = element.getAttribute('value')
            fetch(`php/home.php?buttonValue=${button_value}`)
       .then(response => response.text())
       .then( data => {
           document.getElementById("contacts-table").innerHTML = data
       })
        }
    }
    fetch(`php/home.php?buttonValue=${button_value}`)
    .then(response => response.text())
    .then( data => {
        document.getElementById("contacts-table").innerHTML = data
    })
}