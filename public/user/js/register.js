document.addEventListener("DOMContentLoaded", () => {
    let name          = document.getElementById('name'); 
    let email         = document.getElementById('email');
    let phone         = document.getElementById('phone');
    let password      = document.getElementById('password');
    let signUp        = document.getElementById('signUp');  
    let message       = document.getElementById('message');
    let success       = document.getElementById('success');
    let registerForm  = document.getElementById('registerForm');
    let token         = document.querySelector('meta[name="csrf-token"]').content;  
    let errorName     = document.getElementById('errorName');
    let errorEmail    = document.getElementById('errorEmail');
    let errorPhone    = document.getElementById('errorPhone');
    let errorPassword = document.getElementById('errorPassword');
   /*
       Call validation function to validate input fields.
    */
    signUp.addEventListener("click", function(event) {
     //   submitForm();
       let res = validation();
       (res == '') ? event.preventDefault() : submitForm() ;
        event.preventDefault();
    });
    function validation()
        {
            let flag          = true;
            let nameValue     = name.value.trim();
            let emailValue    = email.value.trim();
            let emailPattern  = emailValue.match(
                                    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                                    ); 
            let phoneValue    = phone.value.trim ();
            let isNumber       = (isNaN(phoneValue)) ? 1: 0; 
            let phoneLength   = phoneValue.toString().length; 
            let passwordValue = password.value.trim();
            switch(true)
            {
                case (nameValue == ''):
                    errorName.innerHTML = "* Name required";
                    errorName.style.display="block";
                    flag = false;
                    break;
                case (emailValue == '') :
                    errorEmail.innerHTML = "* Email required";
                    errorEmail.style.display="block";
                    flag = false;
                    break;
                case (emailPattern == null) :
                        errorEmail.innerHTML = "* Email pattern not valid";
                        errorEmail.style.display="block";
                        flag = false;
                        break;
                case (phoneValue == '') :
                      errorPhone.innerHTML = "* Phone required";
                      errorPhone.style.display="block";
                       flag = false;
                     break;
                case ((isNumber == 1) || (phoneLength != 10)) :
                        errorPhone.innerHTML = "* Not a valid phone number";
                        errorPhone.style.display="block";
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
        var url           = registerForm.action;
        let nameValue     = name.value.trim();
        let emailValue    = email.value.trim();
        let phoneValue    = phone.value.trim();
        let passwordValue = password.value.trim();
        let formData = new FormData();
        formData.append('name',nameValue);
        formData.append('email',emailValue);
        formData.append('phone',phoneValue);
        formData.append('password',passwordValue);
        fetch(url, {
            method: 'post',
            body: formData,
            headers: {
              "X-CSRF-TOKEN": token,
              "Accept": 'application/json',
             },
             }).then(function (response) {
                console.log(response);
               return response.json();
             }).then(function (json) {
               let status = json.status;
               switch(status)
               {
                   case 200:
                            success.innerHTML = "Congratulations, your account has been successfully created";
                            success.style.display="block";
                            break;
                   case 502:
                            message.innerHTML = "Sorry, user registration failed";
                            message.style.display="block";
                            break;
                    default:
                    break;        
               }
            })
            .catch(function (error) {
        });
     }
  });