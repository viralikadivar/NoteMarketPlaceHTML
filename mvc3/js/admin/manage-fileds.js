$(function() {

    // On Chnage the details 
    $("#title").on("click , change" , function() {
        $("#title").css("border-color","#d1d1d1");
        $("small").css("display","none");
    });

    $("#description").on("click , change" , function() {
        $("#description").css("border-color","#d1d1d1");
    });

    $("#country-code").on("click , change" , function() {
        $("#country-code").css("border-color","#d1d1d1");
    });
    // for validation 
    $('button[name="submit"]').click(function(event) {

       
        let name =  $("#title").val();
        let description = $("#description").val();
        let countryCode = $("#country-code").val();

        if(name == "" || /^[0-9]+$/.test(name)){
            $("#title").css("border-color","red");
            event.preventDefault();
        } else{
            $("#title").css("border-color","#d1d1d1");
        }

        if(description == ""){
            $("#description").css("border-color","red");
            event.preventDefault();
        } else{
            $("#description").css("border-color","#d1d1d1");
        }

        if(countryCode == ""){
            $("#country-code").css("border-color","red");
            event.preventDefault();
        } else{
            $("#country-code").css("border-color","#d1d1d1");
        }

    });

    // for edit data 
    $('.edit').click(function() {
        
        let editID = $(this).parents('.table-row').children('.editID').attr('value');
        $('input[name="editID"]').val(editID);

        $("button[name='getDetail']").trigger("click");

    });

    // for edit data 
    $('.delete').click(function() {
        
        let editID = $(this).parents('.table-row').children('.editID').attr('value');
        $('input[name="editID"]').val(editID);

    });

});
