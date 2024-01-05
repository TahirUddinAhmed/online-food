$(document).ready(function() {

    // $("#register").click(function() {
    //     alert("Work is under construction")
    // })
   
    // food owl carousel
    $("#foods .owl-carousel").owlCarousel({
        // rtl: true,
        loop:true,
        margin:10,
        // nav: true,
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
        loop:false,
        margin:10,
        // nav: true,
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
    });

    // password field show/hide functionality
    $("#pwd-check").on("click", function() {
        const passwordField = $("#pwd");
        const button = $(this);

        if(passwordField.attr("type") === 'password') {
            passwordField.attr("type", "text");
            button.text("Hide");
        } else {
            passwordField.attr("type", "password");
            button.text("Show");
        }
    })
});