<?php


namespace App\Account\Contracts;


interface AccountCreatable
{
    /**
     * Register a new user account
     *
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $workspaceName
     * @return App\User
     * @throws \Exception
     */
    public function register(string $name, string $email, string $password, string $workspaceName);
}
