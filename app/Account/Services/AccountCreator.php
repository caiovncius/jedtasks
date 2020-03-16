<?php


namespace App\Account\Services;


use App\Account\Contracts\AccountCreatable;
use App\Helpers\JedLogger;
use App\User;
use App\Workspace;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class AccountCreator implements AccountCreatable
{
    /**
     * Register a new user account
     *
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $workspaceName
     * @return User
     * @throws \Exception
     */
    public function register(string $name, string $email, string $password, string $workspaceName)
    {
        try {
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->save();

            $workspace = Workspace::create(['name' => $workspaceName]);

            $user->workspaces()->attach(
                $workspace->id,
                [
                    'role' => User::ROLE_OWNER,
                    'invite_status' => User::INVITE_SELF,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );

            $settingsSeeder = new \DefaultUserSettings($user);
            $settingsSeeder->run();

            event( new Registered($user));

            return $user;

        } catch (\Exception $exception) {
            JedLogger::log($exception);
            throw $exception;
        }
    }
}
