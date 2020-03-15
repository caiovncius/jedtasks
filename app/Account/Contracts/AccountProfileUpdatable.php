<?php


namespace App\Account\Contracts;

use Illuminate\Http\UploadedFile;

interface AccountProfileUpdatable
{
    /**
     * @param array $newData
     * @param UploadedFile|null $file
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     * @throws \Exception
     */
    public function update(array $newData, UploadedFile $file = null);
}
