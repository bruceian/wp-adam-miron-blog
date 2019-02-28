$( document ).ready(function() {
    // console.log( "ready!" );

    var $mainNav,
        $homeIntro;

        $mainNav = $("#header");
        $archive = $("#sidebar-1");
        $homeIntro = $("#homeIntro");

    /* Every time the window is scrolled ... */
    $(window).scroll( function(){

        /* Check the location of each desired element */
        $homeIntro.each( function(i){

            var bottom_of_object = $(this).position().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            // console.log( bottom_of_object );
            // console.log( bottom_of_window );
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > ( bottom_of_object * 2 ) ){

                $mainNav.animate({'opacity':'1'},400);
                $archive.animate({'opacity':'1'},400);
            }

        });

    });

    $(".home .widgettitle").mouseenter(function() {
      $(".home .widgettitle").html("Archive");
      $archive.addClass("active-archive");
    });

    $(".home .widgettitle").click(function() {
      $(".home .widgettitle").html("Archive");
      $archive.addClass("active-archive");
    });

    $archive.mouseleave(function() {
      $(".home .widgettitle").html("Adam Miron");
      $archive.removeClass("active-archive");
    });

    $(".pointy.thick.close").click(function() {
        $archive.removeClass("active-archive");
        $(".home .widgettitle").html("Adam Miron");
    });


$('.scroll_to').click(function(e){
    var jump = $(this).attr('href');
    var new_position = $(jump).offset();
    $('html, body').stop().animate({ scrollTop: new_position.top }, 500);
    e.preventDefault();
});


});
