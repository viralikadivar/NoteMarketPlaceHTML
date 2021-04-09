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
  
 
    var res;
    $("#search-row").on("keyup", function () {
      res = table.column(1).search(this.value);
    });
  
    $("#table-btn").click(function () {
      res.draw();
    });
 
  
  // for pagination
  $("#DataTables_Table_0_previous").html("&#12296;");
  $("#DataTables_Table_0_next").html("&#12297;");
  
  $(document).on("draw.dt", function () {
    $("#DataTables_Table_0_previous").html("&#12296;");
    $("#DataTables_Table_0_next").html("&#12297;");
  });
  
  $(function () {
    $("button[name='download'] , button[name='noteDetail'] , button[name='publish'] ").click(function () {
      let noteID = $(this)
        .parents(".table-row")
        .children(".noteID")
        .attr("value");
      $("input[name='noteID']").val(noteID);
    });
    $(".view-note-details").click(function () {
      let noteID = $(this)
        .parents(".table-row")
        .children(".noteID")
        .attr("value");
      $("input[name='noteID']").val(noteID);
      $("button[name='noteDetail']").trigger('click');
    });
    $(".viewMemberDetail").click(function() {
      let sellerID = $(this)
      .parents(".table-row")
      .children(".sellerID")
      .attr("value");
    $("input[name='sellerID']").val(sellerID);
    $("button[name='viewMemberDetail']").trigger('click');
    });
  
  });
  