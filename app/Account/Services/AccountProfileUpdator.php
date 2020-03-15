<?php


namespace App\Account\Services;


use App\Account\Contracts\AccountProfileUpdatable;
use App\Helpers\JedLogger;
use Illuminate\Http\UploadedFile;

class AccountProfileUpdator implements AccountProfileUpdatable
{
    /**
     * @param array $newData
     * @param UploadedFile|null $file
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     * @throws \Exception
     */
    public function update(array $newData, UploadedFile $file = null)
    {
        try {
            $user = auth()->user();
            $user->fill($newData);

            if (!is_null($file)) {
                $avatarFileName = $file->store('avatars', 'public');
                $user->avatar = $avatarFileName;
            }

            $user->save();

            return $user;

        } catch (\Exception $exception) {
            JedLogger::log($exception);
            throw $exception;
        }
    }
}
