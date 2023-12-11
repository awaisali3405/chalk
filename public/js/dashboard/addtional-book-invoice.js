$('#additional-book-invoice-btn').on('click', function () {
    subject_id = $('#book-subject').val();
    subject = $('#book-subject option:selected').text();
    book_name = $('#book-name').val();
    quantity = $('#book-quantity').val();
    rate = $('#book-rate').val();
    total = $('#book-total').val();
    if (subject && book_name && quantity && rate) {
        x = `<tr>
        <td>
            ${subject}
            <input type="hidden" name="subject[]" value="${subject_id}">
            </td>
        <td>
            ${book_name}
            <input type="hidden" name="book_name[]" value="${book_name}">
            </td>
            <td>
                ${quantity}
                <input type="hidden" name="quantity[]" value="${quantity}">
                </td>
                <td>₤${rate}
                    <input type="hidden" name="rate[]" value="${rate}">
                    </td>
                    <td>
                    <input type="hidden" name="amount[]" value="${total}">
                    ₤${total}</td>
        <td>

            <a class="delete-addition-book" href="javascript:void(0);"><i class=" fa fa-close color-danger"></i></a>
        </td>
    </tr>`;
        $('.addition-book-table').append(x);
        book_name = $('#book-name').val('');
        quantity = $('#book-quantity').val(0);
        rate = $('#book-rate').val(0);
        total = $('#book-total').val(0);
        $('.additional-book-invoice-generate').attr('disabled', false);
    }
});
$('#book-rate').add('#book-quantity').on('change keyup', function () {
    rate = $('#book-rate').val() ? $('#book-rate').val() : 0;
    quantity = $('#book-quantity').val() ? $('#book-quantity').val() : 0;
    console.log(rate, quantity);
    total = parseFloat(rate * quantity).toFixed(2);

    $('#book-total').val(total);
})
$('.addition-book-table').on('click', '.delete-addition-book', function () {
    $(this).parent().parent().remove();
})


$('.year_student-book').on('change keyup', function () {
    id = $(this).val()
    $.ajax({
        method: "GET",
        'url': `/api/get/student/${id}`,
        success: function (success) {
            // if (success.message == 'success') {

            // $('.student').html(success.data);
            $('.book-student').html(success.data);
            // console.log(success.data);
            // }


        }
    })
})
$('.book-student').on('change keyup', function () {

    id = $(this).val()
    console.log(id)
    $.ajax({
        method: "GET",
        'url': `/api/get/student1/data1/${id}`,
        success: function (success) {

            image = "http://" + $(location).attr('host') + "/" + success.data.profile_pic
            $('#p_name').html(`${success.data.first_name} ${success.data.last_name}`)
            $('#p_image').attr('src', image)
            $('#p_roll').html(success.data.id)
            $('#p_year').html(success.data.year.name)
            $('#payment').html(success.data.payment_period)
            $('#p_branch').html(success.data.branch.name)
            $('#tax').html(success.data.tax)
            $('#book-subject').html(success.html);
            console.log(success);
        }
    })
})
