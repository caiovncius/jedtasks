$(document).ready(function() {
    $('#jt-trigger-avatar').on('click', function (e) {
        $('#field-avatar').trigger('click');
    });

    $('#field-avatar').on('change', function(e) {
        helpers.previewImage(this, '#jt-account-user-avatar');
    });

    $('#field-name').on('input', function (e) {
        $('#jt-account-user-name').text(e.target.value);
    });
});
