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
            var self = this;
            changingAnimate(SIZE.WIDTH,SIZE.HEIGHT);
            hideUpperLayer();
            $("#trash-can").removeClass("draggable-dropzone--occupied");
            $("#trash-can .draggable").remove();
        },
        removeArticle: function(articleId){
            var self = this;
            var undo = function(){
                $("#article-holder-" + articleId).append($("#article-control-container-" + articleId));
                self.resetTrashCan();
            }

            Swal.fire({
                title:'Delete this article',
                text: 'This process cannot be undo. Please careful before execute this. Do you want to continue?',
                type:'warning',
                showCancelButton:true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delele anyway',
                cancelButtonText: 'Cancel'
              }).then((result) => {
                if(result.value){
                    $.ajax({
                        type: 'DELETE',
                        url: '/admin/article/delete_article',
                        data:{
                            article_id: articleId
                        },
                        success: function(response){
                            if(response == 0){
                                Swal.fire(
                                    'Deleted article',
                                    'Deleted article succeed',
                                    'success'
                                  );
                                
                                $("#article-whole-container-" + articleId).remove();
                                self.resetTrashCan();
                            }else{
                                Swal.fire(
                                    'Deleted article',
                                    'Cannot delete the article. Please reset the page and try again',
                                    'error'
                                );
                                undo();
                            }        
                        },
                        error: function(jqXHR, exception){
                            Swal.fire(
                                'Deleted article',
                                'Something went wrong !!! Please reset the page and try again',
                                'error'
                              );
                              undo();
                        }
                    });
                }else undo();
              });
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

tippy(".disabled-switch",{
    content: "This option is turned off because the current state of the article is saved",
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
        let articleId = $(p.data.dragEvent.data.originalSource).data("article-id");
        trashCanContainer.removeArticle(articleId);
    }
});

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

    $(".edit-manager-container").attachDragger();

    $(".hide-article-checkbox").change(function(e){
        let articleId = $(this).data("article-id");
        let url = "";
        let self = this;

        if(this.checked){
            url = "/admin/article/hide_article/" + articleId;
            $("#state-container-" + articleId).attr("data-status","hided");
            $("#state-container-" + articleId).find("div").first().text("Hided");
        }else{
            url = "/admin/article/unhide_article/" + articleId;
            $("#state-container-" + articleId).attr("data-status","published");
            $("#state-container-" + articleId).find("div").first().text("Published");
        }

        $.ajax({
            type:'GET',
            url: url,
            success: function(response){
                if(response == 0){
                    Swal.fire({
                        type: 'success',
                        title: self.checked ? 'Hided the article' : 'Unhided the article',
                        toast: true,
                        position: 'top-end',
                        timer: 3000,
                        showConfirmButton: false
                    });
                }else{
                    Swal.fire({
                        type: 'error',
                        title: 'Failed to hide article',
                        text: 'Cannot find the article. Reset the page and try again',
                        toast: true,
                        position: 'top-end',
                        timer: 3000,
                        showConfirmButton: false
                    });
                }
            },
            error: function(jqXHR, exception){
                Swal.fire({
                    type: 'error',
                    title: 'Failed to hide article',
                    text: 'Something went wrong !!! Reset the page and try again',
                    toast: true,
                    position: 'top-end',
                    timer: 3000,
                    showConfirmButton: false
                });
                console.log(jqXHR.responseText);
            }
        });
    });
});