<?php

use ElemeOpenApi\Api\OrderService;
use ElemeOpenApi\Config\Config;
use ElemeOpenApi\OAuth\OAuthClient;

define("BASE_DIR", dirname(__FILE__) . "/");
require BASE_DIR . "../../vendor/autoload.php";
include BASE_DIR . "util.php";

$app_key = "";
$app_secret = "";
$sandbox = true;
Config::init($app_key, $app_secret, $sandbox);

$content = file_get_contents("php://input");

$response = array("message" => "ok");
if ($content == null) {
    echo json_encode($response);
    return;
}

//转换message
$message = convert_to_message($content);

//校验签名
$result = check_signature($message);
if ($result == false) {
    throw new Exception("invalid signature");
}

//接单操作
if ($message["type"] == 10) {

    //实际使用时，应该取已经存储的token，不要每次获取新的token
    $client = new OAuthClient();
    $token = $client->get_token_in_client_credentials();

    $order_service = new OrderService($token);
    $order = json_decode($message["message"]);
    $order_service->confirm_order($order->id);
}

echo json_encode($response);

