<?php 

$apiKey = 'API_KEY';
$_POST['card_no'] = '4242 4242 4242 4242';
$curl = curl_init();
curl_setopt_array($curl, [
  CURLOPT_RETURNTRANSFER => 1,
  CURLOPT_URL => "https://api.stripe.com/v1/payment_intents",
  CURLOPT_POST => 1,
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer " . $apiKey
  ],
  CURLOPT_POSTFIELDS => http_build_query([
    "amount" => 6900,
    "currency" => 'usd',
    "payment_method_types"=>array('card')
  ])
]);
$resp = curl_exec($curl);
curl_close($curl);
if($resp){
  $response =  json_decode($resp);
  print_r($resp);
  die;
}