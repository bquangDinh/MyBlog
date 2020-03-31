function closeAllSelect(exceptElement){
    $(".custom-select-field").each(function(index){
        if(!$(this).is(exceptElement)){
            $(this).find(".select-items").first().addClass("hide");
            $(this).find(".select-selected").first().removeClass("select-arrow-active");
        }
    });
}

function initCustomSelect(){
    $(".custom-select-field").each(function(index){
        let parent = this;
        let selectElement = $(this).find('select').first();
        let selectItems = $(this).find('.select-items').first();

        $(selectItems).addClass("hide");

        //get options count of select
        let optionsCount = $(selectElement).find('option').length;

        //if select has no options, hide the select-items div
        if(optionsCount == 0){
            $(selectItems).addClass("hide");
        }else{
            //put all options to select-items div
            $(selectElement).find('option').each(function(index){ 
                let item = $(`<div data-value=${$(this).val()}>${$(this).text()}</div>`);
                let that = this;

                //set default by the first option
                if(index == 0){
                    $(this).prop('selected',true);
                    $(item).addClass("same-as-selected");
                    $(parent).find(".select-selected > p").first().text($(this).text());
                }
                
                $(item).on('click',function(e){
                    if($(this).hasClass("same-as-selected")){
                        return;
                    }

                    $(that).prop("selected",true);
                    
                    //remove others which have same-as-selected class
                    $(selectItems).find("div.same-as-selected").first().removeClass("same-as-selected");

                    $(this).addClass("same-as-selected");

                    $(parent).find(".select-selected > p").first().text($(this).text());
                });

                selectItems.append(item);
            });

            $(parent).find(".select-selected").first().on("click",function(e){
                e.stopPropagation();
                closeAllSelect(this);
                $(selectItems).toggleClass("hide");
                $(this).toggleClass("select-arrow-active");
            });
        }
    });
}

function initTinyMCE(){
    tinymce.init({
        selector: 'textarea',
        plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
        toolbar_mode: 'floating',
        toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | tiny_mce_wiris_formulaEditor | tiny_mce_wiris_formulaEditorChemistry',
        image_advtab: true,
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
          ],
        external_plugins: {
                tiny_mce_wiris: 'https://www.wiris.net/demo/plugins/tiny_mce/plugin.js'
        },
        paste_data_images: true,
        height: '300px'
    });
}

$(".tab-container").each(function(index){
    var self = this;
    var tabOuter = $(self).find(".tab-outer")
    var tabSlider = $(self).find(".tab-slider").first();
    $(self).find(".tab-btn").each(function(index){
        let leftPos = $(this).offset().left - $(tabOuter).offset().left;
        let targetPanel = $(this).data("tab-panel");
        $(this).click(function(e){
            $(tabSlider).animate({
                left: leftPos
            });
            
            $(".form-child").addClass("form-hided");
            $("#" + targetPanel).removeClass("form-hided");
        });
    });
});

$(document).on('click',function(e){
    console.log("document clicked");
    closeAllSelect();
});

$(document).ready(function(){
    initCustomSelect();
    initTinyMCE();
    $(".form-container").attachDragger();
});