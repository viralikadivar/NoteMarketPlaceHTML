$(function() {

    var field = "";
$("#show-hide").click(function() {

   field = $("#inputPassword").attr("type");
    if( field == "password"){
        $("#inputPassword").attr("type","text");
    }
    else{
        $("#inputPassword").attr("type","password");
    }

});

});