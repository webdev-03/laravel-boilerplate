$(function () {
    $('#table').DataTable();
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
});

function deleteData(event, param) {
    event.preventDefault();
    if (!confirm(`Are your sure?`)) {
        return false;
    }
    $(`#${$(param).data(`id`)}`).submit();
}

function responseChange(param, event) {
    event.preventDefault();
    let id = $(param).find(':selected').data('id');
    let later = $(param).parents('div.row.text-left').children().closest('div.later');
    if (id == 'call-later') {
        if ($(later).hasClass('d-none')) {
            $(later).removeClass('d-none');
            $(later).children('input').removeAttr('disabled');
            return;
        }
    }
    $(later).addClass('d-none');
    $(later).children('input').attr('disabled', 'true');
    return;
}

function leadClosed(p, e) {
    e.preventDefault();
    let URL = $(p).data('href');
    let data = {
        _token: $('#csrf-token').attr('content'),
        _method: 'PATCH',
        close: true,
    }

    $.ajax({
        type: "POST",
        url: URL,
        data: data,
        success: function (response) {
            if (!response.success) {
                $.each(response.errors, function (i, v) {
                    v.forEach(error => {
                        toastr.error(error)
                    });
                });
                return;
            }
            $('.buttons-reload').trigger('click');
        }
    });
}