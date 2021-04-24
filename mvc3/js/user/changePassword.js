$(function() {

    $(".show-hide").click(function() {
        
        var field = $(this).parent().children("input").attr("type");
        if(field == "password") {
            $(this).parent().children("input").attr("type","text");
        }
        else{
            $(this).parent().children("input").attr("type","password");
        }

    });

    // on change of field 
    $("#inputPassword").on("click , change" , function() {
        $("#inputPassword").parent().removeClass("wrong-info");
        $("#inputPassword").parent().addClass("validation");
    });

    $("#confirmPassword").on("click , change" , function() {
        $("#confirmPassword").parent().removeClass("wrong-info");
        $("#confirmPassword").parent().addClass("validation");
    });

    $("#inputOldPassword").on("click , change" , function() {
        $("#inputOldPassword").parent().removeClass("wrong-info");
        $("#inputOldPassword").parent().addClass("validation");
    });

    $(document).on('click' , '#submit' , function(event){

        var password = $("#inputPassword").val();
        var confirm_password = $("#confirmPassword").val();

     
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