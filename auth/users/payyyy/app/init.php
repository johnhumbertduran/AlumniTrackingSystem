<?php
// include("../bins/connections.php");
require_once 'vendor/autoload.php';
$stripe = [
	'pub_key' => 'pk_test_51KIeCiDMpco1oCBFwEBhCdicLQFvRz2nALSIJ8H3yd1GcRZppPuzccfrnMyjgjPmSUeZS9XCpQ3cWEuyz8epwcHt00rN5Exdsm',
	'pri_key' => 'sk_test_51KIeCiDMpco1oCBFEgbwph5v4SeGGNZtoIkdBRyygPgmCQkUF0P1NY0Jd19OyPksq6wfweoTA4Ux9XaLpBAx4WAO00SmCNTHhY'
];

Stripe_Charge::setApiKey($stripe['pri_key']);

?>