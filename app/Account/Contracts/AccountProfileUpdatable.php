<?php


namespace App\Account\Contracts;

use App\User;
use Illuminate\Http\UploadedFile;

interface AccountProfileUpdatable
{
    /**
     * @param User $user
     * @param array $newData
     * @param UploadedFile|null $file
     * @return User|\Illuminate\Contracts\Auth\Authenticatable|null
     * @throws \Exception
     */
    public function update(User $user, array $newData, UploadedFile $file = null);
}
