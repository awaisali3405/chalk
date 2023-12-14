$('.year_enquiry').on('change', function() {
    var year = $(this).val();
    $.ajax({
        method: "GET",
        'url': `/api/get/subject/${year}/value`,
        success: function(success) {
            // if (success.message == 'success') {

            $('.subject').html(success.data);
            $('.checkbox').html('');
            success.data.forEach(element => {
                x = `     <div class="col-lg-2 col-md-2 col-sm-6">
                                        <input type="checkbox" name="subject[]" value="${element.name}" id="">
                                        <label class="">${element.name}</label>
                                    </div>`;
                $('.checkbox').append(x);
            });
            // console.log(success.data);
            // }


        }
    })
})
$('#veiw-enquiry-list').on('click', function() {

    if ($(this).text() == 'Hide Subject') {
        $('.enquiry-subject-list').addClass('d-none');
        $(this).text('View Subject');

    } else {
        $('.enquiry-subject-list').removeClass('d-none');
        $(this).text('Hide Subject');
    }
})
