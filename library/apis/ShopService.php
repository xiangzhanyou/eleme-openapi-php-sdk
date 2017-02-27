<?php

class ShopService extends AltaService
{

    public function get_shop($shop_id)
    {
        return $this->client->call("eleme.shop.getShop", array("shopId" => $shop_id));
    }

    public function update_shop($shop_id, $properties)
    {
        return $this->client->call("eleme.shop.updateShop", array("shopId" => $shop_id, "properties" => $properties));
    }

}