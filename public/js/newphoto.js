

$(function () {
    // Multiple images preview with JavaScript
    var previewImages = function (input, imgPreviewPlaceholder) {
        
        if (input.files) {
            var filesAmount = input.files.length;
        
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function (event) {
                    $($.parseHTML("<img>"))
                        .attr("src", event.target.result)
                        .appendTo(imgPreviewPlaceholder);
                };
                reader.readAsDataURL(input.files[i]);
            }
        }
    };
    $("#uploadimage").on("change", function () {
        previewImages(this, "div.images-preview-div");
    });
    $("document").ready(function () {
        $("#addPhotoBtn").click(function () {
            $("#images").trigger("click");
        });
    });
});
