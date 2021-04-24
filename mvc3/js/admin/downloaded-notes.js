$(window).on("load", function () {
  // makes sure that whole site is loaded
  $("#status").fadeOut();
  $("#preloader").fadeOut("fast");
});

// add pagination to table
var table = $(".dashboard-table").DataTable({
  dom: '<"top"f>t<"bottom"p><"clear">',
  pagingType: "simple_numbers",
  lengthMenu: [5, 5, 5, 5, 5, "ALL"],
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
  // for sorting buttons
  var selectedSellerID = "";
  var selectedBookID = "";
  var selectedBuyerID = "";

  $(".sellerName li").click(function () {
    let name = $(this).html();
    selectedSellerID = $(this).attr("value");
    value = name + '<img src="../images/form/arrow-down.png" alt="Down">';
    $("#seller").html(value);

    res = table.column(5).search(name);
    res.draw();
    // $.ajax({
    //   url: "download-search.php",
    //   type: "POST",
    //   data: {
    //     downloadedBookID: selectedBookID,
    //     downloadedSellerID: selectedSellerID,
    //     downloadedBuyerID: selectedBuyerID,
    //   },
    //   success: function (data) {
    //     $("#table-body").html(data);
    //   },
    // });
  });

  $(".bookName li").click(function () {
    let name = $(this).html();
    selectedBookID = $(this).attr("value");

    value = name + '<img src="../images/form/arrow-down.png" alt="Down">';
    $("#bookName").html(value);

    res = table.column(1).search(name);
    res.draw();

    // $.ajax({
    //   url: "download-search.php",
    //   type: "POST",
    //   data: {
    //     downloadedBookID: selectedBookID,
    //     downloadedSellerID: selectedSellerID,
    //     downloadedBuyerID: selectedBuyerID,
    //   },
    //   success: function (data) {
    //     $("#table-body").html(data);
    //   },
    // });
  });

  $(".buyerName li").click(function () {
    let name = $(this).html();
    selectedBuyerID = $(this).attr("value");
    value = name + '<img src="../images/form/arrow-down.png" alt="Down">';
    $("#buyer").html(value);
    res = table.column(3).search(name);
    res.draw();
    // $.ajax({
    //   url: "download-search.php",
    //   type: "POST",
    //   data: {
    //     downloadedBookID: selectedBookID,
    //     downloadedSellerID: selectedSellerID,
    //     downloadedBuyerID: selectedBuyerID,
    //   },
    //   success: function (data) {
    //     $("#table-body").html(data);
    //   },
    // });
  });

  // getiing detail
  $("#table-body").on(
    "click",
    "button[name='download'] , button[name='noteDetail']",
    function () {
      let noteID = $(this)
        .parents(".table-row")
        .children(".noteID")
        .attr("value");
      $("input[name='noteID']").val(noteID);
    }
  );

  // view more note details
  $("#table-body").on("click", ".viewNote", function () {
    let noteID = $(this)
      .parents(".table-row")
      .children(".noteID")
      .attr("value");
    $("input[name='noteID']").val(noteID);
    $("button[name='noteDetail']").trigger("click");
  });

  // view buyer
  $("#table-body").on("click", ".view-downloader", function () {
    let noteID = $(this).parents(".table-row").children(".buyer").attr("value");
    $("input[name='memberID']").val(noteID);
    $("button[name='viewMember']").trigger("click");
  });

  // view Seller
  $("#table-body").on("click", ".view-seller", function () {
    let noteID = $(this)
      .parents(".table-row")
      .children(".seller")
      .attr("value");
    $("input[name='memberID']").val(noteID);
    $("button[name='viewMember']").trigger("click");
  });
});
