$(function () {

    $("#fullName").on("keyup" , function() {
        $("#fullName").css("border-color","#d1d1d1");
    });

    $("#inputEmail").on("keyup" , function() {
        $("#inputEmail").css("border-color","#d1d1d1");
    });

    $("#subject").on("keyup" , function() {
        $("#subject").css("border-color","#d1d1d1");
    });


    $("#comments-questions").on("keyup" , function() {
        $("#comments-questions").css("border-color","#d1d1d1");
    });



  $("button[name='submit']").click(function (event) {

    var fullName = $("#fullName").val();
    var emailID = $("#inputEmail").val();
    var subject = $("#subject").val();
    var comments = $("#comments-questions").val();

    // First Name Validation 
    if(/^[0-9]+$/.test(fullName)){
        $("#fullName").css("border-color","red");
        event.preventDefault();
    } else{
        $("#fullName").css("border-color","#d1d1d1");
    }

     // Regular  Expression of an Email
     var regExEmail = /^([a-z0-9\.-_~]+)@([a-z0-9-]+).([a-z]{2,20})(.[a-z]{2,20})?$/;

     // EmailId Validation 
     if(!regExEmail.test(emailID)){
        $("#inputEmail").css("border-color","red");
        event.preventDefault();
    } else {
        $("#inputEmail").css("border-color","#d1d1d1");
    }

    // Subject validation 
    if(subject == ""){
        $("#subject").css("border-color","red");
        event.preventDefault();
    } else {
        $("#subject").css("border-color","#d1d1d1");
    }

    // Comments Validation 
    if(comments == "") {
        $("#comments-questions").css("border-color","red");
        event.preventDefault();
    } else {
        $("#comments-questions").css("border-color","#d1d1d1");
    }
    
  });

});
