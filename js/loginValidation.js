

function validateLogin(){
    
    
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    
    
    if(email==""){
        document.getElementById('emailError').innerHTML = "* Please Fill Email Field"
        return false;
    }
    
    
    
    if(password==""){
        document.getElementById('passwordError').innerHTML = "* Please Fill Password Field"
        return false;
    }

}