$('button.submit').click(function(event) {

    var email = $('#email').val();
    var phoneNo = $("#phone-number").val();
    var notifyEmail = $("#email-sys").val();

        // Regular  Expression of an Email
        var regExEmail = /^([a-z0-9\.-_~]+)@([a-z0-9-]+).([a-z]{2,20})(.[a-z]{2,20})?$/;

         // EmailId Validation 
         if(!regExEmail.test(email)){
            $('#email').css("border-color","red");
            event.preventDefault();
        } 
    
        if(!regExEmail.test(notifyEmail)){
            $("#email-sys").css("border-color","red");
            event.preventDefault();
        } 

        if(!/^[0-9]{10}$/.test(phoneNo)){
            $("#phone-number").css("border-color","red");
            event.preventDefault();
        } 
      
});