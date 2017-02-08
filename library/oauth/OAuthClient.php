<?php

class OAuthClient
{
    private $client_id;
    private $secret;
    private $callback_url;
    private $token_url;
    private $authorize_url;

    public function __construct($app_key, $secret, $callback_url)
    {
        $this->client_id = $app_key;
        $this->secret = $secret;
        $this->callback_url = $callback_url;
        $this->token_url = ACCESS_TOKEN_URL;
        $this->authorize_url = AUTHORIZE_TOKEN_URL;

        if (is_null($app_key) || is_null($secret) || is_null($callback_url)) {
            throw new InvalidArgumentException("invalid initialize arguments.");
        }
        if ($app_key == "" || $secret == "" || $callback_url == "") {
            throw new InvalidArgumentException("invalid initialize arguments.");
        }
    }

    public function get_token_in_client_credentials(){
        $body = array(
            "grant_type" => "client_credentials"
        );
        $response = $this->request($body);
        return $response;
    }

    public function get_auth_url($state, $scope)
    {
        $url = $this->authorize_url;
        $response_type = "code";
        $client_id = $this->client_id;
        $callback = urlencode($this->callback_url);
        return $url . "?response_type=" . $response_type . "&client_id=" . $client_id . "&state=" . $state . "&redirect_uri=" . $callback . "&scope=" . $scope;
    }

    public function get_token_by_code($code)
    {
        $body = array(
            "grant_type" => "authorization_code",
            "code" => $code,
            "redirect_uri" => $this->callback_url,
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
            "Content-Type: application/x-www-form-urlencoded; charset=utf-8");
    }

    private function request($body)
    {
        $ch = curl_init($this->token_url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->get_headers());
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($body));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $request_response = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new Exception(curl_error($ch));
        }
        $response = json_decode($request_response);
        if (is_null($response)) {
            throw new Exception("illegal response :" . $request_response);
        }
        if (isset($response->error)) {
            throw new IllegalRequestException($response->error);
        }
        return $response;
    }

    public function set_token_url($token_url)
    {
        $this->token_url = $token_url;
    }

    public function set_authorize_url($authorize_url)
    {
        $this->authorize_url = $authorize_url;
    }

}

