const applyCollege = () => {
    const applyCollegeUrl = '../../Function/Student/applyCollege.php';
    const applyCollegeFormElements = document.getElementById('apply-college-form').elements;
    const callMakeRequest = makeRequest(applyCollegeUrl, applyCollegeFormElements);
    return false;
}

const makeRequest = (url, formElements) => {
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
                // const response = JSON.parse(xhttp.responseText);
                // update(response);
            }
        }
    };
    xhttp.open('POST', url);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhttp.send(
        'college-name=' + encodeURIComponent(formElements['college-name'].value) +
        '&building-no=' + encodeURIComponent(formElements['building-no'].value)
    );
}
