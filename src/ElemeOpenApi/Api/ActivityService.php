<?php

namespace ElemeOpenApi\Api;

/**
 * 活动服务
 */
class ActivityService extends RpcService
{

    /** 创建代金券活动
     * @param $create_info 创建代金券活动的结构体
     * @return mixed
     */
    public function create_coupon_activity($create_info)
    {
        return $this->client->call("eleme.activity.coupon.createCouponActivity", array("createInfo" => $create_info));
    }

    /** 向指定用户发放代金券
     * @param $shop_id 店铺Id
     * @param $coupon_activity_id 代金券活动Id
     * @param $mobiles 需要发放代金券的用户手机号列表
     * @return mixed
     */
    public function give_out_coupons($shop_id, $coupon_activity_id, $mobiles)
    {
        return $this->client->call("eleme.activity.coupon.giveOutCoupons", array("shopId" => $shop_id, "couponActivityId" => $coupon_activity_id, "mobiles" => $mobiles));
    }

    /** 分页查询店铺代金券活动信息
     * @param $shop_id 店铺Id
     * @param $coupon_activity_type 代金券活动类型
     * @param $activity_status 活动状态
     * @param $page_no 页码（第几页）
     * @param $page_size 每页数量
     * @return mixed
     */
    public function query_coupon_activities($shop_id, $coupon_activity_type, $activity_status, $page_no, $page_size)
    {
        return $this->client->call("eleme.activity.coupon.queryCouponActivities", array("shopId" => $shop_id, "couponActivityType" => $coupon_activity_type, "activityStatus" => $activity_status, "pageNo" => $page_no, "pageSize" => $page_size));
    }

    /** 分页查询店铺代金券领取详情
     * @param $shop_id 店铺Id
     * @param $coupon_activity_id 代金券活动Id
     * @param $coupon_status 代金券状态
     * @param $page_no 页码（第几页）
     * @param $page_size 每页数量
     * @return mixed
     */
    public function query_received_coupon_details($shop_id, $coupon_activity_id, $coupon_status, $page_no, $page_size)
    {
        return $this->client->call("eleme.activity.coupon.queryReceivedCouponDetails", array("shopId" => $shop_id, "couponActivityId" => $coupon_activity_id, "couponStatus" => $coupon_status, "pageNo" => $page_no, "pageSize" => $page_size));
    }

    /** 通过店铺_id查询该店铺被邀约的美食活动
     * @param $shop_id 店铺Id
     * @return mixed
     */
    public function query_invited_food_activities($shop_id)
    {
        return $this->client->call("eleme.activity.food.queryInvitedFoodActivities", array("shopId" => $shop_id));
    }

    /** 报名美食活动
     * @param $activity_id 活动Id
     * @param $activity_apply_info 活动报名信息
     * @return mixed
     */
    public function apply_food_activity($activity_id, $activity_apply_info)
    {
        return $this->client->call("eleme.activity.food.applyFoodActivity", array("activityId" => $activity_id, "activityApplyInfo" => $activity_apply_info));
    }

    /** 通过店铺_id和活动_id分页查询店铺已报名的美食活动
     * @param $activity_id 活动Id
     * @param $shop_id 店铺Id
     * @param $page_no 页码
     * @param $page_size 每页数量
     * @return mixed
     */
    public function query_food_activities($activity_id, $shop_id, $page_no, $page_size)
    {
        return $this->client->call("eleme.activity.food.queryFoodActivities", array("activityId" => $activity_id, "shopId" => $shop_id, "pageNo" => $page_no, "pageSize" => $page_size));
    }

    /** 修改美食活动的菜品库存
     * @param $activity_id 活动Id
     * @param $shop_id 店铺Id
     * @param $item_id 菜品Id
     * @param $stock 库存
     * @return mixed
     */
    public function update_food_activity_item_stock($activity_id, $shop_id, $item_id, $stock)
    {
        return $this->client->call("eleme.activity.food.updateFoodActivityItemStock", array("activityId" => $activity_id, "shopId" => $shop_id, "itemId" => $item_id, "stock" => $stock));
    }

    /** 取消参与了美食活动的菜品
     * @param $activity_id 活动Id
     * @param $shop_id 店铺Id
     * @param $item_id 菜品Id
     * @return mixed
     */
    public function offline_food_activity_item($activity_id, $shop_id, $item_id)
    {
        return $this->client->call("eleme.activity.food.offlineFoodActivityItem", array("activityId" => $activity_id, "shopId" => $shop_id, "itemId" => $item_id));
    }

    /** 作废店铺与美食活动的关联关系
     * @param $activity_id 活动Id
     * @param $shop_id 店铺Id
     * @return mixed
     */
    public function unbind_food_activity($activity_id, $shop_id)
    {
        return $this->client->call("eleme.activity.food.unbindFoodActivity", array("activityId" => $activity_id, "shopId" => $shop_id));
    }

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