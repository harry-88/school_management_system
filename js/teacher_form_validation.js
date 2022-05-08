console.log("In JS");
// Validation Function
function validation(){

    let firstName = document.getElementById('firstName').value;
    let lastName = document.getElementById('lastName').value;
    let mobileNumber = document.getElementById('mobileNumber').value;
    let cnic = document.getElementById('cnic').value;
    let subject = document.getElementById('subject').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirmPassword').value;

    // First Name
    if(firstName.match("(.*)[0-9](.*)") || firstName.match("(?=.*[~!@#$%^&*()_-]).*")){
        document.getElementById('firstNameError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Don't use special characters Name`;
        console.log("fname");
        return false;
    }else{
        document.getElementById('firstNameError').innerHTML = "";
    }

    // Last Name
    if(lastName.match("(.*)[0-9](.*)") || lastName.match("(?=.*[~!@#$%^&*()_-]).*")){
        document.getElementById('lastNameError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Don't use special characters Name`;
        console.log("fname");
        return false;
    }else{
        document.getElementById('lastNameError').innerHTML = "";
    }

    // Mobile Number
    if(mobileNumber.length!=11){
        document.getElementById('mobileNumberError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Invalid Mobile Number! Length must be 11. Don't use special characters`;
        console.log("mobile");
        return false;
    }
    else{
        document.getElementById('mobileNumberError').innerHTML = "";
    }


    // CNIC
    if(cnic.length!=13 || cnic.match("(?=.*[~!@#$%^&*()_-]).*")){
        console.log("cnic");
        document.getElementById('cnicError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Invalid CNIC! Please provide correct CNIC as shown in Hint`;
        return false;
    }
    else{
        document.getElementById('cnicError').innerHTML = "";
    }


    // Subject
    if(subject.match("(.*)[0-9](.*)") || subject.match("(?=.*[~!@#$%^&*()_-]).*")){
        document.getElementById('subjectError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Ivalid Input! Don't use digits or special characters`;
        console.log("p desig");
        return false;
    }
    else{
        document.getElementById('subjectError').innerHTML = "";
    }

    // Email
    if(!email.includes('@gmail.com') || email.charAt(0)=='@'){
        document.getElementById('email').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Invalid Email! Only use your Google Account Email`;
        console.log("email");
        return false;
    }
    else{
        document.getElementById('email').innerHTML = "";
    }

    // Password
    if(!password.match("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])")){
        document.getElementById('passwordError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Weak Password! For a strong password, must Use Capital Letters (A-Z), Small Letter (a-z), Special Characters (@$&! etc.) and Digits (0-9). Length should be 8`;
        console.log("pass");
        return false;
    }
    else{
        document.getElementById('passwordError').innerHTML = "";
    }

    if(password!=confirmPassword){
        document.getElementById('passwordError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Password and Confirm Password don't match. They should be same.`;
        console.log("cpass");
        return false;
    }
    else{
        document.getElementById('passwordError').innerHTML = "";
    }

}