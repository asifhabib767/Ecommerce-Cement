
(function ($) {
    'use strict'

    $('.owl-carousel-product').owlCarousel({
        loop:true,
        margin:40,
        nav:true,
        dots:false,
        autoplay:true,
        navText: ['<span class="fas fa-arrow-left"></span>','<span class="fas fa-arrow-right"></span>'],
        responsive:{
            0:{
                items:1,
                margin:0,
            },
            600:{
                items:2,
                margin:0,
            },
            1000:{
                items:3,
                margin:0,
            },
            1200:{
                items:5
            }
        }
    });

    $('.owl-carousel-blog').owlCarousel({
        loop:true,
        margin:50,
        nav:true,
        autoplay:true,
        dots:false,
        navText: ['<span class="fas fa-arrow-left"></span>','<span class="fas fa-arrow-right"></span>'],
        responsive:{
            0:{
                items:1,
                margin:0,

            },
            600:{
                items:2,
                margin:0,
            },
            1000:{
                items:2,
                margin:0,
            },
            1200:{
                items:3
            }
        }
    });

    $('.sp-slider').owlCarousel({
        loop:true,
        margin:20,
        nav:true,
        dots:false,
        navText: ['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1,
            },
            1200:{
                items:1
            }
        }
    });


    $('.tab ul.tabs').addClass('active').find('> li:eq(0)').addClass('current');
		
    $('.tab ul.tabs li a').click(function (g) { 
        var tab = $(this).closest('.tab'), 
            index = $(this).closest('li').index();
        
        tab.find('ul.tabs > li').removeClass('current');
        $(this).closest('li').addClass('current');
        
        tab.find('.tab_content').find('div.tabs_item').not('div.tabs_item:eq(' + index + ')').slideUp();
        tab.find('.tab_content').find('div.tabs_item:eq(' + index + ')').slideDown();
        
        g.preventDefault();
    } );



    $("about.html#founder").click(function(){
        $("#founder").slideDown("slow");
      });

    window.onscroll = function() {myFunction()};

    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
    }


   
        $('ul.navbar-nav li a').click(function(){
          $('li a').removeClass("activemenu");
          $(this).addClass("activemenu");
      });
    
      $('#my-video').backgroundVideo();


})(jQuery);