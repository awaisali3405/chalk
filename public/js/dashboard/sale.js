$('#resource').on('change', function () {
    value = $(this).val();
    if (value) {
        $.ajax({
            method: 'GET',
            url: `/api/get/resource/data/${value}`,
            success: function (success) {
                $('#resource-quantity').html(success.data.quantity);
                $('#resource-rate').html(success.data.rate);
                console.log(success.data);
                $('#RRP').html(success.data.rrp);
            }
        }
        )
    }
})
