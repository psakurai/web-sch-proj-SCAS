let xhttp;
let reqcnt = '../../Function/Manager/getRequestCount.php';
let accreqcnt = '../../Function/Manager/getAccetedRequestCount.php';

window.onload = setInterval(function () {
    makeRequest(reqcnt, updateRequestCount);
    makeRequest(accreqcnt, updateAcceptedRequestCount);
}, 1000);

function makeRequest(url, update) {
    xhttp = new XMLHttpRequest();

    if (!xhttp) {
        alert('Giving up :( Cannot create an XMLHTTP instance ');
        return false;
    }
    xhttp.onreadystatechange = update;
    xhttp.open('GET', url);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhttp.send();
}

function updateRequestCount() {
    if (xhttp.readyState === XMLHttpRequest.DONE) {
        if (xhttp.status === 200) {
            console.log(xhttp.responseText);
            let response = JSON.parse(xhttp.responseText);
            document.getElementById("request").value = response.resultCnt;
        } else {

        }
    }
}

function updateAcceptedRequestCount() {
    if (xhttp.readyState === XMLHttpRequest.DONE) {
        if (xhttp.status === 200) {
            console.log(xhttp.responseText);
            let response = JSON.parse(xhttp.responseText);
            document.getElementById("accepted-request").value = response.accResultCnt;
        } else {

        }
    }
}
