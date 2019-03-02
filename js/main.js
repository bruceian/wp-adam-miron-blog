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
                $mainNav.addClass('black');
                $("#sidebar-1").addClass('black');
                $archive.animate({'opacity':'1'},400);
            } else {
              $mainNav.removeClass('black');
              $("#sidebar-1").removeClass('black');
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


    /****************
    Slick Carousel
    ****************/

    $('.carouel-3').slick({
      draggable: true,
      autoplay: true, /* this is the new line */
      autoplaySpeed: 10000,
      infinite: true,
      slidesToShow: 2,
      slidesToScroll: 2,
      touchThreshold: 1000,
      arrows: false,
      centerMode: true,
      responsive: [
                            {
                              breakpoint: 1100,
                              settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                              }
                            }
                          ]
    });


    /****************
    Pull Image From Spotify
    ****************/
    //
    // var spotifyImageDiv,
    //     spotifyImageURL,
    //     $halfScreenBioImage;
    //
    //     spotifyImageDiv = $(".slick-current iframe #main > div > div > div.ai.au.ah.av > div.ah.aw.ax.ay.az.b0.b1.b2 > div > div");
    //     spotify = $(".slick-current iframe");
    //     spotifyArtistNameDiv = $(".slick-current iframe html body #main div div div div div div a span");
    //
    //
    //     var checkExist = setInterval(function() {
    //        if (spotifyImageDiv.length) {
    //           console.log("Exists!");
    //           var bg = spotifyImageDiv.css('background-image');
    //           spotifyImageURL = bg.replace(/.*\s?url\([\'\"]?/, '').replace(/[\'\"]?\).*/, '');
    //           console.log(spotifyImageURL);
    //           clearInterval(checkExist);
    //        }
    //     }, 100); // check every 100ms



});
