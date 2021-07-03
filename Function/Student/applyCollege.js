const applyCollege = () => {
    const applyCollegeUrl = '../../Function/Student/applyCollege.php';
    const applyCollegeForm = document.getElementById('apply-college-form');
    const callMakeRequest = makeRequest(applyCollegeUrl, applyCollegeForm);
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
                const response = JSON.parse(xhttp.responseText);
                update(response);
            }
        }
    };
    xhttp.open('POST', url);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhttp.send();
}
