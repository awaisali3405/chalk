$(document).ready(function () {
    $("#cash-balance-add").on('click', function () {
        checked = $("#cash-balance-add").is(':checked');
        console.log(checked)
        if (checked) {
            $('#bank-balance-add').prop('checked', false);
            $("#changePrice-bank").html($('#bank-balance').val());
            console.log($('#bank-balance-add').is(":checked"))
        }
        if (parseFloat($('#cash-balance').val()) > 0) {
            if (checked) {
                balance = parseFloat($('#cash-balance').val());
                actual = parseFloat($('#actual_amount').val());
                newBalance = parseFloat(balance - actual).toFixed(2);
                if (newBalance < 0) {
                    newBalance = 0;
                }
                $('#discount').attr('readonly', true).val(0);
                $('#late_fee').attr('readonly', true).val(0);
                $('#add-to-wallet').attr('readonly', true).val(0);
                $("#changePrice-cash").html(newBalance);
                if (balance <= actual) {
                    $('.pay_amount').attr('readonly', true).val(balance);
                } else {
                    $('.pay_amount').attr('readonly', true).val(actual);
                }
                $('#mode option[value="Cash_Wallet"]').prop('selected', 'selected').change();
                $('#mode option[value="Cash_Wallet"]').attr('disabled', false).change();
                $('#mode option[value="Bank_Wallet"]').attr('disabled', true).change();
                $('#mode option[value=Cash]').attr('disabled', true).change();
                $('#mode option[value=Bank]').attr('disabled', true).change();
            } else {
                $("#changePrice-cash").html(balance);
                $('#discount').attr('readonly', false).val(0);
                $('#late_fee').attr('readonly', false).val(0);
                $('#add-to-wallet').attr('readonly', false).val(0);
                $('.pay_amount').attr('readonly', false).val($('#actual_amount').val());
                $('#mode option[value=Cash]').prop('selected', 'selected').change();
                $('#mode option[value="Cash_Wallet"]').attr('disabled', true).change();
                $('#mode option[value="Bank_Wallet"]').attr('disabled', true).change();
                $('#mode option[value=Cash]').attr('disabled', false).change();
                $('#mode option[value=Bank]').attr('disabled', false).change();

            }
        }
    })



    $("#bank-balance-add").on('click', function () {
        checked = $("#bank-balance-add").is(':checked');
        if (checked) {
            $('#cash-balance-add').prop('checked', false);
            $("#changePrice-cash").html($('#cash-balance').val());
        }
        if (parseFloat($('#bank-balance').val()) > 0) {

            if (checked) {
                balance = parseFloat($('#bank-balance').val());
                actual = parseFloat($('#actual_amount').val());
                newBalance = parseFloat(balance - actual).toFixed(2);
                if (newBalance < 0) {
                    newBalance = 0;
                }
                $('#discount').attr('readonly', true).val(0);
                $('#late_fee').attr('readonly', true).val(0);
                $('#add-to-wallet').attr('readonly', true).val(0);

                $("#changePrice-bank").html(newBalance);
                // console.log(typeof (balance), typeof (actual), balance < actual);
                if (balance <= actual) {
                    $('.pay_amount').attr('readonly', true).val(balance);
                } else {
                    $('.pay_amount').attr('readonly', true).val(actual);
                }
                $('#mode option[value="Bank_Wallet"]').prop('selected', 'selected').change();
                $('#mode option[value="Bank_Wallet"]').attr('disabled', false).change();
                $('#mode option[value="Cash_Wallet"]').attr('disabled', true).change();
                $('#mode option[value=Cash]').attr('disabled', true).change();
                $('#mode option[value=Bank]').attr('disabled', true).change();
            } else {
                $("#changePrice-bank").html(balance);
                $('#discount').attr('readonly', false).val(0);
                $('#late_fee').attr('readonly', false).val(0);
                $('#add-to-wallet').attr('readonly', false).val(0);
                $('.pay_amount').attr('readonly', false).val($('#actual_amount').val());
                $('#mode option[value=Cash]').prop('selected', 'selected').change();
                $('#mode option[value="Cash_Wallet"]').attr('disabled', true).change();
                $('#mode option[value="Bank_Wallet"]').attr('disabled', true).change();
                $('#mode option[value=Cash]').attr('disabled', false).change();
                $('#mode option[value=Bank]').attr('disabled', false).change();

            }
        }
    })
    $('#credit-note-add').on('click', function () {
        checked = $(this).is(":checked");
        if (checked) {
            $('#credit-note-check').val(1);
            $('#credit-note-html').html('0')
            $('#discount').attr('readonly', true).val($('#credit-note-amount').val());
            $('.pay_amount').val($('.pay_amount').val() - $('#discount').val());
        } else {
            $('#credit-note-check').val(0);
            $('#credit-note-html').html($('#credit-note-amount').val())
            $('.pay_amount').val(parseFloat($('.pay_amount').val()) + parseFloat($('#discount').val()));
            $('#discount').attr('readonly', false).val(0);

        }
    });
})
// end
