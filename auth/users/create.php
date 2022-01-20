<?php

require 'vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_51KIeCiDMpco1oCBFEgbwph5v4SeGGNZtoIkdBRyygPgmCQkUF0P1NY0Jd19OyPksq6wfweoTA4Ux9XaLpBAx4WAO00SmCNTHhY');

// Create a PaymentIntent with amount and currency
    $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => calculateOrderAmount($jsonObj->items),
        'currency' => 'eur',
        'automatic_payment_methods' => [
            'enabled' => true,
        ],
    ]);

    $output = [
        'clientSecret' => $paymentIntent->client_secret,
    ];


?>