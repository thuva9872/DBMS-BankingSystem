function validate() {
    let mail = document.getElementById('username').value;
    let pass = document.getElementById('password').value;

    if(mail == ""){
        document.getElementById('mailerr').style = "visibility:visible;";
        document.getElementById('mailerr').innerText = "Please Enter the email";
        return false;
    }
    if(!validateEmail(mail)){
        document.getElementById('mailerr').style = "visibility:visible;";
        document.getElementById('mailerr').innerText = "Not a valid E_Mail";
        return false;
    }
    if(pass == ""){
        document.getElementById('passerr').style = "visibility:visible;";
        document.getElementById('passerr').innerText = "Please Enter the password";
        return false;
    }    

    return true;
}
function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function clearFun() {
    document.getElementById('mailerr').innerText = "";
    document.getElementById('passerr').innerText = "";
}