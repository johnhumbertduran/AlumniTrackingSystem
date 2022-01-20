<?php
require './vendor/autoload.php';
header('Content-Type', 'application/json');

    $stripe = new Stripe\StripeClient("sk_test_51KIeCiDMpco1oCBFEgbwph5v4SeGGNZtoIkdBRyygPgmCQkUF0P1NY0Jd19OyPksq6wfweoTA4Ux9XaLpBAx4WAO00SmCNTHhY");
    $session = $stripe->checkout->sessions->create([
        "success_url" => "http://localhost/alumnitrackingsystem/auth/users/success.php",
        "cancel_url" => "http://localhost/alumnitrackingsystem/auth/users/cancel.php",
        "payment_method_types" => ['card'],
        "mode" => 'payment',
        "line_items" => [
            [
                "price_data" =>[
                    "currency" =>"PHP",
                    "product_data" =>[
                        "name" => "Aklan Catholic College",
                        "description" => "Alumni Registration Fee"
                    ],
                    "unit_amount" => 5000 * 100
                ],
                "quantity" => 1
            ]
        ]
    ]);
        
    echo json_encode($session);

?>