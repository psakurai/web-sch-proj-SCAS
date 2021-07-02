let reqcnturl = "../../Function/Manager/getRequestCount.php";
let accreqcnturl = '../../Function/Manager/getAcceptedRequestCount.php';
let rejreqcnturl = "../../Function/Manager/getRejectedRequestCount.php";

window.onload = setInterval(() => {
    const reqcnt = makeRequest(reqcnturl, updateRequestCount);
    const accreqcnt = makeRequest(accreqcnturl, updateAcceptedRequestCount);
    const rejreqcnt = makeRequest(rejreqcnturl, updateRejectedRequestCount);
}, 1000);

const makeRequest = (url, update) => {
    let xhttp;
    xhttp = new XMLHttpRequest();

    if (!xhttp) {
        alert('Giving up :( Cannot create an XMLHTTP instance ');
        return false;
    }
    // xhttp.onreadystatechange = update;
    xhttp.onreadystatechange = () => {
        if (xhttp.readyState === XMLHttpRequest.DONE) {
            if (xhttp.status === 200) {
                console.log(xhttp.responseText);
                update(xhttp.responseText);
            }
        }
    };
    xhttp.open('POST', url);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhttp.send();
}

const updateRequestCount = (responseText) => {
    console.log(responseText);
    const response = JSON.parse(responseText);
    document.getElementById("request").value = response.resultCnt;
}

const updateAcceptedRequestCount = (responseText) => {
    console.log(responseText);
    const response = JSON.parse(responseText);
    document.getElementById("accepted-request").value = response.accResultCnt;
}

const updateRejectedRequestCount = (responseText) => {
    console.log(responseText);
    const response = JSON.parse(responseText);
    document.getElementById("rejected-request").value = response.rejResultCnt;
}
