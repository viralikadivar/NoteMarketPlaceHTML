//  //Listen for a click on any of the dropdown items
//  $(".countries li").click(function () {
//     //Get the value
//     var value = $(this).attr("value");

//     //Put the retrieved value into the hidden input
//     $("input[name='country']").val(value);

//     value = value + '<img src="../images/form/arrow-down.png" alt="Down">';
//     $("#selectCountry").html(value);
//   });


$('button.dropdown-item').click(function() {

   var bookName = $(this).parents('.table-row').children('.note-title').html();
   var buyerEmail = $(this).parents('.table-row').children('.buyer-email').html();
   

   $("input[name='note-title']").val(bookName);
   $("input[name='user-email']").val(buyerEmail);

});