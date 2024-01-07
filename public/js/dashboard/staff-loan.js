
$('#staff_branch').on('change keyup', function () {
    branch = $(this).val();
    // alert(branch);
    console.log(branch);
    $.ajax({
        method: "GET",
        url: `/api/get/staff/${branch}`,
        success: function (success) {
            $('#staff').html(success.html);
            console.log(success.html);
        }
    })
})

$('#amount').add('#partition').on('change keyup ready', function () {
    amount = $('#amount').val() == '' ? 0 : $('#amount').val();
    patition = $("#partition").val() == '' ? 0 : $("#partition").val();
    console.log(amount, patition);
    total = parseFloat(amount / patition).toFixed(2);

    $('#installment').val(total);
});
