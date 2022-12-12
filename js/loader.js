export function load_content(id,fn){
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
    xhttp.open('GET','server/session.php',true)
    xhttp.send(null)
}