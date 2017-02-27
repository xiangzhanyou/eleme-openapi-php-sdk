<?php

class ShopService extends AltaService
{

    public function getShop($shop_id)
    {
        return $this->client->call("eleme.shop.getShop", array("shopId" => $shop_id));
    }

    public function updateShop($shop_id, $properties)
    {
        return $this->client->call("eleme.shop.updateShop", array("shopId" => $shop_id, "properties" => $properties));
    }

}