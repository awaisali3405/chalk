$('.addition-subject').on('click', function () {
    // var subject = '';
    subject_id = $(".subject option:selected").val()
    subject = $(".subject option:selected").text()
    hours = parseFloat($(".hours").val()).toFixed(2)
    rate = parseFloat($(".rate").val()).toFixed(2)
    amount = parseFloat($("#amount").val()).toFixed(2)
    console.log(subject, hours, rate, amount)
    if (subject && hours && rate && amount) {
        x = `<tr>
                            <td>
                                ${subject}
                                <input type="hidden" name="subject[]" value="${subject_id}">
                                </td>
                                <td>
                                    ${hours}
                                    <input type="hidden" name="hours[]" value="${hours}">
                                    </td>
                                    <td>${rate}
                                        <input type="hidden" name="rate[]" value="${rate}">
                                        </td>
                                        <td>
                                            <input type="hidden" name="amount[]" value="${amount}">
                                            ${amount}</td>

                            <td>

                                <a class="delete-addition-subject" href="javascript:void(0);"><i class=" fa fa-close color-danger"></i></a>
                            </td>
                        </tr>
        `;
        $('.addition-subject-add').append(x);
        hours = $(".hours").val(0)
        rate = $(".rate").val(0)
        amount = $("#amount").val(0)
        $('.additional-invoice-btn').attr('disabled', false);
    }


    // }
    // })
})
$('.addition-subject-add').on('click', '.delete-addition-subject', function () {
    $(this).parent().parent().remove();
})

// Student Adittion sum rate and hr
$('.rate').add('.hours').on('change keyup', function () {
    console.log('asasdsadas')
    rate = parseFloat($('.rate').val()) || 0;
    hour = parseFloat($('.hours').val()) || 0;
    $('.amount').val(rate * hour)
})
