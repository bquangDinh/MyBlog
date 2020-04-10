var checkedOptions = [];

$(".playlist-track-id").each(function(index){
    let trackId = $(this).val();
    checkedOptions.push(parseInt(trackId));
});

function template(data){
    //clear container
    $("#tracks-list").find('.track-record').remove();

    for(var i = data.length - 1; i >= 0; --i){
        let trackRecordHTML = `
        <div class="track-record mt-2">
                        <div class="row h-100">
                            <div class="col-1">
                                <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                                    <label class="checkbox-lb">
                                        <input type="checkbox" name="cb-track-${data[i].id}" class="track-selected" data-track-id="${data[i].id}" ${checkedOptions.includes(data[i].id) ? 'checked' : ''}>
                                        <span class="checkmark">
                                            <i class="fas fa-check-circle"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                    <span class="track-name">${data[i].title}</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                    <span class="track-type">${data[i].type}</span>
                                </div>
                            </div>
                        </div>
                    </div>
        `;

        $("#tracks-list").prepend(trackRecordHTML);
    }
}

$("#tracks-list").pagination({
    dataSource: function(done){
        $.ajax({
            type: 'GET',
            url: '/admin/action/get_tracks_as_json',
            success: function(response){
                done(response);
            },
            error: function(jqXHR, exception){
                //console.log(jqXHR.responseText);
            }
        });
    },
    callback: function(data, pagination){
        //console.log("Callback: ", data, pagination);
        template(data);
    },
    showPageNumbers: false,
    pageSize: 4,
    ulClassName: 'tracks-pagination',
    prevText: '<i class="fas fa-angle-left"></i>',
    nextText: '<i class="fas fa-angle-right"></i>'
});

$(".tracks-list").on('click',"input[type='checkbox']", function(){
    let id = $(this).data("track-id");

    if(this.checked){
        if(!checkedOptions.includes(id)){
            checkedOptions.push(id);
        }
    }else{
        let index = checkedOptions.indexOf(id);
        if(index != -1) checkedOptions.splice(index,1);
    }
});

$("#add-playlist-form").on('submit',function(e){
    if(!checkedOptions || checkedOptions.length < 2){
        alert("No track is selected. Please select at least 2 tracks");
        return false;
    }

    $("#selected-tracks-input").val(JSON.stringify(checkedOptions));

    return true;
});