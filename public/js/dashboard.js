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

function onclick_send_filter_params(evt){
    
}

window.onload = () => {
    const btn_add_contact = document.getElementById('contact-add')
    const btn_filter_all = document.getElementById('filter-all')
    const btn_filter_lead = document.getElementById('filter-lead')
    const btn_filter_support = document.getElementById('filter-support')
    const btn_filter_assigned = document.getElementById('filter-assigned')
    
    btn_add_contact.onclick = () => {
        window.location.href = "./addcontacts.php"
    }
}