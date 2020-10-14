import { NeumorphismSelect, TextEditor, Tab, Picking, DropZone } from '../Base/form.js';

/*INTIIALIZE FORM COMPONENTS*/
const neumorphismSelect = NeumorphismSelect();
neumorphismSelect.initialize(true);

$(document).on('click',function(e){
    neumorphismSelect.closeAllSelects();
});

if(tinymce === 'undefined'){
    console.error("No such text editor found. Please add one");
}else{
    const textEditor = TextEditor(tinymce);
    textEditor.initialize();
}

const tab = Tab();
tab.initialize();

const imagePicking = Picking({
    container: '#image-records',
    childContainer: '.image-record',
    template: function(data){
        return `
        <div class="image-record mt-2 record">
            <div class="row h-100">
                <div class="col-1">
                    <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                        <label class="radio-box">
                            <input type="radio" name="image_radio" class="image-radio" data-image-id=${data.id}>
                            <span class="checkmark">
                                <i class="fas fa-check-circle"></i>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="col-7">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                        <a href="${data.url}" class="image-name record-tab-1-cl" target="_blank">
                            ${data.url.split("/").pop()}
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                        <span class="image-type record-tab-2-cl">
                            ${data.url.split("/").pop().split(".").pop()}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        `;
    },
    url: '/admin/action/get_images_as_json'
});
imagePicking.initialize();

const playlistPicking = Picking({
    container: '#playlist-records',
    childContainer: '.playlist-record',
    template: function(data){
        return `
        <div class="playlist-record mt-2 record">
            <div class="row h-100">
                <div class="col-1">
                    <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                        <label class="radio-box">
                            <input type="radio" name="playlist_radio" data-playlist-id=${data.id} class="playlist-radio">
                            <span class="checkmark">
                                <i class="fas fa-check-circle"></i>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="col-7">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                        <span class="playlist-name record-tab-1-cl">
                            ${data.name}
                        </span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                        <span class="track-count record-tab-2-cl">
                            ${data.trackCount} tracks
                        </span>
                    </div>
                </div>
            </div>
        </div>
        `;
    },
    url: '/admin/action/get_playlists_as_json'
});
playlistPicking.initialize();

const singleTrackPicking = Picking({
    container: '#singletrack-records',
    childContainer: '.singletrack-record',
    template: function(data){
        return `
        <div class="singletrack-record mt-2 record">
            <div class="row h-100">
                <div class="col-1">
                    <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                        <label class="radio-box">
                            <input type="radio" name="singletrack_radio" data-track-id="${data.id}" class="singletrack-radio">
                                <span class="checkmark">
                                    <i class="fas fa-check-circle"></i>
                                </span>
                        </label>
                    </div>
                    </div>
                        <div class="col-7">
                            <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                <span class="singletrack-name record-tab-1-cl">
                                    ${data.title}
                                </span>
                            </div>
                        </div>
                                        <div class="col-4">
                                            <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                <span class="track-type record-tab-2-cl">
                                                    ${data.type}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        `;
    },
    url: '/admin/action/get_tracks_as_json'
});
singleTrackPicking.initialize();

var showFileInfos = function(files){
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

const coverDropzone = DropZone({
    dropZoneContainer: '#droppable-file-zone',
    fileInput: '#cover-file',
    handleDropCallback: function(){
        console.log('drop callback');
        $(".direction-btn[data-name='db-cover'][data-direction='ok']").removeClass("disabled").prop("disabled", false);
    },
    handleFileCallback: function(files){
        showFileInfos(files);
    },
    handleFileChangeCallback: function(files){
        showFileInfos(files);
    }
});
coverDropzone.initialize();
/*-------FINISH INITIALIZING FORM COMPONENTS--------*/

var selectedImageID = null;
var selectedTrackID = null;
var selectedPlaylistID = null;
var MAX_FILE_SIZE = 2; // 2 MB

//document loaded
$(function() {
    $(".picking-btn").on('click', function(e){
        let formTarget = $(this).data("form-target");
        $(".picking-form").addClass("hide");
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

    $(".direction-btn").on('click',function(e){
        let direction = $(this).data("direction");
        let name = $(this).data("name");

        if(name == "db-cover"){
            if(direction == "cancel"){
                $(".picking-form").addClass("hide");
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
                $(".picking-form").addClass("hide");
                $(".picking-btn").removeClass("active");

                
            }
        }else if(name == "playlist"){
            if(direction == "cancel"){
                $(".picking-form").addClass("hide");
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
                $(".picking-form").addClass("hide");
                $(".picking-btn").removeClass("active");
            }
        }else if(name == "singletrack"){
            if(direction == "cancel"){
                $(".picking-form").addClass("hide");
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
                $(".picking-form").addClass("hide");
                $(".picking-btn").removeClass("active");
            }
        }
    });

    $("#article-form").on('submit',function(e){
        if(selectedImageID != null) $("#selected-image-id-input").val(selectedImageID);
        if(selectedPlaylistID != null) $("#selected-playlist-id-input").val(selectedPlaylistID);
        if(selectedTrackID != null) $("#selected-track-id-input").val(selectedTrackID);

        return true;
    });

    $("#use-folder-switch").on('change',function(e){
        if(this.checked){
            $("#launchable-exp-textbox").show();
        }else{
            $("#launchable-exp-textbox").hide();
        }
    });

    $("#github-url-switch").on('change',function(e){
        if(this.checked){
            $("#github-textbox").show();
        }else{
            $("#github-textbox").hide();
        }
    });
});

