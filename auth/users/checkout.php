<?php
session_start();
require './vendor/autoload.php';
header('Content-Type', 'application/json');
$totalAmount = $_SESSION["totalAmount"];

// echo $totalAmount;
    $stripe = new Stripe\StripeClient("sk_test_51KIeCiDMpco1oCBFEgbwph5v4SeGGNZtoIkdBRyygPgmCQkUF0P1NY0Jd19OyPksq6wfweoTA4Ux9XaLpBAx4WAO00SmCNTHhY");
    $session = $stripe->checkout->sessions->create([
        "success_url" => "http://localhost/alumnitrackingsystem/auth/users/success",
        "cancel_url" => "http://localhost/alumnitrackingsystem/auth/users/cancel",
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
                    "unit_amount" => $totalAmount * 100
                ],
                "quantity" => 1
            ]
        ]
    ]);
        
    echo json_encode($session);

?>