$(function () {
 
    $("#images").on("change", function () {
        $("#imagesFrm").submit();
    });
    $("document").ready(function () {
        $("#addPhotoBtn").click(function () {
            $("#images").trigger("click");
        });
    });
});
