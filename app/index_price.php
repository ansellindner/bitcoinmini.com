<?php
function getData($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,$url);

	$response=curl_exec($ch);
	curl_close($ch);
	return json_decode($response,true);
};
$data = getData('http://theindex.io/api/');
$_SESSION['index_price'] = $data['btc_usd'];
