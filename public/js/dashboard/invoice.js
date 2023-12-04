$('.branch_student').on('change', function () {
    branch_id = $(this).val();

    $.ajax({
        url: `/api/get/branch/${branch_id}`,
        method: 'GET',
        success: function (data) {
            console.log(data);
            $('.tax').val(data.data.tax)
            total = parseFloat($('.fee-total').val()).toFixed(2)
            fee_tax = calculateFeeTax(total, $('.tax').val())
            $('.fee-tax').val(fee_tax);
            reg_total = parseFloat($('#registration_fee').val()).toFixed(2)
            reg_tax = calculateFeeTax(reg_total, $('.tax').val())
            $('#reg_tax').val(reg_tax)
            monthly = parseFloat(($('.fee').val() * 52 / 12) - $('#fee_discount').val())
                .toFixed(2);
            $('.monthly-fee').val(monthly)
        }

    })
})

function calculateFeeTax(total, tax) {
    return parseFloat(total - parseFloat(total / (100 + parseFloat(tax))) *
        100).toFixed(2);
}
$(document).ready(function () {
    total = parseFloat($('.fee-total').val()).toFixed(2)
    fee_tax = calculateFeeTax(total, $('.tax').val())
    $('.fee-tax').val(fee_tax);
    reg_total = parseFloat($('#registration_fee').val()).toFixed(2)
    reg_tax = calculateFeeTax(reg_total, $('.tax').val())
    $('#reg_tax').val(reg_tax)
})
$('.tax').add('#registration_fee').add('#fee_discount').on('change keyup', function () {
    total = parseFloat($('.fee-total').val()).toFixed(2)
    fee_tax = calculateFeeTax(total, $('.tax').val())
    $('.fee-tax').val(fee_tax);
    reg_total = parseFloat($('#registration_fee').val()).toFixed(2)
    reg_tax = calculateFeeTax(reg_total, $('.tax').val())
    $('#reg_tax').val(reg_tax)
    discount = parseFloat($("#fee_discount").val()).toFixed(2)
    fee = parseFloat($('.fee').val()).toFixed(2)
    $('.fee-total').val(parseFloat(fee - discount))
    monthly = parseFloat(($('.fee').val() * 52 / 12) - $('#fee_discount').val()).toFixed(2);
    $('.monthly-fee').val(monthly)

})




// Print
$('.print-btn').on('click', function () {
    id = $(this).data('id');
    console.log(id);
    print_div = `#print-${id}`;
    html = $(print_div).html();
    $(print_div).printThis({
        importStyle: $(this).hasClass('importStyle')
    });
})
