var trashCanContainer = (function(){
    var SIZE = {
        WIDTH: 60,
        HEIGHT: 60
    };

    var trashCanInstance = $("#trash-can");
    var trashCanUpperLayer = $("#trash-can").find(".trash-can-upper-layer").first();

    var setWidth = function(width){
        $(trashCanInstance).css("width",width + "px");
    }

    var setHeight = function(height){
        $(trashCanInstance).css("height",height + "px");
    }

    var changingAnimate = function(width, height){
        $(trashCanInstance).animate({
            width: width,
            height: height
        },400,"swing");
    }

    var showUpperLayer = function(){
        $(trashCanUpperLayer).removeClass("hide");
    }

    var hideUpperLayer = function(){
        $(trashCanUpperLayer).addClass("hide");
    }

    return{
        nameId: "trash-can",
        openTrashCan: function(draggableElement, sourceContainer){
            let heightSourceContainer,widthSourceContainer;
            if(sourceContainer !== "undefined" && sourceContainer != null){
                heightSourceContainer = $(sourceContainer).height();
                widthSourceContainer = $(sourceContainer).width();
            }else if(draggableElement !== "undefined" && draggableElement != null){
                heightSourceContainer = $(draggableElement).height();
                widthSourceContainer = $(draggableElement).width();
            }else{
                console.error("Both parameters of trash can are null [openTrashCan]");
                return;
            }  
            
            setWidth(widthSourceContainer);
            setHeight(heightSourceContainer);
            showUpperLayer();
        },
        resetTrashCan: function(){
            changingAnimate(SIZE.WIDTH,SIZE.HEIGHT);
            hideUpperLayer();
        },
        removeArticle: function(articleId){
            console.log("removed article");
            //TODO
        }
    };
})();

/*Init tooltip*/
tippy(".controlling-context-btn[data-context='add']",{
    content: 'Click here to create a new article',
    theme: 'neumorphism',
});

tippy(".controlling-context-btn[data-context='next']",{
    content: 'Next Page',
    theme: 'neumorphism',
});

tippy(".controlling-context-btn[data-context='previous']",{
    content: 'Previous Page',
    theme: 'neumorphism',
});

tippy(".trash-can-container",{
    content: 'Drag an article to trash can to remove',
    theme: 'neumorphism',
});

tippy(".switch",{
    content: "Hide this article, so people can't see it",
    theme: 'neumorphism',
});

$(".dropzone").on('click',function(e){
    e.stopPropagation();
});

const dropzones = document.querySelectorAll('.dropzone');

const droppable = new Draggable.Droppable(dropzones,{
    delay: 200,
    draggable: '.draggable',
    dropzone: '.dropzone',
    mirror:    { 
        constrainDimensions: true ,
        appendTo: '#trash-can'
    }
});

droppable.on('droppable:returned',function(p){
    if($(p.data.dropzone).attr("id") == trashCanContainer.nameId){
        trashCanContainer.resetTrashCan();
    }
});

droppable.on('droppable:dropped',function(p){
    if($(p.data.dropzone).attr("id") == trashCanContainer.nameId){
        trashCanContainer.openTrashCan(null, p.data.dragEvent.data.sourceContainer);
    }else{
        p.cancel();
    }
});

droppable.on('droppable:stop',function(p){
    if($(p.data.dropzone).attr("id") == trashCanContainer.nameId){
        trashCanContainer.removeArticle(0);
    }
});

$(document).ready(function(){
    $(".edit-manager-container").attachDragger();
});