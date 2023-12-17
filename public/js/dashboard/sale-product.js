$('.add-resource').on('click', function() {
    product = $('.product option:selected').text();
    product_id = $('.product').val();
    quantity = $('.quantity').val();
    rate = $('.rate').val();
    amount = $('.amount').val();
    console.log(product, quantity, rate, amount);
    if (product && quantity && rate && amount) {
        x = `<tr>
                            <td>
                                ${product}
                                <input type="hidden" name="product[]" value="${product_id}">
                                </td>
                                <td>
                                    ${quantity}
                                    <input type="hidden" name="quantity[]" value="${quantity}">
                                    </td>
                                    <td>£${rate}
                                        <input type="hidden" name="rate[]" value="${rate}">
                                        </td>
                                        <td>
                                            <input type="hidden" name="amount[]"  value="${amount}">
                                            £${amount}</td>

                            <td>

                                <a class="delete-resource" href="javascript:void(0);"><i class=" fa fa-close color-danger"></i></a>
                            </td>
                        </tr>
        `;

        $('.subject-resource').append(x);
    }




})

$('.subject-resource').on('click', '.delete-resource', function() {
    $(this).closest('tr').remove();
})
