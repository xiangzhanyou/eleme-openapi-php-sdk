<?php

namespace ElemeOpenApi\OAuth;

use ElemeOpenApi\Config\Config;
use ElemeOpenApi\Exception\IllegalRequestException;
use Exception;

class OAuthClient
{
    private $client_id;
    private $secret;
    private $token_url;
    private $authorize_url;

    public function __construct()
    {
        if (Config::get_is_init() == false)
            throw new Exception("Config should init");
        $this->client_id = Config::get_app_key();
        $this->secret = Config::get_app_secret();
        $this->token_url = Config::get_request_url() . "/token";
        $this->authorize_url = Config::get_request_url() . "/authorize";
    }

    public function get_token_in_client_credentials()
    {
        $body = array(
            "grant_type" => "client_credentials"
        );
        $response = $this->request($body);
        return $response;
    }

    public function get_auth_url($state, $scope, $callback_url)
    {
        $url = $this->authorize_url;
        $response_type = "code";
        $client_id = $this->client_id;
        $callback = $callback_url;
        return $url . "?response_type=" . $response_type . "&client_id=" . $client_id . "&state=" . $state . "&redirect_uri=" . $callback . "&scope=" . $scope;
    }

    public function get_token_by_code($code, $callback_url)
    {
        $body = array(
            "grant_type" => "authorization_code",
            "code" => $code,
            "redirect_uri" => $callback_url,
            "client_id" => $this->client_id
        );
        $response = $this->request($body);
        return $response;
    }

    public function get_token_by_refresh_token($refresh_token, $scope)
    {
        $body = array(
            "grant_type" => "refresh_token",
            "refresh_token" => $refresh_token,
            "scope" => $scope
        );
        $response = $this->request($body);
        return $response;
    }

    private function get_headers()
    {
        return array(
            "Authorization: Basic " . base64_encode(urlencode($this->client_id) . ":" . urlencode($this->secret)),
            "Content-Type: application/x-www-form-urlencoded; charset=utf-8",
            "Accept-Encoding: gzip");
    }

    private function request($body)
    {
        $log = Config::getLog();
        if ($log != null) {
            $log->info("request data: " . json_encode($body));
        }

        $ch = curl_init($this->token_url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->get_headers());
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($body));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        $request_response = curl_exec($ch);
        if (curl_errno($ch)) {
            if ($log != null) {
                $log->error("error: " . curl_error($ch));
            }
            throw new Exception(curl_error($ch));
        }
        $response = json_decode($request_response);
        if (is_null($response)) {
            throw new Exception("illegal response :" . $request_response);
        }
        if (isset($response->error)) {
            throw new IllegalRequestException($response->error);
        }

        if ($log != null) {
            $log->info("response: " . $response);
        }
        return $response;
    }
}

