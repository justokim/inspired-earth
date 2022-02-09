<?php

require 'vendor/autoload.php';
\Stripe\Stripe::setApiKey('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');

$YOUR_DOMAIN = 'http://inspired.earth';
$total = $_POST["total"] * 100;
$order = $_POST["order"];
$quantity = $_POST["quantity"];
$tax = .05 * $total;
$percentage = $tax/100;
$arra = [];
$i = 0;
$arra_length=count($order);

while($i < $arra_length){
array_push($arra,[
  'price' => $order[$i],
  'quantity' => $quantity[$i],
]);
$i++;
};

// $stripe->taxRates->create(
//   [
//     'display_name' => 'Sales Tax',
    
//     'percentage' => 7.75,
//     'country' => 'US',
//     'state' => 'CA',
//     'jurisdiction' => 'US - CA',
//     'description' => 'CA Sales Tax',
//   ]
// );


$lineItemsArray = [];
foreach ($arra as $value) {
  array_push($lineItemsArray, [
    'price' => $value['price'],
    'quantity' => $value['quantity'],
    'tax_rates' => ['txr_1K3EweCmcuVIC7IPn9jmWWcF']
  ]);
};



try{

  $checkout_session = \Stripe\Checkout\Session::create([
    
    'payment_method_types' => [
      'card',
    ],
    // 'shipping_rates' => ['shr_1K3EvgCmcuVIC7IPIKIwlpqu'],
  
    // 'automatic_tax' => [
    //   'enabled' => true,
    // ],
  
    'shipping_address_collection' => [
      'allowed_countries' => ['US'],
    ],
    'line_items' => $lineItemsArray,
    'mode' => 'payment',
    'success_url' => 'http://inspired.earth',
    'cancel_url' => 'http://inspired.earth/cart.php',

  ]);
  

$transfer = \Stripe\Transfer::create([

  'amount' => $tax,
  'currency' => 'usd',
  'destination' => 'acct_1JgIvY2RbvHCYrTY'
  
]);
}

catch(Exception $e){
  echo 'Status is:' . $e->getHttpStatus() . '\n';
  echo 'Type is:' . $e->getError()->type . '\n';
  echo 'Code is:' . $e->getError()->code . '\n';
  // param is '' in this case
  echo 'Param is:' . $e->getError()->param . '\n';
  echo 'Message is:' . $e->getError()->message . '\n';

}






$url = "https://donatebid.ml/Update-Stripe";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);



$headers = array(
   "Accept: application/json",
   "Content-Type: application/json",
);


curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = <<<DATA
{
  "campaign_id": 1,
  "update_amount":  $percentage
}
DATA;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);

header('Content-Type: application/json');

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url); 
// header("Location: " . $transfer->url); 
?>