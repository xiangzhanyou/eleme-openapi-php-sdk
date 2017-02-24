<?php

class ShopService extends AltaService
{
    public function get_shop($shopId)
    {
        return $this->client->call("eleme.shop.getShop", array("shopId" => $shopId));
    }
}