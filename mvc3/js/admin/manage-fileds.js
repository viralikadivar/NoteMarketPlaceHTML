$(function() {

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

    $('.edit').click(function() {
        
        let editID = $(this).parents('.table-row').children('.editID').attr('value');
        $('input[name="editID"]').val(editID);

        $("button[name='getDetail']").trigger("click");

    });
});
