<?php

namespace app\Services;

class UserService
{
    public function authorization()
    {
        if (!$_SESSION['user'] || !$_SESSION['user']['isAdmin']) {
            return false;
        }
        return true;
    }
}