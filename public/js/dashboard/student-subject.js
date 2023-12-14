$('#rate').on('keyup', function() {
    let rate = parseFloat($('#rate').val()).toFixed(2) || 0;
    let hours = parseFloat($('#hours').val()).toFixed(2) || 0;
    $('#amount').val(rate * hours);
})
$('#hours').on('keyup', function() {
    let rate = parseFloat($('#rate').val()).toFixed(2) || 0;
    let hours = parseFloat($('#hours').val()).toFixed(2) || 0;
    $('#amount').val(rate * hours);
})
