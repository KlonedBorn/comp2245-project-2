import { verify_php_session } from "./utils.js"

window.onload = () => {
    const request = verify_php_session()
    if( request['role'] != 'Admin') {
        document.getElementById('add-user').style.display = 'none'
        
    }
}

fetch(`php/users.php`)
.then(response => response.text())
.then( data => {
document.getElementById("users-table").innerHTML = data})