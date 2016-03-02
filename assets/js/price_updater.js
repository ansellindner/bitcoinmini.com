$( document ).ready(function() {

	var indexExchRate    = <?= $_SESSION['index_price']; ?>;
	var priceA           = '179';
	var priceB 			 = '139';
	var total            = <?= intval($_SESSION['order_info']['number']); ?> * priceA;
	var itemPriceBtc     = (priceA / indexExchRate).toFixed(4);
	var purchasePriceBtc = (total / indexExchRate).toFixed(4);
	$('#total').html(total);
	$('#itemPrice').html(itemPriceBtc);
	$('#purchasePrice').html(purchasePriceBtc);
	$('input[name=orderPrice]').val(purchasePriceBtc);

});
