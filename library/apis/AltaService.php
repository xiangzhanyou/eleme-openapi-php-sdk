<?php

class AltaService
{
    protected $client;

    public function __construct($token)
    {
        $this->client = new RpcClient($token);
    }

    public function set_sharding_key_by_order_id($order_id)
    {
        $this->client->setShardingKey("eosid=" . $order_id);
    }

    public function set_sharding_key_by_shop_id($shop_id)
    {
        $this->client->setShardingKey("shopid=" . $shop_id);
    }
}