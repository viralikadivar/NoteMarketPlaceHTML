$(window).on("load", function () {
  // makes sure that whole site is loaded
  $("#status").fadeOut();
  $("#preloader").fadeOut("fast");
});

// add pagination to table
var table = $(".dashboard-table").DataTable({
  dom: '<"top"f>t<"bottom"p><"clear">',
  pagingType: "simple_numbers",
  lengthMenu: [ 5, 5, 5, 5, 5 , "ALL"],
  language: {
    zeroRecords: "No Record Found",
  },
  aoColumnDefs: [
    { bSortable: true, aTargets: ["_all"] }, //disable ordering events and takeout the icon
  ],
});

// for search field
var input = $("#DataTables_Table_0_filter label input");
$("#DataTables_Table_0_filter label").html("");
$("#DataTables_Table_0_filter label").append(input);
input.attr("type", "text");
input.attr("id", "search-row");
$("#DataTables_Table_0_filter label").append(
  '<button class="btn" id="table-btn"  type="button">Search</button>'
);
$("#DataTables_Table_0_filter label input").attr("placeholder", "Search");

$(function () {
  var res;
  $("#search-row").on("keyup", function () {
    res = table.column(1).search(this.value);
  });

  $("#table-btn").click(function () {
    res.draw();
  });
});

// for pagination
$("#DataTables_Table_0_previous").html("&#12296;");
$("#DataTables_Table_0_next").html("&#12297;");

$(document).on("draw.dt", function () {
  $("#DataTables_Table_0_previous").html("&#12296;");
  $("#DataTables_Table_0_next").html("&#12297;");
});

$(function () {
  
  $(".sellerName li").click(function () {

    let name = $(this).html();
    selectedSellerID = $(this).attr("value");

    value =
    name + '<img src="../images/form/arrow-down.png" alt="Down">';
    $("#seller").html(value);

    res = table.column(5).search(name);
    res.draw();
    // table-body
    // $.ajax({
    //   url: "filtered-notes.php",
    //   type: "POST",
    //   data: {
    //     publishedSellerID : selectedSellerID
    //   },
    //   success: function (data) {
    //     $("#table-body").html(data);
    //   },
    // });
  });

  $("#table-body").on("click" , "button[name='download'] , button[name='noteDetail']" , function () {
    let noteID = $(this)
      .parents(".table-row")
      .children(".noteID")
      .attr("value");
    $("input[name='noteID']").val(noteID);
  });
  // $("button[name='download'] , button[name='noteDetail']").click(function () {
  //   let noteID = $(this)
  //     .parents(".table-row")
  //     .children(".noteID")
  //     .attr("value");
  //   $("input[name='noteID']").val(noteID);
  // });
  $("#table-body").on("click" , ".noteTitle" ,function () {
    let noteID = $(this)
      .parents(".table-row")
      .children(".noteID")
      .attr("value");
    $("input[name='noteID']").val(noteID);
    $("button[name='noteDetail']").trigger("click");
  });
  // $(".noteTitle").click(function () {
  //   let noteID = $(this)
  //     .parents(".table-row")
  //     .children(".noteID")
  //     .attr("value");
  //   $("input[name='noteID']").val(noteID);
  //   $("button[name='noteDetail']").trigger("click");
  // });
  $("#table-body").on("click" , ".noOfDownloads" ,function () {
    let noteID = $(this)
      .parents(".table-row")
      .children(".noteID")
      .attr("value");
    $("input[name='noteID']").val(noteID);
    $("button[name='getNoOfDownloads']").trigger("click");
  });
  // $(".noOfDownloads").click(function () {
  //   let noteID = $(this)
  //     .parents(".table-row")
  //     .children(".noteID")
  //     .attr("value");
  //   $("input[name='noteID']").val(noteID);
  //   $("button[name='getNoOfDownloads']").trigger("click");
  // });
  $("#table-body").on("click" , "button[name='unpublish']" ,function () {
    let noteID = $(this)
      .parents(".table-row")
      .children(".noteID")
      .attr("value");
    $("input[name='noteID']").val(noteID);

    let noteName = $(this).parents(".table-row").children(".noteTitle").html();
    $("input[name='noteTitle']").val(noteName);

    let sellerName = $(this)
      .parents(".table-row")
      .children(".sellerName")
      .html();
    $("input[name='sellerName']").val(sellerName);

    let noteSellerEmail = $(this)
      .parents(".table-row")
      .children(".noteSeller")
      .attr("value");
    $("input[name='sellerEmail']").val(noteSellerEmail);
  });
  // $("button[name='unpublish']").click(function () {
  //   let noteID = $(this)
  //     .parents(".table-row")
  //     .children(".noteID")
  //     .attr("value");
  //   $("input[name='noteID']").val(noteID);

  //   let noteName = $(this).parents(".table-row").children(".noteTitle").html();
  //   $("input[name='noteTitle']").val(noteName);

  //   let sellerName = $(this)
  //     .parents(".table-row")
  //     .children(".sellerName")
  //     .html();
  //   $("input[name='sellerName']").val(sellerName);

  //   let noteSellerEmail = $(this)
  //     .parents(".table-row")
  //     .children(".noteSeller")
  //     .attr("value");
  //   $("input[name='sellerEmail']").val(noteSellerEmail);
  // });

  $("#table-body").on("click" , "[name='unpublishNote']" ,function (e) {
    if( $('#description').val() == ""){
       $('#description').css("border-color","red");
       e.preventDefault();
    }
  }); 
  // $("button[name='unpublishNote']").click(function (e) {
  //    if( $('#description').val() == ""){
  //       $('#description').css("border-color","red");
  //       e.preventDefault();
  //    }
  // }); 
 
  // view Seller 
  $("#table-body").on("click" , ".view-seller" ,function () {
    let memberID = $(this)
      .parents(".table-row")
      .children(".seller")
      .attr("value");
    $("input[name='memberID']").val( memberID);
    $("button[name='viewMember']").trigger("click");
  });
  
});
