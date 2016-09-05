(function($) {
    "use strict";

    wp.customize('sf_logo', function(v){
        v.bind(function(nv) {
            if(nv){
                $('header.global nav h1 a img').attr('src', nv);
            }
        });
    });
 
})(jQuery);