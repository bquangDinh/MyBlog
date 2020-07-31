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

    $(".sf-ig-slick").slick({
        slidesToScroll: 1,
        slidesToShow: 2,
        arrows: false,
        dots: false,
        responsive: [
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

    $(".games-slick-container").slick({
        arrows: false,
        dots: false,
        variableWidth: true,
        slidesToShow: 3,
        touchMove: true,
        swipe: true,
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 700,
                settings: {
                    centerMode: true,
                    swipe: true,
                    touchMove: true,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $(".music-slick-container").slick({
        arrows: false,
        dots: false,
        variableWidth: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        swipe: true,
        touchMove: true,
        centerMode: true,
        responsive: [
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    var type1= null, type2 = null, type3 = null, type4 = null;

    $("#full-page").fullpage({
        scrollBar:true,
        onLeave: function(origin, destination, direction){
            var leavingSection = this;

            if(destination.index == 1){
                //enter section 1
                type1 = type1 == null ? new Typed('#typed-desti-1', {
                    strings: [
                        "Hmm ^1000 I haven't really known,^700 yet.", // typed.js will skip the first line
                        "Hmm ^1000 I haven't really known,^700 yet.",
                        "This question is maybe the hardest question on the world, ^700 isn't it?",
                        "But ^1000 I can show you ^500 some !"
                    ],
                    contentType: 'html',
                    showCursor: false,
                    cursorChar: '|',
                    typeSpeed: 40,
                    backSpeed: 60,
                    startDelay: 700
                  }) : {};
            }

            if(destination.index == 4){
                //enter section 4
                type2 = type2 == null ? new Typed('#typed-desti-2', {
                    strings: [
                        "Began ^400 my story with ^700 a lot of mistakes :D",
                        "Began ^400 my story with ^700 a lot of mistakes :D",
                    ],
                    showCursor: false,
                    cursorChar: '|',
                    typeSpeed: 40,
                    backSpeed: 60,
                  }) : {};
            }

            if(destination.index == 5){
                //enter section 5
                type3 =  type3 == null ? new Typed('#typed-desti-3', {
                    strings: [
                        "Improving again ^500and again",
                        "Improving again ^500and again",
                    ],
                    showCursor: false,
                    cursorChar: '|',
                    typeSpeed: 40,
                    backSpeed: 60,
                  }) : {};
            }

            if(destination.index == 6){
                //enter section 6
                type4 =  type4 == null ? new Typed('#typed-desti-4', {
                    strings: [
                        "My Minecraft has not yet ended. ^700It is just the beginning ;D",
                        "My Minecraft has not yet ended. ^700It is just the beginning ;D",
                    ],
                    showCursor: false,
                    cursorChar: '|',
                    typeSpeed: 40,
                    backSpeed: 60,
                  }) : {};
            }
        }
    });

    $(".pop-up-container .close-btn").click(function(e){
        let parent = $(this).parent();
        $(parent).hide();
    });

    $(".pop-up-open-btn").click(function(e){
        $($(this).data("pp-target")).show();
    });
});
