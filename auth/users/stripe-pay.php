<?php
require_once 'app/init.php';

$totalAmount = intval($_POST["totalamount"]);
$token = "pk_test_51KIeCiDMpco1oCBFwEBhCdicLQFvRz2nALSIJ8H3yd1GcRZppPuzccfrnMyjgjPmSUeZS9XCpQ3cWEuyz8epwcHt00rN5Exdsm";

Stripe_Charge::create([
    "amount"=>$total,
    "currency"=>"php",
    "card"=>$token,
    "description"=>"Online pay acc"
]);

exit();


?>