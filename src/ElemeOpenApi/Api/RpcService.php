<?php

namespace ElemeOpenApi\Api;

use ElemeOpenApi\Protocol\RpcClient;

class RpcService
{
    protected $client;

    public function __construct($token)
    {
        $this->client = new RpcClient($token);
    }
}