$(document).ready(function(){


    $string = '<audio controls autoplay><source src="/wp-content/themes/surface/asset/misc/k.mp3" type="audio/mpeg">Your browser does not support the audio element.</audio><div class="koverlay"><span></span><div class="kinner"><iframe width="560" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1" frameborder="0" allowfullscreen></iframe></div></div>';

    var easter_egg = new Konami(function() { 

        $('body').append($string);

    });

});

$(document).on('click', 'div.koverlay span', function(){
    
    $('div.koverlay').remove();

});