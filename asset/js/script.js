
window.onload = initpage;

var usernameValid = false;
var passwordValid = false;

function initpage(){
    var username = document.querySelector("#username");
    var confirmPassword = document.querySelector("#confirm-password");
    var registerBtn = document.querySelector("#register");

    addEventHandler(username, "blur", checkUsername);
    addEventHandler(confirmPassword, "blur", checkPassword);
    addEventHandler(username, "focus", focusUsername);
    addEventHandler(registerBtn, "click", registerUser);




    registerBtn.disabled = true;


}

function checkUsername(e) {
    UsernameRequest = createRequest();
    
    if(UsernameRequest != null){

        var username = document.querySelector("#username").value;

        if(e.target.value != ""){
            document.querySelector("#username").className = 'inprogress';
            
            var url = 'http://localhost/ajax/mike%20movies/checkusername.php?username=' + username;
    
            UsernameRequest.open("GET", url, true);
    
            UsernameRequest.onreadystatechange = showUsernameStatus;
    
            UsernameRequest.send(null);
        }
       
 
    }

}

function showUsernameStatus() {
    if(UsernameRequest.readyState == 4 && UsernameRequest.status == 200 ){
        if(UsernameRequest.responseText == 'yes'){
            // no errors

            var username_input = document.querySelector("#username");
            username_input.className = 'approved';
            document.querySelector("#username").nextElementSibling.textContent = "";
            document.querySelector("#username").nextElementSibling.style.display = "none";
            usernameValid = true;


        } else {
            // username has been already taken
    
            document.querySelector("#username").className = 'denied';
            document.querySelector("#username").nextElementSibling.style.display = "block";
            document.querySelector("#username").nextElementSibling.textContent = "This username is already taken";
            usernameValid = false;
   
        }
        checkFormStatus();
    }
      
}

function focusUsername(e){
    var targetedElement = getActivatedObject(e);
    targetedElement.className = "";
    

}

function checkPassword(){
    var password = document.querySelector("#password");
    var confirmPassword = document.querySelector("#confirm-password");

    password.className = "inprogress";

    
    if((password.value == "") || (password.value != confirmPassword.value)){
        
        password.className = 'denied';
        passwordValid = false;
        
        checkFormStatus();
        return ;

   
    }

    
    passowordRequest = createRequest();
    if(passowordRequest != null){

        var passwordValue = escape(password.value);

            
        var url = 'http://localhost/ajax/mike%20movies/checkPassword.php?password=' + passwordValue;


        passowordRequest.onreadystatechange = showPasswordStatus;
        passowordRequest.open("GET", url, true);
        passowordRequest.send(null);

        
    }

  
}


function showPasswordStatus(){
     var password = document.querySelector("#password");
    if(passowordRequest.responseText == 'yes'){

        password.className = "approved";
        // document.querySelector("#username").nextElementSibling.textContent = "";
         password.nextElementSibling.style.display = "none";
         passwordValid = true;


    } else {
        // password is invalid
    
         password.className = "denied";
         password.focus();
         password.select();

        password.nextElementSibling.style.display = "block";
        // document.querySelector("#username").nextElementSibling.textContent = "This username is already taken";
        passwordValid = false;
    }
    checkFormStatus();
}

function checkFormStatus(){
    if(usernameValid && passwordValid){
        document.querySelector("#register").disabled = false;
    } else {
        document.querySelector("#register").disabled = true;
    }
}

function registerUser(e){
    var targetedElement = getActivatedObject(e);
    targetedElement.textContent = "Processing...";

    registerRequest = createRequest();
    if(registerRequest != null){

        // var passwordValue = escape(password.value);
        let username = document.querySelector("#username").disabled = true;
        let pwd = document.querySelector("#password").disabled = true;
        let pwd_confirm = document.querySelector("#confirm-password").disabled = true;
        let firstname = document.querySelector("#firstname").disabled = true;
        let lastname = document.querySelector("#lastname ").disabled = true;
        let email = document.querySelector("#email").disabled = true;
        let genre = document.querySelector("#genre").disabled = true;
        let fav_movie = document.querySelector("#favorite_movie").disabled = true;
        let fav_desc = document.querySelector("#describe_movie").disabled = true;




        // let username = escape(document.querySelector("#username").value);
        // let pwd = escape(document.querySelector("#password").value);
        // let firstname = escape(document.querySelector("#firstname").value);
        // let lastname = escape(document.querySelector("#lastname ").value);
        // let email = escape(document.querySelector("#email").value);
        // let genre = escape(document.querySelector("#genre").value);
        // let fav_movie = escape(document.querySelector("#favorite_movie").value);
        // let fav_desc = escape(document.querySelector("#describe_movie").value);

        console.log(username, pwd, firstname, lastname, email,
            genre, fav_movie, fav_desc);

            
        var url = 'http://localhost/ajax/mike%20movies/register.php?username=' + escape(username.value) + '&pwd=' + escape(pwd) + '$f_name=' + escape(firstname) + '&l_name=' + escape(lastname) + '&email=' + escape(email) + '&genre=' + escape(genre) + '&fav_movie=' + escape(fav_movie) + '&fav_desc=' + escape(fav_desc);


        registerRequest.onreadystatechange = registrationProcessed;
        registerRequest.open("GET", url, true);
        registerRequest.send(null);

        
    }

}

function registrationProcessed(){

    
}

function scrollImages(){
    var images = document.querySelectorAll("#cover-bar img");

    for (let index = 0; index < images.length; index++) {
        var left  = images[index].style.left.substr(0, images[index].style.left.length - 2);
        console.log(left);
    }
   

}   

scrollImages();


// var images = document.querySelectorAll("#cover-bar img");
// console.log(images);

