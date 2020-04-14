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
    var tabOuter = $(self).find(".tab-outer").first();
    var tabSlider = $(self).find(".tab-slider").first();
    $(self).find(".tab-btn").each(function(index){
        $(this).click(function(e){
            let leftPos = $(this).offset().left - $(tabOuter).offset().left;
            let targetPanel = $(this).data("tab-panel");
            let parentForm = $(this).data("parent-form");

            $(tabSlider).animate({
                left: leftPos
            });

            $("#" + parentForm).find(".form-child").not("#" + targetPanel).addClass("form-hided");
            $("#" + targetPanel).removeClass("form-hided");
        });
    });
});

$(document).on('click',function(e){
    closeAllSelect();
});

function templateImageRecords(data){
    $("#image-records").find(".image-record").remove();

    for(var i = data.length - 1; i >= 0; --i){
        let imageRecord = `
            <div class="image-record mt-2 record">
            <div class="row h-100">
                <div class="col-1">
                    <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                        <label class="custom-radio-box">
                            <input type="radio" name="image_radio" class="image-radio" data-image-id=${data[i].id}>
                            <span class="checkmark">
                                <i class="fas fa-check-circle"></i>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="col-7">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                        <a href="${data[i].url}" class="image-name record-tab-1-cl" target="_blank">
                            ${data[i].url.split("/").pop()}
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                        <span class="image-type record-tab-2-cl">
                            ${data[i].url.split("/").pop().split(".").pop()}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        `;

        $("#image-records").prepend(imageRecord);
    }
}

function templatePlaylistRecords(data){
    $("#playlist-records").find(".playlist-record").remove();

    for(var i = data.length - 1; i >= 0; --i){
        let playlistRecord = `
        <div class="playlist-record mt-2 record">
            <div class="row h-100">
                <div class="col-1">
                    <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                        <label class="custom-radio-box">
                            <input type="radio" name="playlist_radio" data-playlist-id=${data[i].id} class="playlist-radio">
                            <span class="checkmark">
                                <i class="fas fa-check-circle"></i>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="col-7">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                        <span class="playlist-name record-tab-1-cl">
                            ${data[i].name}
                        </span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                        <span class="track-count record-tab-2-cl">
                            ${data[i].trackCount} tracks
                        </span>
                    </div>
                </div>
            </div>
        </div>
        `;

        $("#playlist-records").prepend(playlistRecord);
    }
}

function templateTrackRecords(data){
    $("#singletrack-records").find(".singletrack-record").remove();

    for(var i = data.length - 1; i >= 0; --i){
        let trackRecord = `
            <div class="singletrack-record mt-2 record">
                <div class="row h-100">
                    <div class="col-1">
                        <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                            <label class="custom-radio-box">
                                <input type="radio" name="singletrack_radio" data-track-id="${data[i].id}" class="singletrack-radio">
                                    <span class="checkmark">
                                        <i class="fas fa-check-circle"></i>
                                    </span>
                            </label>
                        </div>
                        </div>
                            <div class="col-7">
                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                    <span class="singletrack-name record-tab-1-cl">
                                        ${data[i].title}
                                    </span>
                                </div>
                            </div>
                                            <div class="col-4">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="track-type record-tab-2-cl">
                                                        ${data[i].type}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        `;

        $("#singletrack-records").prepend(trackRecord);
    }
}

$("#image-records").pagination({
    dataSource: function(done){
        $.ajax({
            type: 'GET',
            url: '/admin/action/get_images_as_json',
            success: function(response){
                done(response);
            },
            error: function(jqXHR, exception){
                console.error(jqXHR.responseText);
            }
        });
    },
    callback: function(data, pagination){
        templateImageRecords(data);
    },
    showPageNumbers: false,
    pageSize: 4,
    ulClassName: 'pagination',
    prevText: '<i class="fas fa-angle-left"></i>',
    nextText: '<i class="fas fa-angle-right"></i>'
});

$("#playlist-records").pagination({
    dataSource: function(done){
        $.ajax({
            type: 'GET',
            url: '/admin/action/get_playlists_as_json',
            success: function(response){
                done(response);
            },
            error: function(jqXHR, exception){
                console.error(jqXHR.responseText);
            }
        });
    },
    callback: function(data, pagination){
        templatePlaylistRecords(data);
    },
    showPageNumbers: false,
    pageSize: 4,
    ulClassName: 'pagination',
    prevText: '<i class="fas fa-angle-left"></i>',
    nextText: '<i class="fas fa-angle-right"></i>'
});

$("#singletrack-records").pagination({
    dataSource: function(done){
        $.ajax({
            type: 'GET',
            url: '/admin/action/get_tracks_as_json',
            success: function(response){
                done(response);
            },
            error: function(jqXHR, exception){
                console.error(jqXHR.responseText);
            }
        });
    },
    callback: function(data, pagination){
        templateTrackRecords(data);
    },
    showPageNumbers: false,
    pageSize: 4,
    ulClassName: 'pagination',
    prevText: '<i class="fas fa-angle-left"></i>',
    nextText: '<i class="fas fa-angle-right"></i>'
});

var MAX_FILE_SIZE = 2; // 2 MB

function initCoverDropzone(){
    var dropzone = $("#droppable-file-zone");
    var fileInput = $("#cover-file");
    
    function preventDefaultFunc(e){
        e.preventDefault();
        e.stopPropagation();
    }

    function highlightDropzone(e){
        $(dropzone).addClass("highlighted");
    }

    function unhighlightDropzone(e){
        $(dropzone).removeClass("highlighted");
    }

    function handleDrop(e){
        if(e.originalEvent.dataTransfer && e.originalEvent.dataTransfer.files.length){
            //upload file here
            $(".direction-btn[data-name='db-cover'][data-direction='ok']").removeClass("disabled").prop("disabled", false);
            handleFile(e.originalEvent.dataTransfer.files);
        }
    }

    function handleClick(e){
        $(fileInput).trigger('click');
    }

    function handleFile(files){
        $(fileInput)[0].files = files;

        //show info
        showFileInfo(files);
    }

    function handleFileChange(e){
        showFileInfo($(fileInput)[0].files);
    }

    function showFileInfo(files){
        $("#file-name").text(files[0].name);
        $("#file-extension").text(files[0].type);
        let fileSize = (files[0].size / 1000000);
        $("#file-size").text(fileSize.toFixed(2) + " MB");
        if(fileSize > MAX_FILE_SIZE){
            $("#file-size").addClass("text-danger");
        }else{
            $("#file-size").removeClass("text-danger");
        }
        $(".direction-btn[data-name='db-cover'][data-direction='ok']").removeClass("disabled").prop("disabled", false);
    }

    //prevent default behavior
    ['dragenter','dragover','dragleave','drop'].forEach(eventName => {
        $(dropzone).on(eventName,preventDefaultFunc);
    });

    //

    ['dragenter','dragover'].forEach(eventName => {
        $(dropzone).on(eventName,highlightDropzone);
    });

    ['dragleave','drop'].forEach(eventName => {
        $(dropzone).on(eventName,unhighlightDropzone);
    });

    // 

    $(dropzone).on('drop',handleDrop);

    $(dropzone).on('click',handleClick);

    $(fileInput).change(handleFileChange);
}

var selectedImageID = null;
var selectedTrackID = null;
var selectedPlaylistID = null;

var fileInput = $("#project-folder");

function handleFileChange(e){
    showFileInfo(e.target.files);
}

function showFileInfo(files){
    if(files.length == 0){
        $("#folder-name").text("No folder selected");
        $("#folder-files-count").text("None");
        $("#project-folder-name").val("");
    }else{
        $("#folder-name").text(files[0].webkitRelativePath.split("/")[0]);
        $("#folder-files-count").text(files.length + " files");
        $("#project-folder-name").val(files[0].webkitRelativePath.split("/")[0]);
    }
}

$(document).ready(function(){
    initCustomSelect();
    initTinyMCE();
    initCoverDropzone();

    $(".form-container").attachDragger();

    $(".picking-btn").click(function(e){
        let formTarget = $(this).data("form-target");
        $(".picking-form-container").addClass("hide");
        $("#" + formTarget).removeClass("hide");
        
        $(".picking-btn").not(this).removeClass("active");
        $(this).addClass("active");
    });

    $("#image-records").on('click','.image-radio', function(){
        if(this.checked){
            let imageID = $(this).data("image-id");
            selectedImageID = imageID;
            $(".direction-btn[data-name='db-cover'][data-direction='ok']").removeClass("disabled").prop("disabled", false);
        }
    });

    $("#playlist-records").on('click','.playlist-radio',function(){
        if(this.checked){
            let playlistID = $(this).data("playlist-id");
            selectedPlaylistID = playlistID;
            $(".direction-btn[data-name='playlist'][data-direction='ok']").removeClass("disabled").prop("disabled", false);
        }
    });

    $("#singletrack-records").on('click','.singletrack-radio',function(){
        if(this.checked){
            let trackID = $(this).data("track-id");
            selectedTrackID = trackID;
            $(".direction-btn[data-name='singletrack'][data-direction='ok']").removeClass("disabled").prop("disabled", false);
        }
    });

    $(".direction-btn").click(function(e){
        let direction = $(this).data("direction");
        let name = $(this).data("name");

        if(name == "db-cover"){
            if(direction == "cancel"){
                $(".picking-form-container").addClass("hide");
                $(".picking-btn").removeClass("active");
            }

            if(direction == "notused"){
                selectedImageID = null;
                $("#cover-file").value = "";

                $("#file-name").text("None");
                $("#file-extension").text("None");
                $("#file-size").text("None");

                $("#image-records").find(".image-radio").each(function(index){
                    this.checked = false;
                });

                $(".direction-btn[data-name='db-cover'][data-direction='ok']").addClass("disabled").prop("disabled", true);

                $("#cover-picking-container").removeClass("used");
            }

            if(direction == "ok"){
                $("#cover-picking-container").addClass("used");
                $(".picking-form-container").addClass("hide");
                $(".picking-btn").removeClass("active");

                
            }
        }else if(name == "playlist"){
            if(direction == "cancel"){
                $(".picking-form-container").addClass("hide");
                $(".picking-btn").removeClass("active");
            }

            if(direction == "notused"){
                selectedPlaylistID = null;

                $("#playlist-records").find(".playlist-radio").each(function(index){
                    this.checked = false;
                });

                $(".direction-btn[data-name='playlist'][data-direction='ok']").addClass("disabled").prop("disabled", true);
                $("#music-picking-container").removeClass("used");
            }

            if(direction == "ok"){
                $("#music-picking-container").addClass("used");
                $(".picking-form-container").addClass("hide");
                $(".picking-btn").removeClass("active");
            }
        }else if(name == "singletrack"){
            if(direction == "cancel"){
                $(".picking-form-container").addClass("hide");
                $(".picking-btn").removeClass("active");
            }

            if(direction == "notused"){
                selectedTrackID = null;

                $("#singletrack-records").find(".singletrack-radio").each(function(index){
                    this.checked = false;
                });

                $(".direction-btn[data-name='singletrack'][data-direction='ok']").addClass("disabled").prop("disabled", true);
                $("#music-picking-container").removeClass("used");
            }

            if(direction == "ok"){
                $("#music-picking-container").addClass("used");
                $(".picking-form-container").addClass("hide");
                $(".picking-btn").removeClass("active");
            }
        }
    });

    $(".upload-folder-btn").click(function(e){
        $(fileInput).trigger('click');
    });

    $(fileInput).change(handleFileChange);

    $("#project-form").on('submit',function(e){
        if(fileInput == null || $(fileInput).length == 0){
            Swal.fire({
                type: 'error',
                title: 'No project folder selected',
                text: 'Please choose a project folder'
            });
            return false;
        }

        if($("#project-folder-name").val() == ""){
            Swal.fire({
                type: 'error',
                title: 'The folder name is empty',
                text: 'Something went wrong !!!'
            });
            return false;
        }

        if(selectedImageID != null) $("#selected-image-id-input").val(selectedImageID);
        if(selectedPlaylistID != null) $("#selected-playlist-id-input").val(selectedPlaylistID);
        if(selectedTrackID != null) $("#selected-track-id-input").val(selectedTrackID);
    });
});

