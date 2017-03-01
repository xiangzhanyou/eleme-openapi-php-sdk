<?php

class UserService extends RpcService
{

    public function get_user()
    {
        return $this->client->call("eleme.user.getUser", array());
    }

}