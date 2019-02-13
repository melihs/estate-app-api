<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * @return bool
     */
    public function isPersonel()
    {
        $user = auth()->user();
        if($user->personel === "1")
        {
            return true;
        }else
        {
            return false;
        }
    }
}
