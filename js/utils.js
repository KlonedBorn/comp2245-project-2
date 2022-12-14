
function onerror_default(code , text){
  console.error(`Error encountered in AJAX call (code:${code}):\n${text}`)
}

export function async_ajax_request(method,url,onsuccess,onerror=onerror_default) {
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = () => {
      if( xhttp.readyState == XMLHttpRequest.DONE){
        switch (xhttp.status) {
          case 200:
            onsuccess(xhttp.responseText)
          break;
          default:
            onerror(xhttp.status,xhttp.responseText)
          break;
        }
      }
    }
    try {
      xhttp.open(method,url,true)
      xhttp.send()
    } catch (err) {
      console.error(err.stack)
    }
}

// TO-DO make a universal form validation function or look for one online.
export function validate_form(field_ids,patterns){
	let errormsg = document.getElementById("error");
	for (let id = 0; id < field_ids.length; id++) {
		// Init
		const form_elem_id = field_ids[id];
		const form_elem = document.getElementById(form_elem_id);
		const re_pattern = patterns[id];
		const re_exp = RegExp(re_pattern,'gmi')
		errormsg.innerText = "";
		if(!form_elem) {
			errormsg.innerText = `Form field \'${form_elem_id}\' not found`;
		} else {
			form_elem.style.borderColor = "black";
			if ( !re_exp.exec(form_elem.value) ) {
				form_elem.style.borderColor = "red";
				errormsg.innerText = "Please enter all fields";
				return false;
			}
		}
	}
	return true;
}
/**
 * Credit to w3 for the function
 * https://www.w3schools.com/howto/howto_html_include.asp
 * Searches the html page for tags that have 'include-html' attribute then inserts the html file into the element.
 * @returns void
 */
export function include_html() {
    let z, i, elmnt, file, xhttp;
    /* Loop through a collection of all HTML elements: */
    z = document.getElementsByTagName("*");
    for (i = 0; i < z.length; i++) {
      elmnt = z[i];
      /*search for elements with a certain atrribute:*/
      file = elmnt.getAttribute("include-html");
      if (file) {
        /* Make an HTTP request using the attribute value as the file name: */
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4) {
            if (this.status == 200) {elmnt.innerHTML = this.responseText;}
            if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
            /* Remove the attribute, and call this function once more: */
            elmnt.removeAttribute("include-html");
            include_html();
          }
        }
        xhttp.open("GET", file, true);
        xhttp.send();
        /* Exit the function: */
        return;
      }
    }
}

/**
 * This function is used to call php files.
 * @param {A string denoting the global variable being set by parameters} method 
 * @param {The website being called} url 
 * @param {Url parameters} param 
 * @returns json string.
 * ~ Working
 */
export function execute_http_request(method,url,param) {
    const xhttp = new XMLHttpRequest()
    let results;
    xhttp.open(method,url,false)
    xhttp.onreadystatechange = () => {
        if(xhttp.readyState == XMLHttpRequest.DONE){
            switch(xhttp.status){
                // Ok
                case 200: {
                    results = xhttp.responseText
                } break;
                // Error
                default: {
                    results = "error" 
                }
            }
        }
    }
    xhttp.onerror = (error) => {
        console.error( error );
    }
    xhttp.send(param);
    return results;
}

export function verify_php_session(){
  let res = execute_http_request('GET','./php/session2.php',null)
  try {
      const resp = JSON.parse(res)
      if(resp['status'] != 200){
          alert("User must log-in")
          window.location.href = './login.html'
      } else {
        return resp
      }      
  } catch (SyntaxError) {
     console.error("JSON error results: " + res) 
  }
}

export function loggedin(){
  let res = execute_http_request('GET','./php/session2.php',null)
  try {
      const resp = JSON.parse(res)
      if(resp['status'] == 200){
          alert("User already logged in.")
          window.location.href = './home.html'
      } else {
        return resp
      }      
  } catch (SyntaxError) {
     console.error("JSON error results: " + res) 
  }
}

function get_html_resource(file){

}