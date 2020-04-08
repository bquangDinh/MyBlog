var MAX_FILE_SIZE = 2; // 2 MB

function preventDefaultFunc(e){
    e.preventDefault();
    e.stopPropagation();
}

function initPictureDropzone(){
    var dropZone = $("#picture-drop-zone");
    var fileInput = $("#adding-picture-file");

    function highlightDropzone(e){
        $(dropZone).addClass("highlighted");
    }

    function unhighlightDropzone(e){
        $(dropZone).removeClass("highlighted");
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
        //console.log(files);
        sendFileAjax(files[0]);
    }

    function handleFileChange(e){

    }

    function handleServerCallback(img){
        let pictureContainer = `
        <div class="col-4 mt-3">
            <div class="picture-container d-flex justify-content-center align-items-center">
                <div class="picture-inner">
                    <img src="${img.url}" alt="pictures">
                    <input type="text" value="" id="copy-text-${img.id}" style="display:none">
                    <div class="picture-hover d-flex justify-content-center align-items-center">
                        <button class="picture-copy-source-btn" data-copy-target="${img.id}">Copy Source</button>
                    </div>
                </div>
            </div>
        </div>
        `;
        $(pictureContainer).hide().prependTo("#picture-container").fadeIn(300);
    }

    function sendFileAjax(file){
        let formData = new FormData();
        formData.append('picture_file',file);

        let ajax = new XMLHttpRequest();

        ajax.onreadystatechange = function(){
            if(ajax.readyState == 4 && ajax.status == 200){
                Swal.fire({
                    type: 'success',
                    title: 'Uploading picture successful !',
                    toast: true,
                    position: 'top-end',
                    timer: 3000,
                    showConfirmButton: false
                });
                handleServerCallback(JSON.parse(ajax.responseText));
            }
            if(ajax.readyState == 4 && ajax.status != 200){
                Swal.fire({
                    type: 'error',
                    title: 'Uploading picture failed !',
                    text: 'The file size may too large !',
                    toast: true,
                    position: 'top-end',
                    timer: 3000,
                    showConfirmButton: false
                });
                console.error("uploading picture failed");
            }
        }

        let URL = "/admin/media/add_image";

        ajax.open("POST",URL,true);
        ajax.setRequestHeader('X-CSRF-TOKEN',$('meta[name="csrf-token"]').attr('content'));
        ajax.send(formData);
    }

    ['dragenter','dragover','dragleave','drop'].forEach(eventName => {
        $(dropZone).on(eventName,preventDefaultFunc);
    });

    ['dragenter','dragover'].forEach(eventName => {
        $(dropZone).on(eventName,highlightDropzone);
    });

    ['dragleave','drop'].forEach(eventName => {
        $(dropZone).on(eventName,unhighlightDropzone);
    });

    $(dropZone).on('drop',handleDrop);
    $(dropZone).on('click',handleClick);
    $(fileInput).change(handleFileChange);
}

function initButtonEvent(){
    $("#picture-container").on('click','.picture-copy-source-btn',function(e){
        var copyTarget = document.getElementById($(this).data("copy-target"));
        
        copyTarget.select();
        
        //for mobiles
        copyTarget.setSelectionRange(0, 99999);

        try{
            document.execCommand("copy");
            Swal.fire({
                type: 'success',
                title: 'Copied Source',
                toast: true,
                position: 'top-end',
                timer: 3000,
                showConfirmButton: false
            });
        }catch(e){
            Swal.fire({
                type: 'error',
                title: 'Copied Source Failed',
                toast: true,
                position: 'top-end',
                timer: 3000,
                showConfirmButton: false
            });
        }
    });
}
$(document).ready(function(){
    initPictureDropzone();
    initButtonEvent();
});