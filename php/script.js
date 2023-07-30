
$(document).ready(function() {
    // Increase quantity
    $('.increase-btn').click(function() {
        var cakeId = $(this).closest('.cart-items').find('.quantity-input').attr('id').split('-')[1];
        var quantityInput = $(this).closest('.cart-items').find('.quantity-input');
        var currentQuantity = parseInt(quantityInput.val());
        quantityInput.val(currentQuantity + 1);
    });

    // Decrease quantity
    $('.decrease-btn').click(function() {
        var cakeId = $(this).closest('.cart-items').find('.quantity-input').attr('id').split('-')[1];
        var quantityInput = $(this).closest('.cart-items').find('.quantity-input');
        var currentQuantity = parseInt(quantityInput.val());
        if (currentQuantity > 1) {
            quantityInput.val(currentQuantity - 1);
        }
    });
});
