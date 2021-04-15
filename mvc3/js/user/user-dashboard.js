$(window).on('load', function () { // makes sure that whole site is loaded
    $('#status').fadeOut();
    $('#preloader').fadeOut('fast');
});

// add pagination to table 
var table = $(".dashboard-table-1").DataTable({
    "dom": '<"top"f>t<"bottom"p><"clear">',
    "pagingType": "simple_numbers",
    "pageLength": "5",
    "lengthChange": "5",
    "language": {
        "zeroRecords": "No Record Found"
    },
    "aoColumnDefs": [
        { "bSortable": true, "aTargets": ["_all"] } //disable ordering events and takeout the icon
    ]
});

var table2 = $(".dashboard-table-2").DataTable({
    "dom": '<"top"f>t<"bottom"p><"clear">',
    "pagingType": "simple_numbers",
    "pageLength": "5",
    "lengthChange": "5",
    "language": {
        "zeroRecords": "No Record Found"
    },
    "aoColumnDefs": [
        { "bSortable": true, "aTargets": ["_all"] } //disable ordering events and takeout the icon
    ]
});

// for search field 
var input = $('#DataTables_Table_0_filter label input');
$("#DataTables_Table_0_filter label").html("");
$("#DataTables_Table_0_filter label").append(input);
input.attr("id", "search-row");
$("#DataTables_Table_0_filter label").append('<button class="btn" id="table-btn-1" type="button">Search</button>');
$("#DataTables_Table_0_filter label input").attr("placeholder", "Search");

var input2 = $('#DataTables_Table_1_filter label input');
$("#DataTables_Table_1_filter label").html("");
$("#DataTables_Table_1_filter label").append(input2);
input2.attr("id", "search-row-2");
$("#DataTables_Table_1_filter label").append('<button class="btn" id="table-btn-2" type="button">Search</button>');
$("#DataTables_Table_1_filter label input").attr("placeholder", "Search");

$(function () {

    // for table 1
    var res;
    $('#search-row').on('keyup', function () {
        res = table.column(1).search(this.value);
    });

    $('#table-btn-1').click(function () {
        res.draw();
    });

     // for table 2
     var res2;
     $('#search-row-2').on('keyup', function () {
        res2 = table2.column(1).search(this.value);
    });

    $('#table-btn-2').click(function () {
        res2.draw();
    });



});

// for pagination 
$("#DataTables_Table_0_previous").html('&#12296;');
$("#DataTables_Table_0_next").html('&#12297;');
$("#DataTables_Table_1_previous").html('&#12296;');
$("#DataTables_Table_1_next").html('&#12297;');

$(document).on('draw.dt', function () {
    $("#DataTables_Table_0_previous").html('&#12296;');
    $("#DataTables_Table_0_next").html('&#12297;');
    $("#DataTables_Table_1_previous").html('&#12296;');
    $("#DataTables_Table_1_next").html('&#12297;');
});

$(function() {

    // View Note Detail 
    $('.view').click(function() {
        let noteID =  $(this).parent().children('.noteID').attr("value");
        $('input[name="noteID"]').val(noteID);
        $('button[name="noteDetail"]').trigger('click');
        
    }); 
    
    // Edit Note 
    $('.edit').click(function() {
        let noteID =  $(this).parent().children('.noteID').attr("value");
        $('input[name="noteID"]').val(noteID);
        $('button[name="editNote"]').trigger('click');
    }); 

    // Delete Note 
    $('.delete').click(function() {
        let noteID =  $(this).parent().children('.noteID').attr("value");
        $('input[name="noteID"]').val(noteID);
        // $('button[name="deleteNoteModel"]').trigger('click');
    }); 

});