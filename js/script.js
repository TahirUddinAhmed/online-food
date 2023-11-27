$(document).ready(function() {

    // $("#register").click(function() {
    //     alert("Work is under construction")
    // })
   
    // food owl carousel
    $("#foods .owl-carousel").owlCarousel({
        // rtl: true,
        loop:true,
        margin:10,
        nav: true,
        responsive:{
            0:{
                items:1.4
            },
            600:{
                items:3
            },
            1000:{
                items:5.4
            }
        }
    })



    // related food owl carousel
    $("#relatedFood .owl-carousel").owlCarousel({
        // rtl: true,
        loop:true,
        margin:10,
        nav: true,
        responsive:{
            0:{
                items:1.4
            },
            600:{
                items:3
            },
            1000:{
                items:5.4
            }
        }
    })
});