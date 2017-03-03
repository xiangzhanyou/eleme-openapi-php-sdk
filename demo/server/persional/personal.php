<?php

use ElemeOpenApi\Config\Config;
use ElemeOpenApi\Api\ShopService;
use ElemeOpenApi\OAuth\OAuthClient;

define("BASE_DIR", dirname(__FILE__) . "/../../../");
require BASE_DIR . "vendor/autoload.php";

$app_key = "JZhorhH7mJ";
$app_secret = "62c41b0a2f3612cd7a05296f8b564ccd";
$sandbox = true;

Config::init($app_key, $app_secret, $sandbox);

$client = new OAuthClient();
$token = $client->get_token_in_client_credentials();

$shop_service = new ShopService($token);

$shop_id = 150131529;
$shop = $shop_service->get_shop($shop_id);
var_dump($shop);