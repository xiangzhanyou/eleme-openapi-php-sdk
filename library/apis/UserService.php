<?php

class UserService extends AltaService
{

    public function get_user()
    {
        return $this->client->call("eleme.user.getUser", array());
    }

}