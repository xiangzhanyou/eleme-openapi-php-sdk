<?php

use ElemeOpenApi\Config\Config;

function convert_to_message($content)
{
    try {
        $message = json_decode($content, true);
    } catch (Exception $e) {
        throw new Exception("convert content to message error.");
    }
    return $message;
}

function check_signature($message)
{
    $params = $message;
    $signature = $message["signature"];
    unset($params["signature"]);
    if ($signature != get_signature($params, Config::get_app_secret())) {
        return false;
    }
    return true;
}

function get_signature(array $param, $secret)
{
    ksort($param);
    $string = "";
    foreach ($param as $key => $value) {
        $string .= $key . "=" . $value;
    }
    $splice = $string . $secret;
    $md5 = strtoupper(md5($splice));
    return $md5;
}