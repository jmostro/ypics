function editPhoto(id){
    $("#viewDetails_"+id).toggle();
    $("#editDetails_"+id).toggle();
}

function updatePhoto(id){
    let title = $("#editTitle_"+id).val();
    let description = $("#editDescription_"+id).val();
    let actionURL = $("#editForm_"+id).attr("action");
    let token = $("#csrf_token").val();
    $.ajax({
        type: "PUT",
        url: actionURL,
        data: {
            "_token" : token,
            "title" : title,
            "description" : description,
        },
        success: function(data){
            $("#viewTitle_"+id).text(title);
            $("#viewDescription_"+id).text(description);
            editPhoto(id);
        },
        error: function (data){
            console.log("error");
            console.log(data);
        }
    });
}

function confirmDelete(id){
    $("#viewOptions_"+id).toggle();
    $("#deleteOptions_"+id).toggle();
}

function doDelete(actionURL, id){
    $.ajax({
        type: "GET",
        url: actionURL,
        success: function(data){
            $("#photoCard_"+id).remove();
        },
        error: function (data){
            console.log("error");
            console.log(data);
        }
    });
}