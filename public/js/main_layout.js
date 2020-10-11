$(document).ready(function(e){
    $("#navbar-toggle-btn").click(function(e){
        let state = $("#navbar-mobile").attr('state');

        if(state == "hide"){
            //open and change state to open
            $("#navbar-mobile").attr('state','open');
            $("#navbar-mobile").animate({
                top: 0
            },1000);
            $(this).animate({deg: 180},{
                duration: 800,
                step: function(now){
                    $(this).css({transform: 'rotate(' + now + 'deg)'});
                }
            });
        }else{
            $("#navbar-mobile").attr('state','hide');
            $("#navbar-mobile").animate({
                top: -170
            },1000);
            $(this).animate({deg: 0},{
                duration: 800,
                step: function(now){
                    $(this).css({transform: 'rotate(' + now + 'deg)'});
                }
            });
        }
    });
});

//changeing to dark mode depend on time
let hr = new Date().getHours();

if(hr > 6 && hr < 18){
    $("body").removeClass("dark-mode");
}else{
    $("body").addClass("dark-mode");
}
