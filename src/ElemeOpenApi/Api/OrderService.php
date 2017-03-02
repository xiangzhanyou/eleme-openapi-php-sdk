<?php

namespace ElemeOpenApi\Api;

/**
 * 订单服务
 */
class OrderService extends RpcService
{

    /** 获取订单
     * @param $order_id 订单Id
     * @return mixed
     */
    public function get_order($order_id)
    {
        return $this->client->call("eleme.order.getOrder", array("orderId" => $order_id));
    }

    /** 批量获取订单
     * @param $order_ids 订单Id的列表
     * @return mixed
     */
    public function mget_orders($order_ids)
    {
        return $this->client->call("eleme.order.mgetOrders", array("orderIds" => $order_ids));
    }

    /** 确认订单
     * @param $order_id 订单Id
     * @return mixed
     */
    public function confirm_order($order_id)
    {
        return $this->client->call("eleme.order.confirmOrder", array("orderId" => $order_id));
    }

    /** 取消订单
     * @param $order_id 订单Id
     * @param $type 取消原因
     * @param $remark 备注说明
     * @return mixed
     */
    public function cancel_order($order_id, $type, $remark)
    {
        return $this->client->call("eleme.order.cancelOrder", array("orderId" => $order_id, "type" => $type, "remark" => $remark));
    }

    /** 同意退单
     * @param $order_id 订单Id
     * @return mixed
     */
    public function agree_refund($order_id)
    {
        return $this->client->call("eleme.order.agreeRefund", array("orderId" => $order_id));
    }

    /** 不同意退单
     * @param $order_id 订单Id
     * @param $reason 商家不同意退单原因
     * @return mixed
     */
    public function disagree_refund($order_id, $reason)
    {
        return $this->client->call("eleme.order.disagreeRefund", array("orderId" => $order_id, "reason" => $reason));
    }

}