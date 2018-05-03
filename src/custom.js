$(document).ready(function () {
    $('#date').datepicker();
});

window.onload = function () {
    document.getElementById("submitRegister").onclick = function (e) {
        e.preventDefault();
        checkForm();
    }
}

function checkForm() {
    request = "";
    request = new XMLHttpRequest();

    var name = document.getElementById("name").value;
    var surname = document.getElementById("surname").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var date = document.getElementById("date").value;

    var content = "name=" + name + "&surname=" + surname + "&email=" + email + "&phone=" + phone + "&date=" + date;
    var url = "../validate/registrationValidate.php";
    request.onreadystatechange = registration;
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
            document.getElementById("response").innerHTML = request.responseText;
        }

        }else{

    }
}