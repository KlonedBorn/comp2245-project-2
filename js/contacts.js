import {load_content} from "./loader.js"
import { ensure_session } from "./loader.js"

window.onload = () => {
    load_content('content','element/header.html')
    load_content('content','element/sidebar.html')
    ensure_session("server/session.php")
}

fetch(`server/users.php`)
.then(response => response.text())
.then( data => {
document.getElementById("users-table").innerHTML = data})