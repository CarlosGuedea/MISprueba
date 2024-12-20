<?php

class stripeController{

    public static function success(){
        include 'views/layouts/header.php';
        include 'views/compras/success.php';
    }

    public static function cancel(){
        include 'views/layouts/header.php';
        include 'views/compras/cancel.php';
    }

    public static function stripeBasic(){
        include 'middleware/stripe/stripe-basic.php';
    }

    public static function stripeStandard(){
        include 'middleware/stripe/stripe-standard.php';
    }

    public static function stripePremium(){
        include 'middleware/stripe/stripe-premium.php';
    }
}