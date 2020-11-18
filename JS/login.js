const MY_FORM = document.getElementById("logF");
var inputFieldName = document.getElementById("nameU");
var inputFieldPass = document.getElementById("passU");
var userName = inputFieldName.value;
var userPassword = inputFieldPass.value;


inputFieldName.addEventListener('change', (e) =>{
    userName = inputFieldName.value;
});
inputFieldPass.addEventListener('change', (e) =>{
    userPassword = inputFieldPass.value;
});

var xhttp = new XMLHttpRequest();
xhttp.onload = function() {
    alert(this.responseText);
    if(parseInt(this.responseText) != 0 && this.responseText != "") {
        var resArr = this.responseText.split("--");
        //setCookie("userID", resArr[0]);
        //document.location.href = "";
    }else {
        alert("Check input data!");
    }
};


MY_FORM.addEventListener("submit", (e) => {
    e.preventDefault();
    if(userName.length > 4 && userPassword.length > 4) {
        xhttp.open("GET", "https://teacherskill.000webhostapp.com/login.php?uLog[]="+ userName +"&uLog[]=" + userPassword);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send();
    }
});


function setCookie(name, value, options = {}) {

    options = {
        path: '/'
    };

    if (options.expires instanceof Date) {
        options.expires = options.expires.toUTCString();
    }

    let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);

    for (let optionKey in options) {
        updatedCookie += "; " + optionKey;
        let optionValue = options[optionKey];
        if (optionValue !== true) {
            updatedCookie += "=" + optionValue;
        }
    }

    document.cookie = updatedCookie;
}