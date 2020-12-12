window.deleteData = function (event, url) {
    event.preventDefault();
    let type = 'DELETE';
    let data = {
        _token: $('#csrf-token').attr('content'),
    }
    if (!confirm(`Are your sure?`)) {
        return false;
    }
    $.ajax({
        type, url, data,
        success: function (response) {
            if (!response.success) {
                toastr.error(response.message);
                return;
            }
            toastr.success(response.message);
            $('.buttons-reload').trigger('click');
        }
    });
}