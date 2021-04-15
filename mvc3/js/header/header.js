/* ===========================================
                Preloader
============================================ */
$(window).on('load', function () { // makes sure that whole site is loaded
    $('#status').fadeOut();
    $('#preloader').fadeOut('fast');
});

$(function() {
    $("#header > nav.mobile-navbar > button").click("slow" ,function(){
        $("nav").toggleClass("nav-medium");
        $(this).toggleClass("open-close");
    });
});

$(function(){
    var count=0;
    $("#user-menu").click("2000",function() {
        if(count != 0){
        $(this).parents("li").toggleClass("drop-down-img");
        }
        count++;
    });
});


// for onclick adding class active  