<?php


namespace App\Traits\Boot;


use App\Helpers\PublicId;
use App\User;

trait UserBoot
{
    /**
     * Add public_id in user when creating
     */
    public static function booted()
    {
        static::creating(function (User $user) {
            $user->public_id = PublicId::getUnique($user);
            return $user;
        });
    }
}
