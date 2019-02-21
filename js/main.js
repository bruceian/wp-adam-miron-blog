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

    function getNewToken(token) {
  var action = 'ajaxenquiry';
  var security =  $('#security').val();
  $.ajax({
          type: 'POST',
          dataType: 'json',
          url: ajax_auth_object.ajaxurl,
          data: {
              'action': action,
              'security': security,

          },
          success: function (data) {
            getCurrentSong(data.token);
          }
  });
}

function getCurrentSong(newtoken = null) {
  // get the token from the option if non is passed
  var token = (newtoken) ? newtoken : tokenGeneral;
  // API enpoint
  var url = 'https://api.spotify.com/v1/me/player/currently-playing';

  // make a GET request to the API
  $.ajax({
      url: url,
      method: "GET",
      dataType: "json",
      crossDomain: true,
      contentType: "application/json; charset=utf-8",
      cache: false,
      beforeSend: function (xhr) {
          xhr.setRequestHeader("Authorization", "Bearer " + token);
      },
      success: function (data) {
          visualise(data);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        getNewToken(token);
      }
  });

}

/**
* Visualizing SPOTIFY the response into the page
*
**/
function visualise(data) {
      if(data){
        let text = (data.is_playing) ? "Listening to." : "The last song I listened to.";
        let artists = '';

        for(let i = 0; i < data.item.artists.length; i++){
          artists +=  data.item.artists[i].name;

          if(i == data.item.artists.length - 1  ){
            artists += '.';
          }
          else if (i == data.item.artists.length - 2) {
            artists += ' & ';
          }
          else{
            artists += ', ';
          }
        }

        $('#title_spotify').text(artists);
        $('#album_spotify').text(data.item.name);
        $('#album_cover').attr('src', data.item.album.images[0].url);

        $('#album_link').removeClass('hidden');
        $('#title__main_spotify').text(text);
        $('#album_link').attr('href', data.item.external_urls.spotify);
      }else{
        // during ads & when you play music with your phone
        // the API call does return an empty response
        let text = "This section is fancy." ;
        $('#title_spotify').text('Unfortunately Spotify API returned an empty response.');
        $('#title__main_spotify').text(text);
        $('#album_spotify').text("Probably I haven't been listening to music for a while.");
        $('#album_cover').attr('src', 'http://localhost:8888/lebanov/wp-content/themes/wp-ivan/img/no.jpg');
        $('#album_link').addClass('hidden');
      }

      $('.spotify').removeClass('hidden');

    }
    getCurrentSong();
    setInterval(function() {
      getCurrentSong();
    }, 30000);

});
