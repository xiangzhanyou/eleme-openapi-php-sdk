<?php

namespace ElemeOpenApi\Api;

/**
 * 门店装修服务
 */
class DecorationService extends RpcService
{

    /** 连锁店总店创建橱窗
     * @param $window 新增的橱窗信息和其关联连锁店子店I和子店商品
     * @return mixed
     */
    public function create_window($window)
    {
        return $this->client->call("eleme.decoration.windows.createWindow", array("window" => $window));
    }

    /** 连锁店总店修改橱窗
     * @param $window 修改的橱窗信息和其关联连锁店子店ID和子店商品
     * @return mixed
     */
    public function update_window($window)
    {
        return $this->client->call("eleme.decoration.windows.updateWindow", array("window" => $window));
    }

    /** 连锁店总店删除橱窗
     * @param $window 删除橱窗信息
     * @return mixed
     */
    public function delete_window($window)
    {
        return $this->client->call("eleme.decoration.windows.deleteWindow", array("window" => $window));
    }

    /** 连锁店总店对多个橱窗进行排序
     * @param $window 橱窗排序信息
     * @return mixed
     */
    public function order_window($window)
    {
        return $this->client->call("eleme.decoration.windows.orderWindow", array("window" => $window));
    }

    /** 连锁店总店根据橱窗_i_d获取橱窗详情
     * @param $burst_window_id 橱窗ID
     * @return mixed
     */
    public function get_window_by_id($burst_window_id)
    {
        return $this->client->call("eleme.decoration.windows.getWindowById", array("burstWindowId" => $burst_window_id));
    }

    /** 连锁店总店获取橱窗信息集合
     * @param $operate_shop_id 连锁店总店ID
     * @return mixed
     */
    public function get_window_by_shop_id($operate_shop_id)
    {
        return $this->client->call("eleme.decoration.windows.getWindowByShopId", array("operateShopId" => $operate_shop_id));
    }

    /** 连锁店总店创建招贴
     * @param $sign 招贴信息和其关联连锁店子店ID
     * @return mixed
     */
    public function create_sign($sign)
    {
        return $this->client->call("eleme.decoration.sign.createSign", array("sign" => $sign));
    }

    /** 连锁店总店修改招贴
     * @param $sign_id 招贴ID
     * @param $sign 招贴信息和其关联连锁店子店ID
     * @return mixed
     */
    public function update_sign($sign_id, $sign)
    {
        return $this->client->call("eleme.decoration.sign.updateSign", array("signId" => $sign_id, "sign" => $sign));
    }

    /** 连锁店总店作废招贴
     * @param $sign_id 招贴ID
     * @param $operate_shop_id 连锁店总店ID
     * @return mixed
     */
    public function invalid_sign($sign_id, $operate_shop_id)
    {
        return $this->client->call("eleme.decoration.sign.invalidSign", array("signId" => $sign_id, "operateShopId" => $operate_shop_id));
    }

    /** 连锁店总店获取历史上传过的招贴图片
     * @param $sign 查询条件
     * @return mixed
     */
    public function get_sign_history_image($sign)
    {
        return $this->client->call("eleme.decoration.sign.getSignHistoryImage", array("sign" => $sign));
    }

    /** 连锁店总店分页查询店铺招贴
     * @param $sign 查询条件
     * @return mixed
     */
    public function query_sign($sign)
    {
        return $this->client->call("eleme.decoration.sign.querySign", array("sign" => $sign));
    }

    /** 连锁店总店根据招贴_i_d查询店铺招贴详情
     * @param $sign_id 招贴ID
     * @return mixed
     */
    public function get_sign_by_id($sign_id)
    {
        return $this->client->call("eleme.decoration.sign.getSignById", array("signId" => $sign_id));
    }

    /** 连锁店总店创建海报接口
     * @param $poster 海报信息和其关联连锁店子店I和子店商品
     * @return mixed
     */
    public function create_poster($poster)
    {
        return $this->client->call("eleme.decoration.poster.createPoster", array("poster" => $poster));
    }

    /** 连锁店总店修改海报
     * @param $poster_id 海报ID
     * @param $poster 海报信息和其关联连锁店子店ID和子店商品
     * @return mixed
     */
    public function update_poster($poster_id, $poster)
    {
        return $this->client->call("eleme.decoration.poster.updatePoster", array("posterId" => $poster_id, "poster" => $poster));
    }

    /** 连锁店总店作废海报
     * @param $poster 作废海报信息
     * @return mixed
     */
    public function invalid_poster($poster)
    {
        return $this->client->call("eleme.decoration.poster.invalidPoster", array("poster" => $poster));
    }

    /** 连锁店总店根据海报_i_d获取海报详情
     * @param $poster_id 海报ID
     * @param $operate_shop_id 连锁店总店ID
     * @return mixed
     */
    public function get_poster_detail_by_id($poster_id, $operate_shop_id)
    {
        return $this->client->call("eleme.decoration.poster.getPosterDetailById", array("posterId" => $poster_id, "operateShopId" => $operate_shop_id));
    }

    /** 连锁店总店根据条件查询海报信息集合
     * @param $poster 查询海报条件参数
     * @return mixed
     */
    public function query_poster($poster)
    {
        return $this->client->call("eleme.decoration.poster.queryPoster", array("poster" => $poster));
    }

    /** 连锁店总店获取历史上传过的海报图片
     * @param $operate_shop_id 连锁店总店ID
     * @return mixed
     */
    public function get_poster_history_image($operate_shop_id)
    {
        return $this->client->call("eleme.decoration.poster.getPosterHistoryImage", array("operateShopId" => $operate_shop_id));
    }

    /** 连锁店总店新增品牌故事
     * @param $story 品牌故事信息和其关联连锁店子店ID
     * @return mixed
     */
    public function create_brand_story($story)
    {
        return $this->client->call("eleme.decoration.story.createBrandStory", array("story" => $story));
    }

    /** 连锁店总店更新品牌故事
     * @param $brand_story_id 品牌故事ID
     * @param $story 品牌故事信息和其关联连锁店子店ID
     * @return mixed
     */
    public function update_brand_story($brand_story_id, $story)
    {
        return $this->client->call("eleme.decoration.story.updateBrandStory", array("brandStoryId" => $brand_story_id, "story" => $story));
    }

    /** 连锁店总店删除品牌故事
     * @param $brand_story_id 品牌故事ID
     * @param $operate_shop_id 连锁店总店店铺ID
     * @return mixed
     */
    public function delete_brand_story($brand_story_id, $operate_shop_id)
    {
        return $this->client->call("eleme.decoration.story.deleteBrandStory", array("brandStoryId" => $brand_story_id, "operateShopId" => $operate_shop_id));
    }

    /** 连锁店总店查询当前设置的品牌故事信息
     * @param $brand_story_id 品牌故事ID
     * @return mixed
     */
    public function get_brand_story_by_id($brand_story_id)
    {
        return $this->client->call("eleme.decoration.story.getBrandStoryById", array("brandStoryId" => $brand_story_id));
    }

    /** 上传图片
     * @param $image 文件内容base64编码值
     * @return mixed
     */
    public function upload($image)
    {
        return $this->client->call("eleme.decoration.image.upload", array("image" => $image));
    }

    /** 根据图片_h_a_s_h值获取图片信息
     * @param $hash 图片HASH值
     * @return mixed
     */
    public function get_image($hash)
    {
        return $this->client->call("eleme.decoration.image.getImage", array("hash" => $hash));
    }

}