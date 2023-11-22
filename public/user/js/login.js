document.addEventListener("DOMContentLoaded", () => {
    let email         = document.getElementById('email');
    let password      = document.getElementById('password');
    let loginBtn      = document.getElementById('loginBtn');
    let errorEmail    = document.getElementById('errorEmail');
    let errorPassword = document.getElementById('errorPassword');
    let loginForm     = document.getElementById('loginForm');
    let token         = document.querySelector('meta[name="csrf-token"]').content;  
   
    /*
       Call validation function to validate input fields.
    */
       loginBtn.addEventListener("click", function(event) {
       let res = validation();
       (res == '') ? event.preventDefault() : submitForm() ;
        event.preventDefault();
            let flag          = true; 
            let emailValue    = email.value.trim();
            let passwordValue = password.value.trim();  
            switch(true)
            {
                case (emailValue == '') :
                    errorEmail.innerHTML = "* Email required";
                    errorEmail.style.display="block";
                    flag = false;
                    break;
                case (passwordValue == '') :
                    errorPassword.innerHTML = "* Password required";
                    errorPassword.style.display="block";
                    $("#errorPassword").fadeOut(3000);
                    flag = false;
                    break; 
                default :
                    break; 
            }
            
    });
    function validation()
        {
            let flag          = true; 
            let emailValue    = email.value.trim();
            let passwordValue = password.value.trim();  
            switch(true)
            {
                case (emailValue == '') :
                    errorEmail.innerHTML = "* Email required";
                    errorEmail.style.display="block";
                    flag = false;
                    break;
                case (passwordValue == '') :
                    errorPassword.innerHTML = "* Password required";
                    errorPassword.style.display="block";
                    flag = false;
                    break; 
                default :
                    break; 
            }
            return flag;
       }
    function submitForm()
    {
        var url           = loginForm.action;  
        let emailValue    = email.value.trim();
        let passwordValue = password.value.trim(); 
        let failure       = document.getElementById('failure');  
        let formData      = new FormData();
        formData.append('email',emailValue);
        formData.append('password',passwordValue);  
 
        fetch(url, {
            method: 'post',
            body: formData,
            headers: {
              "X-CSRF-TOKEN": token,
              "Accept": 'application/json',
             },
             }).then(function (response) {
               return response.json();
             }).then(function (json) {
                let status = json.status;
                switch(status)
                {
                    case 200:
                        console.log(json); 
                        window.location.href = "/user/dashboard";
                    case 404:
                        errorPassword.innerHTML = "";
                        errorPassword.innerHTML = "* Invalid Credentials";
                        errorPassword.style.display="block";
                        console.log(json); 
                        setInterval();
                    break;
                }
           })
            .catch(function (error) {
        });
   }

});