<?php
// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey('sk_test_xeNEHzKOjq0xzSSmndjjLXuq00E15lsA3G');

$session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'name' => 'T-shirt',
    'description' => 'Comfortable cotton t-shirt',
    'images' => ['https://example.com/t-shirt.png'],
    'amount' => 500,
    'currency' => 'usd',
    'quantity' => 1,
  ]],
  'success_url' => 'https://example.com/success?session_id={CHECKOUT_SESSION_ID}',
  'cancel_url' => 'https://example.com/cancel',
]);

?>