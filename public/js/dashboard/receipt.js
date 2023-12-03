$(document).ready(function () {
    $("#balance-add").bind('click load', function () {
        checked = $(this).is(':checked');
        if (parseFloat($('#balance').val()) > 0) {

            if (checked) {
                balance = parseFloat($('#balance').val());
                actual = parseFloat($('#actual_amount').val());
                newBalance = parseFloat(balance - actual).toFixed(2);
                if (newBalance < 0) {
                    newBalance = 0;
                }
                $('#discount').attr('readonly', true).val(0);
                $('#late_fee').attr('readonly', true).val(0);
                $('#add-to-wallet').attr('readonly', true).val(0);

                $("#changePrice").html(newBalance);
                // console.log(typeof (balance), typeof (actual), balance < actual);
                if (balance <= actual) {
                    $('.pay_amount').attr('readonly', true).val(balance);
                } else {
                    $('.pay_amount').attr('readonly', true).val(actual);
                }
                $('#mode option[value=Wallet]').prop('selected', 'selected').change();
                $('#mode option[value=Wallet]').attr('disabled', false).change();
                $('#mode option[value=Cash]').attr('disabled', true).change();
                $('#mode option[value=Bank]').attr('disabled', true).change();
            } else {
                $("#changePrice").html(balance);
                $('#discount').attr('readonly', false).val(0);
                $('#late_fee').attr('readonly', false).val(0);
                $('#add-to-wallet').attr('readonly', false).val(0);
                $('.pay_amount').attr('readonly', false).val($('#actual_amount').val());
                $('#mode option[value=Cash]').prop('selected', 'selected').change();
                $('#mode option[value=Wallet]').attr('disabled', true).change();
                $('#mode option[value=Cash]').attr('disabled', false).change();
                $('#mode option[value=Bank]').attr('disabled', false).change();

            }
        }
    })
})

// end
