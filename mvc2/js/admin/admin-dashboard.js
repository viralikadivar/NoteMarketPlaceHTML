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

var selMonth =
  '<button type="button" id="months" class="select-field" data-toggle="dropdown">Select Month<img src="../images/form/arrow-down.png" alt="Down"></button><div class="dropdown-menu" aria-labelledby="months"><li class="dropdown-item">01</li><li class="dropdown-item">02</li><li class="dropdown-item">03</li></div>';

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

$(function() {

    $("button[name='download'] , button[name='noteDetail']").click(function() {
        
        let noteID = $(this).parents('.table-row').children('.noteID').attr("value");
        $("input[name='noteID']").val(noteID);

    });
    $(".noteTitle").click(function() {
        
      let noteID = $(this).parents('.table-row').children('.noteID').attr("value");
      $("input[name='noteID']").val(noteID);
      $("button[name='noteDetail']").trigger("click");

  });

  $(".noOfDownloads").click(function() {
        
    let noteID = $(this).parents('.table-row').children('.noteID').attr("value");
    $("input[name='noteID']").val(noteID);
    $("button[name='getNoOfDownloads']").trigger("click");

});

    $("button[name='unpublish']").click(function() {
      let noteID = $(this).parents('.table-row').children('.noteID').attr("value");
      $("input[name='noteID']").val(noteID);

      let noteName = $(this).parents('.table-row').children('.noteTitle').html();
       $("input[name='noteTitle']").val(noteName);

       let sellerName = $(this).parents('.table-row').children('.sellerName').html();
       $("input[name='sellerName']").val(sellerName);

       let noteSellerEmail = $(this).parents('.table-row').children('.noteSeller').attr("value");
       $("input[name='sellerEmail']").val(noteSellerEmail);
    });
    
    $("button[name='unpublishNote']").click(function (e) {
      if( $('#description').val() == ""){
         $('#description').css("border-color","red");
         e.preventDefault();
      }
   });
   
});
