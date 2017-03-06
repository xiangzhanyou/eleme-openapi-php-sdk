<?php

use ElemeOpenApi\Config\Config;

function convert_to_message($content)
{
    try {
        $content = json_decode($content);
        $message = array();
        $message["requestId"] = $content->requestId;
        $message["message"] = $content->message;
        $message["type"] = $content->type;
        $message["shopId"] = $content->shopId;
        $message["timestamp"] = $content->timestamp;
        $message["userId"] = $content->userId;
        $message["appId"] = $content->appId;
        $message["signature"] = $content->signature;
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