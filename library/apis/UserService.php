<?php

class UserService
{
    private $client;

    public function __construct($token)
    {
        $this->client = new RpcClient($token);
    }

    public function get_user()
    {
        return $this->client->call("eleme.user.getUser", array());
    }
}