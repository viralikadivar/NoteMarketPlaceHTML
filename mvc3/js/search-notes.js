$(function () {
  // });
  $('#search-result').on('click' , '.link-to-note-preview' , function() {
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

  

  // Selecting Fields
  var searchBookName = "";
  var bookTye = "";
  var bookCategory = "";
  var bookUniversity = "";
  var bookCourse = "";
  var bookCountry = "";
  var bookRating = "";

 function onLoad(pageNO){
 
    $.ajax({
      url: "search-result.php",
      type: "POST",
      data: {
        page : pageNO ,
        searchName: searchBookName,
        type: bookTye,
        category: bookCategory,
        university: bookUniversity,
        course: bookCourse,
        country: bookCountry,
        rating: bookRating,
      },
      success: function (data) {
        $("#search-result").html(data);
      },
    });
  }

    onLoad();
  

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

    bookTye = $("input[name='type']").val();

    $.ajax({
      url: "search-result.php",
      type: "POST",
      data: {
        searchName: searchBookName,
        type: bookTye,
        category: bookCategory,
        university: bookUniversity,
        course: bookCourse,
        country: bookCountry,
        rating: bookRating,
      },
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

    bookCategory = $("input[name='category']").val();


    $.ajax({
      url: "search-result.php",
      type: "POST",
      data: {
        searchName: searchBookName,
        type: bookTye,
        category: bookCategory,
        university: bookUniversity,
        course: bookCourse,
        country: bookCountry,
        rating: bookRating,
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

    bookUniversity = $("input[name='universiy']").val();

    $.ajax({
      url: "search-result.php",
      type: "POST",
      data: {
        searchName: searchBookName,
        type: bookTye,
        category: bookCategory,
        university: bookUniversity,
        course: bookCourse,
        country: bookCountry,
        rating: bookRating,
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

    bookCourse = $("input[name='course']").val();
    $.ajax({
      url: "search-result.php",
      type: "POST",
      data: {
        searchName: searchBookName,
        type: bookTye,
        category: bookCategory,
        university: bookUniversity,
        course: bookCourse,
        country: bookCountry,
        rating: bookRating,
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

    bookCountry = $("input[name='country']").val();

    $.ajax({
      url: "search-result.php",
      type: "POST",
      data: {
        searchName: searchBookName,
        type: bookTye,
        category: bookCategory,
        university: bookUniversity,
        course: bookCourse,
        country: bookCountry,
        rating: bookRating,
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

    bookRating = $("input[name='rating']").val();

    $.ajax({
      url: "search-result.php",
      type: "POST",
      data: {
        searchName: searchBookName,
        type: bookTye,
        category: bookCategory,
        university: bookUniversity,
        course: bookCourse,
        country: bookCountry,
        rating: bookRating,
      },
      success: function (data) {
        $("#search-result").html(data);
      },
    });
  });

  // Search By Book Name
  $("#filter-with-icon").on("keyup click", function () {
    searchBookName = $(this).val();
 
    $.ajax({
      url: "search-result.php",
      type: "POST",
      data: {
        searchName: searchBookName,
        searchName: searchBookName,
        type: bookTye,
        category: bookCategory,
        university: bookUniversity,
        course: bookCourse,
        country: bookCountry,
        rating: bookRating,
      },
      success: function (data) {
        $("#search-result").html(data);
      },
    });
  });

 // pagination 
    $(document).on("click" , "#pagination nav ul li a" , function(e) {

      var pageNO = $(this).attr("id");
     
     e.preventDefault();
       onLoad(pageNO);
     });
  
});
