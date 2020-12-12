$(function () {
    $('#table').DataTable();
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    $(".selectSearch").select2({
        width: 'resolve'
    });

    $(".multiSelect").select2({
        width: 'resolve'
    });
});