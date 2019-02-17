$( document ).ready(function() {
    console.log( "ready!" );

    var $mainNav,
        $homeIntro;

        $mainNav = $("#header");
        $homeIntro = $("#homeIntro");

    /* Every time the window is scrolled ... */
    $(window).scroll( function(){

        /* Check the location of each desired element */
        $homeIntro.each( function(i){

            var bottom_of_object = $(this).position().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            console.log( bottom_of_object );
            console.log( bottom_of_window );
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > ( bottom_of_object * 2 ) ){

                $mainNav.animate({'opacity':'1'},400);

            }

        });

    });

});
