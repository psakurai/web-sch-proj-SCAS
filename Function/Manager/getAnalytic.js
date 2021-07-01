let xhttp;
window.onload = makeRequest('../../Function/Manager/getViewWeek.php', 'mangkoran');

// function getViewInterval() {
//     var xhttp;
//     xhttp = new XMLHttpRequest();
//     // xhttp.onreadystatechange = window.setInterval();
// }

// function getViewWeek() {
//     let xhttp;
//     xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function () {
//         document.getElementById('view-week').value = "100";
//     };
// }

// function getViewMonth() {
//     let xhttp;
//     xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function () {
//         document.getElementById("view-month").innerHTML = "200";
//     };
// }

function makeRequest(url, userName) {
    xhttp = new XMLHttpRequest();

    if (!xhttp) {
        alert('Giving up :( Cannot create an XMLHTTP instance ');
        return false;
    }
    xhttp.onreadystatechange = alertContents;
    xhttp.open('POST', url);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhttp.send('userName=' + encodeURIComponent(userName));
}

function alertContents() {
  if (xhttp.readyState === XMLHttpRequest.DONE) {
    if (xhttp.status === 200) {
      let response = JSON.parse(xhttp.responseText);
      alert(response.computedString);
    } else {
      alert('There was a problem with the request.');
    }
  }
}

function updateViewWeek() {

}
