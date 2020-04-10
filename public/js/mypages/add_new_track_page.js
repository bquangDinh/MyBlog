var MAX_FILE_SIZE = 5;

function preventDefaultFunc(e){
    e.preventDefault();
    e.stopPropagation();
}

function initDropzone(){
    let dropzoneTrack = $("#dropzone-track-field");
    let fileInput = $("#track-file");

    function highlightDropZone(e){
        $(dropzoneTrack).addClass("highlighted");
    }

    function unhignlightDropZone(e){
        $(dropzoneTrack).removeClass("highlighted");
    }

    function handleDrop(e){
        if(e.originalEvent.dataTransfer && e.originalEvent.dataTransfer.files.length){
            //upload file here
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
    }

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

    //prevent default behavior
    ['dragenter','dragover','dragleave','drop'].forEach(eventName => {
        $(dropzoneTrack).on(eventName,preventDefaultFunc);
    });

    //

    ['dragenter','dragover'].forEach(eventName => {
        $(dropzoneTrack).on(eventName,highlightDropZone);
    });

    ['dragleave','drop'].forEach(eventName => {
        $(dropzoneTrack).on(eventName,unhignlightDropZone);
    });

    // 

    $(dropzoneTrack).on('drop',handleDrop);

    $(dropzoneTrack).on('click',handleClick);

    $(fileInput).change(handleFileChange);

    $("#add-track-form").on("submit",handleFormSubmit);
}

$(document).ready(function(e){
    initDropzone();
});