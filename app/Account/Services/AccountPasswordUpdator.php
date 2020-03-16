<?php


namespace App\Account\Services;


use App\Account\Contracts\AccountPasswordUpdatable;
use App\Helpers\JedLogger;
use App\Notifications\PasswordReseted;
use App\User;
use Illuminate\Support\Facades\Hash;

class AccountPasswordUpdator implements AccountPasswordUpdatable
{
    /**
     * @param User $user
     * @param string $current
     * @param string $new
     * @return User
     * @throws \Exception
     */
    public function updatePassword(User $user, string $current, string $new)
    {
        try {

            if (!Hash::check($current, $user->password)) {
                throw new \Exception(__('Your current password is not match'), 403);
            }

            $user->password = Hash::make($new);
            $user->save();

            $user->notify(new PasswordReseted());

            return $user;

        } catch (\Exception $exception) {
            JedLogger::log($exception);
            throw $exception;
        }
    }
}
