$(document).ready(function(e){
    $('.slick-container').slick({
        slidesToShow: 3,
        variableWidth: true,
        centerMode: false,
        arrows: false,
        dots: false,
        swipe: false,
        touchMove: false,
        autoplay: true,
        autoplaySpeed: 1500,
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
        autoplay: true,
        autoplaySpeed: 1500,
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
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 1500,
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
        autoplay: true,
        autoplaySpeed: 1500,
        responsive: [
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    var type1= null, type2 = null, type3 = null, type4 = null, type5 = null;

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
                        "Improving again ^500and again.",
                        "Improving again ^500and again.",
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

            if(destination.index == (12 + 1)){
                //enter section 12 + 1
                //enter section 6
                type5 =  type5 == null ? new Typed('#ending', {
                    strings: [
                        "Is this ^500the end of my story?",
                        "Is this ^500the end of my story?",
                        "No, it ^500isn't.",
                        "This is my adventure ^700;D",
                        "This is time to ^500dive deep and ^600explore ^500;D",
                        "I hope ^600you will be a part of ^700my story.",
                        "And I will be ^700a part of ^500YOUR story ^300!",
                        "Contact me ^700now !",
                        "buiquangdinh1751@gmail.com"
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

    var gData = {
        'astroneer': {
            name: 'Astroneer',
            content: "I have felt in love with this game since I first saw it as beta version on Steam. This game was my child's dream when I was able to build my own city on another plannet and started my adventures to others. This is my most favorite game ever !!!!"
        },
        'minecraft': {
            name: 'Minecraft',
            content: "It likes Notch built this game for himself, and anyone feeling alone in this reality. It likes OASIS in the real world."
        },
        'little_nightmare':{
            name: 'Litle Nightmare',
            content: 'I love you, Six. Hope Little Nightmare chapter 2 will be on Steam soon.'
        }
    };

    var mData = {
        'ngot_band': {
            name: 'Ngot Band',
            content: "Every time I listen to Ngot's songs, it always a unique and fantastic feeling. Vu Trong Dinh Thang and his band bring up a musical style that I think no one else can. You hear a song and you know it is definitely Ngot's. Thanks to you and your team, you actually did a great work."
        },
        'ca_hoi_hoang': {
            name: 'Ca hoi hoang',
            content: 'Ca Hoi Hoang (The Wild Salmon) brings to its audiences a fresh water to their bad days by its life-filled style. I like most of their songs.'
        },
        'chillies': {
            name: 'Chillies Band',
            content: ''
        },
        'queen': {
            name: 'Queen Band',
            content: ''
        },
        'coldplay': {
            name: 'Coldplay',
            content: ''
        }
    };

    $(".m-read-story-btn").click(function(e){
        let index = $(this).data("m-target");
        let cover = $(this).data("m-cover");
        $("#m-name").text("-=- " + mData[index].name + " -=-");
        $("#m-message").text(mData[index].content);
        $("#m-cover-img").attr("src",cover);
    });

    $(".g-read-btn").click(function(e){
        let index = $(this).data("g-target");
        $("#g-name").text(gData[index].name);
        $("#g-content").text(gData[index].content);
    });
});
