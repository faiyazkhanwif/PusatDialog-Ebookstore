<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Stripe API Configuration
| -------------------------------------------------------------------
|
| You will get the API keys from Developers panel of the Stripe account
| Login to Stripe account (https://dashboard.stripe.com/)
| and navigate to the Developers » API keys page
|
|  stripe_api_key        	string   Your Stripe API Secret key.
|  stripe_publishable_key	string   Your Stripe API Publishable key.
|  stripe_currency   		string   Currency code.
*/
$config['stripe_api_key']         = 'sk_test_51IVLmFFuOulQ6sAXSjSlq8Erz8k7NkOP31u5XAxwujJFQiFZway7d4Zyil9uws5MM3w3wjtjLnSqquvuBZwuFKcZ00o7jOXELG'; 
$config['stripe_publishable_key'] = 'pk_test_51IVLmFFuOulQ6sAX4qgpzlcdunIPj9aQQWyQEovrVWD5GNvGwgi8iRFoCpbjI6yzcL3yz4tYH9SIo5KrFLnkSfBK00pRmoIyON'; 
$config['stripe_currency']        = 'myr';