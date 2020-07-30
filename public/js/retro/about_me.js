$(document).ready(function(e){
    $('.slick-container').slick({
        slidesToShow: 3,
        variableWidth: true,
        centerMode: false,
        arrows: false,
        dots: false,
        swipe: false,
        touchMove: false,
        responsive: [
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: true,
                    swipe: true,
                    touchMove: true
                }
            }
        ]
    });

    $("#full-page").fullpage({});
});
