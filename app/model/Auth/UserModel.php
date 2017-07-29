<?php

namespace app\model\Auth;

use core\Model;

class UserModel
{
    public function getUserInfo()
    {
        return [
            'username' => 'faker',
            'email' => 'faker@fa.ker'
        ];
    }
}