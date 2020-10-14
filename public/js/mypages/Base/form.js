export const NeumorphismSelect = function(_properties){
    var defaultProperties = {
        selectContainer: '.select-field',
        selectItems: '.select-items',
        selectSelected: '.select-selected'
    }

    var properties = Object.assign(defaultProperties, _properties);

    return {
        initialize: function(preloaded = false){
            var that = this;
            $(properties.selectContainer).each(function(index){
                let parent = this;
                let selectElement = $(this).find('select').first();
                let selectItems = $(this).find(properties.selectItems).first();

                $(selectItems).addClass('hide');

                //get options count of the select
                let options = $(selectElement).find('option');

                //if select has no options, then hide the select-items div
                if(options.length === 0){
                    $(selectItems).addClass('hide');
                }else{
                    //put all options to select-items div
                    for(let [index,option] of options.toArray().entries()){
                        let item = $(`<div data-value=${$(option).val()}>${$(option).text()}</div>`);
                        
                        //set default to the first option
                        if(index === 0 && preloaded == false){
                            $(option).prop('selected',true);
                            $(item).addClass('same-as-selected');
                            $(parent).find(properties.selectSelected + ' > p').first().text($(option).text());
                        }

                        //add click event for item
                        $(item).on('click', function(e){
                            if($(this).hasClass('same-as-selected')){
                                return;
                            }

                            $(option).prop('selected',true);

                            //remove others which have same-as-selected class
                            $(selectItems).find('div.same-as-selected').first().removeClass('same-as-selected');
                            
                            $(this).addClass('same-as-selected');

                            $(parent).find('.select-selected > p').first().text($(this).text())
                        });

                        //append to selectItems
                        selectItems.append(item);
                    }

                    $(parent).find(properties.selectSelected).first().on('click',function(e){
                        e.stopPropagation();
                        that.closeAllSelects(this);
                        $(selectItems).toggleClass('hide');
                    });
                }
            });
        },
        closeAllSelects: function(exceptElement){
            $(properties.selectContainer).each(function(index){
                if(!$(this).is(exceptElement)){
                    $(this).find(properties.selectItems).first().addClass('hide');
                    $(this).find(properties.selectSelected).first().removeClass('select-arrow-active');
                }
            });
        }
    }
}

export const TextEditor = function(tinyMCEIns, _properties){
    var tinyMCE = tinyMCEIns;
    var defaultProperties = {
        tinymce: {
            configurations: {
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
            }
        }
    }

    var properties = Object.assign(defaultProperties, _properties);

    return {    
        initialize: function(){
            tinyMCE.init(properties.tinymce.configurations);
        }
    }
}

export const Tab = function(_properties){
    var defaultProperties = {
        tabContainer: '.tab-container',
        tabOuter: '.tab-outer',
        tabSlider: '.tab-slider',
        tabButtons: '.tab-btn',
    }

    var properties = Object.assign(defaultProperties, _properties);

    return {
        initialize: function(){
            $(properties.tabContainer).each(function(index){
                var self = this;

                var tabOuter = $(self).find(properties.tabOuter).first();
                var tabSlider = $(self).find(properties.tabSlider).first();

                $(self).find(properties.tabButtons).each(function(index){
                    $(this).on('click', function(e){
                        let leftPos = $(this).offset().left - $(tabOuter).offset().left;
                        let targetPanel = '#' + $(this).data('tab-panel');
                        let parentForm = '#' + $(this).data('parent-form');

                        $(tabSlider).animate({
                            left: leftPos
                        });

                        $(parentForm).find('.picking-form-main').not(targetPanel).addClass('hide');
                        $(targetPanel).removeClass('hide');
                    });
                });
            });
        }
    };
}

export const Picking = function(_properties){
    var defaultProperties = {
        container: null,
        childContainer: null,
        template: null,
        url: null
    }

    var properties = Object.assign(defaultProperties, _properties);

    var fillingFunction = function(data){
        //clear old DOMs
        $(properties.container).find(properties.childContainer).remove();

        for(var i = data.length - 1; i >= 0; --i){
            let template = properties.template(data[i]);
            $(properties.container).prepend(template);
        }
    }

    return {
        initialize: function(){
            if(properties.container === null){
                console.error('Picking container is not assigned');
                return;
            }

            if(properties.childContainer === null){
                console.error('Picking child container is not assigned');
                return;
            }

            if(properties.template === null || typeof properties.template !== 'function'){
                console.error('Template method is not assigned');
                return;
            }

            if(properties.url === null){
                console.error('url is not assigned');
                return;
            }

            $(properties.container).pagination({
                dataSource: function(done){
                    $.ajax({
                        type: 'GET',
                        url: properties.url,
                        success: function(response){
                            done(response);
                        },
                        error: function(jqXHR, exception){
                            console.error(jqXHR.responseText);
                        }
                    });
                },
                callback: function(data, pagination){
                    fillingFunction(data);
                },
                showPageNumbers: false,
                pageSize: 4,
                ulClassName: 'pagination',
                prevText: '<i class="fas fa-angle-left"></i>',
                nextText: '<i class="fas fa-angle-right"></i>'
            });
        }
    }
}

export const DropZone = function(_properties){
    var defaultProperties = {
        dropZoneContainer: null,
        fileInput: null,
        highlightDropzoneCallback: null,
        unhighlightDropzoneCallback: null,
        handleDropCallback: null,
        handleClickCallback: null,
        handleFileCallback: null,
        handleFileChangeCallback: null
    }

    var properties = Object.assign(defaultProperties, _properties);

    var DropzoneFuntionalities = function(){
        var preventDefault = function(e){
            e.preventDefault();
            e.stopPropagation();
        }

        var highlightDropzone = function(e){
            $(properties.dropZoneContainer).addClass('highlighted');

            if( properties.highlightDropzoneCallback !== null &&
                typeof properties.highlightDropzoneCallback === 'function'){
                    properties.highlightDropzoneCallback();
                }
        }

        var unhighlightDropzone = function(e){
            $(properties.dropZoneContainer).removeClass('highlighted');

            if( properties.unhighlightDropzoneCallback !== null &&
                typeof properties.unhighlightDropzoneCallback === 'function'){
                    properties.unhighlightDropzoneCallback();
                }
        }

        var handleFile = function(files){
            $(properties.fileInput)[0].files = files;

            //show file info in callback
            if(properties.handleFileCallback !== null &&
                typeof properties.handleFileCallback === 'function'){
                    properties.handleFileCallback(files);
                }
        }

        var handleDrop = function(e){
            if(e.originalEvent.dataTransfer && e.originalEvent.dataTransfer.files.length){
                handleFile(e.originalEvent.dataTransfer.files);

                //update button status here
                if(properties.handleDropCallback !== null &&
                    typeof properties.handleDropCallback === 'function'){
                        properties.handleDropCallback();
                    }
            }
        }

        var handleFileChange = function(files){
            if(properties.handleFileChangeCallback !== null &&
                typeof properties.handleFileChangeCallback === 'function'){
                    properties.handleFileChangeCallback($(properties.fileInput)[0].files);
                }
        }

        var handleClick = function(e){
            $(properties.fileInput).trigger('click');
        }

        return {
            preventDefault: preventDefault,
            highlightDropzone: highlightDropzone,
            unhighlightDropzone: unhighlightDropzone,
            handleDrop: handleDrop,
            handleFile: handleFile,
            handleFileChange: handleFileChange,
            handleClick: handleClick
        }
    }

    const dropzoneFuntionalities = DropzoneFuntionalities();

    return {
        initialize: function(){
            ['dragenter','dragover','dragleave','drop'].forEach(eventName => {
                $(properties.dropZoneContainer).on(eventName,dropzoneFuntionalities.preventDefault);
            });

            ['dragenter','dragover'].forEach(eventName => {
                $(properties.dropZoneContainer).on(eventName, dropzoneFuntionalities.highlightDropzone);
            });

            $(properties.dropZoneContainer).on('drop', dropzoneFuntionalities.handleDrop);

            $(properties.dropZoneContainer).on('click', dropzoneFuntionalities.handleClick);

            $(properties.fileInput).on('change', dropzoneFuntionalities.handleFileChange);       
        }
    }
};