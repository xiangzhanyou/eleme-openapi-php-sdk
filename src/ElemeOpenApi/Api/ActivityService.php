<?php

namespace ElemeOpenApi\Api;

/**
 * 活动服务
 */
class ActivityService extends RpcService
{

    /** 查询店铺邀约活动信息
     * @param $shop_id 店铺Id
     * @return mixed
     */
    public function get_invited_activity_infos($shop_id)
    {
        return $this->client->call("eleme.activity.flash.getInvitedActivityInfos", array("shopId" => $shop_id));
    }

    /** 报名限量抢购活动
     * @param $activity_id 活动Id
     * @param $activity_apply_info 活动报名信息
     * @return mixed
     */
    public function apply_flash_activity($activity_id, $activity_apply_info)
    {
        return $this->client->call("eleme.activity.flash.applyFlashActivity", array("activityId" => $activity_id, "activityApplyInfo" => $activity_apply_info));
    }

    /** 通过店铺_id和活动_id分页查询报名详情
     * @param $activity_id 活动Id
     * @param $shop_id 店铺Id
     * @param $page_no 页码
     * @param $page_size 每页数量
     * @return mixed
     */
    public function get_activity_apply_infos($activity_id, $shop_id, $page_no, $page_size)
    {
        return $this->client->call("eleme.activity.flash.getActivityApplyInfos", array("activityId" => $activity_id, "shopId" => $shop_id, "pageNo" => $page_no, "pageSize" => $page_size));
    }

    /** 修改活动菜品库存
     * @param $activity_id 活动Id
     * @param $shop_id 店铺Id
     * @param $item_id 菜品Id
     * @param $stock 库存
     * @return mixed
     */
    public function update_activity_item_stock($activity_id, $shop_id, $item_id, $stock)
    {
        return $this->client->call("eleme.activity.flash.updateActivityItemStock", array("activityId" => $activity_id, "shopId" => $shop_id, "itemId" => $item_id, "stock" => $stock));
    }

    /** 取消活动菜品
     * @param $activity_id 活动Id
     * @param $shop_id 店铺Id
     * @param $item_id 菜品Id
     * @return mixed
     */
    public function offline_flash_activity_item($activity_id, $shop_id, $item_id)
    {
        return $this->client->call("eleme.activity.flash.offlineFlashActivityItem", array("activityId" => $activity_id, "shopId" => $shop_id, "itemId" => $item_id));
    }

    /** 作废店铺与活动的关联关系
     * @param $activity_id 活动Id
     * @param $shop_id 店铺Id
     * @return mixed
     */
    public function invalid_shop_activity($activity_id, $shop_id)
    {
        return $this->client->call("eleme.activity.flash.invalidShopActivity", array("activityId" => $activity_id, "shopId" => $shop_id));
    }

}