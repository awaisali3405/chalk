$(document).ready(function () {
    $("#balance-add").bind('click load', function () {
        checked = $(this).is(':checked');
        if (checked) {
            balance = parseFloat($('#balance').val());
            actual = parseFloat($('#actual_amount').val());
            $('#discount').attr('readonly', true).val(0);
            $('#late_fee').attr('readonly', true).val(0);
            $('#add-to-wallet').attr('readonly', true).val(0);
            console.log(typeof (balance), typeof (actual), balance < actual);
            if (balance <= actual) {

                $('.pay_amount').attr('readonly', true).val(balance);
            } else {
                $('.pay_amount').attr('readonly', true).val(actual);

            }
            $('#mode option[value=Wallet]').prop('selected', 'selected').change();
            $('#mode option[value=Cash]').attr('disabled', true).change();
            $('#mode option[value=Bank]').attr('disabled', true).change();
        } else {
            $('#discount').attr('readonly', false).val(0);
            $('#late_fee').attr('readonly', false).val(0);
            $('#add-to-wallet').attr('readonly', false).val(0);
            $('.pay_amount').attr('readonly', false).val($('#actual_amount').val());
            $('#mode option[value=Cash]').prop('selected', 'selected').change();
            $('#mode option[value=Cash]').attr('disabled', false).change();
            $('#mode option[value=Bank]').attr('disabled', false).change();

        }
    })
})

// end
