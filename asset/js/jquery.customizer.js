(function($) {
    "use strict";

    wp.customize('sf_logo', function(v){
        v.bind(function(nv) {
            if(nv){
                $('header.global nav h1 a img').attr('src', nv);
            }
        });
    });

    wp.customize('sf_primary_colour', function(v){
        v.bind(function(nv) {
            console.log(nv);
            if(nv){
                // Add styling to primary colour areas
                // Header, Footer, Links, Buttons, Focus
            }
        });
    });
 
})(jQuery);