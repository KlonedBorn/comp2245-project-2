// Copyright 2022 Kyle King
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

export function load_content(id,fn){
    console.log(`div id: ${id}, filename: ${fn}`)
    let xhttp;
    let element = document.getElementById(id)
    let file = fn
    if( file ) {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if( this.readyState == 4){
                if(this.status == 200) {
                    element.innerHTML = this.responseText + element.innerHTML;} 
                else {element.innerHTML = "<h1>Page not found.</h1>"}
            }
        }
        xhttp.open('GET',`${fn}`,true)
        xhttp.send()
        return;
    }
}
export function ensure_session(session){
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = (evt) => {
        if(xhttp.readyState == XMLHttpRequest.DONE){
            if(xhttp.status == 200) {
                try {
                    if((int)(xhttp.responseText) == 200){
                        console.log("User session token found");
                    } else {
                        window.location.href = "../login.html"
                        alert("User must login first")
                    }
                } catch (error) {
                    alert("User session couldn't be verified")
                }
            } else {
                alert("User session failed")
            }
        }
    }
    xhttp.open('GET','server/session.php',false)
    xhttp.send(null)
}