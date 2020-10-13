import { DropZone } from '../Base/form.js';

var MAX_FILE_SIZE = 5;
var fileInput = '#track-file';

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
}

const trackDropzone = DropZone({
    dropZoneContainer: '#dropzone-track-field',
    fileInput: '#track-file',
    handleFileCallback: function(files){
        showFileInfo(files);
    },
    handleFileChangeCallback: function(files){
        showFileInfo(files);
    }
});
trackDropzone.initialize();

function handleFormSubmit(e){
    if(!$(fileInput)[0].files || $(fileInput)[0].files.length == 0){
        Swal.fire({
            type: 'error',
            title: 'No track selected',
            text: 'Please select a track'
        });
        return false;
    }

    let fileSize = $(fileInput)[0].files[0].size / 1000000;

    if(fileSize > MAX_FILE_SIZE){
        Swal.fire({
            type: 'error',
            title: 'The file is too large',
            text: 'Please select a smaller track file'
        });
        return false;
    }

    return true;
}

$(function(){
    $("#add-track-form").on("submit",handleFormSubmit);
});