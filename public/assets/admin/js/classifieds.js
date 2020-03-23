$('.accept-classifieds').click(function () {
    var id = $(this).val();
    $.ajax({
        type: 'GET',
        url: '/admin/classifieds/accept/' + id,
        success: function (data) {
            $('#accept-' + id).hide();
        },
        error: function (data) {
            alert('nie ok')
        }
    })
});

$('#form-lock').submit(function () {
    var id = $(this).val();

    $.ajax({
        type: 'POST',
        url: '/admin/classifieds/lock/' + id,
        data: {
            type: 'type',
            description: 'description'
        },
        success: function (data) {

        },
        error: function (data) {

        }
    })
});
