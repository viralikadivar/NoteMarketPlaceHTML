$(function() {

    $(".show-hide").click(function() {
        
        var field = $(this).parent().children("input").attr("type");
        if(field == "password") {
            $(this).parent().children("input").attr("type","text");
        }
        else{
            $(this).parent().children("input").attr("type","password");
        }
        // At time of form validation do #successfull-login style.display=visible/none , initially make it "none"
    
    });


    $(document).on('click' , '#submit' , function(event){

        var first_name = $("#firstName").val();
        var last_name = $("#lastName").val();
        var email_id = $("#inputEmail").val(); 
        var password = $("#inputPassword").val();
        var confirm_password = $("#confirmPassword").val();

        // FirstName Validation 
        if(/^[0-9]+$/.test(first_name)){
            $("#firstName").parent().addClass("wrong-info");
            $("#firstName").parent().removeClass("validation");
            event.preventDefault();
        } else{
            $("#firstName").parent().removeClass("wrong-info");
            $("#firstName").parent().addClass("validation");
        }

        // LastName Validation 
        if(/^[0-9]+$/.test(last_name)){
            $("#lastName").parent().addClass("wrong-info");
            $("#lastName").parent().removeClass("validation");
            event.preventDefault();
        } else{
            $("#lastName").parent().removeClass("wrong-info");
            $("#lastName").parent().addClass("validation");
        }

        // Regular  Expression of an Email
        var regExEmail = /^([a-z0-9\.-_~]+)@([a-z0-9-]+).([a-z]{2,20})(.[a-z]{2,20})?$/;

         // EmailId Validation 
         if(!regExEmail.test(email_id)){
            $("#inputEmail").parent().addClass("wrong-info");
            $("#inputEmail").parent().removeClass("validation");
            event.preventDefault();
        } else {
            $("#inputEmail").parent().removeClass("wrong-info");
            $("#inputEmail").parent().addClass("validation");
        }

        // Regular Expression for Password Validation 
        var regExPasswordLength = /([a-z A-Z 0-9 !@#$%^&*_~]){6,24}/;
        var regExPasswordLowercase = /[a-z]+/;
        var regExPasswordUpperCase = /[A-Z]+/;
        var regExPasswordDigit = /[0-9]+/;
        var regExPasswordSecialCharacters = /[!@#$%^&*_~]+/;
        var isPassVerified = false ;
        var validationMessage = "";

        // Password Validation
        if(regExPasswordLength.test(password)) {
          if(password.length <= 26) {
            if(!password.includes(" ")) {
            if(regExPasswordLowercase.test(password)){
                if(regExPasswordUpperCase.test(password)){
                    if(regExPasswordDigit.test(password)){
                        if(regExPasswordSecialCharacters.test(password)){
                            isPassVerified = true ;
                            validationMessage = "" ;
                        }else {
                            isPassVerified = false ;
                            validationMessage = "Atleast contain one Special characters e.g. @#$%";
                        }
                    }else {
                        isPassVerified = false ;
                        validationMessage = "Atleast contain one Digit(0-9) characters";
                    }
                }else {
                    isPassVerified = false ;
                    validationMessage = "Atleast contain one Uppercase(A-Z) characters";
                }
            }else {
                isPassVerified = false ;
                validationMessage = "Atleast contain one lowercase(a-z) characters";
            }
        } else {
            isPassVerified = false ;
            validationMessage = "Password must not contain blank space ";
        }
          } else {
            isPassVerified = false ;
            validationMessage = "Password is too long ";
          }
        } else {
            isPassVerified = false ;
            validationMessage = "Atleast contain 6 characters";
        }

        if(!isPassVerified){
            $("#inputPassword").parent().addClass("wrong-info");
            $("#inputPassword").parent().removeClass("validation");
            $("#passwordValidation").html(validationMessage);
            event.preventDefault();
            exit();
            // #passwordValidation
            // #inputPassword
        } else{
            $("#inputPassword").parent().removeClass("wrong-info");
            $("#inputPassword").parent().addClass("validation");
            $("#passwordValidation").html(validationMessage);
        }

        // Password Matching 
        if(password != confirm_password )  {
            $("#confirmPassword").parent().addClass("wrong-info");
            $("#confirmPassword").parent().removeClass("validation");
            event.preventDefault();
        }else {
            $("#confirmPassword").parent().removeClass("wrong-info");
            $("#confirmPassword").parent().addClass("validation");
        }

       

    });    

});