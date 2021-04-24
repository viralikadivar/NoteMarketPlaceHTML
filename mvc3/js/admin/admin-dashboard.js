$(window).on("load", function () {
  // makes sure that whole site is loaded
  $("#status").fadeOut();
  $("#preloader").fadeOut("fast");
});

// add pagination to table
var table = $(".dashboard-table").DataTable({
  dom: '<"top"f>rt<"bottom"p><"clear">',
  paging: true,
  pagingType: "simple_numbers",
  lengthMenu: [ 5, 5, 5, 5, 5 , "ALL"],
  // order: [[ 3, "desc" ]],
  language: {
    zeroRecords: "No Record Found",
  },
  
  aoColumnDefs: [
    { bSortable: true, aTargets: ["_all"] }, //disable ordering events and takeout the icon
  ],
});
var mon = new Date();
var month = new Array();
month[0] = "January";
month[1] = "February";
month[2] = "March";
month[3] = "April";
month[4] = "May";
month[5] = "June";
month[6] = "July";
month[7] = "August";
month[8] = "September";
month[9] = "October";
month[10] = "November";
month[11] = "December";

var currentMonth = mon.getMonth();
// var currentMonth = 6;
var selMonth =
  '<button type="button" id="months" class="select-field" data-toggle="dropdown">Select Month<img src="../images/form/arrow-down.png" alt="Down"></button>' +
  '<div class="dropdown-menu lastSixMonths" aria-labelledby="months">';
for (var i = 1; i <= 6; i++) {
  selMonth = selMonth + '<li class="dropdown-item" value="' + (currentMonth + 1) + '">' +
    month[currentMonth] +
    "</li>";
  currentMonth--;
  if (currentMonth == -1) {
    currentMonth = 11;
  }
}
// '<li class="dropdown-item">06</li>'
selMonth = selMonth + "</div>";

// for search field
var input = $("#DataTables_Table_0_filter label input");
$("#DataTables_Table_0_filter label").html("");
$("#DataTables_Table_0_filter label").append(input);
input.attr("type", "text");
input.attr("id", "search-row");
$("#DataTables_Table_0_filter label").append(
  '<button class="btn" id="table-btn"  type="button">Search</button>'
);
$("#DataTables_Table_0_filter label").append(selMonth);
$("#DataTables_Table_0_filter label input").attr("placeholder", "Search");

// for pagination
$("#DataTables_Table_0_previous").html("&#12296;");
$("#DataTables_Table_0_next").html("&#12297;");

var res;
$("#search-row").on("keyup", function () {
  res = table.column(1).search(this.value);
});

$("#table-btn").click(function () {
  res.draw();
});

$(document).on("draw.dt", function () {
  $("#DataTables_Table_0_previous").html("&#12296;");
  $("#DataTables_Table_0_next").html("&#12297;");
});

$(".lastSixMonths li").click(function () {
  let selectedMonth = $(this).attr("value");
  let value = $(this).html();
  value = value + '<img src="../images/form/arrow-down.png" alt="Down">';
  $("#months").html(value);
  if(selectedMonth < 10){
  selectedMonth = "0"+selectedMonth;
  }
  selectedMonth = "-"+selectedMonth;
  res = table.column(7).search(selectedMonth);
  res.draw();
  // table-body
  // $.ajax({
  //   url: "filtered-notes.php",
  //   type: "POST",
  //   data: {
  //     selectedMonthID: selectedMonth,
  //   },
  //   success: function (data) {
  //     $("#table-body").html(data);
  //   },
  // });
});

$(function () {
  $("#table-body").on("click" , "button[name='download'] " ,function () {
    let noteID = $(this)
      .parents(".table-row")
      .children(".noteID")
      .attr("value");
    $("input[name='noteID']").val(noteID);
  });
  $("#table-body").on("click" , "button[name='noteDetail'] " ,function () {
    let noteID = $(this)
    .parents(".table-row")
    .children(".noteID")
    .attr("value");
  $("input[name='noteID']").val(noteID);
  });
  $("#table-body").on("click" , ".noteTitle" ,function () {
    let noteID = $(this)
      .parents(".table-row")
      .children(".noteID")
      .attr("value");
    $("input[name='noteID']").val(noteID);
    $("button[name='noteDetail']").trigger("click");
  });
  $("#table-body").on("click" ,".noOfDownloads" ,function () {
    let noteID = $(this)
      .parents(".table-row")
      .children(".noteID")
      .attr("value");
    $("input[name='noteID']").val(noteID);
    $("button[name='getNoOfDownloads']").trigger("click");
  });
  $("#table-body").on("click" ,"button[name='unpublish']" ,function () {
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

  $("#table-body").on("click" ,"button[name='unpublishNote']" ,function (e) {
    if ($("#description").val() == "") {
      $("#description").css("border-color", "red");
      e.preventDefault();
    }
  });

});
