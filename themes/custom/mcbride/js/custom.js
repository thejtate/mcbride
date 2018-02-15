(function($){
    Drupal.behaviors.mcbrideTheme = {
        attach: function(context, settings) {

            /*Adding menu decoration*/
            $(".navigation ul li ul li:has(ul)").find("a:first").append(' <span class="close-open-select"></span> ');
            $(".left-nav-menu ul li:has(ul)").find("a:first").append(' <span class="close-open-select"></span> ');
            $('.watch-vimeo-link').fancybox({
                padding: 0,
                //wrapCSS: 'photo-fancy',
                autoCenter: true
            });

        }
    };
    Drupal.behaviors.videoJWplayer = {
        attach: function(context, settings) {
            if(settings.jwplayer){
                jwplayer("jwplayer-video").setup({
                    flashplayer:  settings.path_to_player,
                    width: 700,
                    height: 360,
                    primary: "flash",
                    'playlist.position': "right",
                    'playlist.size': 250,
                    //autostart: "true",
                    /*vimeo: {
                      enableApiData: true
                    },*/
                    playlist: settings.playlist
                });
            }
        }
    }
})(jQuery);