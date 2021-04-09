$(function () {

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

