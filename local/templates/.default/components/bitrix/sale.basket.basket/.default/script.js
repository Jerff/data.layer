if (_.data('action') == 'add') {
    var item = $('#QUANTITY_' + _.data('id'));
    dataLayerCustom.addToCart(item.data('product-id'), item.val());
} else {
    var item = $('#QUANTITY_INPUT_' + _.data('id'));
    dataLayerCustom.removeFromCart(item.data('product-id'), item.val());
}