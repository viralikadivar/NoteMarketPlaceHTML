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
 
$(function () { 

    const currentLocation = location.href; 
    // var parentTab = null;
    
    let liItems = $("li.nav-item a");
    
    for(var i = 0 ; i <liItems.length ; i++){
        if(liItems[i].href === currentLocation){
            parentTab = currentLocation;
             var currentTab = $('#navbarNav > ul > li > a[href="'+currentLocation+'"]');
              currentTab.parents("li").addClass("active");
        }
    } 
    
    let dropLiItems = $("li.nav-item > div > div > a.dropdown-item");
    for(var i = 0 ; i <dropLiItems.length ; i++){
        if(dropLiItems[i].href === currentLocation){
             var currentTab = $('#navbarNav > ul > li > div > div> a[href="'+currentLocation+'"]');
              currentTab.addClass("active");
              currentTab.parents('li').addClass("active");
        }
    }
    // #navbarNav > ul > li:nth-child(5) > div > div.dropdown-menu
    // document.querySelector("#navbarNav > ul > li:nth-child(5) > div > div.dropdown-menu > a:nth-child(1)")
});

