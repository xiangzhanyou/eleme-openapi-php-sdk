<?php

namespace ElemeOpenApi\Api;

class ShopService extends RpcService
{

    /** 获取店铺信息
     * @param int $shop_id 店铺Id
     * @return mixed
     */
    public function get_shop($shop_id)
    {
        return $this->client->call("eleme.shop.getShop", array("shopId" => $shop_id));
    }

    /** 更新店铺信息
     * @param int $shop_id 店铺Id
     * @param mixed $property 店铺更新属性
     * @return mixed
     */
    public function update_shop($shop_id, $property)
    {
        return $this->client->call("eleme.shop.updateShop", array("shopId" => $shop_id, "property" => $property));
    }

}