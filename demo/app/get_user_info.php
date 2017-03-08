<?php

use ElemeOpenApi\Config\Config;
use ElemeOpenApi\OAuth\OAuthClient;
use ElemeOpenApi\Api\UserService;

define("BASE_DIR", dirname(__FILE__) . "/");
require BASE_DIR . "../../vendor/autoload.php";
require BASE_DIR . "util.php";

$app_key = "Eug5ftXrNY";
$app_secret = "5dffed6f3fadaf7cb6bea0f89233bfbaf3113b4b";
$sandbox = true;
Config::init($app_key, $app_secret, $sandbox);
Config::set_request_url("https://open-api-sandbox-shop.alpha.elenet.me");

$content = json_decode(file_get_contents("php://input"), true);

$user_id = $content["userId"];
$shop_id = $content["shopId"];

//查找有没有token记录
$token = get_token_by_user_id($user_id);

//无token记录，返回授权链接
if ($token == null) {
    $client = new OAuthClient();
    $callback_url = "http://localhost:8000/callback.php";
    $scope = "all";
    $state = create_uuid();
    echo json_encode(array("userId" => null, "OAuthUrl" => $client->get_auth_url($state, $scope, $callback_url), "shopName" => null));
    return;
}

//有token记录，返回商户信息
$user_service = new UserService($token);
$user = $user_service->get_user();

$shop_name = "";
foreach ($user->authorizedShops as $shop) {
    if ($shop->id == $shop_id) {
        $shop_name = $shop->name;
    }
}

echo json_encode(array("userId" => $user->userId, "OAuthUrl" => null, "shopInfo" => array("name" => $shop_name)));
return;
