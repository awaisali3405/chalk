$('.year_student_branch').add('#branch_id').on('change keyup', function () {
    id = $(this).val()
    console.log(id);
    branch = $('#branch_id').val();
    if (id && branch) {

        $.ajax({
            method: "GET",
            'url': `/api/get/student/${id}/${branch}`,
            success: function (success) {
                // if (success.message == 'success') {

                console.log(success.data);
                $('.student').html(success.data);
                // }


            }
        })
    } else {
        $('.student').html("<option value=''>-</option>");

    }
})
