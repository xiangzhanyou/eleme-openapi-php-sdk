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

    $client = new OAuthClient();

    //实际使用时，需要将token存储下来，不要每次都调用
    $token = $client->get_token_in_client_credentials();

    $order_service = new OrderService($token);
    $order = json_decode($message["message"]);
    $order_service->confirm_order($order->id);
}

echo json_encode($response);

