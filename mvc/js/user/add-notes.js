$(function () {
  $("#selectCountry").html(
    'Select your Country<img src="../images/form/arrow-down.png" alt="Down">'
  );
  $("#book-category").html(
    'Select your Category<img src="../images/form/arrow-down.png" alt="Down">'
  );
  $("#selectBookType").html(
    'Select your Note Type<img src="../images/form/arrow-down.png" alt="Down">'
  );

  //Listen for a click on any of the dropdown items
  $(".countries li").click(function () {
    //Get the value
    var value = $(this).attr("value");

    //Put the retrieved value into the hidden input
    $("input[name='country']").val(value);

    value = value + '<img src="../images/form/arrow-down.png" alt="Down">';
    $("#selectCountry").html(value);
  });

  //Listen for a click on any of the dropdown items
  $(".types li").click(function () {
    //Get the value
    var value = $(this).attr("value");
    //Put the retrieved value into the hidden input
    $("input[name='type']").val(value);

    value = value + '<img src="../images/form/arrow-down.png" alt="Down">';
    $("#selectBookType").html(value);
  });

  //Listen for a click on any of the dropdown items
  $(".categories li").click(function () {
    //Get the value
    var value = $(this).attr("value");
    //Put the retrieved value into the hidden input
    $("input[name='category']").val(value);

    value = value + '<img src="../images/form/arrow-down.png" alt="Down">';
    $("#book-category").html(value);
  });
});
