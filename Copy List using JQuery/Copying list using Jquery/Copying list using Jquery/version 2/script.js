$(document).ready(function () {
    // Copy from source list to target list
    $("#copyRight").click(function () {
        $("#sourceList option:selected").appendTo("#targetList");
    });

    // Copy from target list to source list
    $("#copyLeft").click(function () {
        $("#targetList option:selected").appendTo("#sourceList");
    });
});
