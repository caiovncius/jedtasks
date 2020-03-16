<?php


namespace App\Account\Contracts;

use App\User;

interface AccountPasswordUpdatable
{
    /**
     * @param User $user
     * @param string $current
     * @param string $new
     * @return User
     * @throws \Exception
     */
    public function updatePassword(User $user, string $current, string $new);
}
