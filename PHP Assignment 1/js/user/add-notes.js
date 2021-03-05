$(function(){

    //Listen for a click on any of the dropdown items
    $(".countries li").click(function(){
        //Get the value
        var value = $(this).attr("value");
        //Put the retrieved value into the hidden input
        $("input[name='country']").val(value);
    });

 //Listen for a click on any of the dropdown items
 $(".types li").click(function(){
    //Get the value
    var value = $(this).attr("value");
    //Put the retrieved value into the hidden input
    $("input[name='type']").val(value);
});

 //Listen for a click on any of the dropdown items
 $(".categories li").click(function(){
    //Get the value
    var value = $(this).attr("value");
    //Put the retrieved value into the hidden input
    $("input[name='category']").val(value);
});


    
});