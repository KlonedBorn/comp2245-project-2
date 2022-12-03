// Copyright 2022 COMP-2245 Team 2
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

const httpRequest = new XMLHttpRequest()

window.onload = (evt) => {
    httpRequest.onreadystatechange = (evt)=>{
        if(httpRequest.status == XMLHttpRequest.DONE){
            if(httpRequest.readyState == XMLHttpRequest.DONE){
                if(httpRequest.status == 200){
                    
                }
            }
        }
    }
    const btn_login = document.getElementById('btn-login')
    btn_login.onclick = (evt) =>{
        const tf_username = document.getElementById('tf-username')
        const tf_password = document.getElementById('tf-password')
        const tx_password = tf_password.value
        if( !tx_password.match("^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)[a-zA-Z\\d]{8,}$") )
            alert(`\'${tx_password}\' is not a valid password`)
        else
            alert("Password is valid")
    }
}