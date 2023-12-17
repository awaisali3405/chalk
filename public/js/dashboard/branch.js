

$('#payment-type').on('keyup change', function () {
    type = $("#payment-type").val();
    if (type != 'Weekly') {
        $('#monthly-fee').removeClass('d-none')
    } else {
        $('#monthly-fee').addClass('d-none')
        // $('.monthly-fee').val();
    }
})

$('#tax_type').on('click ready', function () {
    tax_type = $(this).val()
    if (tax_type == 'vat') {
        $('.tax').show();
        $('.tax-input').val(0);
    } else if (tax_type == 'flat') {

        $('.tax').show();
        $('.tax-input').val(0);
    } else {
        $('.tax').hide();
        $('.tax-input').val(0);
    }
});



