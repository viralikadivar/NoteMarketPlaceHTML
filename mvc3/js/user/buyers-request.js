$(window).on("load", function () {
  // makes sure that whole site is loaded
  $("#status").fadeOut();
  $("#preloader").fadeOut("fast");
});

// add pagination to table
var table = $(".dashboard-table").DataTable({
  dom: '<"top"f>t<"bottom"p><"clear">',
  pagingType: "simple_numbers",
  pageLength: "5",
  lengthChange: "5",
  language: {
    zeroRecords: "No Record Found",
  },
  aoColumnDefs: [
    { bSortable: true, aTargets: ["_all"] }, //disable ordering events and takeout the icon
  ],
});

var tableLong = $(".dashboard-table-long").DataTable({
  dom: '<"top"f>t<"bottom"p><"clear">',
  pagingType: "simple_numbers",
  pageLength: "10",
  lengthChange: "10",
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
  '<button class="btn" id="table-btn"  type="submit">Search</button>'
);
$("#DataTables_Table_0_filter label input").attr("placeholder", "Search");

$(function () {
  var res;
  $("#search-row").on("keyup", function () {
    res = table.column(1).search(this.value);
    resLong = tableLong.column(1).search(this.value);
  });

  $("#table-btn").click(function () {
    res.draw();
    resLong.draw();
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
  $("button[name='received']").click(function () {
    let bookName = $(this).parents(".table-row").children(".note-title").html();
    let buyerEmail = $(this)
      .parents(".table-row")
      .children(".buyer-email")
      .html();
      let downloadID = $(this)
      .parents(".table-row")
      .children(".downloadID")
      .attr("value");

    $('input[name="downloadID"]').val(downloadID);
    $("input[name='note-title']").val(bookName);
    $("input[name='user-email']").val(buyerEmail);
  });

  $(".view").click(function () {
     
    let noteID = $(this)
      .parents(".table-row")
      .children(".noteID")
      .attr("value");
    $('input[name="noteID"]').val(noteID);
    $('button[name="noteDetail"]').trigger("click");
  });
  
});