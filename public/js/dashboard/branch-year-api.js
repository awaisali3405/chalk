$('.year_student_branch').add('#branch_id').on('change keyup', function () {
    id = $(this).val()
    branch = $('#branch_id').val();
    if (id && branch) {

        $.ajax({
            method: "GET",
            'url': `/api/get/student/${id}/${branch}`,
            success: function (success) {
                // if (success.message == 'success') {

                $('.student').html(success.data);
                // console.log(success.data);
                // }


            }
        })
    } else {
        $('.student').html("<option value=''>-</option>");

    }
})
