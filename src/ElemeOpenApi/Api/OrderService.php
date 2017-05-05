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

    /** 同意退单/取消单
     * @param $order_id 订单Id
     * @return mixed
     */
    public function agree_refund($order_id)
    {
        return $this->client->call("eleme.order.agreeRefund", array("orderId" => $order_id));
    }

    /** 不同意退单/取消单
     * @param $order_id 订单Id
     * @param $reason 商家不同意退单原因
     * @return mixed
     */
    public function disagree_refund($order_id, $reason)
    {
        return $this->client->call("eleme.order.disagreeRefund", array("orderId" => $order_id, "reason" => $reason));
    }

    /** 获取订单配送记录
     * @param $order_id 订单Id
     * @return mixed
     */
    public function get_delivery_state_record($order_id)
    {
        return $this->client->call("eleme.order.getDeliveryStateRecord", array("orderId" => $order_id));
    }

    /** 批量获取订单最新配送记录
     * @param $order_ids 订单Id列表
     * @return mixed
     */
    public function batch_get_delivery_states($order_ids)
    {
        return $this->client->call("eleme.order.batchGetDeliveryStates", array("orderIds" => $order_ids));
    }

    /** 配送异常或者物流拒单后选择自行配送
     * @param $order_id 订单Id
     * @return mixed
     */
    public function delivery_by_self($order_id)
    {
        return $this->client->call("eleme.order.deliveryBySelf", array("orderId" => $order_id));
    }

    /** 配送异常或者物流拒单后选择不再配送
     * @param $order_id 订单Id
     * @return mixed
     */
    public function no_more_delivery($order_id)
    {
        return $this->client->call("eleme.order.noMoreDelivery", array("orderId" => $order_id));
    }

    /** 订单确认送达
     * @param $order_id 订单ID
     * @return mixed
     */
    public function received_order($order_id)
    {
        return $this->client->call("eleme.order.receivedOrder", array("orderId" => $order_id));
    }

    /** 回复催单
     * @param $remind_id 催单Id
     * @param $type 回复类别
     * @param $content 回复内容
     * @return mixed
     */
    public function reply_reminder($remind_id, $type, $content)
    {
        return $this->client->call("eleme.order.replyReminder", array("remindId" => $remind_id, "type" => $type, "content" => $content));
    }

    /** 获取指定订单菜品活动价格.
     * @param $order_id 订单Id
     * @return mixed
     */
    public function get_commodities($order_id)
    {
        return $this->client->call("eleme.order.getCommodities", array("orderId" => $order_id));
    }

    /** 批量获取订单菜品活动价格
     * @param $order_ids 订单Id列表
     * @return mixed
     */
    public function mget_commodities($order_ids)
    {
        return $this->client->call("eleme.order.mgetCommodities", array("orderIds" => $order_ids));
    }

    /** 获取订单退款信息
     * @param $order_id 订单Id
     * @return mixed
     */
    public function get_refund_order($order_id)
    {
        return $this->client->call("eleme.order.getRefundOrder", array("orderId" => $order_id));
    }

    /** 批量获取订单退款信息
     * @param $order_ids 订单Id列表
     * @return mixed
     */
    public function mget_refund_orders($order_ids)
    {
        return $this->client->call("eleme.order.mgetRefundOrders", array("orderIds" => $order_ids));
    }

}