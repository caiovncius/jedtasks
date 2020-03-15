$(document).ready(function () {

    $('form').submit(function () {
        var width = $(this).find(':submit').width();
        $(this).find(':submit').html('<i class="fa fa-circle-o-notch fa-spin"></i>').width(width);
    });
})
