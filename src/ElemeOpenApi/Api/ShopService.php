<?php

namespace ElemeOpenApi\Api;

/**
 * 店铺服务
 */
class ShopService extends RpcService
{

    /** 查询店铺信息
     * @param $shop_id 店铺Id
     * @return mixed
     */
    public function get_shop($shop_id)
    {
        return $this->client->call("eleme.shop.getShop", array("shopId" => $shop_id));
    }

    /** 更新店铺基本信息
     * @param $shop_id 店铺Id
     * @param $properties 店铺属性
     * @return mixed
     */
    public function update_shop($shop_id, $properties)
    {
        return $this->client->call("eleme.shop.updateShop", array("shopId" => $shop_id, "properties" => $properties));
    }

    /** 批量获取店铺简要
     * @param $shop_ids 店铺Id的列表
     * @return mixed
     */
    public function mget_shop_status($shop_ids)
    {
        return $this->client->call("eleme.shop.mgetShopStatus", array("shopIds" => $shop_ids));
    }

}