const addUser = () => {
    const adduserurl = '../../Function/Admin/addUser.php';
    const adduserform = document.getElementById('add-user-form');
    const addusr = makeRequest(adduserurl, adduserform);
    return false;
}

const editUser = () => {
    const edituserurl = '../../Function/Admin/editUser.php';
    const edituserform = document.getElementById('edit-user-form');
    const edtusr = makeRequest(edituserurl, edituserform);
    return false;
}

const deleteUser = () => {
    const deleteuserurl = '../../Function/Admin/deleteUser.php';
    const deleteuserform = document.getElementById('delete-user-form');
    const delusr = makeRequest(deleteuserurl, deleteuserform);
    return false;
}

const makeRequest = (url, form) => {
    const xhttp = new XMLHttpRequest();

    if (!xhttp) {
        alert('Giving up :( Cannot create an XMLHTTP instance ');
        return false;
    }
    // xhttp.onreadystatechange = update;
    xhttp.onreadystatechange = () => {
        if (xhttp.readyState === XMLHttpRequest.DONE) {
            if (xhttp.status === 200) {
                // console.log(xhttp.responseText);
                // update(xhttp.responseText);
            }
        }
    };
    xhttp.open('POST', url);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhttp.send(
        'username=' + encodeURIComponent(form.elements['username']?.value) +
        '&password=' + encodeURIComponent(form.elements['password']?.value) +
        '&id=' + encodeURIComponent(form.elements['identificationid']?.value) +
        '&user-level=' + encodeURIComponent(form.elements['user-level']?.value) +
        '&first-name=' + encodeURIComponent(form.elements['first-name']?.value) +
        '&last-name=' + encodeURIComponent(form.elements['last-name']?.value) +
        '&phone=' + encodeURIComponent(form.elements['phone']?.value) +
        '&email=' + encodeURIComponent(form.elements['email']?.value) +
        '&address=' + encodeURIComponent(form.elements['address']?.value)
    );
}
