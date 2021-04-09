$(window).on("load", function () {
  // makes sure that whole site is loaded
  $("#status").fadeOut();
  $("#preloader").delay(400).fadeOut("slow");
});

$(function () {
  $(".phoneCode li").click(function () {
    let value = $(this).attr("value");
    $("input[name='phoneCode']").val(value);

    value = '+'+value + '<img src="../images/form/arrow-down.png" alt="Down">';
    $("#phone-code").html(value);
  });
});

$(function () {
    $(".phoneCodeAdmin li").click(function () {
      let value = $(this).attr("value");
      $("input[name='phoneCode']").val(value);
  
      value = '+'+ value + '<img src="../../images/form/arrow-down.png" alt="Down">';
      $("#phone-code").html(value);
    });
  });