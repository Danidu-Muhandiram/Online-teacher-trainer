function validateInputs() {
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirm-password").value;
    let message = document.getElementById("errorMessage");
    let charCheck = document.getElementById("charcheck");
    let phoneNumber = document.getElementById("phone-number").value;
    let phoneNumberCheck = document.getElementById("numbermessage");

    if (phoneNumber.length < 10 || phoneNumber.length > 10) {
        phoneNumberCheck.textContent = "Enter valid Phone Number";
        return false;
    }

    if (password.length < 8) {
        charCheck.textContent = "Password must be at least 8 characters"
        return false;
    }

    if (password != confirmPassword) {
        message.textContent = "Password do not match!";
        return false;
    }

    charCheck.textContent = "";
    message.textContent  = "";
    phoneNumberCheck.textContent = "";

    return true;
}    

