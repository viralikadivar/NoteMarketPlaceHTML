
/* ===========================================
                Preloader
============================================ */
$(window).on('load', function () { // makes sure that whole site is loaded
    $('#status').fadeOut();
    $('#preloader').delay(400).fadeOut('slow');
});


/* ===========================================
                Open close
============================================ */
$(function () {
    var toggle = true;
    var isActive = true;
    var currId = "";
    // var grandId = new Array();
    var grandId = ["genQuesOne"];
    $(".show-hide").click(function () {
        currId = $(this).parents(".card-header").attr("id");
        isActive = grandId.includes(currId);
        if (isActive) {
            toggle = false;
            var index = grandId.indexOf(currId);
            grandId.splice(index, 1);
        }
        else if (!isActive) {
            grandId.push(currId);
            toggle = true;
        }
        if (toggle == false) {
            // Show add image
            $(this).children().attr("src", "images/FAQ/add.png");
        }
        else {
            // Show Minus Image
            $(this).children().attr("src", "images/FAQ/minus.png");
        }
        $(this).parent().toggleClass("on-show-answer")

    });
});