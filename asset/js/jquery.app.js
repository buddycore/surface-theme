$(document).ready(function(){   

    $('button.filter-toggle').on('click', function(e){

        e.stopPropagation();
        e.preventDefault();

        if($(this).hasClass('fl-shown')) {
            $(this).removeClass('fl-shown').next('ul.filternav').slideUp(200);
        }
        else {
            $(this).addClass('fl-shown').next('ul.filternav').slideDown(200);
        }        

    });

    // DO WINDOW SCROLL ALSO

    $('html').on('click', function(e){

        $('button.filter-toggle').removeClass('fl-shown');
        $('ul.filternav').slideUp(200);

        $('button.filter-toggle').removeClass('fl-shown');
        $('ul.filternav').slideUp(200);

        $('ul.primary li').removeClass('nv-shown');
        $('ul.primary li a span').removeClass('nv-close');

        $('nav.filter ul li a span').removeClass('nv-close');
        $('nav.filter ul li a span').removeClass('nv-close');

        $('ul.sub-menu').slideUp(200);

    });

    // TABS | SIDEBAR
    $('div.tabs, div.inner-tabs, div.widget-tabs').tabs();

    $('html').on('click', function(e){


        if($('li.menu-item a > span.toggle').hasClass('sc-close')){
            $('ul.sub-menu').hide(0);
        }

        if($('li.search button.toggle').hasClass('sc-close')){
            $('div.search-container').hide(0);
        }  

        if($('li.nv-account').hasClass('sc-close')) {
            $('li.nv-account ul').hide(0);
        }

        $('li.search button.toggle').removeClass('sc-close');
        $('li.menu-item a > span.toggle').removeClass('sc-close');
        $('li.nv-account').removeClass('sc-close');
        $('li.nv-pages').removeClass('sc-close');
        $('ul.menu-account, ul.menu-pages').slideUp(200);


        // if($('li.nv-pages').hasClass('close')) {
        //     $('li.nv-pages').removeClass('close');
        //     $('ul.menu-pages').slideUp(200);
        // } 

    });

    $('li.menu-item a > span.toggle').on('click', function(e){

        e.preventDefault();
        e.stopPropagation();
        $(this).toggleClass('sc-close');
        $(this).parent('a').next('ul').toggle();

    });

    $('li.search button.toggle').on('click', function(e){

        e.stopPropagation();

        $(this).toggleClass('sc-close');

        $(this).next('div.search-container').toggle();

        $('form.search input').focus();

    });

    $('li.search div.search-container input').on('click', function(){

        return false;

    });

    $('li.nv-account a span.toggle').on('click', function(e){
        e.preventDefault();
        $(this).parent('a').parent('li').find('ul').toggle();
    });

    $('li.nv-account, li.nv-pages').on('click', function(e){

        e.stopPropagation();
        
        if($(this).hasClass('nv-account')){

            if($(this).hasClass('sc-close')) {

                $('ul.menu-account').slideUp(200);
                $(this).removeClass('sc-close');

            }
            else {

                if($('ul.menu-pages:visible')) {

                    $('ul.menu-pages').slideUp(200);
                    $('li.nv-pages').removeClass('sc-close');

                }

                $(this).addClass('sc-close');
                $('ul.menu-account').slideDown(200);

            }

        }

        if($(this).hasClass('nv-pages')) {

            if($(this).hasClass('sc-close')) {

                $('ul.menu-pages').slideUp(200);
                $(this).removeClass('sc-close');

            }
            else {

                if($('ul.menu-account:visible')) {

                    $('ul.menu-account').slideUp(200);
                    $('li.nv-account').removeClass('sc-close');

                }

                $(this).addClass('sc-close');
                $('ul.menu-pages').slideDown(200);
                
            }

        }

    });

});