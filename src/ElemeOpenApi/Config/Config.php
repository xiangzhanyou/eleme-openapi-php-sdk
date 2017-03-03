<?php

namespace ElemeOpenApi\Config;

use InvalidArgumentException;

class Config
{
    static private $app_key;
    static private $app_secret;
    static private $sandbox;

    static private $request_url;

    static private $log;

    static private $is_init = false;

    static private $default_request_url = "https://open-api.shop.ele.me";
    static private $default_sandbox_request_url = "https://open-api-sandbox.shop.ele.me";

    static public function init($app_key, $app_secret, $sandbox)
    {
        if ($sandbox == false) {
            Config::$request_url = Config::$default_request_url;
        } elseif ($sandbox == true) {
            Config::$request_url = Config::$default_sandbox_request_url;
        } else {
            throw new InvalidArgumentException("the type of sandbox should be a boolean");
        }

        if ($app_key == null || $app_key == "") {
            throw new InvalidArgumentException("app_key is required");
        }

        if ($app_secret == null || $app_secret == "") {
            throw new InvalidArgumentException("app_secret is required");
        }

        Config::$app_key = $app_key;
        Config::$app_secret = $app_secret;
        Config::$sandbox = $sandbox;
        Config::$is_init = true;
    }

    static public function get_is_init()
    {
        return Config::$is_init;
    }

    static public function get_app_key()
    {
        return Config::$app_key;
    }

    static public function get_app_secret()
    {
        return Config::$app_secret;
    }

    static public function get_request_url()
    {
        return Config::$request_url;
    }

    static public function set_request_url($request_url)
    {
        Config::$request_url = $request_url;
    }

    public static function getLog()
    {
        return self::$log;
    }

    public static function setLog($log)
    {
        if (!method_exists($log, "info")) {
            throw new InvalidArgumentException("logger need have method 'info(\$message)'");
        }
        if (!method_exists($log, "error")) {
            throw new InvalidArgumentException("logger need have method 'error(\$message)'");
        }
        self::$log = $log;
    }
}