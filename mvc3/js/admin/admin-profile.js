$(window).on("load", function () {
  // makes sure that whole site is loaded
  $("#status").fadeOut();
  $("#preloader").delay(400).fadeOut("slow");
});

$(function () {
  $(".phoneCode li").click(function () {
    let value = $(this).attr("value");
    $("input[name='phoneCode']").val(value);

    value =
      "+" + value + '<img src="../images/form/arrow-down.png" alt="Down">';
    $("#phone-code").html(value);
  });

  $(".phoneCodeAdmin li").click(function () {
    let value = $(this).attr("value");
    $("input[name='phoneCode']").val(value);

    value =
      "+" + value + '<img src="../../images/form/arrow-down.png" alt="Down">';
    $("#phone-code").html(value);
  });

  $('button[name="submit"]').click(function (event) {
    let firstName = $("#first-name").val();
    let lastName = $("#last-name").val();
    let emailID = $("#email").val();
    let phoneCode = $("#phoneCode").val();
    let phoneNumber = $("#Phone-number").val();

    // FirstName Validation
    if (/^[0-9]+$/.test(firstName) || firstName == "") {
      $("#first-name").css("border-color", "red");
      event.preventDefault();
    } else {
      $("#first-name").css("border-color", "#d1d1d1");
    }

    // LastName Validation
    if (/^[0-9]+$/.test(lastName) || lastName == "") {
      $("#last-name").css("border-color", "red");
      event.preventDefault();
    } else {
      $("#last-name").css("border-color", "#d1d1d1");
    }

    // Regular  Expression of an Email
    var regExEmail = /^([a-z0-9\.-_~]+)@([a-z0-9-]+).([a-z]{2,20})(.[a-z]{2,20})?$/;

    // EmailId Validation
    if (!regExEmail.test(emailID) || emailID == "") {
      $("#email").css("border-color", "red");
      event.preventDefault();
    } else {
      $("#email").css("border-color", "#d1d1d1");
    }

    // Phone code Validation
    if (phoneCode == "") {
      $("#phone-code").css("border-color", "red");
      event.preventDefault();
    } else {
      $("#phone-code").css("border-color", "#d1d1d1");
    }

    // Phone Number Validation 
    if (!/^[0-9]{10}$/.test(phoneNumber) || phoneNumber== "") {
      $("#Phone-number").css("border-color", "red");
      event.preventDefault();
    } else {
      $("#Phone-number").css("border-color", "#d1d1d1");
    }

  });
});
