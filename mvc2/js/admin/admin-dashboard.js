$(window).on('load', function () { // makes sure that whole site is loaded
    $('#status').fadeOut();
    $('#preloader').fadeOut('fast');
});

// add pagination to table 
var table = $(".dashboard-table").DataTable({
    "dom": '<"top"f>t<"bottom"p><"clear">',
    "pagingType": "simple_numbers",
    "pageLength": "5",
    "lengthChange": "5",
    "language": {
        "zeroRecords": "No Record Found"
    },
    "aoColumnDefs": [
        { "bSortable": false, "aTargets": ["_all"] } //disable ordering events and takeout the icon
    ]
});

var selMonth =   '<button type="button" id="months" class="select-field" data-toggle="dropdown">Select Month<img src="../images/form/arrow-down.png" alt="Down"></button><div class="dropdown-menu" aria-labelledby="months"><li class="dropdown-item">01</li><li class="dropdown-item">02</li><li class="dropdown-item">03</li></div>' ;


// for search field 
var input = $('#DataTables_Table_0_filter label input');
$("#DataTables_Table_0_filter label").html("");
$("#DataTables_Table_0_filter label").append(input);
input.attr("type", "text");
input.attr("id", "search-row");
$("#DataTables_Table_0_filter label").append('<button class="btn" id="table-btn"  type="submit">Search</button>');
$("#DataTables_Table_0_filter label").append(selMonth);
$("#DataTables_Table_0_filter label input").attr("placeholder", "Search");


$(function () {

    var res;
    $('#search-row').on('keyup', function () {
        res = table.column(1).search(this.value);
    });

    $('#table-btn').click(function () {
        res.draw();
    });

 
});

// for pagination 
$("#DataTables_Table_0_previous").html('&#12296;');
$("#DataTables_Table_0_next").html('&#12297;');

$(document).on('draw.dt', function () {
    $("#DataTables_Table_0_previous").html('&#12296;');
    $("#DataTables_Table_0_next").html('&#12297;');
});
