$('.quantity').on('change keyup', function () {
    rate = $('.rate').val()
    quantity = $('.quantity').val()

    $('.amount').val((rate * quantity).toFixed(0))
})
$('.is-discount-price').on('change', function () {
    is_discount_price = $(this).val();
    console.log(is_discount_price);
    if (is_discount_price == 1) {
        $('.symbol').html('£');
    } else {
        $('.symbol').html('%');

    }
})
$('.discount_purchase').add('.is-discount-price').add('.quantity').on('change keyup', function () {
    discount = parseFloat($(".discount_purchase").val());
    type = ($('input[class="is-discount-price"]:checked').val());
    price = parseFloat($('.amount').val());

    console.log(price, type, discount);
    if (type == 1) {

        amount = price - discount;
        $('.discounted_amount').val(amount)
    } else {
        amount = parseFloat(price - ((price / 100) * discount)).toFixed(2);
        console.log(amount);
        $('.discounted_amount').val(amount)

    }
})
