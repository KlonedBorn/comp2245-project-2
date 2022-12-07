const httpRequest = new XMLHttpRequest()
/**
 * {
 *  "status" => int,
 *  "html-content" => String
 * }
 */


window.onload = () => {
    const btn_add_contact = document.getElementById('contact-add')
    const btn_filter_all = document.getElementById('filter-all')
    const btn_filter_lead = document.getElementById('filter-lead')
    const btn_filter_support = document.getElementById('filter-support')
    const btn_filter_assigned = document.getElementById('filter-assigned')
    const a_logout = document.getElementById("logout")
    const logout_url = "../../server/userlogout.php"
    a_logout.onclick= () => {
        httpRequest.open('POST',logout_url)
        httpRequest.send(null)
    }
    btn_add_contact.onclick = () => {
        window.location.href = "./addcontacts.html"
    }
}