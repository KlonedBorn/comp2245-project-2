import { verify_php_session } from "./utils.js"
import { async_ajax_request } from "./utils.js"

window.onload = () => {
    const request = verify_php_session()

    // Loads User data from notes.php into their div elements
    const user_data = async_ajax_request('GET','./php/notes.php?refresh=true',(text)=>{
        try {
            const json_data = JSON.parse(text)
            for (const id in json_data) {
                if (Object.hasOwnProperty.call(json_data, id)) {
                    const html = json_data[id];
                    const domElement = document.getElementById(id)
                    domElement.innerHTML = decodeURI(html)
                }
            }
        } catch (error) {
            console.error(`Error message:${error} | results:\n${text}`)
        }
    })

    document.getElementById('add-notes').onclick = () => {
        const textArea = document.getElementById('textfield-input')
        const url = './php/notes.php'
        const params = new URLSearchParams()
        const uri = encodeURI(textArea.value)
        if(uri !== ""){
            params.append('comment',uri)
            console.log(`url: ${url}?${params.toString()}`)
            async_ajax_request('POST',`${url}?${params.toString()}`,(response) =>{
               const element =  document.getElementById('note-container')
               element.innerHTML = decodeURI(response) + element.innerHTML
            })
        } else {
            console.log('Field empty')
            document.getElementById('add-notes').classList.toggle('shake')
        }

    }
    document.getElementById('assign').onclick = () => {
        async_ajax_request('GET','./php/notes.php?action=assign',(res)=>{
            document.getElementById('assigned-to-info').innerText = res;
            alert("Contact has been assigned to this user.")
        })
    }
    document.getElementById('switch').onclick = () => {
        async_ajax_request('GET','./php/notes.php?action=switch',(res)=>{
            alert("Contact position has been changed.")
            document.getElementById('switch').innerHTML = res
        })
    }
    // fetch(`php/notes.php`)
    // .then(response => response.text())
    // .then( data => {
    //     const res = JSON.parse(data)
    //     document.getElementById('prefix-info').innerHTML = res['prefix-info']
    //     document.getElementById('futher-info').innerHTML = res['futher-info']
    //     document.getElementById('note-container').innerHTML = res['note-container']
    // })
    // // if( request['role'] != 'Admin') {
    // //     document.getElementById('add-user').style.display = 'none'
        
    // // }
}

// fetch(`php/notes.php`)
// .then(response => response.text())
// .then( data => {
// document.getElementById("users-table").innerHTML = data
// })