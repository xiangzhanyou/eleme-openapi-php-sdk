<?php

namespace ElemeOpenApi\Api;

class UserService extends RpcService
{

    /** 获取用户
    
     * @return mixed
     */
    public function get_user()
    {
        return $this->client->call("eleme.user.getUser", array());
    }

}