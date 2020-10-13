import { DropZone } from '../Base/form.js';

var MAX_FILE_SIZE = 2; // 2 MB

function copyToClipBoard(value){
    var tempInput = document.createElement("input");
    tempInput.style = "position: absolute; left: -1000px; top: -1000px";
    tempInput.value = value;
    document.body.appendChild(tempInput);
    tempInput.select();
    tempInput.setSelectionRange(0, 99999);
    
    try{
        document.execCommand("copy");
    }catch(e){
        return false;
    }

    document.body.removeChild(tempInput);

    return true;
}

function handleServerCallback(img){
    let pictureContainer = `
    <div class="col-4 mt-3">
        <div class="picture-container d-flex justify-content-center align-items-center">
            <div class="picture-inner">
                <img src="${img.url}" alt="pictures">
                <input type="text" value="${img.url}" id="copy-text-${img.id}" style="display:none">
                <div class="picture-hover d-flex justify-content-center align-items-center">
                    <button class="picture-copy-source-btn" data-copy-target="copy-text-${img.id}">Copy Source</button>
                </div>
            </div>
        </div>
    </div>
    `;

    $(pictureContainer).find('.picture-copy-source-btn').first().on('click', function(e){
        var copyTarget = document.getElementById($(this).data("copy-target"));
        
        console.log($(copyTarget).val());

        if(copyToClipBoard($(copyTarget).val())){
            Swal.fire({
                type: 'success',
                title: 'Copied Source',
                toast: true,
                position: 'top-end',
                timer: 3000,
                showConfirmButton: false
            });
        }else{
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

const pictureDropzone = DropZone({
    dropZoneContainer: '#picture-drop-zone',
    fileInput: '#adding-picture-file',
    handleFileCallback: function(files){
        sendFileAjax(files[0]);
    },
    handleFileChangeCallback: function(files){
        sendFileAjax(files[0]);
    }
});

pictureDropzone.initialize();

function initButtonEvent(){
    $("#picture-container").on('click','.picture-copy-source-btn',function(e){
        var copyTarget = document.getElementById($(this).data("copy-target"));
        
        console.log($(copyTarget).val());

        if(copyToClipBoard($(copyTarget).val())){
            Swal.fire({
                type: 'success',
                title: 'Copied Source',
                toast: true,
                position: 'top-end',
                timer: 3000,
                showConfirmButton: false
            });
        }else{
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

$(function(){
    $("#picture-container").on('click','.picture-copy-source-btn',function(e){
        var copyTarget = document.getElementById($(this).data("copy-target"));
        
        console.log($(copyTarget).val());

        if(copyToClipBoard($(copyTarget).val())){
            Swal.fire({
                type: 'success',
                title: 'Copied Source',
                toast: true,
                position: 'top-end',
                timer: 3000,
                showConfirmButton: false
            });
        }else{
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

    $("#picture-container").attachDragger();
});