$(function () {
  // Get Gender
  $(".gender li").click(function () {
    var value = $(this).attr("value");

    $("input[name='gender']").val(value);

    value = value + '<img src="../images/form/arrow-down.png" alt="Down">';
    $("#gender").html(value);
  });

  // Get PhoneCode
  $(".phoneCode li").click(function () {
    var value = $(this).attr("value");
    $("input[name='phoneCode']").val(value);

    value = value + '<img src="../images/form/arrow-down.png" alt="Down">';
    $("#phone-code").html(value);
  });

  //   Form Validation
  $(document).on("click", "#submit", function (event) {
    var firstName = $("#first-name").val();
    var lastName = $("#last-name").val();
    var phoneCode = $("#phoneCode").val();
    var phoneNumber = $("#phone-number").val();
    var addr1 = $("#add-1").val();
    var addr2 = $("#add-2").val();
    var city = $("#city").val();
    var state = $("#state").val();
    var zipCode = $("#zipcode").val();
    var country = $("#country").val();

    // FirstName Validation
    if (/^[0-9]+$/.test(firstName)) {
      $("#first-name").parent().addClass("wrong-info");
      $("#firstNameValidation").html("Numeric name should not be allowed");
      event.preventDefault();
    } else if (firstName === "") {
      $("#first-name").parent().addClass("wrong-info");
      $("#firstNameValidation").html("Empty name should not be allowed");
      event.preventDefault();
    } else {
      $("#first-name").parent().removeClass("wrong-info");
    }

    // LastName Validation
    if (/^[0-9]+$/.test(lastName)) {
      $("#last-name").parent().addClass("wrong-info");
      $("#lastNameValidation").html("Numeric name should not be allowed");
      event.preventDefault();
    } else if (lastName === "") {
      $("#last-name").parent().addClass("wrong-info");
      $("#lastNameValidation").html("Empty name should not be allowed");
      event.preventDefault();
    } else {
      $("#last-name").parent().removeClass("wrong-info");
    }

    // Phone Number validation
    if (phoneCode === "") {
      $("#phone-code").parent().addClass("wrong-info");
      $("#phoneNumberValidation").css({ display: "inline", color: "#ff5e5e" });
      $("#phoneNumberValidation").html("Please select phone code");
      event.preventDefault();
    } else {
      $("#phone-code").parent().removeClass("wrong-info");
    }

    if (phoneNumber === "") {
      $("#phone-number").parent().addClass("wrong-info");
      $("#phoneNumberValidation").css({ display: "inline", color: "#ff5e5e" });
      $("#phoneNumberValidation").html("Phone number should not be empty");
      event.preventDefault();
    } else if (!/^[0-9]{10}$/.test(phoneNumber)) {
      $("#phone-number").parent().addClass("wrong-info");
      $("#phoneNumberValidation").css({ display: "inline", color: "#ff5e5e" });
      $("#phoneNumberValidation").html("Enter valid phone number");
      event.preventDefault();
    } else if (
      phoneNumber != "" &&
      phoneCode != "" &&
      /^\d{10}$/.test(phoneNumber)
    ) {
      $("#phone-code").parent().removeClass("wrong-info");
      $("#phone-number").parent().removeClass("wrong-info");
      $("#phoneNumberValidation").css("display", "none");
    } else {
      $("#phone-number").parent().removeClass("wrong-info");
    }

    // Address1 validation
    if (addr1 === "") {
      $("#add-1").parent().addClass("wrong-info");
      event.preventDefault();
    } else {
      $("#add-1").parent().removeClass("wrong-info");
    }

    // Address2 Validation
    if (addr2 === "") {
      $("#add-2").parent().addClass("wrong-info");
      event.preventDefault();
    } else {
      $("#add-2").parent().removeClass("wrong-info");
    }

    // City Validation
    if (city === "") {
      $("#city").parent().addClass("wrong-info");
      event.preventDefault();
    } else {
      $("#city").parent().removeClass("wrong-info");
    }

    // State Validation
    if (state === "") {
      $("#state").parent().addClass("wrong-info");
      event.preventDefault();
    } else {
      $("#state").parent().removeClass("wrong-info");
    }

    // ZipCde Validation
    if (zipCode === "") {
      $("#zipcode").parent().addClass("wrong-info");
      event.preventDefault();
    } else {
      $("#zipcode").parent().removeClass("wrong-info");
    }

    // Country Validation
    if (country === "") {
      $("#country").parent().addClass("wrong-info");
      event.preventDefault();
    } else {
      $("#country").parent().removeClass("wrong-info");
    }
  });
});
