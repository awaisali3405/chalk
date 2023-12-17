$('#browser').on('change keyup', function () {
    value = $(this).val();
    if (value == 'Friends/Family') {
        $('#reference-student-container').removeClass('d-none');
    } else {
        $('#reference-student-container').addClass('d-none');

    }
})
