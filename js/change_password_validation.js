function changePasswordValidation(){

    var password = document.getElementById('newPassword').value;
    var confirmPassword = document.getElementById('confirmPassword').value;

    if (!password.match("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])")) {
        document.getElementById('newPasswordError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Weak Password! For a strong password, must Use Capital Letters (A-Z), Small Letter (a-z), Special Characters (@$&! etc.) and Digits (0-9). Length should be 8`;
        console.log("pass");
        return false;
    }
    else {
        document.getElementById('newPasswordError').innerHTML = "";
    }

    if (password != confirmPassword) {
        document.getElementById('newPasswordError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Password and Confirm Password don't match. They should be same.`;
        console.log("cpass");
        return false;
    }
    else {
        document.getElementById('newPasswordError').innerHTML = "";
    }

}