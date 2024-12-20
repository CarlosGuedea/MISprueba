<?php
    require_once 'vendor/autoload.php';
    header('Content-Type', 'application/json');

    // \Stripe\Stripe::setApiKey("sk_test_51MqelmDFy3xOvEs5V8OqgYFiwXT9JK5TG5YfJQJCy5F7fPOzElwFlWZ8zGQadPPGTVZuAfcsFUmbfKjghNRGuKkV00Jcl1k7oR");
    // $session = Stripe\Checkout\Session::create([]);

    $stripe = new Stripe\StripeClient("sk_test_51MrjrLBt6oMC655B0UpzyfXqjoIPtzHU3LydwQHsji8pzq2EkqEXINqTIu34t3zwCWQeti9zqNttJymZvxTTdnXa007bfBFVzx");
    $session = $stripe->checkout->sessions->create([
        "success_url" => "http://localhost:8080/success",
        "cancel_url" => "http://localhost:8080/cancel",
        "payment_method_types" => ['card','oxxo'],
        "mode" => "payment",
        "line_items" => [
            [
                "price_data" => [
                    "currency" => "mxn",
                    "product_data" => [
                        "name" => "Basic",
                        "description" => "Paquete Basic"
                    ],
                    "unit_amount" => 180000
                ],
                "quantity" => 1
            ]
        ]
    ]);

     echo json_encode($session);     
?>