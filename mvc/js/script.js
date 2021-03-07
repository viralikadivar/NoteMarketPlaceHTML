
/* ===========================================
                Preloader
============================================ */

$(window).on('load', function () { // makes sure that whole site is loaded
    $('#status').fadeOut();
    $('#preloader').delay(400).fadeOut('slow');
});

/* =========================================
              Navigation
============================================ */

/* Show & Hide White Navigation */
$(function () {

    // show/hide nav on page load
    showHideWhiteNavbar();

    $(window).scroll(function () {

        // show/hide nav on window's scroll
        showHideWhiteNavbar();
    });

    function showHideWhiteNavbar() {

        if ($(window).scrollTop() > 10) {

            // Show white nav
            $("nav:first-child").addClass("white-navbar");
            $("#open").css("color" , "#6255a5");
            $("#close").css("color" , "#6255a5");

            // Show dark logo
            $(".navbar-brand img").attr("src", "images/logo/logo-dark.png");

        } else {
            
            // Hide white nav
            $("nav").removeClass("white-navbar");
            $("#open").css("color" , "#ffffff");
            $("#close").css("color" , "#ffffff");


            // Show logo
            $(".navbar-brand img").attr("src", "images/logo/logo-white.png");

        }
    }
});

$(function() {
    $("#header > nav.mobile-navbar> button").click("slow" ,function(){
        $("nav").toggleClass("nav-medium");
        $(this).toggleClass("open-close");
        if ($(window).scrollTop() < 10){
            if( $(".navbar-brand img").attr("src") == "images/logo/logo-dark.png"){
                $("nav").removeClass("white-navbar");
                $("#open").css("color" , "#ffffff");
                $(".navbar-brand img").attr("src", "images/logo/logo-white.png");
            }
                    else{// Show white nav
                    $("nav:first-child").addClass("white-navbar");
                    $("#close").css("color" , "#6255a5");
        
                    // Show dark logo
                    $(".navbar-brand img").attr("src", "images/logo/logo-dark.png");
                    }
        }
       
    });
});