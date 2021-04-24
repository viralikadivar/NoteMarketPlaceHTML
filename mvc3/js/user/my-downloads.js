$(function () {

  $(window).on('load', function () { // makes sure that whole site is loaded
    $('#status').fadeOut();
    $('#preloader').fadeOut('fast');
});

// add pagination to table 
 tableLong = $(".dashboard-table-long").DataTable({
    "dom": '<"top"f>t<"bottom"p><"clear">',
    "pagingType": "simple_numbers",
    "pageLength": "10",
    "lengthChange": "10",
    "language": {
        "zeroRecords": "No Record Found"
    },
    "aoColumnDefs": [
        { "bSortable": true, "aTargets": ["_all"] } //disable ordering events and takeout the icon
    ]
});


// for search field 
var input= $('#DataTables_Table_0_filter label input');
$("#DataTables_Table_0_filter label").html("");
$("#DataTables_Table_0_filter label").append(input);
input.attr("type", "text");
input.attr("id", "search-row");
$("#DataTables_Table_0_filter label").append('<button class="btn" id="table-btn" type="button">Search</button>');
$("#DataTables_Table_0_filter label input").attr("placeholder", "Search");


$(function () {

    var resLong;
    $('#search-row').on('keyup', function () {
        resLong = tableLong.column(1).search(this.value);
    });

    $('#table-btn').click(function () {
        resLong.draw();
    });

 
});

// for pagination 
$("#DataTables_Table_0_previous").html('&#12296;');
$("#DataTables_Table_0_next").html('&#12297;');

$(document).on('draw.dt', function () {
    $("#DataTables_Table_0_previous").html('&#12296;');
    $("#DataTables_Table_0_next").html('&#12297;');
});


  $(".rating img").click(function () {
    $(this).unbind("mouseenter mouseleave");
    let clickedID = $(this).attr("id");
    let idLength = clickedID.length;
    let ratingNo = parseInt(clickedID.charAt(idLength - 1));
    for (let star = 1; star <= ratingNo; star++) {
      let selectedID = "#" + "star" + star;
      $(selectedID).attr("src", "../images/form/rating/star.png");
    }
    $("input[name='rating']").val(ratingNo);
  });

  $(".rating img").hover(function () {
    let clickedID = $(this).attr("id");
    let idLength = clickedID.length;
    let ratingNo = parseInt(clickedID.charAt(idLength - 1));
    for (let star = 1; star <= ratingNo; star++) {
      let selectedID = "#" + "star" + star;
      let imageSRC = $(selectedID).attr("src");
      imageSRC == "../images/form/rating/star.png"
        ? $(selectedID).attr("src", "../images/form/rating/star-white.png")
        : $(selectedID).attr("src", "../images/form/rating/star.png");
    }
  });  

  $(".giveRatings").click(function() {

    let bookDownloadID = $(this).parents('.table-row').children('.downloadID').attr("value");
    let noteID = $(this).parents('.table-row').children('.noteID').attr("value");
 
    $("input[name='noteID']").val(noteID);
    $("input[name='downloadID']").val(bookDownloadID);

  });

  $(".reportSpam").click(function() {
   
    let bookDownloadID = $(this).parents('.table-row').children('.downloadID').attr("value");
    let noteID = $(this).parents('.table-row').children('.noteID').attr("value");
    let bookTitle = $(this).parents('.table-row').children('.title').html();
    let sellerEmail = $(this).parents('.table-row').children('.sellerEmail').html();
    
    $("input[name='noteID']").val(noteID);
    $("input[name='downloadID']").val(bookDownloadID);
    $("input[name='noteTitle']").val(bookTitle);
    $("input[name='sellerEmail']").val(sellerEmail);

  });

  $(".view").click(function(){
    
    let noteID = $(this).parents('.table-row').children('.noteID').attr("value");
    $("input[name='noteID']").val(noteID);
    $("button[name='noteDetail']").trigger('click');

  });

  $(".clone").click(function(){
    
    let noteID = $(this).parents('.table-row').children('.noteID').attr("value");
    $("input[name='noteID']").val(noteID);
    $("button[name='noteCloning']").trigger('click');

  });

  $(".downloadNote").click(function(){

    let noteID = $(this).parents('.table-row').children('.noteID').attr("value");
    $("input[name='noteID']").val(noteID);

  });
 

});

