window.onload = setInterval(() => {
    const reqcnturl = '../../Function/Manager/getRequestCount.php';
    const accreqcnturl = '../../Function/Manager/getAcceptedRequestCount.php';
    let rejreqcnturl = "../../Function/Manager/getRejectedRequestCount.php";
    const reqcnt = makeRequest(reqcnturl, updateRequestCount);
    const accreqcnt = makeRequest(accreqcnturl, updateAcceptedRequestCount);
    const rejreqcnt = makeRequest(rejreqcnturl, updateRejectedRequestCount);
}, 1000);

const updateRequestCount = (response) => {
    console.log(response);
    // const response = JSON.parse(responseText);
    document.getElementById("request").value = response.resultCnt;
}

const updateAcceptedRequestCount = (response) => {
    console.log(response);
    // const response = JSON.parse(responseText);
    document.getElementById("accepted-request").value = response.accResultCnt;
}

const updateRejectedRequestCount = (responseText) => {
    console.log(responseText);
    const response = JSON.parse(responseText);
    document.getElementById("rejected-request").value = response.rejResultCnt;
}

const makeRequest = (url, update) => {
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
