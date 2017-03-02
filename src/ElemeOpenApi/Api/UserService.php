<?php

namespace ElemeOpenApi\Api;

/**
 * 商户服务
 */
class UserService extends RpcService
{

    /** 获取商户账号信息
    
     * @return mixed
     */
    public function get_user()
    {
        return $this->client->call("eleme.user.getUser", array());
    }

}