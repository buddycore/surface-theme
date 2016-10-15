$(document).ready(function(){   


    // TABS | SIDEBAR
    $('div.tabs, div.inner-tabs, div.widget-tabs').tabs();

    $('html').on('click', function(e){


        if($('li.menu-item a > span.toggle').hasClass('close')){
            $('ul.sub-menu').hide(0);
        }

        if($('li.search button.toggle').hasClass('close')){
            $('div.search-container').hide(0);
        }  

        if($('li.nv-account').hasClass('close')) {
            $('li.nv-account ul').hide(0);
        }

        $('li.search button.toggle').removeClass('close');
        $('li.menu-item a > span.toggle').removeClass('close');
        $('li.nv-account').removeClass('close');
        $('li.nv-pages').removeClass('close');
        $('ul.menu-account, ul.menu-pages').slideUp(200);


        // if($('li.nv-pages').hasClass('close')) {
        //     $('li.nv-pages').removeClass('close');
        //     $('ul.menu-pages').slideUp(200);
        // } 

    });

    $('li.menu-item a > span.toggle').on('click', function(e){

        e.preventDefault();
        e.stopPropagation();
        $(this).toggleClass('close');
        $(this).parent('a').next('ul').toggle();

    });

    $('li.search button.toggle').on('click', function(e){

        e.stopPropagation();

        $(this).toggleClass('close');

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

            if($(this).hasClass('close')) {

                $('ul.menu-account').slideUp(200);
                $(this).removeClass('close');

            }
            else {

                if($('ul.menu-pages:visible')) {

                    $('ul.menu-pages').slideUp(200);
                    $('li.nv-pages').removeClass('close');

                }

                $(this).addClass('close');
                $('ul.menu-account').slideDown(200);

            }

        }

        if($(this).hasClass('nv-pages')) {

            if($(this).hasClass('close')) {

                $('ul.menu-pages').slideUp(200);
                $(this).removeClass('close');

            }
            else {

                if($('ul.menu-account:visible')) {

                    $('ul.menu-account').slideUp(200);
                    $('li.nv-account').removeClass('close');

                }

                $(this).addClass('close');
                $('ul.menu-pages').slideDown(200);
                
            }

        }

    });

});