<?php

namespace ElemeOpenApi\Api;

/**
 * 企业订餐商户服务
 */
class EnterpriseService extends RpcService
{

    /** 关联企业订餐到店订单
     * @param $relate_req_dto 订单关联请求
     * @return mixed
     */
    public function update_ent_arrival_order_relate($relate_req_dto)
    {
        return $this->client->call("eleme.enterprise.updateEntArrivalOrderRelate", array("relateReqDto" => $relate_req_dto));
    }

    /** 更新企业订餐店铺订单关联启用状态
     * @param $enable_request 门店启用请求
     * @return mixed
     */
    public function update_ent_arrival_shop_enable($enable_request)
    {
        return $this->client->call("eleme.enterprise.updateEntArrivalShopEnable", array("enableRequest" => $enable_request));
    }

}