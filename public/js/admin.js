function animateCSSJquery(element,animationName,callback){
    $(element).addClass('animated ' + animationName);
  
    function handleAnimationEnd(){
      $(element).removeClass('animated');
      $(element).removeClass(animationName);
      $(element).unbind('animationend');
  
      if(typeof callback === 'function') callback();
    }
  
    $(element).bind('animationend',handleAnimationEnd);
}

$.fn.attachDragger = function(){
    var interpolate = function(p1, p2, frac){
        var nx = p1[0] + (p2[0] - p1[0]) * frac;
        var ny = p1[1] + (p2[1] - p1[1]) * frac;
        return [nx,ny];
    }

    var attachment = false, lastPosition, position, difference;
    $($(this)).on('mousedown mouseup mousemove',function(e){
        if(e.type == "mousedown"){
            attachment = true;
            lastPosition = [e.clientX, e.clientY];
        }

        if(e.type == "mouseup"){
            attachment = false;
        }

        if(e.type == "mousemove" && attachment == true){
            position = [e.clientX, e.clientY];
            difference = [(position[0] - lastPosition[0]),(position[1] - lastPosition[1])];
            $(this).scrollLeft($(this).scrollLeft() - difference[0]);
            $(this).scrollTop($(this).scrollTop() - difference[1]);
            lastPosition = [e.clientX, e.clientY];
        }
    });

    $(window).on("mouseup",function(){
        attachment = false;
    });
};

/*Detect which panel are being used by URL*/
if(typeof URL === "undefined"){
    var parse_query_string = function(query){
      var vars = query.split("&");
      var query_string = {};
      for(var i = 0; i < vars.length;i++){
        var pair = vars[i].split("=");
        var key = decodeURLComponent(pair[0]);
        var value = decodeURLComponent(pair[1]);
  
        if(typeof query_string[key] === "undefined"){
          query_string[key] = decodeURLComponent(value);
        }else if (typeof query_string[key] === "string"){
          var arr = [query_string[key],decodeURLComponent(value)];
          query_string[key] = arr;
        }else{
          query_string[key].push(decodeURLComponent(value));
        }
      }
      return query_string;
    }
  
    var url = window.location.href;
    var parsed_qs = parse_query_string(url);
    console.log(parsed_qs.initform);
  }else{
    var url = new URL(window.location.href);
    var initform = url.searchParams.get("panel");

    if(initform != null){
        var sidebarBtn = $(".sidebar-btn[data-panel-id='" + initform + "']").first();
        var parentContainer = $(sidebarBtn).parent();

        $(".panel").each(function(index){
            $(this).hide();
        });
        
        $(".sidebar-btn").each(function(index){
            $(this).removeClass("active");
            $(this).parent().removeClass("active");
        });

        $("#" + initform).fadeIn("slow");
        $(sidebarBtn).addClass("active");
        $(parentContainer).addClass("active");
    }
  }

//document loaded
$(function(){
    $(".sidebar-btn").on('click',function(){
        let panelId = $(this).data("panel-id");
        let parentContainer = $(this).parent();

        $(".panel").each(function(index){
            $(this).hide();
        });

        $(".sidebar-btn").each(function(index){
            $(this).removeClass("active");
            $(this).parent().removeClass("active");
        });

        $("#" + panelId).fadeIn("slow");
        $(this).addClass("active");
        $(parentContainer).addClass("active");
    });

    $("#collapse-menu-btn").on('click',function(e){
        animateCSSJquery($("#open-menubar-btn"), "jackInTheBox",function(){
            $("#open-menubar-btn").show();
        });

        $(".left-container").css('flex','0.0001');

        animateCSSJquery($("#menubar"), "slideOutLeft",function(){
            $("#menubar").hide();
            $("#open-menubar-btn").show();
        });
    });

    $("#open-menubar-btn").on('click',function(){
        let that = this;
        $(that).fadeOut("fast");
        $("#menubar").show();
        $(".left-container").css('flex','1');
        animateCSSJquery($("#menubar"), "slideInLeft", function(){  
        });
    });

    $("#close-author-panel-btn").on('click',function(){
        $(".author-container").css('flex','0.0001');
        
        $(".author-panel__inner").fadeOut('fast', function(){
            $(this).hide();
            $('.author-animated-item').removeClass('show');
        });

        $("#author-mini-panel").removeClass("deactive");

        animateCSSJquery($("#author-mini-panel"),"slideInRight");

        animateCSSJquery($("#author-panel"), "slideOutRight",function(){
            $("#author-panel").addClass("deactive");     
        });
    });

    $("#open-author-panel").on('click',function(){
        $(".author-container").css('flex','1');

        $("#author-panel").removeClass("deactive");

        animateCSSJquery($("#author-panel"), "slideInRight", function(){
            $(".author-panel__inner").show();

            $(".author-animated-item").addClass('show');
        });

        animateCSSJquery($("#author-mini-panel"), "slideOutRight", function(){
            $("#author-mini-panel").addClass("deactive");
        });
    });

    tippy(".sub-option.unavailabled",{
        content: 'This option is unavailabled'
    });
});