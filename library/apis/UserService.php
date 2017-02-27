<?php

class UserService extends AltaService
{

    public function getUser()
    {
        return $this->client->call("eleme.user.getUser", array());
    }

}