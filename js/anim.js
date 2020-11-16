jQuery(document).ready(function ($) {
    
    'use strict';
       
        
/***
 * ANIMATION ON SCHEMA
 * 
 */
    // var schemaHeight = $('.homeSchema').height();
    // console.log(schemaHeight);
    // schemaHeight /= 2;
    // console.log("new"+schemaHeight);

    // $('[class*="textAnim"]').css("top", schemaHeight);

    $('ul.homeListPole li:nth-child(1)').hover(
        function(){
            $('.homeSchema').css({'-webkit-animation' : 'rotate-r135-cw 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both',
            'animation' : 'rotate-r135-cw 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both'});
            $('.textAnimAeris').css("opacity", "1");
        }, function(){
            $('.homeSchema').css({'-webkit-animation' : 'rotate-r135-reset 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both',
            'animation' : 'rotate-r135-reset 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both'});
            $('.textAnimAeris').css("opacity", "0");
        }
    );
    
    $('ul.homeListPole li:nth-child(2)').hover(
        function(){
            $('.homeSchema').css({'-webkit-animation' : 'rotate-135-cw 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both',
            'animation' : 'rotate-135-cw 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both'});
            $('.textAnimOdatis').css("opacity", "1");
        }, function(){
            $('.homeSchema').css({'-webkit-animation' : 'rotate-135-reset 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both',
        'animation' : 'rotate-135-reset 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both'});
            $('.textAnimOdatis').css("opacity", "0");
        }
    );
    $('ul.homeListPole li:nth-child(3)').hover(
        function(){
        $('.homeSchema').css({'-webkit-animation' : 'rotate-45-cw 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both',
            'animation' : 'rotate-45-cw 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both'});
            $('.textAnimTheia').css("opacity", "1");
        }, function(){
            $('.homeSchema').css({'-webkit-animation' : 'rotate-45-reset 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both',
            'animation' : 'rotate-45-reset 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both'});
            $('.textAnimTheia').css("opacity", "0");
        }
    );
    
    $('ul.homeListPole li:nth-child(4)').hover(
        function(){
            $('.homeSchema').css({'-webkit-animation' : 'rotate-r45-cw 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both',
            'animation' : 'rotate-r45-cw 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both'});
            $('.textAnimFormater').css("opacity", "1");
        }, function(){
            $('.homeSchema').css({'-webkit-animation' : 'rotate-r45-reset 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both',
            'animation' : 'rotate-r45-reset 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both'});
            $('.textAnimFormater').css("opacity", "0");
        }
    );


    /** SMOOTH SCROLL */
    $('a[href^="#"]').click(function(){
        var the_id = $(this).attr("href");
        if (the_id === '#') {
            return;
        }
        $('html, body').animate({
            scrollTop:$(the_id).offset().top
        }, 'slow');
        return false;
    });
    

});

