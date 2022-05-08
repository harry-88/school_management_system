
function validateStudentRegistration() {


    // var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");

    // Student Data
    var studentFirstName = document.getElementById('studentFirstName').value;
    var studentLastName = document.getElementById('studentLastName').value;
    var studentMobileNo = document.getElementById('studentMobileNo').value;
    var studentCnic = document.getElementById('studentCnic').value;
    var studentEmail = document.getElementById('studentEmail').value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;

    
    // Parent Data
    var parentFirstName = document.getElementById('parentFirstName').value;
    var parentLastName = document.getElementById('parentLastName').value;
    var parentMobileNo = document.getElementById('parentMobileNo').value;
    var parentEmail = document.getElementById('parentEmail').value;
    var parentCnic = document.getElementById('parentCnic').value;
    var parentOccupation = document.getElementById('parentOccupation').value;
    var parentDesignation = document.getElementById('parentDesignation').value;


    // Student Sign Up Validation
    if (studentFirstName.match("(.*)[0-9](.*)") || studentFirstName.match("(?=.*[~!@#$%^&*()_-]).*")) {
        document.getElementById('studentFnameError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Don't use special characters Name`;
        studentFirstName.scrollIntoView();
        console.log("fname");
        return false;
    }
    else {
        document.getElementById('studentFnameError').innerHTML = "";
    }

    if (studentLastName.match("(.*)[0-9](.*)") || studentLastName.match("(?=.*[~!@#$%^&*()_-]).*")) {
        document.getElementById('studentLnameError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Don't use special characters in Name`;
        console.log("lname");
        return false;
    }
    else {
        document.getElementById('studentLnameError').innerHTML = "";
    }

    if(document.getElementById('maleOption').checked==false && document.getElementById('femaleOption').checked==false){
        document.getElementById('genderError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i>Please choose your Gender`;
        console.log("gender");
        return false;
    }else{
        document.getElementById('genderError').innerHTML = "";
    }

    if (studentMobileNo.length != 11) {
        document.getElementById('studentMobileNoError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Invalid Mobile Number! Length must be 11. Don't use special characters`;
        console.log("mobile");
        return false;
    }
    else {
        document.getElementById('studentMobileNoError').innerHTML = "";
    }

    if (studentCnic.length != 13 || studentCnic.match("(?=.*[~!@#$%^&*()_-]).*")) {
        console.log("cnic");
        document.getElementById('studentCnicError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Invalid CNIC! Don't use special characters in CNIC.`;
        return false;
    }
    else {
        document.getElementById('studentCnicError').innerHTML = "";
    }

    if (parentFirstName.match("(.*)[0-9](.*)") || parentFirstName.match("(?=.*[~!@#$%^&*()_-]).*")) {
        document.getElementById('parentFirstNameError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Don't use special characters Name`;
        console.log("parent fname");
        return false;
    }
    else {
        document.getElementById('parentFirstNameError').innerHTML = "";
    }

    if (parentLastName.match("(.*)[0-9](.*)") || parentLastName.match("(?=.*[~!@#$%^&*()_-]).*")) {
        document.getElementById('parentLastNameError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Don't use special characters in Name`;
        console.log("parent lname");
        return false;
    }
    else {
        document.getElementById('parentLastNameError').innerHTML = "";
    }

    if (parentMobileNo.length != 11) {
        document.getElementById('parentMobileNoError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Invalid Mobile Number! Length must be 11. Don't use special characters`;
        console.log("parent mobile");
        return false;
    }
    else {
        document.getElementById('parentMobileNoError').innerHTML = "";
    }

    if (!parentEmail.includes('@gmail.com') || parentEmail.charAt(0) == '@') {
        document.getElementById('parentEmailError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Invalid Email! Only use your Google Account Email`;
        console.log("parent email");
        return false;
    }
    else {
        document.getElementById('parentEmailError').innerHTML = "";
    }

    if (parentCnic.length != 13 || parentCnic.match("(?=.*[~!@#$%^&*()_-]).*")) {
        console.log("pcnic");
        document.getElementById('parentCnicError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Invalid CNIC! Please provide correct CNIC as shown in Hint`;
        return false;
    }
    else {
        document.getElementById('parentCnicError').innerHTML = "";
    }

    if (parentOccupation.match("(.*)[0-9](.*)") || parentOccupation.match("(?=.*[~!@#$%^&*()_-]).*")) {
        document.getElementById('occupationError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Invalid Input! Don't use digits or special characters`;
        console.log("p occup");
        return false;
    }
    else {
        document.getElementById('occupationError').innerHTML = "";
    }


    if (parentDesignation.match("(.*)[0-9](.*)") || parentDesignation.match("(?=.*[~!@#$%^&*()_-]).*")) {
        document.getElementById('designationError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Ivalid Input! Don't use digits or special characters`;
        console.log("p desig");
        return false;
    }
    else {
        document.getElementById('designationError').innerHTML = "";
    }

    if (!studentEmail.includes('@gmail.com') || studentEmail.charAt(0) == '@') {
        document.getElementById('studentEmailError').innerHTML = `<i class="fas fa-exclamation-circle text-danger"></i> Invalid Email! Only use your Google Account Email`;
        console.log("email");
        return false;
    }
    else {
        document.getElementById('studentEmailError').innerHTML = "";
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


    

}