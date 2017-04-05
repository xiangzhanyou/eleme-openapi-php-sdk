<?php

use ElemeOpenApi\Config\Config;

require BASE_DIR . "../vendor/autoload.php";

//此处需要填写对应的参数
$app_key = "";
$app_secret = "";
$sandbox = true;
$callback_url = "https://localhost:8000/callback.php";


Config::init($app_key, $app_secret, $sandbox);