$(function () {
  if ($("#selectCountry").html() == "") {
    $("#selectCountry").html(
      'Select your Country<img src="../images/form/arrow-down.png" alt="Down">'
    );
  }
  if ($("#book-category").html() == "") {
    $("#book-category").html(
      'Select your Category<img src="../images/form/arrow-down.png" alt="Down">'
    );
  }
  if ($("#selectBookType").html() == "") {
    $("#selectBookType").html(
      'Select your Note Type<img src="../images/form/arrow-down.png" alt="Down">'
    );
  }
  //Listen for a click on any of the dropdown items
  $(".countries li").click(function () {
    //Get the value
    let value = $(this).attr("value");
    let show = $(this).html();

    //Put the retrieved value into the hidden input
    $("input[name='country']").val(value);

    show = show + '<img src="../images/form/arrow-down.png" alt="Down">';
    $("#selectCountry").html(show);
  });

  //Listen for a click on any of the dropdown items
  $(".types li").click(function () {
    //Get the value
    let value = $(this).attr("value");
    let show = $(this).html();
    //Put the retrieved value into the hidden input
    $("input[name='type']").val(value);

    show = show + '<img src="../images/form/arrow-down.png" alt="Down">';
    $("#selectBookType").html(show);
  });

  //Listen for a click on any of the dropdown items
  $(".categories li").click(function () {
    //Get the value
    let value = $(this).attr("value");
    let show = $(this).html();
    //Put the retrieved value into the hidden input
    $("input[name='category']").val(value);

    show = show + '<img src="../images/form/arrow-down.png" alt="Down">';
    $("#book-category").html(show);
  });

  $('button[name="save"]').click(function (event) {
    let noteTitle = $("#book-title").val();
    let noteCategory = $('input[name="category"]').val();
    let noteDescription = $("#description").val();
    let noteCountry = $('input[name="country"]').val();
    let isEdit = $("#editBook").val();

    // For Book Title
    if (noteTitle == "") {
      $("#book-title").css("border-color", "red");
      event.preventDefault();
    } else {
      $("#book-title").css("border-color", "#d1d1d1");
    }

    // Book Description
    if (noteDescription == "") {
      $("#description").css("border-color", "red");
      event.preventDefault();
    } else {
      $("#description").css("border-color", "#d1d1d1");
    }

    // Country
    if (noteCountry == "") {
      $("#selectCountry").css("border-color", "red");
      event.preventDefault();
    } else {
      $("#selectCountry").css("border-color", "#d1d1d1");
    }

    // Category
    if (noteCategory == "") {
      $("#book-category").css("border-color", "red");
      event.preventDefault();
    } else {
      $("#book-category").css("border-color", "#d1d1d1");
    }

    if (!isEdit) {
      // noteAttachment
      if ($("#file").get(0).files.length == 0) {
        $("#file").parents(".take-note-detail").css("border-color", "red");
        event.preventDefault();
      } else {
        $("#file").parents(".take-note-detail").css("border-color", "#d1d1d1");
      }

      // note Preview
      if ($("#preview").get(0).files.length == 0) {
        $("#preview").parents(".take-note-detail").css("border-color", "red");
        event.preventDefault();
      } else {
        $("#preview")
          .parents(".take-note-detail")
          .css("border-color", "#d1d1d1");
      }
    }
  });
  $('button[name="publish"]').click(function (event) {
    let noteTitle = $("#book-title").val();
    let noteCategory = $('input[name="category"]').val();
    let noteDescription = $("#description").val();
    let noteCountry = $('input[name="country"]').val();
    let isEdit = $("#editBook").val();

    // For Book Title
    if (noteTitle == "") {
      $("#book-title").css("border-color", "red");
      event.preventDefault();
    } else {
      $("#book-title").css("border-color", "#d1d1d1");
    }

    // Book Description
    if (noteDescription == "") {
      $("#description").css("border-color", "red");
      event.preventDefault();
    } else {
      $("#description").css("border-color", "#d1d1d1");
    }

    // Country
    if (noteCountry == "") {
      $("#selectCountry").css("border-color", "red");
      event.preventDefault();
    } else {
      $("#selectCountry").css("border-color", "#d1d1d1");
    }

    // Category
    if (noteCategory == "") {
      $("#book-category").css("border-color", "red");
      event.preventDefault();
    } else {
      $("#book-category").css("border-color", "#d1d1d1");
    }
    if (!isEdit) {
      // noteAttachment
      if ($("#file").get(0).files.length == 0) {
        $("#file").parents(".take-note-detail").css("border-color", "red");
        event.preventDefault();
      } else {
        $("#file").parents(".take-note-detail").css("border-color", "#d1d1d1");
      }

      // note Preview
      if ($("#preview").get(0).files.length == 0) {
        $("#preview").parents(".take-note-detail").css("border-color", "red");
        event.preventDefault();
      } else {
        $("#preview")
          .parents(".take-note-detail")
          .css("border-color", "#d1d1d1");
      }
    }
  });
});
