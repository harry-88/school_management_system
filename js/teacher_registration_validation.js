

function validation(){
    
    var firstName = document.getElementById('firstName').value;
    var lastName = document.getElementById('lastName').value;
    var mobileNumber = document.getElementById('mobileNumber').value;
    var cnic = document.getElementById('cnic').value;
    var qualification = document.getElementById('qualification').value;
    var subject = document.getElementById('subject').value;
    var email = document.getElementById('email').value; 
    var password = document.getElementById('password').value; 
    var confirmPassword = document.getElementById('confirmPassword').value; 
    

    // Student Sign Up Validation
    if (firstName.match("(.*)[0-9](.*)") || firstName.match("(?=.*[~!@#$%^&*()_-]).*")) {
        document.getElementById('firstNameError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Don't use special characters Name`;
        console.log("fname");
        return false;
    }
    else {
        document.getElementById('firstNameError').innerHTML = "";
    }

    if (lastName.match("(.*)[0-9](.*)") || lastName.match("(?=.*[~!@#$%^&*()_-]).*")) {
        document.getElementById('lastNameError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Don't use special characters in Name`;
        console.log("lname");
        return false;
    }
    else {
        document.getElementById('lastNameError').innerHTML = "";
    }

    if(document.getElementById('maleOption').checked==false && document.getElementById('femaleOption').checked==false){
        document.getElementById('genderError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i>Please choose your Gender`;
        console.log("gender");
        return false;
    }else{
        document.getElementById('genderError').innerHTML = "";
    }

    if (mobileNumber.length != 11) {
        document.getElementById('mobileNumberError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Invalid Mobile Number! Length must be 11. Don't use special characters`;
        console.log("mobile");
        return false;
    }
    else {
        document.getElementById('mobileNumberError').innerHTML = "";
    }

    if (cnic.length != 13 || cnic.match("(?=.*[~!@#$%^&*()_-]).*")) {
        console.log("cnic");
        document.getElementById('cnicError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Invalid CNIC! Don't use special characters in CNIC.`;
        return false;
    }
    else {
        document.getElementById('cnicError').innerHTML = "";
    }

    if (qualification.match("(.*)[0-9](.*)") || qualification.match("(?=.*[~!@#$%^&*()_-]).*")) {
        document.getElementById('qualificationError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Invalid Input! Don't use digits or special characters`;
        console.log("qualification");
        return false;
    }
    else {
        document.getElementById('qualificationError').innerHTML = "";
    }


    if (subject.match("(.*)[0-9](.*)") || subject.match("(?=.*[~!@#$%^&*()_-]).*")) {
        document.getElementById('subjectError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Ivalid Input! Don't use digits or special characters`;
        console.log("subject");
        return false;
    }
    else {
        document.getElementById('subjectError').innerHTML = "";
    }

    if (!email.includes('@gmail.com') || email.charAt(0) == '@') {
        document.getElementById('emailError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Invalid Email! Only use your Google Account Email`;
        console.log("email");
        return false;
    }
    else {
        document.getElementById('emailError').innerHTML = "";
    }


    if (!password.match("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])")) {
        document.getElementById('passwordError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Weak Password! For a strong password, must Use Capital Letters (A-Z), Small Letter (a-z), Special Characters (@$&! etc.) and Digits (0-9). Length should be 8`;
        console.log("pass");
        return false;
    }
    else {
        document.getElementById('passwordError').innerHTML = "";
    }

    if (password != confirmPassword) {
        document.getElementById('passwordError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Password and Confirm Password don't match. They should be same.`;
        console.log("cpass");
        return false;
    }
    else {
        document.getElementById('passwordError').innerHTML = "";
    }

    return true;

}