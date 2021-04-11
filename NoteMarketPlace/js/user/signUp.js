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

});