$(function () {
  // for notes Details
  $(".link-to-note-preview").click(function () {
    let noteID = $(this)
      .parents(".book-heading")
      .children('input[name="noteID"]')
      .attr("value");
    $("input[name='getNoteID']").val(noteID);
    $("button[name='getNoteDetail']").trigger("click");
  });

  // Searching Fields

  // Book Type
  $("#selectBookType").html(
    '<span>Select type</span><img src="images/form/arrow-down.png" alt="Down">'
  );

  // Book Categories
  $("#book-category").html(
    '<span>Select category</span><img src="images/form/arrow-down.png" alt="Down">'
  );

  // Book University
  $("#selectUniversity").html(
    '<span>Select university</span><img src="images/form/arrow-down.png" alt="Down">'
  );

  // Book Course
  $("#selectCourse").html(
    '<span>Select course</span><img src="images/form/arrow-down.png" alt="Down">'
  );

  // Book Country
  $("#selectCountry").html(
    '<span>Select country</span><img src="images/form/arrow-down.png" alt="Down">'
  );

  // Book Rating
  $("#selectBookRatings").html(
    '<span>Select rating</span><img src="images/form/arrow-down.png" alt="Down">'
  );

  // Select Book Type
  $(".types li").click(function () {
    let name = $(this).html();

    let value = $(this).attr("value");
    $("input[name='type']").val(value);

    name =
      "<span>" +
      name +
      '</span><img src="images/form/arrow-down.png" alt="Down">';
    $("#selectBookType").html(name);

    var bookTye = $("input[name='type']").val();

    $.ajax({
      url: "search-result.php",
      type: "POST",
      data: { type: bookTye },
      success: function (data) {
        $("#search-result").html(data);
      },
    });
  });

  // Select Book Categories
  $(".categories li").click(function () {
    let name = $(this).html();

    let value = $(this).attr("value");
    $("input[name='category']").val(value);

    name =
      "<span>" +
      name +
      '</span><img src="images/form/arrow-down.png" alt="Down">';
    $("#book-category").html(name);

    var bookCategory = $("input[name='category']").val();
    $.ajax({
      url: "search-result.php",
      type: "POST",
      data: {
        category: bookCategory,
      },
      success: function (data) {
        $("#search-result").html(data);
      },
    });
  });

  // Select Book University
  $(".university li").click(function () {
    let name = $(this).html();

    let value = $(this).attr("value");
    $("input[name='universiy']").val(value);

    name =
      "<span>" +
      name +
      '</span><img src="images/form/arrow-down.png" alt="Down">';
    $("#selectUniversity").html(name);

    var bookUniversity = $("input[name='universiy']").val();

    $.ajax({
      url: "search-result.php",
      type: "POST",
      data: {
        university: bookUniversity,
      },
      success: function (data) {
        $("#search-result").html(data);
      },
    });
  });

  // Select Book Course
  $(".course li").click(function () {
    let name = $(this).html();

    let value = $(this).attr("value");
    $("input[name='course']").val(value);

    name =
      "<span>" +
      name +
      '</span><img src="images/form/arrow-down.png" alt="Down">';
    $("#selectCourse").html(name);

    var bookCourse = $("input[name='course']").val();
    $.ajax({
      url: "search-result.php",
      type: "POST",
      data: {
        course: bookCourse,
      },
      success: function (data) {
        $("#search-result").html(data);
      },
    });
  });

  // Select Book Country
  $(".countries li").click(function () {
    let name = $(this).html();

    let value = $(this).attr("value");
    $("input[name='country']").val(value);

    name =
      "<span>" +
      name +
      '</span><img src="images/form/arrow-down.png" alt="Down">';
    $("#selectCountry").html(name);

    var bookCountry = $("input[name='country']").val();

    $.ajax({
      url: "search-result.php",
      type: "POST",
      data: {
        country: bookCountry,
      },
      success: function (data) {
        $("#search-result").html(data);
      },
    });
  });

  // Select Book Rating
  $(".rating li").click(function () {
    let name = $(this).html();

    let value = $(this).attr("value");
    $("input[name='rating']").val(value);

    name =
      "<span>" +
      name +
      '</span><img src="images/form/arrow-down.png" alt="Down">';
    $("#selectBookRatings").html(name);

    var bookRating = $("input[name='rating']").val();

    $.ajax({
      url: "search-result.php",
      type: "POST",
      data: {
        rating: bookRating,
      },
      success: function (data) {
        $("#search-result").html(data);
      },
    });
  });

  $("#filter-with-icon").on("keyup", function () {
    var searchBookName = $(this).val();

    $.ajax({
      url: "search-result.php",
      type: "POST",
      data: { searchName: searchBookName },
      success: function (data) {
        $("#search-result").html(data);
      },
    });
  });
});

