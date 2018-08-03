<?php

namespace ElemeOpenApi\Api;

/**
 * 商户会员卡服务
 */
class CardService extends RpcService
{

    /** 上传图片
     * @param $image_base64 上传图片
     * @return mixed
     */
    public function upload_image($image_base64)
    {
        return $this->client->call("eleme.card.uploadImage", array("imageBase64" => $image_base64));
    }

    /** 创建模板
     * @param $template_info 模板信息
     * @return mixed
     */
    public function create_template($template_info)
    {
        return $this->client->call("eleme.card.createTemplate", array("templateInfo" => $template_info));
    }

    /** 查询模板信息
     * @param $template_id 模板id列表
     * @return mixed
     */
    public function mget_template_info($template_id)
    {
        return $this->client->call("eleme.card.mgetTemplateInfo", array("templateId" => $template_id));
    }

    /** 更新模板信息
     * @param $template_id 模板id
     * @param $template_info 模板更新信息
     * @return mixed
     */
    public function update_template($template_id, $template_info)
    {
        return $this->client->call("eleme.card.updateTemplate", array("templateId" => $template_id, "templateInfo" => $template_info));
    }

    /** 查询模板应用的店铺
     * @param $template_id 模板id列表
     * @return mixed
     */
    public function mget_shop_ids_by_template_ids($template_id)
    {
        return $this->client->call("eleme.card.mgetShopIdsByTemplateIds", array("templateId" => $template_id));
    }

    /** 将会员模板应用于店铺
     * @param $template_id 模板id
     * @param $shop_ids 店铺列表
     * @return mixed
     */
    public function apply_template($template_id, $shop_ids)
    {
        return $this->client->call("eleme.card.applyTemplate", array("templateId" => $template_id, "shopIds" => $shop_ids));
    }

    /** 开卡
     * @param $template_id 模板ID
     * @param $card_user_info 会员用户信息
     * @param $card_account_info 会员账户信息
     * @return mixed
     */
    public function open_card($template_id, $card_user_info, $card_account_info)
    {
        return $this->client->call("eleme.card.openCard", array("templateId" => $template_id, "cardUserInfo" => $card_user_info, "cardAccountInfo" => $card_account_info));
    }

    /** 更新会员信息
     * @param $card_user_info 用户基本信息
     * @param $card_account_info 用户账户信息
     * @return mixed
     */
    public function update_user_info($card_user_info, $card_account_info)
    {
        return $this->client->call("eleme.card.updateUserInfo", array("cardUserInfo" => $card_user_info, "cardAccountInfo" => $card_account_info));
    }

    /** 根据user_token获取用户信息
     * @param $user_token userToken有效期10分钟。饿了么app上跳转到外部H5页面www.abc.com/aaa?userToken=aaabbbccc,aaabbbccc为userToken,用其作为该接口的入参获取到用户信息
     * @return mixed
     */
    public function get_user_by_token($user_token)
    {
        return $this->client->call("eleme.card.getUserByToken", array("userToken" => $user_token));
    }

}