$(document).ready(function () {
    $('#date').datepicker();
});

window.onload = function () {
    document.getElementById("submitRegister").onclick = function (e) {
        e.preventDefault();
        checkRegistrationForm();
    }

    document.getElementById("submitLog").onclick = function (e) {
        e.preventDefault();
        checkLogForm();
    }
}

function checkRegistrationForm() {
    request = "";
    request = new XMLHttpRequest();

    var name = document.getElementById("name").value;
    var surname = document.getElementById("surname").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var phone = document.getElementById("phone").value;
    var date = document.getElementById("date").value;

    var content = "name=" + name + "&surname=" + surname + "&email=" + email + "&password=" +password + "&phone=" + phone + "&date=" + date;
    var url = "../validate/registrationValidate.php";
    request.onreadystatechange = registration;
    request.open("POST", url, true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(content);
}

function checkLogForm() {
    request = "";
    request = new XMLHttpRequest();


    var email = document.getElementById("emailLog").value;
    var password = document.getElementById("passwordLog").value;

    var content = "email=" + email + "&password=" + password;
    var url = "../validate/logValidate.php";
    request.onreadystatechange = log;
    request.open("POST", url, true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(content);
}


function registration() {
    if(request.readyState == 4 && request.status == 200)
    {
        if(request.responseText.includes("success"))
        {
            window.location.href = "announcement.php";
            document.getElementById("name").value = "";
            document.getElementById("surname").value = "";
            document.getElementById("email").value = "";
            document.getElementById("phone").value = "";
            document.getElementById("date").value = "";
        }else
        {
            document.getElementById('responseRegistration').innerHTML = request.responseText;
        }

        }
}

function log() {
    if(request.readyState == 4 && request.status == 200)
    {
        if(request.responseText.includes("success"))
        {
            window.location.href = "announcement.php";
            document.getElementById("emailLog").value = "";
            document.getElementById("passwordLog").value = "";
        }else
        {
            document.getElementById('responseLog').innerHTML = request.responseText;
        }

    }
}