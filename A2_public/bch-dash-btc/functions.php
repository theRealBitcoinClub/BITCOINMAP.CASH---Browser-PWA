<?php



function formatPrice ($p) {
  $maxlength = 5;
    if (strpos($p,".") == 1){
      $maxlength = 4;
    }
  $ret_price = substr($p,0,$maxlength);
  return "$ret_price EUR";
}

function printTX($START_INDEX,$TX_COUNT) {
$marketValue = getCurrentMarketValue();
$array = getTransactions();
for ($i=$START_INDEX; $i < $TX_COUNT; $i++) {
    $value = getTransactionValue1($array[$i]);
    $value2 = getTransactionValue2($array[$i]);
  //echo "v: $value</br>";
  $timeTx = getTransactionTimeInMillis($array[$i]);
  $date = date('H:i - jS F',$timeTx);
  //echo "mv: $marketValue v: $value</br>";
  $price_in_eur = $marketValue * $value;
  $price_in_eur2 = $marketValue * $value2;

  if ($price_in_eur > $price_in_eur2) {
    $bigger_price = $price_in_eur;
    $switchPrices = $price_in_eur2;
    $price_in_eur2 = $bigger_price;
    $price_in_eur = $switchPrices;
  }
  //echo "p: $price_in_eur</br>";
  $price_in_eur = formatPrice($price_in_eur);
  $price_in_eur2 = formatPrice($price_in_eur2);
  echo "<h1>$price_in_eur / $price_in_eur2</h1>";
  echo "<h2>$date</h2>";
  echo "<hr>";
}
}

function formatValue($saldo_eur) {
  $pos = strpos($saldo_eur, ".");
  //echo "pos:$pos";
  $saldo_eur_formatted = substr($saldo_eur, 0, $pos + 3);
  return $saldo_eur_formatted;
}

function getTransactionTimeInMillis($txId) {
  $url_get_tx_details_prefix = buildDetailsUrl($txId);
  $details = getHtml($url_get_tx_details_prefix);
  //echo "$details";
  $pos = strpos($details,"\"time\":") + 7;
  $value = substr($details,$pos,10);
  return $value;
}

function getValue($data, $offset) {
    $preSaldoEnd = strpos($data,"<span class='muteds'>", $offset);
    $preSaldoStart = $preSaldoEnd - 4;
    $length = $preSaldoEnd - $preSaldoStart;
    $preSaldo = substr($data,$preSaldoStart,$length);
    $offsetFirst = $preSaldoEnd + 21;
    $offsetEnd = strpos($data,"span> BCH", $offset);
    $length = $offsetEnd - $offsetFirst;
    //echo "of:$offsetFirst</br>";
    $firstValue = substr($data,$offsetFirst,$length);
    //echo "f:$firstValue</br>";
    return "$preSaldo$firstValue";
}

function getTransactionValue1($txId) {
  $url_get_tx_details_prefix = buildDetailsUrl($txId);
  //echo "</br>$url_get_tx_details_prefix";
  $details = getHtml($url_get_tx_details_prefix);
  //echo "</br>$details</br>";
    $offsetFirst = strpos($details,"vout\":[{\"value\":\"") + 17;
    //echo "of:$offsetFirst</br>";
    $firstValue = substr($details,$offsetFirst,10);
    //echo "f:$firstValue</br>";
    $highestValue = (float) $firstValue;

  //echo "return:$highestValue</br>";

  return $highestValue;
}

function getTransactionValue2($txId) {
  $url_get_tx_details_prefix = buildDetailsUrl($txId);
  //echo "</br>$url_get_tx_details_prefix";
  $details = getHtml($url_get_tx_details_prefix);
  //echo "</br>$details</br>";
    //$offsetOther = strpos($details,"vout\":[{\"value\":\"") + 17;
    //$offsetOther = strpos($details,"valueIn") + 17;
    $offsetFirst = strpos($details,",{\"value\":\"") + 11;
    //$offsetFirst = strpos($details,"valueOut\":") + 10;
    //echo "2of:$offsetFirst</br>";
    $firstValue = substr($details,$offsetFirst,10);
    //echo "2f:$firstValue</br>";
    $highestValue = (float) $firstValue;

//echo "2sreturn:$highestValue</br>";

  return $highestValue;
}

function buildDetailsUrl($txId) {
  $url_get_tx_details_prefix = 'https://bch-insight.bitpay.com/api/tx/';
  $url_get_tx_details_prefix .= $txId;
  return $url_get_tx_details_prefix;
}

function getTransactions() {
  $url_get_txs = 'https://bitcoincash.blockexplorer.com/api/addr/1Pa4dfgrc1X34bLxWwA1y986yQBEpo4YtN';

  $str = getHtml($url_get_txs);
  //echo ":$str";
  //$array = preg_split ('/$\R?^/m', $str); SPLIT BY LINE
  $startTxNumber = strpos($str,"transactions") + 15;
  //echo "number:$startTxNumber";
  $array =substr($str,$startTxNumber,1500);
  $array = str_getcsv ($array, ",");
 return $array;
}

function get_url_contents($url){
        $crl = curl_init();
        $timeout = 5;
        curl_setopt ($crl, CURLOPT_URL,$url);
        curl_setopt ($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
        $ret = curl_exec($crl);
        curl_close($crl);
        return $ret;
}

function getHtml($url, $post = null) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    if(!empty($post)) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}


  function getCurrentMarketValue() {
    $url_market = "https://www.bitstamp.net/api/v2/ticker/bcheur/";
    $market = getHtml($url_market);
    $start = strpos($market, "last") + 8;
    $market_value_in_eur = substr($market,$start, 6);
    return $market_value_in_eur;
  } ?>
